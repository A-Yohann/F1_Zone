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
/* harmony import */ var core_js_modules_es_string_includes_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! core-js/modules/es.string.includes.js */ "./node_modules/core-js/modules/es.string.includes.js");
/* harmony import */ var core_js_modules_es_string_includes_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_includes_js__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var core_js_modules_esnext_iterator_constructor_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! core-js/modules/esnext.iterator.constructor.js */ "./node_modules/core-js/modules/esnext.iterator.constructor.js");
/* harmony import */ var core_js_modules_esnext_iterator_constructor_js__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_esnext_iterator_constructor_js__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var core_js_modules_esnext_iterator_for_each_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! core-js/modules/esnext.iterator.for-each.js */ "./node_modules/core-js/modules/esnext.iterator.for-each.js");
/* harmony import */ var core_js_modules_esnext_iterator_for_each_js__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_esnext_iterator_for_each_js__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var core_js_modules_web_dom_collections_for_each_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! core-js/modules/web.dom-collections.for-each.js */ "./node_modules/core-js/modules/web.dom-collections.for-each.js");
/* harmony import */ var core_js_modules_web_dom_collections_for_each_js__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_web_dom_collections_for_each_js__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var _styles_app_scss__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! ./styles/app.scss */ "./assets/styles/app.scss");







// Menu burger mobile
document.addEventListener('DOMContentLoaded', function () {
  var mobileNavbar = document.querySelector('.navbar-mobile');
  var burger = mobileNavbar.querySelector('.navbar-burger');
  var menu = mobileNavbar.querySelector('.navbar-menu');
  if (burger && menu) {
    burger.addEventListener('click', function () {
      if (menu.style.display === 'flex' || menu.classList.contains('is-active')) {
        menu.style.display = '';
        menu.classList.remove('is-active');
      } else {
        menu.style.display = 'flex';
        menu.classList.add('is-active');
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
/******/ __webpack_require__.O(0, ["vendors-node_modules_core-js_modules_es_array_for-each_js-node_modules_core-js_modules_es_arr-87e066"], () => (__webpack_exec__("./assets/app.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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O1FBQ1pGLEtBQUssQ0FBQ25CLFNBQVMsQ0FBQ0UsTUFBTSxDQUFDLG1CQUFtQixDQUFDO1FBQzNDLElBQUksQ0FBQ1csV0FBVyxHQUFHLEdBQUc7TUFDdkI7SUFDRCxDQUFDLENBQUM7RUFDSCxDQUFDLENBQUM7QUFDSCxDQUFDLENBQUM7QUFDRjtBQUNBO0FBQ0E7QUFDQTtBQUNBO0FBQ0E7QUFDMkI7QUFDM0I7QUFDQVksT0FBTyxDQUFDQyxHQUFHLENBQUMsZ0VBQWdFLENBQUMsQzs7Ozs7Ozs7Ozs7QUNyRjdFIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2FwcC5qcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvc3R5bGVzL2FwcC5zY3NzPzhmNTkiXSwic291cmNlc0NvbnRlbnQiOlsiLy8gTWVudSBidXJnZXIgbW9iaWxlXHJcbmRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoJ0RPTUNvbnRlbnRMb2FkZWQnLCAoKSA9PiB7XHJcblx0Y29uc3QgbW9iaWxlTmF2YmFyID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLm5hdmJhci1tb2JpbGUnKTtcclxuXHRjb25zdCBidXJnZXIgPSBtb2JpbGVOYXZiYXIucXVlcnlTZWxlY3RvcignLm5hdmJhci1idXJnZXInKTtcclxuXHRjb25zdCBtZW51ID0gbW9iaWxlTmF2YmFyLnF1ZXJ5U2VsZWN0b3IoJy5uYXZiYXItbWVudScpO1xyXG5cdGlmIChidXJnZXIgJiYgbWVudSkge1xyXG5cdFx0YnVyZ2VyLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgKCkgPT4ge1xyXG5cdFx0XHRpZiAobWVudS5zdHlsZS5kaXNwbGF5ID09PSAnZmxleCcgfHwgbWVudS5jbGFzc0xpc3QuY29udGFpbnMoJ2lzLWFjdGl2ZScpKSB7XHJcblx0XHRcdFx0bWVudS5zdHlsZS5kaXNwbGF5ID0gJyc7XHJcblx0XHRcdFx0bWVudS5jbGFzc0xpc3QucmVtb3ZlKCdpcy1hY3RpdmUnKTtcclxuXHRcdFx0fSBlbHNlIHtcclxuXHRcdFx0XHRtZW51LnN0eWxlLmRpc3BsYXkgPSAnZmxleCc7XHJcblx0XHRcdFx0bWVudS5jbGFzc0xpc3QuYWRkKCdpcy1hY3RpdmUnKTtcclxuXHRcdFx0fVxyXG5cdFx0fSk7XHJcblx0fVxyXG59KTtcclxuLy8gQ2VudHJhbGlzYXRpb24gZGUgbGEgbG9naXF1ZSBkZSBmaWx0cmUgZGVzIHLDqXN1bcOpcyBHUCBkZXB1aXMgZ3BfcmVzdW1lL2luZGV4Lmh0bWwudHdpZ1xyXG5mdW5jdGlvbiBmaWx0ZXJSZXN1bWVzKCkge1xyXG5cdGNvbnN0IHNlbGVjdCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdyZXN1bWUtdHlwZScpO1xyXG5cdGlmICghc2VsZWN0KSByZXR1cm47XHJcblx0Y29uc3QgdmFsdWUgPSBzZWxlY3QudmFsdWU7XHJcblx0Y29uc3QgY2FyZHMgPSBkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKCcuZ3AtcmVzdW1lLWNhcmQnKTtcclxuXHRjYXJkcy5mb3JFYWNoKGNhcmQgPT4ge1xyXG5cdFx0Y29uc3QgdGl0bGUgPSBjYXJkLnF1ZXJ5U2VsZWN0b3IoJ2gyJykudGV4dENvbnRlbnQudG9Mb3dlckNhc2UoKTtcclxuXHRcdGlmICh2YWx1ZSA9PT0gJ2FsbCcpIHtcclxuXHRcdFx0Y2FyZC5zdHlsZS5kaXNwbGF5ID0gJyc7XHJcblx0XHR9IGVsc2UgaWYgKHZhbHVlID09PSAnZ3AnKSB7XHJcblx0XHRcdGNhcmQuc3R5bGUuZGlzcGxheSA9IHRpdGxlLmluY2x1ZGVzKCdzcHJpbnQnKSA/ICdub25lJyA6ICcnO1xyXG5cdFx0fSBlbHNlIGlmICh2YWx1ZSA9PT0gJ3NwcmludCcpIHtcclxuXHRcdFx0Y2FyZC5zdHlsZS5kaXNwbGF5ID0gdGl0bGUuaW5jbHVkZXMoJ3NwcmludCcpID8gJycgOiAnbm9uZSc7XHJcblx0XHR9XHJcblx0fSk7XHJcbn1cclxuXHJcbmRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoJ0RPTUNvbnRlbnRMb2FkZWQnLCAoKSA9PiB7XHJcblx0Ly8gLi4uYXV0cmVzIGxpc3RlbmVycy4uLlxyXG5cdGNvbnN0IHNlbGVjdCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdyZXN1bWUtdHlwZScpO1xyXG5cdGlmIChzZWxlY3QpIHtcclxuXHRcdHNlbGVjdC5hZGRFdmVudExpc3RlbmVyKCdjaGFuZ2UnLCBmaWx0ZXJSZXN1bWVzKTtcclxuXHRcdGZpbHRlclJlc3VtZXMoKTsgLy8gQXBwbGlxdWVyIGxlIGZpbHRyZSBhdSBjaGFyZ2VtZW50XHJcblx0fVxyXG59KTtcclxuLy8gQ2VudHJhbGlzYXRpb24gZGUgbGEgbG9naXF1ZSBkZSB0b2dnbGVDbGFzc2VtZW50IGRlcHVpcyBob21lL2luZGV4Lmh0bWwudHdpZ1xyXG5cclxuZnVuY3Rpb24gdG9nZ2xlQ2xhc3NlbWVudChpZCwgYnRuKSB7XHJcblx0Y29uc3QgdGJvZHkgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChpZCk7XHJcblx0aWYgKHRib2R5LmNsYXNzTGlzdC5jb250YWlucygnY2xhc3NlbWVudC1oaWRkZW4nKSkge1xyXG5cdFx0dGJvZHkuY2xhc3NMaXN0LnJlbW92ZSgnY2xhc3NlbWVudC1oaWRkZW4nKTtcclxuXHRcdGJ0bi50ZXh0Q29udGVudCA9ICfilrInO1xyXG5cdH0gZWxzZSB7XHJcblx0XHR0Ym9keS5jbGFzc0xpc3QuYWRkKCdjbGFzc2VtZW50LWhpZGRlbicpO1xyXG5cdFx0YnRuLnRleHRDb250ZW50ID0gJ+KWvCc7XHJcblx0fVxyXG59XHJcblxyXG5kb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKCdET01Db250ZW50TG9hZGVkJywgKCkgPT4ge1xyXG5cdGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoJ1tkYXRhLXRvZ2dsZS1jbGFzc2VtZW50XScpLmZvckVhY2goYnRuID0+IHtcclxuXHRcdGJ0bi5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIGZ1bmN0aW9uKCkge1xyXG5cdFx0XHRjb25zdCBpZCA9IHRoaXMuZ2V0QXR0cmlidXRlKCdkYXRhLXRvZ2dsZS1jbGFzc2VtZW50Jyk7XHJcblx0XHRcdGNvbnN0IHRib2R5ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoaWQpO1xyXG5cdFx0XHRjb25zdCBpc09wZW4gPSAhdGJvZHkuY2xhc3NMaXN0LmNvbnRhaW5zKCdjbGFzc2VtZW50LWhpZGRlbicpO1xyXG5cdFx0XHQvLyBGZXJtZXIgdG91cyBsZXMgY2xhc3NlbWVudHNcclxuXHRcdFx0ZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbCgnW2RhdGEtdG9nZ2xlLWNsYXNzZW1lbnRdJykuZm9yRWFjaChvdGhlckJ0biA9PiB7XHJcblx0XHRcdFx0Y29uc3Qgb3RoZXJJZCA9IG90aGVyQnRuLmdldEF0dHJpYnV0ZSgnZGF0YS10b2dnbGUtY2xhc3NlbWVudCcpO1xyXG5cdFx0XHRcdGNvbnN0IG90aGVyVGJvZHkgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChvdGhlcklkKTtcclxuXHRcdFx0XHRvdGhlclRib2R5LmNsYXNzTGlzdC5hZGQoJ2NsYXNzZW1lbnQtaGlkZGVuJyk7XHJcblx0XHRcdFx0b3RoZXJCdG4udGV4dENvbnRlbnQgPSAn4pa8JztcclxuXHRcdFx0fSk7XHJcblx0XHRcdC8vIFNpIGNlIG4nw6l0YWl0IHBhcyBkw6lqw6Agb3V2ZXJ0LCBvbiBsJ291dnJlXHJcblx0XHRcdGlmICghaXNPcGVuKSB7XHJcblx0XHRcdFx0dGJvZHkuY2xhc3NMaXN0LnJlbW92ZSgnY2xhc3NlbWVudC1oaWRkZW4nKTtcclxuXHRcdFx0XHR0aGlzLnRleHRDb250ZW50ID0gJ+KWsic7XHJcblx0XHRcdH1cclxuXHRcdH0pO1xyXG5cdH0pO1xyXG59KTtcclxuLypcclxuICogV2VsY29tZSB0byB5b3VyIGFwcCdzIG1haW4gSmF2YVNjcmlwdCBmaWxlIVxyXG4gKlxyXG4gKiBUaGlzIGZpbGUgd2lsbCBiZSBpbmNsdWRlZCBvbnRvIHRoZSBwYWdlIHZpYSB0aGUgaW1wb3J0bWFwKCkgVHdpZyBmdW5jdGlvbixcclxuICogd2hpY2ggc2hvdWxkIGFscmVhZHkgYmUgaW4geW91ciBiYXNlLmh0bWwudHdpZy5cclxuICovXHJcbmltcG9ydCAnLi9zdHlsZXMvYXBwLnNjc3MnO1xyXG4vLyBpbXBvcnQgJ0Bmb3J0YXdlc29tZS9mb250YXdlc29tZS1mcmVlL2Nzcy9hbGwubWluLmNzcyc7XHJcbmNvbnNvbGUubG9nKCdUaGlzIGxvZyBjb21lcyBmcm9tIGFzc2V0cy9hcHAuanMgLSB3ZWxjb21lIHRvIEFzc2V0TWFwcGVyISDwn46JJyk7XHJcbiIsIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpblxuZXhwb3J0IHt9OyJdLCJuYW1lcyI6WyJkb2N1bWVudCIsImFkZEV2ZW50TGlzdGVuZXIiLCJtb2JpbGVOYXZiYXIiLCJxdWVyeVNlbGVjdG9yIiwiYnVyZ2VyIiwibWVudSIsInN0eWxlIiwiZGlzcGxheSIsImNsYXNzTGlzdCIsImNvbnRhaW5zIiwicmVtb3ZlIiwiYWRkIiwiZmlsdGVyUmVzdW1lcyIsInNlbGVjdCIsImdldEVsZW1lbnRCeUlkIiwidmFsdWUiLCJjYXJkcyIsInF1ZXJ5U2VsZWN0b3JBbGwiLCJmb3JFYWNoIiwiY2FyZCIsInRpdGxlIiwidGV4dENvbnRlbnQiLCJ0b0xvd2VyQ2FzZSIsImluY2x1ZGVzIiwidG9nZ2xlQ2xhc3NlbWVudCIsImlkIiwiYnRuIiwidGJvZHkiLCJnZXRBdHRyaWJ1dGUiLCJpc09wZW4iLCJvdGhlckJ0biIsIm90aGVySWQiLCJvdGhlclRib2R5IiwiY29uc29sZSIsImxvZyJdLCJzb3VyY2VSb290IjoiIn0=