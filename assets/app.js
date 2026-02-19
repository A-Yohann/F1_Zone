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
