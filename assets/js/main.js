const megaTrigger = document.querySelector('.mega-trigger');
const megaMenu = document.querySelector('.mega-menu');
const mobileToggle = document.querySelector('.mobile-toggle');
const mobileDrawer = document.querySelector('.mobile-drawer');
const mobileClose = document.querySelector('.mobile-close');
const accordionTriggers = document.querySelectorAll('.accordion-trigger');

if (megaTrigger && megaMenu) {
  megaTrigger.addEventListener('click', () => {
    const isActive = megaMenu.classList.toggle('active');
    megaTrigger.setAttribute('aria-expanded', isActive ? 'true' : 'false');
  });
  document.addEventListener('click', (event) => {
    if (!megaMenu.contains(event.target) && !megaTrigger.contains(event.target)) {
      megaMenu.classList.remove('active');
      megaTrigger.setAttribute('aria-expanded', 'false');
    }
  });
}

if (mobileToggle && mobileDrawer) {
  mobileToggle.addEventListener('click', () => {
    mobileDrawer.classList.add('active');
    mobileToggle.setAttribute('aria-expanded', 'true');
  });
}

if (mobileClose && mobileDrawer) {
  mobileClose.addEventListener('click', () => {
    mobileDrawer.classList.remove('active');
    mobileToggle.setAttribute('aria-expanded', 'false');
  });
}

accordionTriggers.forEach((trigger) => {
  trigger.addEventListener('click', () => {
    const panel = trigger.nextElementSibling;
    if (panel) {
      const isOpen = panel.style.display === 'flex';
      panel.style.display = isOpen ? 'none' : 'flex';
    }
  });
});

const cookieBanner = document.querySelector('.cookie-banner');
const cookieAccept = document.querySelector('.cookie-accept');
if (cookieBanner && cookieAccept) {
  const accepted = localStorage.getItem('kindlytech_cookie');
  if (!accepted) {
    cookieBanner.classList.add('active');
  }
  cookieAccept.addEventListener('click', () => {
    localStorage.setItem('kindlytech_cookie', 'accepted');
    cookieBanner.classList.remove('active');
  });
}
