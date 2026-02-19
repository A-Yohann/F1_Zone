// Burger menu JS pour la navbar responsive

document.addEventListener('DOMContentLoaded', function () {
  const burger = document.getElementById('burger-menu');
  const links = document.getElementById('navbar-links');
  if (burger && links) {
    burger.addEventListener('click', function () {
      const isOpen = links.classList.toggle('open');
      burger.setAttribute('aria-expanded', isOpen ? 'true' : 'false');
    });
  }
});
