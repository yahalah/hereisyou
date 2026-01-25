const header = document.querySelector('.header');
const navToggle = document.querySelector('.nav-toggle');

if (navToggle && header) {
  navToggle.addEventListener('click', () => {
    header.classList.toggle('nav-open');
  });
}

const slider = document.querySelector('[data-testimonial-slider]');
if (slider) {
  const track = slider.querySelector('.testimonial-track');
  const slides = Array.from(slider.querySelectorAll('.testimonial'));
  let index = 0;

  setInterval(() => {
    index = (index + 1) % slides.length;
    track.style.transform = `translateX(-${index * 100}%)`;
  }, 6500);
}
