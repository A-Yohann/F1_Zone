import './styles/app.scss';

document.addEventListener('DOMContentLoaded', () => {

  // ============================================
  // Toggle password visibility (login, register)
  // ============================================
  document.querySelectorAll('.toggle-password').forEach(toggle => {
    toggle.addEventListener('click', () => {
      const wrapper = toggle.closest('.password-wrapper');
      if (!wrapper) return;
      const input = wrapper.querySelector('input[type="password"], input[type="text"]');
      if (!input) return;
      const isPassword = input.getAttribute('type') === 'password';
      input.setAttribute('type', isPassword ? 'text' : 'password');
      toggle.textContent = isPassword ? '🙈' : '👁️';
    });
  });

  // ============================================
  // Password info tooltip (register)
  // ============================================
  const tooltip = document.querySelector('.password-info-tooltip');
  if (tooltip) {
    const infoText = tooltip.querySelector('.password-info-text');
    tooltip.addEventListener('mouseenter', () => { infoText.style.display = 'block'; });
    tooltip.addEventListener('mouseleave', () => { infoText.style.display = 'none'; });
    tooltip.addEventListener('click', (e) => {
      e.stopPropagation();
      infoText.style.display = (infoText.style.display === 'block') ? 'none' : 'block';
    });
    document.addEventListener('click', (e) => {
      if (!tooltip.contains(e.target)) {
        infoText.style.display = 'none';
      }
    });
  }

  // ============================================
  // Custom file input name display (actualite)
  // ============================================
  const fileInput = document.getElementById('actu_imageFile');
  const fileLabel = document.querySelector('.custom-file-label');
  const fileName = document.getElementById('file-name');
  if (fileInput && fileLabel && fileName) {
    fileLabel.addEventListener('click', () => { fileInput.click(); });
    fileInput.addEventListener('change', () => {
      fileName.textContent = fileInput.files.length > 0 ? fileInput.files[0].name : '';
    });
  }

  // ============================================
  // Search bar — circuits
  // ============================================
  const circuitSearch = document.getElementById('circuit-search');
  const circuitCards = document.querySelectorAll('.circuit-card');
  if (circuitSearch && circuitCards.length) {
    circuitSearch.addEventListener('input', function () {
      const value = this.value.trim().toLowerCase();
      circuitCards.forEach(card => {
        const title = card.querySelector('.circuit-title');
        card.style.display = (title && title.textContent.toLowerCase().includes(value)) ? '' : 'none';
      });
    });
  }

  // ============================================
  // Search bar — pilotes
  // ============================================
  const piloteSearch = document.getElementById('pilote-search');
  const piloteCards = document.querySelectorAll('.pilote-card');
  if (piloteSearch && piloteCards.length) {
    piloteSearch.addEventListener('input', function () {
      const value = this.value.trim().toLowerCase();
      piloteCards.forEach(card => {
        const name = card.querySelector('h3').textContent.toLowerCase();
        card.style.display = name.includes(value) ? '' : 'none';
      });
    });
  }

  // ============================================
  // Contact — character count
  // ============================================
  const messageInput = document.getElementById('contact_message');
  const countDiv = document.getElementById('message-count');
  if (messageInput && countDiv) {
    const updateCount = () => {
      countDiv.textContent = `${messageInput.value.length} / 250 caractères`;
    };
    messageInput.addEventListener('input', updateCount);
    updateCount();
  }

  // ============================================
  // Contact — email validation
  // ============================================
  const emailInput = document.getElementById('contact_email');
  const emailForm = emailInput ? emailInput.closest('form') : null;
  const errorDiv = document.getElementById('email-error');
  if (emailInput && errorDiv && emailForm) {
    const validateEmail = (email) => /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);

    emailInput.addEventListener('input', function () {
      errorDiv.style.display = (this.value === '' || validateEmail(this.value)) ? 'none' : 'block';
    });

    emailForm.addEventListener('submit', (e) => {
      if (!validateEmail(emailInput.value)) {
        errorDiv.style.display = 'block';
        emailInput.focus();
        e.preventDefault();
      } else {
        errorDiv.style.display = 'none';
      }
    });
  }

  // ============================================
  // Menu burger mobile/tablette
  // ============================================
  const mobileNavbar = document.querySelector('.navbar-mobile');
  if (mobileNavbar) {
    const burger = mobileNavbar.querySelector('.navbar-burger');
    const menu = mobileNavbar.querySelector('.navbar-menu');
    if (burger && menu) {
      burger.addEventListener('click', () => {
        if (menu.classList.contains('is-active')) {
          menu.classList.remove('is-active');
          menu.style.display = '';
        } else {
          menu.classList.add('is-active');
          menu.style.display = 'flex';
        }
      });
      window.addEventListener('resize', () => {
        if (window.innerWidth > 768) {
          menu.classList.remove('is-active');
          menu.style.display = '';
        }
      });
    }
  }

  // ============================================
  // GP Resume — filter by type
  // ============================================
  const resumeSelect = document.getElementById('resume-type');
  if (resumeSelect) {
    const filterResumes = () => {
      const value = resumeSelect.value;
      document.querySelectorAll('.gp-resume-card').forEach(card => {
        const title = card.querySelector('h2').textContent.toLowerCase();
        if (value === 'all') {
          card.style.display = '';
        } else if (value === 'gp') {
          card.style.display = title.includes('sprint') ? 'none' : '';
        } else if (value === 'sprint') {
          card.style.display = title.includes('sprint') ? '' : 'none';
        }
      });
    };
    resumeSelect.addEventListener('change', filterResumes);
    filterResumes();
  }

  // ============================================
  // Home — toggle classement accordion
  // ============================================
  document.querySelectorAll('[data-toggle-classement]').forEach(btn => {
    btn.addEventListener('click', function () {
      const id = this.getAttribute('data-toggle-classement');
      const tbody = document.getElementById(id);
      const isOpen = !tbody.classList.contains('classement-hidden');

      // Fermer tous les classements
      document.querySelectorAll('[data-toggle-classement]').forEach(otherBtn => {
        const otherId = otherBtn.getAttribute('data-toggle-classement');
        const otherTbody = document.getElementById(otherId);
        otherTbody.classList.add('classement-hidden');
        otherBtn.textContent = '▼';
      });

      // Si ce n'était pas déjà ouvert, on l'ouvre
      if (!isOpen) {
        tbody.classList.remove('classement-hidden');
        this.textContent = '▲';
      }
    });
  });

});
