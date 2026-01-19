document.addEventListener("scroll",()=>{
 document.querySelectorAll('.fade-in').forEach(el=>{
  if(el.getBoundingClientRect().top < window.innerHeight - 50){
    el.classList.add('show');
  }
 });
});

// Hamburger menu toggle
const hamburger = document.querySelector('.hamburger');
const navUl = document.querySelector('nav ul');
const nav = document.querySelector('nav');

hamburger.addEventListener('click', () => {
  hamburger.classList.toggle('active');
  navUl.classList.toggle('active');
});

// Change nav color on scroll
window.addEventListener('scroll', () => {
  const heroHeight = document.querySelector('.hero').offsetHeight;
  if (window.scrollY > heroHeight - 50) {
    nav.classList.add('dark');
  } else {
    nav.classList.remove('dark');
  }
});

// Cookie banner
const cookieBanner = document.getElementById('cookie-banner');
const acceptButton = document.getElementById('accept-cookies');

if (!localStorage.getItem('cookiesAccepted')) {
  cookieBanner.classList.add('show');
}

acceptButton.addEventListener('click', () => {
  localStorage.setItem('cookiesAccepted', 'true');
  cookieBanner.classList.remove('show');
});

// WhatsApp tray
function toggleWhatsApp() {
  const tray = document.getElementById('whatsapp-tray');
  tray.style.display = tray.style.display === 'block' ? 'none' : 'block';
}

document.getElementById('whatsapp-form').addEventListener('submit', (e) => {
  e.preventDefault();
  const message = document.getElementById('whatsapp-message').value;
  const url = `https://wa.me/573003182167?text=${encodeURIComponent(message)}`;
  window.open(url, '_blank');
  document.getElementById('whatsapp-message').value = '';
  toggleWhatsApp();
});
