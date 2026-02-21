// Barre de recherche sur la page circuits
document.addEventListener('DOMContentLoaded', () => {
	const searchInput = document.getElementById('circuit-search');
	const cards = document.querySelectorAll('.circuit-card');
	if (searchInput && cards.length) {
		searchInput.addEventListener('input', function() {
			const value = this.value.trim().toLowerCase();
			cards.forEach(card => {
				const title = card.querySelector('.circuit-title');
				if (title && title.textContent.toLowerCase().includes(value)) {
					card.style.display = '';
				} else {
					card.style.display = 'none';
				}
			});
		});
	}
});
// Barre de recherche sur la page pilotes
document.addEventListener('DOMContentLoaded', () => {
	const searchInput = document.getElementById('pilote-search');
	const cards = document.querySelectorAll('.pilote-card');
	if (searchInput && cards.length) {
		searchInput.addEventListener('input', function() {
			const value = this.value.trim().toLowerCase();
			cards.forEach(card => {
				const name = card.querySelector('h3').textContent.toLowerCase();
				if (name.includes(value)) {
					card.style.display = '';
				} else {
					card.style.display = 'none';
				}
			});
		});
	}
});
// Affichage du nombre de caractères dans le message de contact
document.addEventListener('DOMContentLoaded', () => {
	const messageInput = document.getElementById('contact_message');
	const countDiv = document.getElementById('message-count');
	if (messageInput && countDiv) {
		function updateCount() {
			countDiv.textContent = `${messageInput.value.length} / 250 caractères`;
		}
		messageInput.addEventListener('input', updateCount);
		updateCount();
	}
});
// Validation email contact
document.addEventListener('DOMContentLoaded', () => {
	const emailInput = document.getElementById('contact_email');
	const form = emailInput ? emailInput.closest('form') : null;
	const errorDiv = document.getElementById('email-error');
	if (emailInput && errorDiv && form) {
		function validateEmail(email) {
			// Simple regex for email validation
			return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
		}
		emailInput.addEventListener('input', function() {
			if (this.value === '' || validateEmail(this.value)) {
				errorDiv.style.display = 'none';
			} else {
				errorDiv.style.display = 'block';
			}
		});
		form.addEventListener('submit', function(e) {
			if (!validateEmail(emailInput.value)) {
				errorDiv.style.display = 'block';
				emailInput.focus();
				e.preventDefault();
			} else {
				errorDiv.style.display = 'none';
			}
		});
	}
});
// Menu burger mobile/tablette
document.addEventListener('DOMContentLoaded', () => {
	const mobileNavbar = document.querySelector('.navbar-mobile');
	if (!mobileNavbar) return;
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
		// Fermer le menu si on repasse en desktop
		window.addEventListener('resize', () => {
			if (window.innerWidth > 768) {
				menu.classList.remove('is-active');
				menu.style.display = '';
			}
		});
	}
});
// Centralisation de la logique de filtre des résumés GP depuis gp_resume/index.html.twig
function filterResumes() {
	const select = document.getElementById('resume-type');
	if (!select) return;
	const value = select.value;
	const cards = document.querySelectorAll('.gp-resume-card');
	cards.forEach(card => {
		const title = card.querySelector('h2').textContent.toLowerCase();
		if (value === 'all') {
			card.style.display = '';
		} else if (value === 'gp') {
			card.style.display = title.includes('sprint') ? 'none' : '';
		} else if (value === 'sprint') {
			card.style.display = title.includes('sprint') ? '' : 'none';
		}
	});
}

document.addEventListener('DOMContentLoaded', () => {
	// ...autres listeners...
	const select = document.getElementById('resume-type');
	if (select) {
		select.addEventListener('change', filterResumes);
		filterResumes(); // Appliquer le filtre au chargement
	}
});
// Centralisation de la logique de toggleClassement depuis home/index.html.twig

function toggleClassement(id, btn) {
	const tbody = document.getElementById(id);
	if (tbody.classList.contains('classement-hidden')) {
		tbody.classList.remove('classement-hidden');
		btn.textContent = '▲';
	} else {
		tbody.classList.add('classement-hidden');
		btn.textContent = '▼';
	}
}

document.addEventListener('DOMContentLoaded', () => {
	document.querySelectorAll('[data-toggle-classement]').forEach(btn => {
		btn.addEventListener('click', function() {
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
/*
 * Welcome to your app's main JavaScript file!
 *
 * This file will be included onto the page via the importmap() Twig function,
 * which should already be in your base.html.twig.
 */
import './styles/app.scss';
// import '@fortawesome/fontawesome-free/css/all.min.css';
console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');
