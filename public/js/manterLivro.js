/******/ (function(modules) { // webpackBootstrap
/******/ 	// The module cache
/******/ 	var installedModules = {};
/******/
/******/ 	// The require function
/******/ 	function __webpack_require__(moduleId) {
/******/
/******/ 		// Check if module is in cache
/******/ 		if(installedModules[moduleId]) {
/******/ 			return installedModules[moduleId].exports;
/******/ 		}
/******/ 		// Create a new module (and put it into the cache)
/******/ 		var module = installedModules[moduleId] = {
/******/ 			i: moduleId,
/******/ 			l: false,
/******/ 			exports: {}
/******/ 		};
/******/
/******/ 		// Execute the module function
/******/ 		modules[moduleId].call(module.exports, module, module.exports, __webpack_require__);
/******/
/******/ 		// Flag the module as loaded
/******/ 		module.l = true;
/******/
/******/ 		// Return the exports of the module
/******/ 		return module.exports;
/******/ 	}
/******/
/******/
/******/ 	// expose the modules object (__webpack_modules__)
/******/ 	__webpack_require__.m = modules;
/******/
/******/ 	// expose the module cache
/******/ 	__webpack_require__.c = installedModules;
/******/
/******/ 	// define getter function for harmony exports
/******/ 	__webpack_require__.d = function(exports, name, getter) {
/******/ 		if(!__webpack_require__.o(exports, name)) {
/******/ 			Object.defineProperty(exports, name, { enumerable: true, get: getter });
/******/ 		}
/******/ 	};
/******/
/******/ 	// define __esModule on exports
/******/ 	__webpack_require__.r = function(exports) {
/******/ 		if(typeof Symbol !== 'undefined' && Symbol.toStringTag) {
/******/ 			Object.defineProperty(exports, Symbol.toStringTag, { value: 'Module' });
/******/ 		}
/******/ 		Object.defineProperty(exports, '__esModule', { value: true });
/******/ 	};
/******/
/******/ 	// create a fake namespace object
/******/ 	// mode & 1: value is a module id, require it
/******/ 	// mode & 2: merge all properties of value into the ns
/******/ 	// mode & 4: return value when already ns object
/******/ 	// mode & 8|1: behave like require
/******/ 	__webpack_require__.t = function(value, mode) {
/******/ 		if(mode & 1) value = __webpack_require__(value);
/******/ 		if(mode & 8) return value;
/******/ 		if((mode & 4) && typeof value === 'object' && value && value.__esModule) return value;
/******/ 		var ns = Object.create(null);
/******/ 		__webpack_require__.r(ns);
/******/ 		Object.defineProperty(ns, 'default', { enumerable: true, value: value });
/******/ 		if(mode & 2 && typeof value != 'string') for(var key in value) __webpack_require__.d(ns, key, function(key) { return value[key]; }.bind(null, key));
/******/ 		return ns;
/******/ 	};
/******/
/******/ 	// getDefaultExport function for compatibility with non-harmony modules
/******/ 	__webpack_require__.n = function(module) {
/******/ 		var getter = module && module.__esModule ?
/******/ 			function getDefault() { return module['default']; } :
/******/ 			function getModuleExports() { return module; };
/******/ 		__webpack_require__.d(getter, 'a', getter);
/******/ 		return getter;
/******/ 	};
/******/
/******/ 	// Object.prototype.hasOwnProperty.call
/******/ 	__webpack_require__.o = function(object, property) { return Object.prototype.hasOwnProperty.call(object, property); };
/******/
/******/ 	// __webpack_public_path__
/******/ 	__webpack_require__.p = "/";
/******/
/******/
/******/ 	// Load entry module and return exports
/******/ 	return __webpack_require__(__webpack_require__.s = 8);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/livro/manterLivro.js":
/*!*******************************************!*\
  !*** ./resources/js/livro/manterLivro.js ***!
  \*******************************************/
/*! no static exports found */
/***/ (function(module, exports) {

$(function () {
  $('form').on('submit', function (e) {
    e.preventDefault();
    $(".validarErro").removeClass("is-invalid");
    $(".invalid-feedback").text("");
    $(".invalid-feedback").hide();
    $("#spinnerLoading").show();
    var manter = $("#manter").val();
    if (manter == 'Atualizar') {
      var url = "/api/livro/update";
      var type = "PUT";
    } else {
      var url = "/api/livro/create";
      var type = "POST";
    }
    $.ajax({
      url: url,
      type: type,
      data: $("form").serialize()
    }).done(function (resposta) {
      if (resposta.Titulo != "") {
        toastr.success('Registro efetuado com sucesso!', manter + ' Livro', {
          timeOut: 6000
        });
        if (manter != 'Atualizar') {
          $("#Titulo").val("");
          $("#Editora").val("");
          $("#Edicao").val("");
          $("#AnoPublicacao").val("");
          $("#Valor").val("");
        }
        $(".validarErro").removeClass("is-invalid");
        $(".invalid-feedback").text("");
        $(".invalid-feedback").hide();
      }
      $("#spinnerLoading").hide();
    }).fail(function (xhr, textStatus) {
      if (textStatus == 'error') {
        var json = $.parseJSON(xhr.responseText);
        var result = json.error.message;
        var msg = [];
        $.each(result, function (index, value) {
          if (index == 'Codl') {
            msg.push(value[0]);
          } else {
            $("#" + index).addClass("is-invalid");
            $("#" + index + "-error").text(value[0]);
            $("#" + index + "-error").show();
            msg.push(value[0]);
          }
        });
        toastr.error('Erro ao tentar ' + manter + ':<br>' + msg.join("<br>"), manter + ' Livro', {
          timeOut: 6000
        });
      }
      $("#spinnerLoading").hide();
    });
  });
});

/***/ }),

/***/ 8:
/*!*************************************************!*\
  !*** multi ./resources/js/livro/manterLivro.js ***!
  \*************************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /var/www/html/resources/js/livro/manterLivro.js */"./resources/js/livro/manterLivro.js");


/***/ })

/******/ });