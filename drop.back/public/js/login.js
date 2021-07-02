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
/******/ 	return __webpack_require__(__webpack_require__.s = 5);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/login.js":
/*!*******************************!*\
  !*** ./resources/js/login.js ***!
  \*******************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _mixins_common_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./mixins/common-helper */ "./resources/js/mixins/common-helper.js");
/* harmony import */ var _mixins_form_helper__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./mixins/form-helper */ "./resources/js/mixins/form-helper.js");


var authorization = new Vue({
  el: '#authPage',
  mixins: [_mixins_common_helper__WEBPACK_IMPORTED_MODULE_0__["default"], _mixins_form_helper__WEBPACK_IMPORTED_MODULE_1__["default"]],
  data: function data() {
    return {
      loginProcess: false,
      loginErrors: null,
      loginAttributes: null
    };
  },
  created: function created() {
    this.loginAttributes = this.newLoginAttributes();
  },
  methods: {
    newLoginAttributes: function newLoginAttributes() {
      return {
        email: '',
        password: ''
      };
    },
    submitLogin: function submitLogin(e) {
      e.preventDefault();
      this.login();
    },
    login: function login() {
      var _this = this;

      if (this.loginProcess) {
        return false;
      }

      this.loginProcess = true;
      this.loginErrors = null;
      axios.post('admin/auth', this.loginAttributes).then(function (response) {
        _this.storeToken(_.get(response, ['data', 'data', 'access_token']));

        window.location.reload();
      })["catch"](function (error) {
        return _this.loginErrors = _.get(error, ['response', 'data'], []);
      }).then(function () {
        return _this.loginProcess = false;
      });
    },
    storeToken: function storeToken(token) {
      if (!token) {
        return false;
      }

      localStorage.setItem('_jwtToken', token);
    }
  }
});

/***/ }),

/***/ "./resources/js/mixins/common-helper.js":
/*!**********************************************!*\
  !*** ./resources/js/mixins/common-helper.js ***!
  \**********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

/* harmony default export */ __webpack_exports__["default"] = ({
  methods: {
    equalsArrays: function equalsArrays(array1, array2) {
      // (_.isArray(val) && _.isArray(oldVal) ? !val.equals(oldVal) : val != oldVal)
      // if the other array is a falsy value, return
      if (!_.isArray(array1) && !_.isArray(array2)) return false; // compare lengths - can save a lot of time

      if (array1.length != array2.length) return false;

      for (var i = 0, l = array1.length; i < l; i++) {
        // Check if we have nested arrays
        if (array1[i] instanceof Array && array2[i] instanceof Array) {
          // recurse into the nested arrays
          if (!this.equalsArrays(array1[i], array2[i])) return false;
        } else if (array1[i] != array2[i]) {
          // Warning - two different object instances will never be equal: {x:20} != {x:20}
          return false;
        }
      }

      return true;
    },
    clone: function clone(obj) {
      var copy; // Handle the 3 simple types, and null or undefined

      if (null == obj || "object" != _typeof(obj)) return obj; // Handle Date

      if (obj instanceof Date) {
        copy = new Date();
        copy.setTime(obj.getTime());
        return copy;
      } // Handle Array


      if (obj instanceof Array) {
        copy = [];

        for (var i = 0, len = obj.length; i < len; i++) {
          copy[i] = this.clone(obj[i]);
        }

        return copy;
      } // Handle Object


      if (obj instanceof Object) {
        copy = {};

        for (var attr in obj) {
          if (obj.hasOwnProperty(attr)) copy[attr] = this.clone(obj[attr]);
        }

        return copy;
      }

      throw new Error("Unable to copy obj! Its type isn't supported.");
    },
    delay: function delay() {
      var timer = 0;
      return function (callback, ms) {
        clearTimeout(timer);
        timer = setTimeout(callback, ms);
      };
    },
    omitEmpty: function omitEmpty(object) {
      var params = {};

      for (var property in object) {
        var value = _.get(object, property);

        if (!(value === '' || _.isArray(value) && value.length === 0 || value === null || _.isString(value) && value.trim() === '')) {
          _.set(params, property, value);
        }
      }

      return params;
    },
    requiredAllProperties: function requiredAllProperties(object) {
      return _.keys(this.omitEmpty(object)).length === _.keys(object).length;
    },
    toFormatDate: function toFormatDate(date) {
      var originalFormat = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 'DD/MM/YYYY';
      var makeFormat = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : 'YYYY-MM-DD';
      if (!_.isEmpty(date)) return moment(date, originalFormat).format(makeFormat);
      return date;
    },
    pluck: function pluck(array, key) {
      return array.map(function (o) {
        return o[key];
      });
    },
    generateHash: function generateHash() {
      var length = arguments.length > 0 && arguments[0] !== undefined ? arguments[0] : 10;
      var hash = "";
      var possible = "ABCDEFGHIJKLMNOPQRSTUVWXYZabcdefghijklmnopqrstuvwxyz0123456789";

      for (var i = 0; i < length; i++) {
        hash += possible.charAt(Math.floor(Math.random() * possible.length));
      }

      return hash;
    },
    toUrl: function toUrl(obj) {
      var str = [];

      for (var p in obj) {
        if (obj.hasOwnProperty(p)) {
          str.push(encodeURIComponent(p) + "=" + encodeURIComponent(obj[p]));
        }
      }

      return str.join("&");
    },
    numberRoundOff: function numberRoundOff(number) {
      var precision = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 2;
      return _.floor(number, precision);
    },
    changeWindowHistory: function changeWindowHistory(path) {
      var data = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : '';
      var title = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : '';
      var parameters = this.globalWindowHistoryState();
      var hasNotQuestionMark = !/\/.*?\?{1,}/g.test(path);
      var hasNotAmpersand = !/\&$/g.test(path);
      path = path + (parameters ? hasNotQuestionMark ? '?' : hasNotAmpersand ? '&' : '' : '') + parameters;
      window.history.replaceState(data, title, path);
    },
    globalWindowHistoryState: function globalWindowHistoryState() {
      return !_.isEmpty(window._FRAME_GET_PARAMETERS) ? this.toUrl(window._FRAME_GET_PARAMETERS) : '';
    },
    hasAny: function hasAny(object, params) {
      for (var i = 0; i < params.length; i++) {
        if (_.has(object, params[i])) return true;
      }

      return false;
    },
    readURL: function readURL(input, cb) {
      if (input.files && input.files[0]) {
        var reader = new FileReader();

        reader.onload = function (e) {
          cb(e, e.target.result);
        };

        reader.readAsDataURL(input.files[0]);
      }
    },
    isMobile: function isMobile() {
      if (window.innerWidth <= 800 && window.innerHeight <= 600) {
        return true;
      } else {
        return false;
      }
    }
  }
});

/***/ }),

/***/ "./resources/js/mixins/form-helper.js":
/*!********************************************!*\
  !*** ./resources/js/mixins/form-helper.js ***!
  \********************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ({
  methods: {
    getErrorMessage: function getErrorMessage(errors, key) {
      var messages = _.get(errors, key);

      return _.isArray(messages) ? messages.join('. ') : messages;
    },
    hasError: function hasError(errors, key) {
      return _.hasIn(errors, key);
    }
  }
});

/***/ }),

/***/ 5:
/*!*************************************!*\
  !*** multi ./resources/js/login.js ***!
  \*************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/nina/www/drop.back/resources/js/login.js */"./resources/js/login.js");


/***/ })

/******/ });