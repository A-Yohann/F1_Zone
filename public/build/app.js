"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["app"],{

/***/ "./assets/app.js"
/*!***********************!*\
  !*** ./assets/app.js ***!
  \***********************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
/* harmony import */ var core_js_modules_es_array_for_each_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! core-js/modules/es.array.for-each.js */ "./node_modules/core-js/modules/es.array.for-each.js");
/* harmony import */ var core_js_modules_es_array_for_each_js__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_for_each_js__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var core_js_modules_es_array_includes_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! core-js/modules/es.array.includes.js */ "./node_modules/core-js/modules/es.array.includes.js");
/* harmony import */ var core_js_modules_es_array_includes_js__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_array_includes_js__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! core-js/modules/es.object.to-string.js */ "./node_modules/core-js/modules/es.object.to-string.js");
/* harmony import */ var core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var core_js_modules_es_regexp_exec_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! core-js/modules/es.regexp.exec.js */ "./node_modules/core-js/modules/es.regexp.exec.js");
/* harmony import */ var core_js_modules_es_regexp_exec_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_regexp_exec_js__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var core_js_modules_es_regexp_test_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! core-js/modules/es.regexp.test.js */ "./node_modules/core-js/modules/es.regexp.test.js");
/* harmony import */ var core_js_modules_es_regexp_test_js__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_regexp_test_js__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var core_js_modules_es_string_includes_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! core-js/modules/es.string.includes.js */ "./node_modules/core-js/modules/es.string.includes.js");
/* harmony import */ var core_js_modules_es_string_includes_js__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_includes_js__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var core_js_modules_es_string_trim_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! core-js/modules/es.string.trim.js */ "./node_modules/core-js/modules/es.string.trim.js");
/* harmony import */ var core_js_modules_es_string_trim_js__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_trim_js__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var core_js_modules_esnext_iterator_constructor_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! core-js/modules/esnext.iterator.constructor.js */ "./node_modules/core-js/modules/esnext.iterator.constructor.js");
/* harmony import */ var core_js_modules_esnext_iterator_constructor_js__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_esnext_iterator_constructor_js__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var core_js_modules_esnext_iterator_for_each_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! core-js/modules/esnext.iterator.for-each.js */ "./node_modules/core-js/modules/esnext.iterator.for-each.js");
/* harmony import */ var core_js_modules_esnext_iterator_for_each_js__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_esnext_iterator_for_each_js__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var core_js_modules_web_dom_collections_for_each_js__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! core-js/modules/web.dom-collections.for-each.js */ "./node_modules/core-js/modules/web.dom-collections.for-each.js");
/* harmony import */ var core_js_modules_web_dom_collections_for_each_js__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_web_dom_collections_for_each_js__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var _styles_app_scss__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! ./styles/app.scss */ "./assets/styles/app.scss");










// Barre de recherche sur la page circuits
document.addEventListener('DOMContentLoaded', function () {
  var searchInput = document.getElementById('circuit-search');
  var cards = document.querySelectorAll('.circuit-card');
  if (searchInput && cards.length) {
    searchInput.addEventListener('input', function () {
      var value = this.value.trim().toLowerCase();
      cards.forEach(function (card) {
        var title = card.querySelector('.circuit-title');
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
document.addEventListener('DOMContentLoaded', function () {
  var searchInput = document.getElementById('pilote-search');
  var cards = document.querySelectorAll('.pilote-card');
  if (searchInput && cards.length) {
    searchInput.addEventListener('input', function () {
      var value = this.value.trim().toLowerCase();
      cards.forEach(function (card) {
        var name = card.querySelector('h3').textContent.toLowerCase();
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
document.addEventListener('DOMContentLoaded', function () {
  var messageInput = document.getElementById('contact_message');
  var countDiv = document.getElementById('message-count');
  if (messageInput && countDiv) {
    var updateCount = function updateCount() {
      countDiv.textContent = "".concat(messageInput.value.length, " / 250 caract\xE8res");
    };
    messageInput.addEventListener('input', updateCount);
    updateCount();
  }
});
// Validation email contact
document.addEventListener('DOMContentLoaded', function () {
  var emailInput = document.getElementById('contact_email');
  var form = emailInput ? emailInput.closest('form') : null;
  var errorDiv = document.getElementById('email-error');
  if (emailInput && errorDiv && form) {
    var validateEmail = function validateEmail(email) {
      // Simple regex for email validation
      return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    };
    emailInput.addEventListener('input', function () {
      if (this.value === '' || validateEmail(this.value)) {
        errorDiv.style.display = 'none';
      } else {
        errorDiv.style.display = 'block';
      }
    });
    form.addEventListener('submit', function (e) {
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
document.addEventListener('DOMContentLoaded', function () {
  var mobileNavbar = document.querySelector('.navbar-mobile');
  if (!mobileNavbar) return;
  var burger = mobileNavbar.querySelector('.navbar-burger');
  var menu = mobileNavbar.querySelector('.navbar-menu');
  if (burger && menu) {
    burger.addEventListener('click', function () {
      if (menu.classList.contains('is-active')) {
        menu.classList.remove('is-active');
        menu.style.display = '';
      } else {
        menu.classList.add('is-active');
        menu.style.display = 'flex';
      }
    });
    // Fermer le menu si on repasse en desktop
    window.addEventListener('resize', function () {
      if (window.innerWidth > 768) {
        menu.classList.remove('is-active');
        menu.style.display = '';
      }
    });
  }
});
// Centralisation de la logique de filtre des résumés GP depuis gp_resume/index.html.twig
function filterResumes() {
  var select = document.getElementById('resume-type');
  if (!select) return;
  var value = select.value;
  var cards = document.querySelectorAll('.gp-resume-card');
  cards.forEach(function (card) {
    var title = card.querySelector('h2').textContent.toLowerCase();
    if (value === 'all') {
      card.style.display = '';
    } else if (value === 'gp') {
      card.style.display = title.includes('sprint') ? 'none' : '';
    } else if (value === 'sprint') {
      card.style.display = title.includes('sprint') ? '' : 'none';
    }
  });
}
document.addEventListener('DOMContentLoaded', function () {
  // ...autres listeners...
  var select = document.getElementById('resume-type');
  if (select) {
    select.addEventListener('change', filterResumes);
    filterResumes(); // Appliquer le filtre au chargement
  }
});
// Centralisation de la logique de toggleClassement depuis home/index.html.twig

function toggleClassement(id, btn) {
  var tbody = document.getElementById(id);
  if (tbody.classList.contains('classement-hidden')) {
    tbody.classList.remove('classement-hidden');
    btn.textContent = '▲';
  } else {
    tbody.classList.add('classement-hidden');
    btn.textContent = '▼';
  }
}
document.addEventListener('DOMContentLoaded', function () {
  document.querySelectorAll('[data-toggle-classement]').forEach(function (btn) {
    btn.addEventListener('click', function () {
      var id = this.getAttribute('data-toggle-classement');
      var tbody = document.getElementById(id);
      var isOpen = !tbody.classList.contains('classement-hidden');
      // Fermer tous les classements
      document.querySelectorAll('[data-toggle-classement]').forEach(function (otherBtn) {
        var otherId = otherBtn.getAttribute('data-toggle-classement');
        var otherTbody = document.getElementById(otherId);
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

// import '@fortawesome/fontawesome-free/css/all.min.css';
console.log('This log comes from assets/app.js - welcome to AssetMapper! 🎉');

/***/ },

/***/ "./assets/styles/app.scss"
/*!********************************!*\
  !*** ./assets/styles/app.scss ***!
  \********************************/
(__unused_webpack_module, __webpack_exports__, __webpack_require__) {

__webpack_require__.r(__webpack_exports__);
// extracted by mini-css-extract-plugin


/***/ }

},
/******/ __webpack_require__ => { // webpackRuntimeModules
/******/ var __webpack_exec__ = (moduleId) => (__webpack_require__(__webpack_require__.s = moduleId))
/******/ __webpack_require__.O(0, ["vendors-node_modules_core-js_modules_es_array_for-each_js-node_modules_core-js_modules_es_arr-bf5bfe"], () => (__webpack_exec__("./assets/app.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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Q0FBQyxVQUFBd0MsUUFBUSxFQUFJO1FBQ3pFLElBQU1DLE9BQU8sR0FBR0QsUUFBUSxDQUFDRixZQUFZLENBQUMsd0JBQXdCLENBQUM7UUFDL0QsSUFBTUksVUFBVSxHQUFHcEQsUUFBUSxDQUFDRyxjQUFjLENBQUNnRCxPQUFPLENBQUM7UUFDbkRDLFVBQVUsQ0FBQ2hCLFNBQVMsQ0FBQ0csR0FBRyxDQUFDLG1CQUFtQixDQUFDO1FBQzdDVyxRQUFRLENBQUNwQyxXQUFXLEdBQUcsR0FBRztNQUMzQixDQUFDLENBQUM7TUFDRjtNQUNBLElBQUksQ0FBQ21DLE1BQU0sRUFBRTtRQUNaRixLQUFLLENBQUNYLFNBQVMsQ0FBQ0UsTUFBTSxDQUFDLG1CQUFtQixDQUFDO1FBQzNDLElBQUksQ0FBQ3hCLFdBQVcsR0FBRyxHQUFHO01BQ3ZCO0lBQ0QsQ0FBQyxDQUFDO0VBQ0gsQ0FBQyxDQUFDO0FBQ0gsQ0FBQyxDQUFDO0FBQ0Y7QUFDQTtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQzJCO0FBQzNCO0FBQ0F1QyxPQUFPLENBQUNDLEdBQUcsQ0FBQyxnRUFBZ0UsQ0FBQyxDOzs7Ozs7Ozs7OztBQ3pLN0UiLCJzb3VyY2VzIjpbIndlYnBhY2s6Ly8vLi9hc3NldHMvYXBwLmpzIiwid2VicGFjazovLy8uL2Fzc2V0cy9zdHlsZXMvYXBwLnNjc3M/OGY1OSJdLCJzb3VyY2VzQ29udGVudCI6WyIvLyBCYXJyZSBkZSByZWNoZXJjaGUgc3VyIGxhIHBhZ2UgY2lyY3VpdHNcclxuZG9jdW1lbnQuYWRkRXZlbnRMaXN0ZW5lcignRE9NQ29udGVudExvYWRlZCcsICgpID0+IHtcclxuXHRjb25zdCBzZWFyY2hJbnB1dCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdjaXJjdWl0LXNlYXJjaCcpO1xyXG5cdGNvbnN0IGNhcmRzID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbCgnLmNpcmN1aXQtY2FyZCcpO1xyXG5cdGlmIChzZWFyY2hJbnB1dCAmJiBjYXJkcy5sZW5ndGgpIHtcclxuXHRcdHNlYXJjaElucHV0LmFkZEV2ZW50TGlzdGVuZXIoJ2lucHV0JywgZnVuY3Rpb24oKSB7XHJcblx0XHRcdGNvbnN0IHZhbHVlID0gdGhpcy52YWx1ZS50cmltKCkudG9Mb3dlckNhc2UoKTtcclxuXHRcdFx0Y2FyZHMuZm9yRWFjaChjYXJkID0+IHtcclxuXHRcdFx0XHRjb25zdCB0aXRsZSA9IGNhcmQucXVlcnlTZWxlY3RvcignLmNpcmN1aXQtdGl0bGUnKTtcclxuXHRcdFx0XHRpZiAodGl0bGUgJiYgdGl0bGUudGV4dENvbnRlbnQudG9Mb3dlckNhc2UoKS5pbmNsdWRlcyh2YWx1ZSkpIHtcclxuXHRcdFx0XHRcdGNhcmQuc3R5bGUuZGlzcGxheSA9ICcnO1xyXG5cdFx0XHRcdH0gZWxzZSB7XHJcblx0XHRcdFx0XHRjYXJkLnN0eWxlLmRpc3BsYXkgPSAnbm9uZSc7XHJcblx0XHRcdFx0fVxyXG5cdFx0XHR9KTtcclxuXHRcdH0pO1xyXG5cdH1cclxufSk7XHJcbi8vIEJhcnJlIGRlIHJlY2hlcmNoZSBzdXIgbGEgcGFnZSBwaWxvdGVzXHJcbmRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoJ0RPTUNvbnRlbnRMb2FkZWQnLCAoKSA9PiB7XHJcblx0Y29uc3Qgc2VhcmNoSW5wdXQgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgncGlsb3RlLXNlYXJjaCcpO1xyXG5cdGNvbnN0IGNhcmRzID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbCgnLnBpbG90ZS1jYXJkJyk7XHJcblx0aWYgKHNlYXJjaElucHV0ICYmIGNhcmRzLmxlbmd0aCkge1xyXG5cdFx0c2VhcmNoSW5wdXQuYWRkRXZlbnRMaXN0ZW5lcignaW5wdXQnLCBmdW5jdGlvbigpIHtcclxuXHRcdFx0Y29uc3QgdmFsdWUgPSB0aGlzLnZhbHVlLnRyaW0oKS50b0xvd2VyQ2FzZSgpO1xyXG5cdFx0XHRjYXJkcy5mb3JFYWNoKGNhcmQgPT4ge1xyXG5cdFx0XHRcdGNvbnN0IG5hbWUgPSBjYXJkLnF1ZXJ5U2VsZWN0b3IoJ2gzJykudGV4dENvbnRlbnQudG9Mb3dlckNhc2UoKTtcclxuXHRcdFx0XHRpZiAobmFtZS5pbmNsdWRlcyh2YWx1ZSkpIHtcclxuXHRcdFx0XHRcdGNhcmQuc3R5bGUuZGlzcGxheSA9ICcnO1xyXG5cdFx0XHRcdH0gZWxzZSB7XHJcblx0XHRcdFx0XHRjYXJkLnN0eWxlLmRpc3BsYXkgPSAnbm9uZSc7XHJcblx0XHRcdFx0fVxyXG5cdFx0XHR9KTtcclxuXHRcdH0pO1xyXG5cdH1cclxufSk7XHJcbi8vIEFmZmljaGFnZSBkdSBub21icmUgZGUgY2FyYWN0w6hyZXMgZGFucyBsZSBtZXNzYWdlIGRlIGNvbnRhY3RcclxuZG9jdW1lbnQuYWRkRXZlbnRMaXN0ZW5lcignRE9NQ29udGVudExvYWRlZCcsICgpID0+IHtcclxuXHRjb25zdCBtZXNzYWdlSW5wdXQgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnY29udGFjdF9tZXNzYWdlJyk7XHJcblx0Y29uc3QgY291bnREaXYgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnbWVzc2FnZS1jb3VudCcpO1xyXG5cdGlmIChtZXNzYWdlSW5wdXQgJiYgY291bnREaXYpIHtcclxuXHRcdGZ1bmN0aW9uIHVwZGF0ZUNvdW50KCkge1xyXG5cdFx0XHRjb3VudERpdi50ZXh0Q29udGVudCA9IGAke21lc3NhZ2VJbnB1dC52YWx1ZS5sZW5ndGh9IC8gMjUwIGNhcmFjdMOocmVzYDtcclxuXHRcdH1cclxuXHRcdG1lc3NhZ2VJbnB1dC5hZGRFdmVudExpc3RlbmVyKCdpbnB1dCcsIHVwZGF0ZUNvdW50KTtcclxuXHRcdHVwZGF0ZUNvdW50KCk7XHJcblx0fVxyXG59KTtcclxuLy8gVmFsaWRhdGlvbiBlbWFpbCBjb250YWN0XHJcbmRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoJ0RPTUNvbnRlbnRMb2FkZWQnLCAoKSA9PiB7XHJcblx0Y29uc3QgZW1haWxJbnB1dCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdjb250YWN0X2VtYWlsJyk7XHJcblx0Y29uc3QgZm9ybSA9IGVtYWlsSW5wdXQgPyBlbWFpbElucHV0LmNsb3Nlc3QoJ2Zvcm0nKSA6IG51bGw7XHJcblx0Y29uc3QgZXJyb3JEaXYgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnZW1haWwtZXJyb3InKTtcclxuXHRpZiAoZW1haWxJbnB1dCAmJiBlcnJvckRpdiAmJiBmb3JtKSB7XHJcblx0XHRmdW5jdGlvbiB2YWxpZGF0ZUVtYWlsKGVtYWlsKSB7XHJcblx0XHRcdC8vIFNpbXBsZSByZWdleCBmb3IgZW1haWwgdmFsaWRhdGlvblxyXG5cdFx0XHRyZXR1cm4gL15bXlxcc0BdK0BbXlxcc0BdK1xcLlteXFxzQF0rJC8udGVzdChlbWFpbCk7XHJcblx0XHR9XHJcblx0XHRlbWFpbElucHV0LmFkZEV2ZW50TGlzdGVuZXIoJ2lucHV0JywgZnVuY3Rpb24oKSB7XHJcblx0XHRcdGlmICh0aGlzLnZhbHVlID09PSAnJyB8fCB2YWxpZGF0ZUVtYWlsKHRoaXMudmFsdWUpKSB7XHJcblx0XHRcdFx0ZXJyb3JEaXYuc3R5bGUuZGlzcGxheSA9ICdub25lJztcclxuXHRcdFx0fSBlbHNlIHtcclxuXHRcdFx0XHRlcnJvckRpdi5zdHlsZS5kaXNwbGF5ID0gJ2Jsb2NrJztcclxuXHRcdFx0fVxyXG5cdFx0fSk7XHJcblx0XHRmb3JtLmFkZEV2ZW50TGlzdGVuZXIoJ3N1Ym1pdCcsIGZ1bmN0aW9uKGUpIHtcclxuXHRcdFx0aWYgKCF2YWxpZGF0ZUVtYWlsKGVtYWlsSW5wdXQudmFsdWUpKSB7XHJcblx0XHRcdFx0ZXJyb3JEaXYuc3R5bGUuZGlzcGxheSA9ICdibG9jayc7XHJcblx0XHRcdFx0ZW1haWxJbnB1dC5mb2N1cygpO1xyXG5cdFx0XHRcdGUucHJldmVudERlZmF1bHQoKTtcclxuXHRcdFx0fSBlbHNlIHtcclxuXHRcdFx0XHRlcnJvckRpdi5zdHlsZS5kaXNwbGF5ID0gJ25vbmUnO1xyXG5cdFx0XHR9XHJcblx0XHR9KTtcclxuXHR9XHJcbn0pO1xyXG4vLyBNZW51IGJ1cmdlciBtb2JpbGUvdGFibGV0dGVcclxuZG9jdW1lbnQuYWRkRXZlbnRMaXN0ZW5lcignRE9NQ29udGVudExvYWRlZCcsICgpID0+IHtcclxuXHRjb25zdCBtb2JpbGVOYXZiYXIgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yKCcubmF2YmFyLW1vYmlsZScpO1xyXG5cdGlmICghbW9iaWxlTmF2YmFyKSByZXR1cm47XHJcblx0Y29uc3QgYnVyZ2VyID0gbW9iaWxlTmF2YmFyLnF1ZXJ5U2VsZWN0b3IoJy5uYXZiYXItYnVyZ2VyJyk7XHJcblx0Y29uc3QgbWVudSA9IG1vYmlsZU5hdmJhci5xdWVyeVNlbGVjdG9yKCcubmF2YmFyLW1lbnUnKTtcclxuXHRpZiAoYnVyZ2VyICYmIG1lbnUpIHtcclxuXHRcdGJ1cmdlci5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsICgpID0+IHtcclxuXHRcdFx0aWYgKG1lbnUuY2xhc3NMaXN0LmNvbnRhaW5zKCdpcy1hY3RpdmUnKSkge1xyXG5cdFx0XHRcdG1lbnUuY2xhc3NMaXN0LnJlbW92ZSgnaXMtYWN0aXZlJyk7XHJcblx0XHRcdFx0bWVudS5zdHlsZS5kaXNwbGF5ID0gJyc7XHJcblx0XHRcdH0gZWxzZSB7XHJcblx0XHRcdFx0bWVudS5jbGFzc0xpc3QuYWRkKCdpcy1hY3RpdmUnKTtcclxuXHRcdFx0XHRtZW51LnN0eWxlLmRpc3BsYXkgPSAnZmxleCc7XHJcblx0XHRcdH1cclxuXHRcdH0pO1xyXG5cdFx0Ly8gRmVybWVyIGxlIG1lbnUgc2kgb24gcmVwYXNzZSBlbiBkZXNrdG9wXHJcblx0XHR3aW5kb3cuYWRkRXZlbnRMaXN0ZW5lcigncmVzaXplJywgKCkgPT4ge1xyXG5cdFx0XHRpZiAod2luZG93LmlubmVyV2lkdGggPiA3NjgpIHtcclxuXHRcdFx0XHRtZW51LmNsYXNzTGlzdC5yZW1vdmUoJ2lzLWFjdGl2ZScpO1xyXG5cdFx0XHRcdG1lbnUuc3R5bGUuZGlzcGxheSA9ICcnO1xyXG5cdFx0XHR9XHJcblx0XHR9KTtcclxuXHR9XHJcbn0pO1xyXG4vLyBDZW50cmFsaXNhdGlvbiBkZSBsYSBsb2dpcXVlIGRlIGZpbHRyZSBkZXMgcsOpc3Vtw6lzIEdQIGRlcHVpcyBncF9yZXN1bWUvaW5kZXguaHRtbC50d2lnXHJcbmZ1bmN0aW9uIGZpbHRlclJlc3VtZXMoKSB7XHJcblx0Y29uc3Qgc2VsZWN0ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ3Jlc3VtZS10eXBlJyk7XHJcblx0aWYgKCFzZWxlY3QpIHJldHVybjtcclxuXHRjb25zdCB2YWx1ZSA9IHNlbGVjdC52YWx1ZTtcclxuXHRjb25zdCBjYXJkcyA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoJy5ncC1yZXN1bWUtY2FyZCcpO1xyXG5cdGNhcmRzLmZvckVhY2goY2FyZCA9PiB7XHJcblx0XHRjb25zdCB0aXRsZSA9IGNhcmQucXVlcnlTZWxlY3RvcignaDInKS50ZXh0Q29udGVudC50b0xvd2VyQ2FzZSgpO1xyXG5cdFx0aWYgKHZhbHVlID09PSAnYWxsJykge1xyXG5cdFx0XHRjYXJkLnN0eWxlLmRpc3BsYXkgPSAnJztcclxuXHRcdH0gZWxzZSBpZiAodmFsdWUgPT09ICdncCcpIHtcclxuXHRcdFx0Y2FyZC5zdHlsZS5kaXNwbGF5ID0gdGl0bGUuaW5jbHVkZXMoJ3NwcmludCcpID8gJ25vbmUnIDogJyc7XHJcblx0XHR9IGVsc2UgaWYgKHZhbHVlID09PSAnc3ByaW50Jykge1xyXG5cdFx0XHRjYXJkLnN0eWxlLmRpc3BsYXkgPSB0aXRsZS5pbmNsdWRlcygnc3ByaW50JykgPyAnJyA6ICdub25lJztcclxuXHRcdH1cclxuXHR9KTtcclxufVxyXG5cclxuZG9jdW1lbnQuYWRkRXZlbnRMaXN0ZW5lcignRE9NQ29udGVudExvYWRlZCcsICgpID0+IHtcclxuXHQvLyAuLi5hdXRyZXMgbGlzdGVuZXJzLi4uXHJcblx0Y29uc3Qgc2VsZWN0ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ3Jlc3VtZS10eXBlJyk7XHJcblx0aWYgKHNlbGVjdCkge1xyXG5cdFx0c2VsZWN0LmFkZEV2ZW50TGlzdGVuZXIoJ2NoYW5nZScsIGZpbHRlclJlc3VtZXMpO1xyXG5cdFx0ZmlsdGVyUmVzdW1lcygpOyAvLyBBcHBsaXF1ZXIgbGUgZmlsdHJlIGF1IGNoYXJnZW1lbnRcclxuXHR9XHJcbn0pO1xyXG4vLyBDZW50cmFsaXNhdGlvbiBkZSBsYSBsb2dpcXVlIGRlIHRvZ2dsZUNsYXNzZW1lbnQgZGVwdWlzIGhvbWUvaW5kZXguaHRtbC50d2lnXHJcblxyXG5mdW5jdGlvbiB0b2dnbGVDbGFzc2VtZW50KGlkLCBidG4pIHtcclxuXHRjb25zdCB0Ym9keSA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKGlkKTtcclxuXHRpZiAodGJvZHkuY2xhc3NMaXN0LmNvbnRhaW5zKCdjbGFzc2VtZW50LWhpZGRlbicpKSB7XHJcblx0XHR0Ym9keS5jbGFzc0xpc3QucmVtb3ZlKCdjbGFzc2VtZW50LWhpZGRlbicpO1xyXG5cdFx0YnRuLnRleHRDb250ZW50ID0gJ+KWsic7XHJcblx0fSBlbHNlIHtcclxuXHRcdHRib2R5LmNsYXNzTGlzdC5hZGQoJ2NsYXNzZW1lbnQtaGlkZGVuJyk7XHJcblx0XHRidG4udGV4dENvbnRlbnQgPSAn4pa8JztcclxuXHR9XHJcbn1cclxuXHJcbmRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoJ0RPTUNvbnRlbnRMb2FkZWQnLCAoKSA9PiB7XHJcblx0ZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbCgnW2RhdGEtdG9nZ2xlLWNsYXNzZW1lbnRdJykuZm9yRWFjaChidG4gPT4ge1xyXG5cdFx0YnRuLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgZnVuY3Rpb24oKSB7XHJcblx0XHRcdGNvbnN0IGlkID0gdGhpcy5nZXRBdHRyaWJ1dGUoJ2RhdGEtdG9nZ2xlLWNsYXNzZW1lbnQnKTtcclxuXHRcdFx0Y29uc3QgdGJvZHkgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChpZCk7XHJcblx0XHRcdGNvbnN0IGlzT3BlbiA9ICF0Ym9keS5jbGFzc0xpc3QuY29udGFpbnMoJ2NsYXNzZW1lbnQtaGlkZGVuJyk7XHJcblx0XHRcdC8vIEZlcm1lciB0b3VzIGxlcyBjbGFzc2VtZW50c1xyXG5cdFx0XHRkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKCdbZGF0YS10b2dnbGUtY2xhc3NlbWVudF0nKS5mb3JFYWNoKG90aGVyQnRuID0+IHtcclxuXHRcdFx0XHRjb25zdCBvdGhlcklkID0gb3RoZXJCdG4uZ2V0QXR0cmlidXRlKCdkYXRhLXRvZ2dsZS1jbGFzc2VtZW50Jyk7XHJcblx0XHRcdFx0Y29uc3Qgb3RoZXJUYm9keSA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKG90aGVySWQpO1xyXG5cdFx0XHRcdG90aGVyVGJvZHkuY2xhc3NMaXN0LmFkZCgnY2xhc3NlbWVudC1oaWRkZW4nKTtcclxuXHRcdFx0XHRvdGhlckJ0bi50ZXh0Q29udGVudCA9ICfilrwnO1xyXG5cdFx0XHR9KTtcclxuXHRcdFx0Ly8gU2kgY2UgbifDqXRhaXQgcGFzIGTDqWrDoCBvdXZlcnQsIG9uIGwnb3V2cmVcclxuXHRcdFx0aWYgKCFpc09wZW4pIHtcclxuXHRcdFx0XHR0Ym9keS5jbGFzc0xpc3QucmVtb3ZlKCdjbGFzc2VtZW50LWhpZGRlbicpO1xyXG5cdFx0XHRcdHRoaXMudGV4dENvbnRlbnQgPSAn4payJztcclxuXHRcdFx0fVxyXG5cdFx0fSk7XHJcblx0fSk7XHJcbn0pO1xyXG4vKlxyXG4gKiBXZWxjb21lIHRvIHlvdXIgYXBwJ3MgbWFpbiBKYXZhU2NyaXB0IGZpbGUhXHJcbiAqXHJcbiAqIFRoaXMgZmlsZSB3aWxsIGJlIGluY2x1ZGVkIG9udG8gdGhlIHBhZ2UgdmlhIHRoZSBpbXBvcnRtYXAoKSBUd2lnIGZ1bmN0aW9uLFxyXG4gKiB3aGljaCBzaG91bGQgYWxyZWFkeSBiZSBpbiB5b3VyIGJhc2UuaHRtbC50d2lnLlxyXG4gKi9cclxuaW1wb3J0ICcuL3N0eWxlcy9hcHAuc2Nzcyc7XHJcbi8vIGltcG9ydCAnQGZvcnRhd2Vzb21lL2ZvbnRhd2Vzb21lLWZyZWUvY3NzL2FsbC5taW4uY3NzJztcclxuY29uc29sZS5sb2coJ1RoaXMgbG9nIGNvbWVzIGZyb20gYXNzZXRzL2FwcC5qcyAtIHdlbGNvbWUgdG8gQXNzZXRNYXBwZXIhIPCfjoknKTtcclxuIiwiLy8gZXh0cmFjdGVkIGJ5IG1pbmktY3NzLWV4dHJhY3QtcGx1Z2luXG5leHBvcnQge307Il0sIm5hbWVzIjpbImRvY3VtZW50IiwiYWRkRXZlbnRMaXN0ZW5lciIsInNlYXJjaElucHV0IiwiZ2V0RWxlbWVudEJ5SWQiLCJjYXJkcyIsInF1ZXJ5U2VsZWN0b3JBbGwiLCJsZW5ndGgiLCJ2YWx1ZSIsInRyaW0iLCJ0b0xvd2VyQ2FzZSIsImZvckVhY2giLCJjYXJkIiwidGl0bGUiLCJxdWVyeVNlbGVjdG9yIiwidGV4dENvbnRlbnQiLCJpbmNsdWRlcyIsInN0eWxlIiwiZGlzcGxheSIsIm5hbWUiLCJtZXNzYWdlSW5wdXQiLCJjb3VudERpdiIsInVwZGF0ZUNvdW50IiwiY29uY2F0IiwiZW1haWxJbnB1dCIsImZvcm0iLCJjbG9zZXN0IiwiZXJyb3JEaXYiLCJ2YWxpZGF0ZUVtYWlsIiwiZW1haWwiLCJ0ZXN0IiwiZSIsImZvY3VzIiwicHJldmVudERlZmF1bHQiLCJtb2JpbGVOYXZiYXIiLCJidXJnZXIiLCJtZW51IiwiY2xhc3NMaXN0IiwiY29udGFpbnMiLCJyZW1vdmUiLCJhZGQiLCJ3aW5kb3ciLCJpbm5lcldpZHRoIiwiZmlsdGVyUmVzdW1lcyIsInNlbGVjdCIsInRvZ2dsZUNsYXNzZW1lbnQiLCJpZCIsImJ0biIsInRib2R5IiwiZ2V0QXR0cmlidXRlIiwiaXNPcGVuIiwib3RoZXJCdG4iLCJvdGhlcklkIiwib3RoZXJUYm9keSIsImNvbnNvbGUiLCJsb2ciXSwic291cmNlUm9vdCI6IiJ9