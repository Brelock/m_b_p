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
/******/ 	return __webpack_require__(__webpack_require__.s = 6);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/sortable.js":
/*!**********************************!*\
  !*** ./resources/js/sortable.js ***!
  \**********************************/
/*! no static exports found */
/***/ (function(module, exports) {

function preloadPicture(evt, containerId) {
  var file = evt.target.files;
  var pictureFile = file[0];
  var reader = new FileReader(); // Closure to capture the file information.

  reader.onload = function (theFile) {
    return function (e) {
      $('#' + containerId).find('img').remove();
      $('#' + containerId).html(['<img class="thumb" src="', e.target.result, '" title="', escape(theFile.name), '" />'].join(''));
    };
  }(pictureFile); // Read in the image file as a data URL.


  reader.readAsDataURL(pictureFile);
}

$(document).ready(function () {
  var $sortable = $('#sortable #tbody');
  $sortable.sortable({
    start: function start(event, ui) {
      // Create a temporary attribute on the element with the old index
      $(this).attr('data-currentindex', ui.item.index());
    },
    update: function update(event, ui) {
      var currentIndex = +$(this).attr('data-currentindex');
      var desiredIndex = +ui.item.index();
      var entity = $(this).find("[data-index=".concat(currentIndex, "]")).attr('data-entity'); // console.log(entity);

      function snakeToKebab(entity) {
        return entity.replace(/_/g, "-");
      }

      var currentId = $sortable.find("[data-index='" + currentIndex + "']").data('id');
      var desiredId = $sortable.find("[data-index='" + desiredIndex + "']").data('id'); // console.log(currentId);
      // console.log(desiredId);

      axios.post("/admin/".concat(snakeToKebab(entity), "/reorder"), {
        currentId: currentId,
        desiredId: desiredId
      }).then(function (response) {
        window.location.reload();
      });
    }
  }); // Preview icon picture before save to database

  $('#icon-image').on("change", function (evt) {
    preloadPicture(evt, 'showFile');
    $('.icon-container').attr('hidden', false);
  }); // Delete icon picture

  $('.admin-icon-delete i').on("click", function () {
    var input = document.createElement('INPUT');
    input.name = "deleteIcon";
    input.type = 'hidden';
    input.value = 1;
    $('#form-unloading').append(input);
    $(this).parent().parent().next().attr('style', 'opacity: 0.4;');
  });
});

/***/ }),

/***/ 6:
/*!****************************************!*\
  !*** multi ./resources/js/sortable.js ***!
  \****************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/nina/www/drop.back/resources/js/sortable.js */"./resources/js/sortable.js");


/***/ })

/******/ });