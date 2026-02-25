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
/* harmony import */ var core_js_modules_es_function_name_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! core-js/modules/es.function.name.js */ "./node_modules/core-js/modules/es.function.name.js");
/* harmony import */ var core_js_modules_es_function_name_js__WEBPACK_IMPORTED_MODULE_2___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_function_name_js__WEBPACK_IMPORTED_MODULE_2__);
/* harmony import */ var core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! core-js/modules/es.object.to-string.js */ "./node_modules/core-js/modules/es.object.to-string.js");
/* harmony import */ var core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_3___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_object_to_string_js__WEBPACK_IMPORTED_MODULE_3__);
/* harmony import */ var core_js_modules_es_regexp_exec_js__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! core-js/modules/es.regexp.exec.js */ "./node_modules/core-js/modules/es.regexp.exec.js");
/* harmony import */ var core_js_modules_es_regexp_exec_js__WEBPACK_IMPORTED_MODULE_4___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_regexp_exec_js__WEBPACK_IMPORTED_MODULE_4__);
/* harmony import */ var core_js_modules_es_regexp_test_js__WEBPACK_IMPORTED_MODULE_5__ = __webpack_require__(/*! core-js/modules/es.regexp.test.js */ "./node_modules/core-js/modules/es.regexp.test.js");
/* harmony import */ var core_js_modules_es_regexp_test_js__WEBPACK_IMPORTED_MODULE_5___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_regexp_test_js__WEBPACK_IMPORTED_MODULE_5__);
/* harmony import */ var core_js_modules_es_string_includes_js__WEBPACK_IMPORTED_MODULE_6__ = __webpack_require__(/*! core-js/modules/es.string.includes.js */ "./node_modules/core-js/modules/es.string.includes.js");
/* harmony import */ var core_js_modules_es_string_includes_js__WEBPACK_IMPORTED_MODULE_6___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_includes_js__WEBPACK_IMPORTED_MODULE_6__);
/* harmony import */ var core_js_modules_es_string_trim_js__WEBPACK_IMPORTED_MODULE_7__ = __webpack_require__(/*! core-js/modules/es.string.trim.js */ "./node_modules/core-js/modules/es.string.trim.js");
/* harmony import */ var core_js_modules_es_string_trim_js__WEBPACK_IMPORTED_MODULE_7___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_es_string_trim_js__WEBPACK_IMPORTED_MODULE_7__);
/* harmony import */ var core_js_modules_esnext_iterator_constructor_js__WEBPACK_IMPORTED_MODULE_8__ = __webpack_require__(/*! core-js/modules/esnext.iterator.constructor.js */ "./node_modules/core-js/modules/esnext.iterator.constructor.js");
/* harmony import */ var core_js_modules_esnext_iterator_constructor_js__WEBPACK_IMPORTED_MODULE_8___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_esnext_iterator_constructor_js__WEBPACK_IMPORTED_MODULE_8__);
/* harmony import */ var core_js_modules_esnext_iterator_for_each_js__WEBPACK_IMPORTED_MODULE_9__ = __webpack_require__(/*! core-js/modules/esnext.iterator.for-each.js */ "./node_modules/core-js/modules/esnext.iterator.for-each.js");
/* harmony import */ var core_js_modules_esnext_iterator_for_each_js__WEBPACK_IMPORTED_MODULE_9___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_esnext_iterator_for_each_js__WEBPACK_IMPORTED_MODULE_9__);
/* harmony import */ var core_js_modules_web_dom_collections_for_each_js__WEBPACK_IMPORTED_MODULE_10__ = __webpack_require__(/*! core-js/modules/web.dom-collections.for-each.js */ "./node_modules/core-js/modules/web.dom-collections.for-each.js");
/* harmony import */ var core_js_modules_web_dom_collections_for_each_js__WEBPACK_IMPORTED_MODULE_10___default = /*#__PURE__*/__webpack_require__.n(core_js_modules_web_dom_collections_for_each_js__WEBPACK_IMPORTED_MODULE_10__);
/* harmony import */ var _styles_app_scss__WEBPACK_IMPORTED_MODULE_11__ = __webpack_require__(/*! ./styles/app.scss */ "./assets/styles/app.scss");












document.addEventListener('DOMContentLoaded', function () {
  // ============================================
  // Toggle password visibility (login, register)
  // ============================================
  document.querySelectorAll('.toggle-password').forEach(function (toggle) {
    toggle.addEventListener('click', function () {
      var wrapper = toggle.closest('.password-wrapper');
      if (!wrapper) return;
      var input = wrapper.querySelector('input[type="password"], input[type="text"]');
      if (!input) return;
      var isPassword = input.getAttribute('type') === 'password';
      input.setAttribute('type', isPassword ? 'text' : 'password');
      toggle.textContent = isPassword ? '🙈' : '👁️';
    });
  });

  // ============================================
  // Password info tooltip (register)
  // ============================================
  var tooltip = document.querySelector('.password-info-tooltip');
  if (tooltip) {
    var infoText = tooltip.querySelector('.password-info-text');
    tooltip.addEventListener('mouseenter', function () {
      infoText.style.display = 'block';
    });
    tooltip.addEventListener('mouseleave', function () {
      infoText.style.display = 'none';
    });
    tooltip.addEventListener('click', function (e) {
      e.stopPropagation();
      infoText.style.display = infoText.style.display === 'block' ? 'none' : 'block';
    });
    document.addEventListener('click', function (e) {
      if (!tooltip.contains(e.target)) {
        infoText.style.display = 'none';
      }
    });
  }

  // ============================================
  // Custom file input name display (actualite)
  // ============================================
  var fileInput = document.getElementById('actu_imageFile');
  var fileLabel = document.querySelector('.custom-file-label');
  var fileName = document.getElementById('file-name');
  if (fileInput && fileLabel && fileName) {
    fileLabel.addEventListener('click', function () {
      fileInput.click();
    });
    fileInput.addEventListener('change', function () {
      fileName.textContent = fileInput.files.length > 0 ? fileInput.files[0].name : '';
    });
  }

  // ============================================
  // Search bar — circuits
  // ============================================
  var circuitSearch = document.getElementById('circuit-search');
  var circuitCards = document.querySelectorAll('.circuit-card');
  if (circuitSearch && circuitCards.length) {
    circuitSearch.addEventListener('input', function () {
      var value = this.value.trim().toLowerCase();
      circuitCards.forEach(function (card) {
        var title = card.querySelector('.circuit-title');
        card.style.display = title && title.textContent.toLowerCase().includes(value) ? '' : 'none';
      });
    });
  }

  // ============================================
  // Search bar — pilotes
  // ============================================
  var piloteSearch = document.getElementById('pilote-search');
  var piloteCards = document.querySelectorAll('.pilote-card');
  if (piloteSearch && piloteCards.length) {
    piloteSearch.addEventListener('input', function () {
      var value = this.value.trim().toLowerCase();
      piloteCards.forEach(function (card) {
        var name = card.querySelector('h3').textContent.toLowerCase();
        card.style.display = name.includes(value) ? '' : 'none';
      });
    });
  }

  // ============================================
  // Contact — character count
  // ============================================
  var messageInput = document.getElementById('contact_message');
  var countDiv = document.getElementById('message-count');
  if (messageInput && countDiv) {
    var updateCount = function updateCount() {
      countDiv.textContent = "".concat(messageInput.value.length, " / 250 caract\xE8res");
    };
    messageInput.addEventListener('input', updateCount);
    updateCount();
  }

  // ============================================
  // Contact — email validation
  // ============================================
  var emailInput = document.getElementById('contact_email');
  var emailForm = emailInput ? emailInput.closest('form') : null;
  var errorDiv = document.getElementById('email-error');
  if (emailInput && errorDiv && emailForm) {
    var validateEmail = function validateEmail(email) {
      return /^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email);
    };
    emailInput.addEventListener('input', function () {
      errorDiv.style.display = this.value === '' || validateEmail(this.value) ? 'none' : 'block';
    });
    emailForm.addEventListener('submit', function (e) {
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
  var mobileNavbar = document.querySelector('.navbar-mobile');
  if (mobileNavbar) {
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
      window.addEventListener('resize', function () {
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
  var resumeSelect = document.getElementById('resume-type');
  if (resumeSelect) {
    var filterResumes = function filterResumes() {
      var value = resumeSelect.value;
      document.querySelectorAll('.gp-resume-card').forEach(function (card) {
        var title = card.querySelector('h2').textContent.toLowerCase();
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
/******/ __webpack_require__.O(0, ["vendors-node_modules_core-js_modules_es_array_for-each_js-node_modules_core-js_modules_es_arr-1a695f"], () => (__webpack_exec__("./assets/app.js")));
/******/ var __webpack_exports__ = __webpack_require__.O();
/******/ }
]);
//# sourceMappingURL=data:application/json;charset=utf-8;base64,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QU8sR0FBR0QsUUFBUSxDQUFDdkQsWUFBWSxDQUFDLHdCQUF3QixDQUFDO1FBQy9ELElBQU15RCxVQUFVLEdBQUduRSxRQUFRLENBQUNzQixjQUFjLENBQUM0QyxPQUFPLENBQUM7UUFDbkRDLFVBQVUsQ0FBQ2IsU0FBUyxDQUFDRSxHQUFHLENBQUMsbUJBQW1CLENBQUM7UUFDN0NTLFFBQVEsQ0FBQ3JELFdBQVcsR0FBRyxHQUFHO01BQzVCLENBQUMsQ0FBQzs7TUFFRjtNQUNBLElBQUksQ0FBQ29ELE1BQU0sRUFBRTtRQUNYRCxLQUFLLENBQUNULFNBQVMsQ0FBQ0MsTUFBTSxDQUFDLG1CQUFtQixDQUFDO1FBQzNDLElBQUksQ0FBQzNDLFdBQVcsR0FBRyxHQUFHO01BQ3hCO0lBQ0YsQ0FBQyxDQUFDO0VBQ0osQ0FBQyxDQUFDO0FBRUosQ0FBQyxDQUFDLEM7Ozs7Ozs7Ozs7O0FDL0xGIiwic291cmNlcyI6WyJ3ZWJwYWNrOi8vLy4vYXNzZXRzL2FwcC5qcyIsIndlYnBhY2s6Ly8vLi9hc3NldHMvc3R5bGVzL2FwcC5zY3NzPzhmNTkiXSwic291cmNlc0NvbnRlbnQiOlsiaW1wb3J0ICcuL3N0eWxlcy9hcHAuc2Nzcyc7XG5cbmRvY3VtZW50LmFkZEV2ZW50TGlzdGVuZXIoJ0RPTUNvbnRlbnRMb2FkZWQnLCAoKSA9PiB7XG5cbiAgLy8gPT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT1cbiAgLy8gVG9nZ2xlIHBhc3N3b3JkIHZpc2liaWxpdHkgKGxvZ2luLCByZWdpc3RlcilcbiAgLy8gPT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT1cbiAgZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbCgnLnRvZ2dsZS1wYXNzd29yZCcpLmZvckVhY2godG9nZ2xlID0+IHtcbiAgICB0b2dnbGUuYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCAoKSA9PiB7XG4gICAgICBjb25zdCB3cmFwcGVyID0gdG9nZ2xlLmNsb3Nlc3QoJy5wYXNzd29yZC13cmFwcGVyJyk7XG4gICAgICBpZiAoIXdyYXBwZXIpIHJldHVybjtcbiAgICAgIGNvbnN0IGlucHV0ID0gd3JhcHBlci5xdWVyeVNlbGVjdG9yKCdpbnB1dFt0eXBlPVwicGFzc3dvcmRcIl0sIGlucHV0W3R5cGU9XCJ0ZXh0XCJdJyk7XG4gICAgICBpZiAoIWlucHV0KSByZXR1cm47XG4gICAgICBjb25zdCBpc1Bhc3N3b3JkID0gaW5wdXQuZ2V0QXR0cmlidXRlKCd0eXBlJykgPT09ICdwYXNzd29yZCc7XG4gICAgICBpbnB1dC5zZXRBdHRyaWJ1dGUoJ3R5cGUnLCBpc1Bhc3N3b3JkID8gJ3RleHQnIDogJ3Bhc3N3b3JkJyk7XG4gICAgICB0b2dnbGUudGV4dENvbnRlbnQgPSBpc1Bhc3N3b3JkID8gJ/CfmYgnIDogJ/CfkYHvuI8nO1xuICAgIH0pO1xuICB9KTtcblxuICAvLyA9PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PVxuICAvLyBQYXNzd29yZCBpbmZvIHRvb2x0aXAgKHJlZ2lzdGVyKVxuICAvLyA9PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PVxuICBjb25zdCB0b29sdGlwID0gZG9jdW1lbnQucXVlcnlTZWxlY3RvcignLnBhc3N3b3JkLWluZm8tdG9vbHRpcCcpO1xuICBpZiAodG9vbHRpcCkge1xuICAgIGNvbnN0IGluZm9UZXh0ID0gdG9vbHRpcC5xdWVyeVNlbGVjdG9yKCcucGFzc3dvcmQtaW5mby10ZXh0Jyk7XG4gICAgdG9vbHRpcC5hZGRFdmVudExpc3RlbmVyKCdtb3VzZWVudGVyJywgKCkgPT4geyBpbmZvVGV4dC5zdHlsZS5kaXNwbGF5ID0gJ2Jsb2NrJzsgfSk7XG4gICAgdG9vbHRpcC5hZGRFdmVudExpc3RlbmVyKCdtb3VzZWxlYXZlJywgKCkgPT4geyBpbmZvVGV4dC5zdHlsZS5kaXNwbGF5ID0gJ25vbmUnOyB9KTtcbiAgICB0b29sdGlwLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgKGUpID0+IHtcbiAgICAgIGUuc3RvcFByb3BhZ2F0aW9uKCk7XG4gICAgICBpbmZvVGV4dC5zdHlsZS5kaXNwbGF5ID0gKGluZm9UZXh0LnN0eWxlLmRpc3BsYXkgPT09ICdibG9jaycpID8gJ25vbmUnIDogJ2Jsb2NrJztcbiAgICB9KTtcbiAgICBkb2N1bWVudC5hZGRFdmVudExpc3RlbmVyKCdjbGljaycsIChlKSA9PiB7XG4gICAgICBpZiAoIXRvb2x0aXAuY29udGFpbnMoZS50YXJnZXQpKSB7XG4gICAgICAgIGluZm9UZXh0LnN0eWxlLmRpc3BsYXkgPSAnbm9uZSc7XG4gICAgICB9XG4gICAgfSk7XG4gIH1cblxuICAvLyA9PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PVxuICAvLyBDdXN0b20gZmlsZSBpbnB1dCBuYW1lIGRpc3BsYXkgKGFjdHVhbGl0ZSlcbiAgLy8gPT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT1cbiAgY29uc3QgZmlsZUlucHV0ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2FjdHVfaW1hZ2VGaWxlJyk7XG4gIGNvbnN0IGZpbGVMYWJlbCA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5jdXN0b20tZmlsZS1sYWJlbCcpO1xuICBjb25zdCBmaWxlTmFtZSA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdmaWxlLW5hbWUnKTtcbiAgaWYgKGZpbGVJbnB1dCAmJiBmaWxlTGFiZWwgJiYgZmlsZU5hbWUpIHtcbiAgICBmaWxlTGFiZWwuYWRkRXZlbnRMaXN0ZW5lcignY2xpY2snLCAoKSA9PiB7IGZpbGVJbnB1dC5jbGljaygpOyB9KTtcbiAgICBmaWxlSW5wdXQuYWRkRXZlbnRMaXN0ZW5lcignY2hhbmdlJywgKCkgPT4ge1xuICAgICAgZmlsZU5hbWUudGV4dENvbnRlbnQgPSBmaWxlSW5wdXQuZmlsZXMubGVuZ3RoID4gMCA/IGZpbGVJbnB1dC5maWxlc1swXS5uYW1lIDogJyc7XG4gICAgfSk7XG4gIH1cblxuICAvLyA9PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PVxuICAvLyBTZWFyY2ggYmFyIOKAlCBjaXJjdWl0c1xuICAvLyA9PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PVxuICBjb25zdCBjaXJjdWl0U2VhcmNoID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2NpcmN1aXQtc2VhcmNoJyk7XG4gIGNvbnN0IGNpcmN1aXRDYXJkcyA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoJy5jaXJjdWl0LWNhcmQnKTtcbiAgaWYgKGNpcmN1aXRTZWFyY2ggJiYgY2lyY3VpdENhcmRzLmxlbmd0aCkge1xuICAgIGNpcmN1aXRTZWFyY2guYWRkRXZlbnRMaXN0ZW5lcignaW5wdXQnLCBmdW5jdGlvbiAoKSB7XG4gICAgICBjb25zdCB2YWx1ZSA9IHRoaXMudmFsdWUudHJpbSgpLnRvTG93ZXJDYXNlKCk7XG4gICAgICBjaXJjdWl0Q2FyZHMuZm9yRWFjaChjYXJkID0+IHtcbiAgICAgICAgY29uc3QgdGl0bGUgPSBjYXJkLnF1ZXJ5U2VsZWN0b3IoJy5jaXJjdWl0LXRpdGxlJyk7XG4gICAgICAgIGNhcmQuc3R5bGUuZGlzcGxheSA9ICh0aXRsZSAmJiB0aXRsZS50ZXh0Q29udGVudC50b0xvd2VyQ2FzZSgpLmluY2x1ZGVzKHZhbHVlKSkgPyAnJyA6ICdub25lJztcbiAgICAgIH0pO1xuICAgIH0pO1xuICB9XG5cbiAgLy8gPT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT1cbiAgLy8gU2VhcmNoIGJhciDigJQgcGlsb3Rlc1xuICAvLyA9PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PVxuICBjb25zdCBwaWxvdGVTZWFyY2ggPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgncGlsb3RlLXNlYXJjaCcpO1xuICBjb25zdCBwaWxvdGVDYXJkcyA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoJy5waWxvdGUtY2FyZCcpO1xuICBpZiAocGlsb3RlU2VhcmNoICYmIHBpbG90ZUNhcmRzLmxlbmd0aCkge1xuICAgIHBpbG90ZVNlYXJjaC5hZGRFdmVudExpc3RlbmVyKCdpbnB1dCcsIGZ1bmN0aW9uICgpIHtcbiAgICAgIGNvbnN0IHZhbHVlID0gdGhpcy52YWx1ZS50cmltKCkudG9Mb3dlckNhc2UoKTtcbiAgICAgIHBpbG90ZUNhcmRzLmZvckVhY2goY2FyZCA9PiB7XG4gICAgICAgIGNvbnN0IG5hbWUgPSBjYXJkLnF1ZXJ5U2VsZWN0b3IoJ2gzJykudGV4dENvbnRlbnQudG9Mb3dlckNhc2UoKTtcbiAgICAgICAgY2FyZC5zdHlsZS5kaXNwbGF5ID0gbmFtZS5pbmNsdWRlcyh2YWx1ZSkgPyAnJyA6ICdub25lJztcbiAgICAgIH0pO1xuICAgIH0pO1xuICB9XG5cbiAgLy8gPT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT1cbiAgLy8gQ29udGFjdCDigJQgY2hhcmFjdGVyIGNvdW50XG4gIC8vID09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09XG4gIGNvbnN0IG1lc3NhZ2VJbnB1dCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdjb250YWN0X21lc3NhZ2UnKTtcbiAgY29uc3QgY291bnREaXYgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnbWVzc2FnZS1jb3VudCcpO1xuICBpZiAobWVzc2FnZUlucHV0ICYmIGNvdW50RGl2KSB7XG4gICAgY29uc3QgdXBkYXRlQ291bnQgPSAoKSA9PiB7XG4gICAgICBjb3VudERpdi50ZXh0Q29udGVudCA9IGAke21lc3NhZ2VJbnB1dC52YWx1ZS5sZW5ndGh9IC8gMjUwIGNhcmFjdMOocmVzYDtcbiAgICB9O1xuICAgIG1lc3NhZ2VJbnB1dC5hZGRFdmVudExpc3RlbmVyKCdpbnB1dCcsIHVwZGF0ZUNvdW50KTtcbiAgICB1cGRhdGVDb3VudCgpO1xuICB9XG5cbiAgLy8gPT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT1cbiAgLy8gQ29udGFjdCDigJQgZW1haWwgdmFsaWRhdGlvblxuICAvLyA9PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PVxuICBjb25zdCBlbWFpbElucHV0ID0gZG9jdW1lbnQuZ2V0RWxlbWVudEJ5SWQoJ2NvbnRhY3RfZW1haWwnKTtcbiAgY29uc3QgZW1haWxGb3JtID0gZW1haWxJbnB1dCA/IGVtYWlsSW5wdXQuY2xvc2VzdCgnZm9ybScpIDogbnVsbDtcbiAgY29uc3QgZXJyb3JEaXYgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZCgnZW1haWwtZXJyb3InKTtcbiAgaWYgKGVtYWlsSW5wdXQgJiYgZXJyb3JEaXYgJiYgZW1haWxGb3JtKSB7XG4gICAgY29uc3QgdmFsaWRhdGVFbWFpbCA9IChlbWFpbCkgPT4gL15bXlxcc0BdK0BbXlxcc0BdK1xcLlteXFxzQF0rJC8udGVzdChlbWFpbCk7XG5cbiAgICBlbWFpbElucHV0LmFkZEV2ZW50TGlzdGVuZXIoJ2lucHV0JywgZnVuY3Rpb24gKCkge1xuICAgICAgZXJyb3JEaXYuc3R5bGUuZGlzcGxheSA9ICh0aGlzLnZhbHVlID09PSAnJyB8fCB2YWxpZGF0ZUVtYWlsKHRoaXMudmFsdWUpKSA/ICdub25lJyA6ICdibG9jayc7XG4gICAgfSk7XG5cbiAgICBlbWFpbEZvcm0uYWRkRXZlbnRMaXN0ZW5lcignc3VibWl0JywgKGUpID0+IHtcbiAgICAgIGlmICghdmFsaWRhdGVFbWFpbChlbWFpbElucHV0LnZhbHVlKSkge1xuICAgICAgICBlcnJvckRpdi5zdHlsZS5kaXNwbGF5ID0gJ2Jsb2NrJztcbiAgICAgICAgZW1haWxJbnB1dC5mb2N1cygpO1xuICAgICAgICBlLnByZXZlbnREZWZhdWx0KCk7XG4gICAgICB9IGVsc2Uge1xuICAgICAgICBlcnJvckRpdi5zdHlsZS5kaXNwbGF5ID0gJ25vbmUnO1xuICAgICAgfVxuICAgIH0pO1xuICB9XG5cbiAgLy8gPT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT1cbiAgLy8gTWVudSBidXJnZXIgbW9iaWxlL3RhYmxldHRlXG4gIC8vID09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09XG4gIGNvbnN0IG1vYmlsZU5hdmJhciA9IGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3IoJy5uYXZiYXItbW9iaWxlJyk7XG4gIGlmIChtb2JpbGVOYXZiYXIpIHtcbiAgICBjb25zdCBidXJnZXIgPSBtb2JpbGVOYXZiYXIucXVlcnlTZWxlY3RvcignLm5hdmJhci1idXJnZXInKTtcbiAgICBjb25zdCBtZW51ID0gbW9iaWxlTmF2YmFyLnF1ZXJ5U2VsZWN0b3IoJy5uYXZiYXItbWVudScpO1xuICAgIGlmIChidXJnZXIgJiYgbWVudSkge1xuICAgICAgYnVyZ2VyLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgKCkgPT4ge1xuICAgICAgICBpZiAobWVudS5jbGFzc0xpc3QuY29udGFpbnMoJ2lzLWFjdGl2ZScpKSB7XG4gICAgICAgICAgbWVudS5jbGFzc0xpc3QucmVtb3ZlKCdpcy1hY3RpdmUnKTtcbiAgICAgICAgICBtZW51LnN0eWxlLmRpc3BsYXkgPSAnJztcbiAgICAgICAgfSBlbHNlIHtcbiAgICAgICAgICBtZW51LmNsYXNzTGlzdC5hZGQoJ2lzLWFjdGl2ZScpO1xuICAgICAgICAgIG1lbnUuc3R5bGUuZGlzcGxheSA9ICdmbGV4JztcbiAgICAgICAgfVxuICAgICAgfSk7XG4gICAgICB3aW5kb3cuYWRkRXZlbnRMaXN0ZW5lcigncmVzaXplJywgKCkgPT4ge1xuICAgICAgICBpZiAod2luZG93LmlubmVyV2lkdGggPiA3NjgpIHtcbiAgICAgICAgICBtZW51LmNsYXNzTGlzdC5yZW1vdmUoJ2lzLWFjdGl2ZScpO1xuICAgICAgICAgIG1lbnUuc3R5bGUuZGlzcGxheSA9ICcnO1xuICAgICAgICB9XG4gICAgICB9KTtcbiAgICB9XG4gIH1cblxuICAvLyA9PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PVxuICAvLyBHUCBSZXN1bWUg4oCUIGZpbHRlciBieSB0eXBlXG4gIC8vID09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09XG4gIGNvbnN0IHJlc3VtZVNlbGVjdCA9IGRvY3VtZW50LmdldEVsZW1lbnRCeUlkKCdyZXN1bWUtdHlwZScpO1xuICBpZiAocmVzdW1lU2VsZWN0KSB7XG4gICAgY29uc3QgZmlsdGVyUmVzdW1lcyA9ICgpID0+IHtcbiAgICAgIGNvbnN0IHZhbHVlID0gcmVzdW1lU2VsZWN0LnZhbHVlO1xuICAgICAgZG9jdW1lbnQucXVlcnlTZWxlY3RvckFsbCgnLmdwLXJlc3VtZS1jYXJkJykuZm9yRWFjaChjYXJkID0+IHtcbiAgICAgICAgY29uc3QgdGl0bGUgPSBjYXJkLnF1ZXJ5U2VsZWN0b3IoJ2gyJykudGV4dENvbnRlbnQudG9Mb3dlckNhc2UoKTtcbiAgICAgICAgaWYgKHZhbHVlID09PSAnYWxsJykge1xuICAgICAgICAgIGNhcmQuc3R5bGUuZGlzcGxheSA9ICcnO1xuICAgICAgICB9IGVsc2UgaWYgKHZhbHVlID09PSAnZ3AnKSB7XG4gICAgICAgICAgY2FyZC5zdHlsZS5kaXNwbGF5ID0gdGl0bGUuaW5jbHVkZXMoJ3NwcmludCcpID8gJ25vbmUnIDogJyc7XG4gICAgICAgIH0gZWxzZSBpZiAodmFsdWUgPT09ICdzcHJpbnQnKSB7XG4gICAgICAgICAgY2FyZC5zdHlsZS5kaXNwbGF5ID0gdGl0bGUuaW5jbHVkZXMoJ3NwcmludCcpID8gJycgOiAnbm9uZSc7XG4gICAgICAgIH1cbiAgICAgIH0pO1xuICAgIH07XG4gICAgcmVzdW1lU2VsZWN0LmFkZEV2ZW50TGlzdGVuZXIoJ2NoYW5nZScsIGZpbHRlclJlc3VtZXMpO1xuICAgIGZpbHRlclJlc3VtZXMoKTtcbiAgfVxuXG4gIC8vID09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09XG4gIC8vIEhvbWUg4oCUIHRvZ2dsZSBjbGFzc2VtZW50IGFjY29yZGlvblxuICAvLyA9PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PT09PVxuICBkb2N1bWVudC5xdWVyeVNlbGVjdG9yQWxsKCdbZGF0YS10b2dnbGUtY2xhc3NlbWVudF0nKS5mb3JFYWNoKGJ0biA9PiB7XG4gICAgYnRuLmFkZEV2ZW50TGlzdGVuZXIoJ2NsaWNrJywgZnVuY3Rpb24gKCkge1xuICAgICAgY29uc3QgaWQgPSB0aGlzLmdldEF0dHJpYnV0ZSgnZGF0YS10b2dnbGUtY2xhc3NlbWVudCcpO1xuICAgICAgY29uc3QgdGJvZHkgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChpZCk7XG4gICAgICBjb25zdCBpc09wZW4gPSAhdGJvZHkuY2xhc3NMaXN0LmNvbnRhaW5zKCdjbGFzc2VtZW50LWhpZGRlbicpO1xuXG4gICAgICAvLyBGZXJtZXIgdG91cyBsZXMgY2xhc3NlbWVudHNcbiAgICAgIGRvY3VtZW50LnF1ZXJ5U2VsZWN0b3JBbGwoJ1tkYXRhLXRvZ2dsZS1jbGFzc2VtZW50XScpLmZvckVhY2gob3RoZXJCdG4gPT4ge1xuICAgICAgICBjb25zdCBvdGhlcklkID0gb3RoZXJCdG4uZ2V0QXR0cmlidXRlKCdkYXRhLXRvZ2dsZS1jbGFzc2VtZW50Jyk7XG4gICAgICAgIGNvbnN0IG90aGVyVGJvZHkgPSBkb2N1bWVudC5nZXRFbGVtZW50QnlJZChvdGhlcklkKTtcbiAgICAgICAgb3RoZXJUYm9keS5jbGFzc0xpc3QuYWRkKCdjbGFzc2VtZW50LWhpZGRlbicpO1xuICAgICAgICBvdGhlckJ0bi50ZXh0Q29udGVudCA9ICfilrwnO1xuICAgICAgfSk7XG5cbiAgICAgIC8vIFNpIGNlIG4nw6l0YWl0IHBhcyBkw6lqw6Agb3V2ZXJ0LCBvbiBsJ291dnJlXG4gICAgICBpZiAoIWlzT3Blbikge1xuICAgICAgICB0Ym9keS5jbGFzc0xpc3QucmVtb3ZlKCdjbGFzc2VtZW50LWhpZGRlbicpO1xuICAgICAgICB0aGlzLnRleHRDb250ZW50ID0gJ+KWsic7XG4gICAgICB9XG4gICAgfSk7XG4gIH0pO1xuXG59KTtcbiIsIi8vIGV4dHJhY3RlZCBieSBtaW5pLWNzcy1leHRyYWN0LXBsdWdpblxuZXhwb3J0IHt9OyJdLCJuYW1lcyI6WyJkb2N1bWVudCIsImFkZEV2ZW50TGlzdGVuZXIiLCJxdWVyeVNlbGVjdG9yQWxsIiwiZm9yRWFjaCIsInRvZ2dsZSIsIndyYXBwZXIiLCJjbG9zZXN0IiwiaW5wdXQiLCJxdWVyeVNlbGVjdG9yIiwiaXNQYXNzd29yZCIsImdldEF0dHJpYnV0ZSIsInNldEF0dHJpYnV0ZSIsInRleHRDb250ZW50IiwidG9vbHRpcCIsImluZm9UZXh0Iiwic3R5bGUiLCJkaXNwbGF5IiwiZSIsInN0b3BQcm9wYWdhdGlvbiIsImNvbnRhaW5zIiwidGFyZ2V0IiwiZmlsZUlucHV0IiwiZ2V0RWxlbWVudEJ5SWQiLCJmaWxlTGFiZWwiLCJmaWxlTmFtZSIsImNsaWNrIiwiZmlsZXMiLCJsZW5ndGgiLCJuYW1lIiwiY2lyY3VpdFNlYXJjaCIsImNpcmN1aXRDYXJkcyIsInZhbHVlIiwidHJpbSIsInRvTG93ZXJDYXNlIiwiY2FyZCIsInRpdGxlIiwiaW5jbHVkZXMiLCJwaWxvdGVTZWFyY2giLCJwaWxvdGVDYXJkcyIsIm1lc3NhZ2VJbnB1dCIsImNvdW50RGl2IiwidXBkYXRlQ291bnQiLCJjb25jYXQiLCJlbWFpbElucHV0IiwiZW1haWxGb3JtIiwiZXJyb3JEaXYiLCJ2YWxpZGF0ZUVtYWlsIiwiZW1haWwiLCJ0ZXN0IiwiZm9jdXMiLCJwcmV2ZW50RGVmYXVsdCIsIm1vYmlsZU5hdmJhciIsImJ1cmdlciIsIm1lbnUiLCJjbGFzc0xpc3QiLCJyZW1vdmUiLCJhZGQiLCJ3aW5kb3ciLCJpbm5lcldpZHRoIiwicmVzdW1lU2VsZWN0IiwiZmlsdGVyUmVzdW1lcyIsImJ0biIsImlkIiwidGJvZHkiLCJpc09wZW4iLCJvdGhlckJ0biIsIm90aGVySWQiLCJvdGhlclRib2R5Il0sInNvdXJjZVJvb3QiOiIifQ==