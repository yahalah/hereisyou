const csrfEndpoint = '/api/csrf.php';
const contactEndpoint = '/api/contact.php';
const chatEndpoint = '/api/chat.php';
const newsletterEndpoint = '/api/newsletter.php';

const state = {
  csrfToken: null,
};

async function loadCsrf() {
  const res = await fetch(csrfEndpoint, { credentials: 'same-origin' });
  const data = await res.json();
  if (data.ok) {
    state.csrfToken = data.token;
  }
}

function setupDrawer() {
  const toggle = document.querySelector('[data-drawer-toggle]');
  const drawer = document.querySelector('[data-mobile-drawer]');
  const close = document.querySelector('[data-drawer-close]');
  if (!toggle || !drawer) return;

  toggle.addEventListener('click', () => {
    drawer.classList.add('active');
  });
  close?.addEventListener('click', () => {
    drawer.classList.remove('active');
  });

  drawer.addEventListener('click', (event) => {
    if (event.target === drawer) {
      drawer.classList.remove('active');
    }
  });

  drawer.querySelectorAll('[data-accordion]').forEach((btn) => {
    btn.addEventListener('click', () => {
      const panel = btn.nextElementSibling;
      if (!panel) return;
      panel.classList.toggle('active');
    });
  });
}

function setupMegaMenu() {
  const triggers = document.querySelectorAll('[data-mega-trigger]');
  if (!triggers.length) return;

  const closeMenus = () => {
    triggers.forEach((trigger) => {
      const item = trigger.closest('.nav-item');
      if (!item) return;
      item.classList.remove('open');
      trigger.setAttribute('aria-expanded', 'false');
    });
  };

  triggers.forEach((trigger) => {
    const item = trigger.closest('.nav-item');
    if (!item) return;
    trigger.setAttribute('aria-expanded', 'false');
    trigger.addEventListener('click', (event) => {
      event.preventDefault();
      const isOpen = item.classList.contains('open');
      closeMenus();
      if (!isOpen) {
        item.classList.add('open');
        trigger.setAttribute('aria-expanded', 'true');
      }
    });
  });

  document.addEventListener('click', (event) => {
    if (!event.target.closest('.nav-item')) {
      closeMenus();
    }
  });

  document.addEventListener('keydown', (event) => {
    if (event.key === 'Escape') {
      closeMenus();
    }
  });
}

function setupCookieBanner() {
  const banner = document.querySelector('[data-cookie-banner]');
  if (!banner) return;
  const stored = localStorage.getItem('cookiePreferences');
  if (!stored) {
    banner.style.display = 'block';
  }

  const acceptAll = banner.querySelector('[data-cookie-accept]');
  const rejectAll = banner.querySelector('[data-cookie-reject]');
  const manage = banner.querySelector('[data-cookie-manage]');

  const save = (prefs) => {
    localStorage.setItem('cookiePreferences', JSON.stringify(prefs));
    banner.style.display = 'none';
  };

  acceptAll?.addEventListener('click', () => save({ analytics: true, marketing: true }));
  rejectAll?.addEventListener('click', () => save({ analytics: false, marketing: false }));
  manage?.addEventListener('click', () => {
    const analytics = confirm('Allow analytics cookies?');
    const marketing = confirm('Allow marketing cookies?');
    save({ analytics, marketing });
  });
}

function bindContactForm() {
  const form = document.querySelector('[data-contact-form]');
  if (!form) return;
  const status = form.querySelector('[data-form-status]');
  form.addEventListener('submit', async (event) => {
    event.preventDefault();
    status.textContent = '';
    status.className = 'alert';
    const payload = {
      name: form.name.value.trim(),
      email: form.email.value.trim(),
      organisation: form.organisation.value.trim(),
      budget: form.budget.value,
      message: form.message.value.trim(),
      consent: form.consent.checked,
      company: form.company.value,
      csrf_token: state.csrfToken,
    };

    const response = await fetch(contactEndpoint, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(payload),
    });

    const data = await response.json();
    status.textContent = data.message;
    status.classList.add(data.ok ? 'success' : 'error');
    if (data.ok) {
      form.reset();
    }
  });
}

function bindNewsletterForm() {
  const form = document.querySelector('[data-newsletter-form]');
  if (!form) return;
  const status = form.querySelector('[data-newsletter-status]');
  form.addEventListener('submit', async (event) => {
    event.preventDefault();
    status.textContent = '';
    status.className = 'alert';
    const payload = {
      email: form.email.value.trim(),
      company: form.company.value,
      csrf_token: state.csrfToken,
    };

    const response = await fetch(newsletterEndpoint, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(payload),
    });
    const data = await response.json();
    status.textContent = data.message;
    status.classList.add(data.ok ? 'success' : 'error');
    if (data.ok) {
      form.reset();
    }
  });
}

function setupChatWidget() {
  const launcher = document.querySelector('[data-chat-launcher]');
  const widget = document.querySelector('[data-chat-widget]');
  const close = document.querySelector('[data-chat-close]');
  if (!launcher || !widget) return;

  launcher.addEventListener('click', () => {
    widget.style.display = 'block';
    launcher.style.display = 'none';
  });
  close?.addEventListener('click', () => {
    widget.style.display = 'none';
    launcher.style.display = 'inline-flex';
  });

  const form = widget.querySelector('[data-chat-form]');
  const responseEl = widget.querySelector('[data-chat-response]');
  form?.addEventListener('submit', async (event) => {
    event.preventDefault();
    responseEl.textContent = '';
    const payload = {
      message: form.message.value.trim(),
      email: form.email.value.trim(),
      company: form.company.value,
      csrf_token: state.csrfToken,
    };

    const response = await fetch(chatEndpoint, {
      method: 'POST',
      headers: { 'Content-Type': 'application/json' },
      body: JSON.stringify(payload),
    });
    const data = await response.json();
    if (data.ok) {
      responseEl.textContent = data.reply;
      form.reset();
    } else {
      responseEl.textContent = data.message;
    }
  });
}

loadCsrf().then(() => {
  setupMegaMenu();
  setupDrawer();
  setupCookieBanner();
  bindContactForm();
  bindNewsletterForm();
  setupChatWidget();
});
