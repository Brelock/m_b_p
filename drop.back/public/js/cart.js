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
/******/ 	return __webpack_require__(__webpack_require__.s = 4);
/******/ })
/************************************************************************/
/******/ ({

/***/ "./resources/js/cart.js":
/*!******************************!*\
  !*** ./resources/js/cart.js ***!
  \******************************/
/*! no exports provided */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _mixins_common_helper__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./mixins/common-helper */ "./resources/js/mixins/common-helper.js");
/* harmony import */ var _mixins_form_helper__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./mixins/form-helper */ "./resources/js/mixins/form-helper.js");
/* harmony import */ var _mixins_form_input_events_helper__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ./mixins/form-input-events-helper */ "./resources/js/mixins/form-input-events-helper.js");
/* harmony import */ var _store_novaposhta_warehouses__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ./store/novaposhta-warehouses */ "./resources/js/store/novaposhta-warehouses.js");




var cart = new Vue({
  el: '#basketPage',
  mixins: [_mixins_common_helper__WEBPACK_IMPORTED_MODULE_0__["default"], _mixins_form_helper__WEBPACK_IMPORTED_MODULE_1__["default"], _mixins_form_input_events_helper__WEBPACK_IMPORTED_MODULE_2__["default"], _store_novaposhta_warehouses__WEBPACK_IMPORTED_MODULE_3__["default"]],
  data: function data() {
    return {
      sourceAxiosRequest: null,
      editingProcess: false,
      deletingProcess: false,
      checkoutProcess: false,
      confirmItemsError: null,
      checkoutErrors: null,
      order: null,
      confirmData: null,
      ORDER_OPTIONS: window._ORDER_OPTIONS,
      PAYMENT_TYPES: window._PAYMENT_TYPES,
      DELIVERY_TYPES: window._DELIVERY_TYPES
    };
  },
  created: function created() {
    this.init();
  },
  mounted: function mounted() {
    $('[data-server-render="true"]').remove();
  },
  computed: {
    dropTotalAmount: function dropTotalAmount() {
      return _.sumBy(_.get(this.order, 'orderProducts', []), this.callbackCalcAmount('amount_drop'));
    },
    tradeTotalAmount: function tradeTotalAmount() {
      return _.sumBy(_.get(this.order, 'orderProducts', []), this.callbackCalcAmount('amount_trade'));
    },
    totalAmount: function totalAmount() {
      var total = this.tradeTotalAmount;
      if (!this.isUseTradePrice(total)) total = this.dropTotalAmount;
      return total;
    },
    earningsAmount: function earningsAmount() {
      var amount = this.confirmData.amount_cash_delivery - this.totalAmount;
      if (amount > 0) return amount;
      return 0;
    },
    warehouses: function warehouses() {
      return this.fromCache('novaposhtaCitiesCollection', this.novaposhtaCitiesActive);
    }
  },
  watch: {
    'confirmData.novaposhta_city_id': function confirmDataNovaposhta_city_id(val, oldVal) {
      this.confirmData.novaposhta_warehouse_id = null;
      var params = {
        cityId: val
      };

      if (val) {
        this.fetchNovaposhtaCities(params);
      } else {
        this.setActiveNovaposhtaCitiesCache(params, []);
      }
    }
  },
  methods: {
    init: function init() {
      this.order = window._ORDER;
      this.confirmData = _.merge(this.newConfirmData(), _.clone(this.order));
    },
    newConfirmData: function newConfirmData() {
      return {
        dropshipper_full_name: '',
        dropshipper_phone_number: '',
        payment_type: window._PAYMENT_TYPES.CASH_PAYMENT,
        delivery_type: window._DELIVERY_TYPES.NOVA_POSHTA,
        delivery_general_info: '',
        novaposhta_first_name: '',
        novaposhta_middle_name: '',
        novaposhta_last_name: '',
        novaposhta_phone_number: '',
        novaposhta_city_id: null,
        novaposhta_warehouse_id: null,
        amount_cash_delivery: 0
      };
    },
    callbackCalcAmount: function callbackCalcAmount(attribute) {
      return function (item) {
        return _.get(item, attribute);
      };
    },
    isUseTradePrice: function isUseTradePrice(amount) {
      return amount >= this.ORDER_OPTIONS.PRICE_TRADE_FROM_MIN_AMOUNT;
    },
    calculateAmount: function calculateAmount(price, quantity) {
      return _.floor(price * quantity, 2);
    },
    recalculateAmounts: function recalculateAmounts(item, quantity) {
      item.amount_drop = this.calculateAmount(_.get(item, 'price_drop', 0), quantity);
      item.amount_trade = this.calculateAmount(_.get(item, 'price_trade', 0), quantity);
    },
    quantityUp: function quantityUp(e, item) {
      var _this = this;

      e.stopImmediatePropagation();
      item.quantity += 1;
      this.recalculateAmounts(item, item.quantity);
      this.delay()(function () {
        return _this.sendRequestSavingItem(item);
      }, 100);
    },
    quantityDown: function quantityDown(e, item) {
      var _this2 = this;

      e.stopImmediatePropagation();

      if (item.quantity - 1 > 0) {
        item.quantity -= 1;
        this.recalculateAmounts(item, item.quantity);
        this.delay()(function () {
          return _this2.sendRequestSavingItem(item);
        }, 100);
      }
    },
    changeQuantity: function changeQuantity(e, item) {
      var _this3 = this;

      var quantity = +e.target.value;

      if (quantity <= 0) {
        e.preventDefault();
        e.target.value = item.quantity;
        return false;
      }

      item.quantity = quantity;
      this.recalculateAmounts(item, item.quantity);
      this.delay()(function () {
        return _this3.sendRequestSavingItem(item);
      }, 100);
      return true;
    },
    sendRequestSavingItem: function sendRequestSavingItem(order) {
      if (this.sourceAxiosRequest) this.sourceAxiosRequest.cancel();
      this.editItem(order);
    },
    editItem: function editItem(item) {
      var _this4 = this;

      var index = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : 0;
      this.sourceAxiosRequest = axios.CancelToken.source();
      this.editingProcess = true;
      this.confirmItemsError = null;
      axios.put('cart/edit-item/' + _.get(item, 'id'), {
        quantity: _.get(item, 'quantity', 1)
      }).then(function (response) {
        _this4.sourceAxiosRequest = null;
      })["catch"](function (error) {
        return _.forEach(_.get(error, ['response', 'data'], []), function (error, key) {
          _this4.confirmItemsError = _this4.confirmItemsError || {};
          _this4.confirmItemsError['orders.' + index + '.' + key] = error;
        });
      }).then(function () {
        return _this4.editingProcess = false;
      });
    },
    deleteItem: function deleteItem(item) {
      var _this5 = this;

      this.deletingProcess = true;
      axios["delete"]('cart/delete-item/' + _.get(item, 'id')).then(function (response) {
        _this5.order.orderProducts.splice(_this5.order.orderProducts.indexOf(item), 1);

        window.cartQuantitiy.$emit('decrementCartQuantity');
      })["catch"](function (error) {
        return _this5.deletingProcess = false;
      }).then(function () {
        return _this5.deletingProcess = false;
      });
    },
    checkout: function checkout() {
      var _this6 = this;

      if (this.checkoutProcess) return false;
      this.checkoutProcess = true;
      this.checkoutErrors = null;
      axios.post('cart/checkout', this.confirmData).then(function (response) {
        window.location.replace('cart/success');
      })["catch"](function (error) {
        return _this6.checkoutErrors = _.get(error, ['response', 'data'], []);
      }).then(function () {
        return _this6.checkoutProcess = false;
      });
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

/***/ "./resources/js/mixins/form-input-events-helper.js":
/*!*********************************************************!*\
  !*** ./resources/js/mixins/form-input-events-helper.js ***!
  \*********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ({
  methods: {
    isNumber: function isNumber(event) {
      event = event ? event : window.event;
      var charCode = event.which ? event.which : event.keyCode;

      if (charCode > 31 && (charCode < 48 || charCode > 57) && charCode !== 46) {
        event.preventDefault();
      } else {
        return true;
      }
    },
    isEmptyResetDefaultValue: function isEmptyResetDefaultValue(event, defaultValue) {
      if (_.isEmpty(event.target.value)) {
        event.target.value = defaultValue;
      }

      return true;
    }
  }
});

/***/ }),

/***/ "./resources/js/store/common.js":
/*!**************************************!*\
  !*** ./resources/js/store/common.js ***!
  \**************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony default export */ __webpack_exports__["default"] = ({
  methods: {
    buildKey: function buildKey(cache, key) {
      key = !_.isArray(key) ? [key] : key;
      key.unshift(cache);
      return key;
    },
    hasInCache: function hasInCache(cache, key) {
      return _.has(this, this.buildKey(cache, key));
    },
    fromCache: function fromCache(cache, key) {
      var defaultValue = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : [];

      if (_.isFunction(defaultValue)) {
        if (this.hasInCache(cache, key)) return _.get(this, this.buildKey(cache, key));else return defaultValue();
      }

      return _.get(this, this.buildKey(cache, key), defaultValue);
    },
    toCache: function toCache(cache, key, data) {
      if (!this[cache]) _.set(this, cache, {});

      _.set(this, this.buildKey(cache, key), data);
    },
    fromOrToCache: function fromOrToCache(cache, key, callable) {
      var _this = this;

      if (this.hasInCache(cache, key)) {
        return callable(true, function () {
          return _this.fromCache(cache, key);
        });
      }

      callable(false, function (items) {
        _this.toCache(cache, key, items);

        return items;
      });
    }
  }
});

/***/ }),

/***/ "./resources/js/store/novaposhta-warehouses.js":
/*!*****************************************************!*\
  !*** ./resources/js/store/novaposhta-warehouses.js ***!
  \*****************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _common__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./common */ "./resources/js/store/common.js");

/* harmony default export */ __webpack_exports__["default"] = ({
  mixins: [_common__WEBPACK_IMPORTED_MODULE_0__["default"]],
  data: function data() {
    return {
      loadingNovaposhtaCities: false,
      novaposhtaCitiesActive: null,
      novaposhtaCitiesCollection: null
    };
  },
  methods: {
    setActiveNovaposhtaCitiesCache: function setActiveNovaposhtaCitiesCache(params, items) {
      var key = JSON.stringify(params);
      this.novaposhtaCitiesActive = key;
      this.toCache('novaposhtaCitiesCollection', key, items);
    },
    fetchNovaposhtaCities: function fetchNovaposhtaCities(params) {
      var _this = this;

      var handleBeforeRequest = arguments.length > 1 && arguments[1] !== undefined ? arguments[1] : false;
      var handleSuccess = arguments.length > 2 && arguments[2] !== undefined ? arguments[2] : function (items) {};
      var handleError = arguments.length > 3 && arguments[3] !== undefined ? arguments[3] : function () {};
      this.loadingNovaposhtaCities = true;
      if (handleBeforeRequest) handleBeforeRequest();
      var keyCache = JSON.stringify(params);
      this.fromOrToCache('novaposhtaCitiesCollection', keyCache, function (fromCache, getOrSet) {
        if (fromCache) {
          _this.novaposhtaCitiesActive = keyCache;
          _this.loadingNovaposhtaCities = false;
          return handleSuccess ? handleSuccess(getOrSet()) : getOrSet();
        }

        axios.get('api/novaposhta/warehouses', {
          params: params
        }).then(function (response) {
          var items = _.get(response, 'data');

          getOrSet(items);
          _this.novaposhtaCitiesActive = keyCache;
          if (handleSuccess) handleSuccess(items);
          _this.loadingNovaposhtaCities = false;
        })["catch"](handleError ? handleError : function () {
          _this.loadingNovaposhtaCities = false;
        }).then(handleSuccess ? handleSuccess : function () {
          _this.loadingNovaposhtaCities = false;
        });
      });
    }
  }
});

/***/ }),

/***/ 4:
/*!************************************!*\
  !*** multi ./resources/js/cart.js ***!
  \************************************/
/*! no static exports found */
/***/ (function(module, exports, __webpack_require__) {

module.exports = __webpack_require__(/*! /home/nina/www/drop.back/resources/js/cart.js */"./resources/js/cart.js");


/***/ })

/******/ });