(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["creditSilverForm"],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/calculator/creditSilverForm.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/calculator/creditSilverForm.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _mixins__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../mixins */ "./resources/js/mixins/index.js");
/* harmony import */ var _helpers_messages__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../helpers/messages */ "./resources/js/helpers/messages.js");
/* harmony import */ var _mixins_validateForm__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../mixins/validateForm */ "./resources/js/mixins/validateForm.js");
/* harmony import */ var _api__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @/api */ "./resources/js/api/index.js");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//




/* harmony default export */ __webpack_exports__["default"] = ({
  mixins: [_mixins__WEBPACK_IMPORTED_MODULE_0__["lang"]],
  components: {
    creditWrapInputs: function creditWrapInputs() {
      return __webpack_require__.e(/*! import() | creditWrapInputs */ "creditWrapInputs").then(__webpack_require__.bind(null, /*! ./creditWrapInputs.vue */ "./resources/js/components/calculator/creditWrapInputs.vue"));
    },
    creditWrapScrapInputs: function creditWrapScrapInputs() {
      return __webpack_require__.e(/*! import() | creditWrapScrapInputs */ "creditWrapScrapInputs").then(__webpack_require__.bind(null, /*! ./creditWrapScrapInputs.vue */ "./resources/js/components/calculator/creditWrapScrapInputs.vue"));
    }
  },
  data: function data() {
    return {
      isScrap: false,
      btnSwitchTrue: true,
      btnSwitchFalse: false,
      required: ['department', 'weight', 'probe']
    };
  },
  props: ['categoryId'],
  methods: {
    getUnits: function getUnits() {},
    updateRequired: function updateRequired() {
      if (this.isScrap) {
        this.required = ['weight', 'probe'];
      } else {
        this.required = ['department', 'weight', 'probe'];
      }
    },
    switcherValues: function switcherValues(btnName) {
      this.btnSwitchTrue = false;
      this.btnSwitchFalse = false;
      this[btnName] = true;
    },
    handleSubmitForm: function handleSubmitForm(payload) {
      var _this = this;

      this.formSaving = true;
      console.log(payload);
      Object(_api__WEBPACK_IMPORTED_MODULE_3__["api"])('POST', payload.url, payload).then(function () {
        _this.formSaving = false; // show notification
      })["catch"](function (error) {// show notification
      });
    }
  },
  beforeMount: function beforeMount() {
    this.getUnits();
  },
  computed: {
    isDisabled: function isDisabled() {
      return Object(_mixins_validateForm__WEBPACK_IMPORTED_MODULE_2__["validateForm"])(this.required, this.formData);
    },
    messages: function messages() {
      return _helpers_messages__WEBPACK_IMPORTED_MODULE_1__["messages"];
    }
  },
  mounted: function mounted() {
    this.setLang();
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/calculator/creditSilverForm.vue?vue&type=template&id=2f43fa3c&":
/*!******************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/calculator/creditSilverForm.vue?vue&type=template&id=2f43fa3c& ***!
  \******************************************************************************************************************************************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "render", function() { return render; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return staticRenderFns; });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", [
    _c("form", { staticClass: "calc-form", attrs: { action: "#" } }, [
      _c(
        "div",
        { staticClass: "wrap-select-option" },
        [
          _c("div", { staticClass: "check-box" }, [
            _c("input", {
              directives: [
                {
                  name: "model",
                  rawName: "v-model",
                  value: _vm.isScrap,
                  expression: "isScrap"
                }
              ],
              attrs: { id: "check", type: "checkbox" },
              domProps: {
                checked: Array.isArray(_vm.isScrap)
                  ? _vm._i(_vm.isScrap, null) > -1
                  : _vm.isScrap
              },
              on: {
                change: [
                  function($event) {
                    var $$a = _vm.isScrap,
                      $$el = $event.target,
                      $$c = $$el.checked ? true : false
                    if (Array.isArray($$a)) {
                      var $$v = null,
                        $$i = _vm._i($$a, $$v)
                      if ($$el.checked) {
                        $$i < 0 && (_vm.isScrap = $$a.concat([$$v]))
                      } else {
                        $$i > -1 &&
                          (_vm.isScrap = $$a
                            .slice(0, $$i)
                            .concat($$a.slice($$i + 1)))
                      }
                    } else {
                      _vm.isScrap = $$c
                    }
                  },
                  _vm.updateRequired
                ]
              }
            }),
            _vm._v(" "),
            _c("label", {
              staticClass: "checkbox-label",
              attrs: { for: "check" }
            }),
            _vm._v(" "),
            _c("span", [_vm._v(_vm._s(_vm.messages[_vm.lang].scrap_check))])
          ]),
          _vm._v(" "),
          !_vm.isScrap
            ? _c("creditWrapInputs", {
                on: { submitForm: _vm.handleSubmitForm }
              })
            : _vm._e(),
          _vm._v(" "),
          _vm.isScrap
            ? _c("creditWrapScrapInputs", {
                on: { submitForm: _vm.handleSubmitForm }
              })
            : _vm._e()
        ],
        1
      )
    ])
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/api/axiosService.js":
/*!******************************************!*\
  !*** ./resources/js/api/axiosService.js ***!
  \******************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! axios */ "./node_modules/axios/index.js");
/* harmony import */ var axios__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(axios__WEBPACK_IMPORTED_MODULE_0__);

axios__WEBPACK_IMPORTED_MODULE_0___default.a.defaults.headers['X-Requested-With'] = 'XMLHttpRequest';
axios__WEBPACK_IMPORTED_MODULE_0___default.a.defaults.headers.Accept = 'application/json';
axios__WEBPACK_IMPORTED_MODULE_0___default.a.defaults.headers['Content-Type'] = 'application/json;charset=UTF-8';
axios__WEBPACK_IMPORTED_MODULE_0___default.a.defaults.baseURL =  true ? 'http://euro.loc:8089/api' : // 'https://api.drivesmatrix.assetmatrix.com/api'
undefined;
/* harmony default export */ __webpack_exports__["default"] = (axios__WEBPACK_IMPORTED_MODULE_0___default.a);

/***/ }),

/***/ "./resources/js/api/index.js":
/*!***********************************!*\
  !*** ./resources/js/api/index.js ***!
  \***********************************/
/*! exports provided: api */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "api", function() { return api; });
/* harmony import */ var _helpers_api_helpers__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @/helpers/api_helpers */ "./resources/js/helpers/api_helpers.js");
/* harmony import */ var _axiosService__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./axiosService */ "./resources/js/api/axiosService.js");



var api = function api(method, url, payload) {
  var _parsePayload = Object(_helpers_api_helpers__WEBPACK_IMPORTED_MODULE_0__["parsePayload"])(payload, method),
      headers = _parsePayload.headers,
      data = _parsePayload.data,
      params = _parsePayload.params,
      newMethod = _parsePayload.newMethod;

  Object(_helpers_api_helpers__WEBPACK_IMPORTED_MODULE_0__["checkAuthorizationHeaders"])();
  /*if (payload && payload.withFile) {
  	console.log('3 ', newMethod, data )
  }*/

  return Object(_axiosService__WEBPACK_IMPORTED_MODULE_1__["default"])({
    method: newMethod || method,
    url: url,
    headers: Object(_helpers_api_helpers__WEBPACK_IMPORTED_MODULE_0__["combineHeaders"])(headers),
    params: params,
    data: data
  });
};



/***/ }),

/***/ "./resources/js/components/calculator/creditSilverForm.vue":
/*!*****************************************************************!*\
  !*** ./resources/js/components/calculator/creditSilverForm.vue ***!
  \*****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _creditSilverForm_vue_vue_type_template_id_2f43fa3c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./creditSilverForm.vue?vue&type=template&id=2f43fa3c& */ "./resources/js/components/calculator/creditSilverForm.vue?vue&type=template&id=2f43fa3c&");
/* harmony import */ var _creditSilverForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./creditSilverForm.vue?vue&type=script&lang=js& */ "./resources/js/components/calculator/creditSilverForm.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _creditSilverForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _creditSilverForm_vue_vue_type_template_id_2f43fa3c___WEBPACK_IMPORTED_MODULE_0__["render"],
  _creditSilverForm_vue_vue_type_template_id_2f43fa3c___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/calculator/creditSilverForm.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/calculator/creditSilverForm.vue?vue&type=script&lang=js&":
/*!******************************************************************************************!*\
  !*** ./resources/js/components/calculator/creditSilverForm.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_creditSilverForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./creditSilverForm.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/calculator/creditSilverForm.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_creditSilverForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/calculator/creditSilverForm.vue?vue&type=template&id=2f43fa3c&":
/*!************************************************************************************************!*\
  !*** ./resources/js/components/calculator/creditSilverForm.vue?vue&type=template&id=2f43fa3c& ***!
  \************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_creditSilverForm_vue_vue_type_template_id_2f43fa3c___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./creditSilverForm.vue?vue&type=template&id=2f43fa3c& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/calculator/creditSilverForm.vue?vue&type=template&id=2f43fa3c&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_creditSilverForm_vue_vue_type_template_id_2f43fa3c___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_creditSilverForm_vue_vue_type_template_id_2f43fa3c___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ }),

/***/ "./resources/js/helpers/api_helpers.js":
/*!*********************************************!*\
  !*** ./resources/js/helpers/api_helpers.js ***!
  \*********************************************/
/*! exports provided: getYmdDateString, combineHeaders, setHttpToken, checkAuthorizationHeaders, prepareParams, setupMultipartFormData, parsePayload, isSuccessStatus, getResponseMessage, getResultMessage, handleError */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getYmdDateString", function() { return getYmdDateString; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "combineHeaders", function() { return combineHeaders; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "setHttpToken", function() { return setHttpToken; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "checkAuthorizationHeaders", function() { return checkAuthorizationHeaders; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "prepareParams", function() { return prepareParams; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "setupMultipartFormData", function() { return setupMultipartFormData; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "parsePayload", function() { return parsePayload; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "isSuccessStatus", function() { return isSuccessStatus; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getResponseMessage", function() { return getResponseMessage; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "getResultMessage", function() { return getResultMessage; });
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "handleError", function() { return handleError; });
/* harmony import */ var _api_axiosService__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @/api/axiosService */ "./resources/js/api/axiosService.js");
function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

function _typeof(obj) { "@babel/helpers - typeof"; if (typeof Symbol === "function" && typeof Symbol.iterator === "symbol") { _typeof = function _typeof(obj) { return typeof obj; }; } else { _typeof = function _typeof(obj) { return obj && typeof Symbol === "function" && obj.constructor === Symbol && obj !== Symbol.prototype ? "symbol" : typeof obj; }; } return _typeof(obj); }

// import isEmpty from 'lodash.isempty';
 // import { Notification } from 'element-ui';
// import { getObjectVal, cleanDateString } from '@/helpers';

var getYmdDateString = function getYmdDateString(_ref) {
  var dateObj = _ref.dateObj,
      ms = _ref.ms;
  var date = dateObj || new Date(ms);
  var y = date.getFullYear();
  var m = date.getMonth() + 1;
  var d = date.getDate();
  m = m < 10 ? "0".concat(m) : m;
  d = d < 10 ? "0".concat(d) : d;
  return "".concat(y, "-").concat(m, "-").concat(d);
}; // -------------------


var combineHeaders = function combineHeaders(headers) {
  if (headers) return headers;
  return headers; // headers = {'Content-Type': 'multipart/form-data'}
};

var setHttpToken = function setHttpToken(token) {
  if (token) {
    _api_axiosService__WEBPACK_IMPORTED_MODULE_0__["default"].defaults.headers.common.Authorization = "Bearer ".concat(token);
  } else {
    _api_axiosService__WEBPACK_IMPORTED_MODULE_0__["default"].defaults.headers.common.Authorization = null;
  } // console.log('2: ',axios.defaults.headers.common.Authorization)

};

var checkAuthorizationHeaders = function checkAuthorizationHeaders() {
  // console.log('1: ', axios.defaults.headers.common.Authorization)
  if (!!_api_axiosService__WEBPACK_IMPORTED_MODULE_0__["default"].defaults.headers.common && !!_api_axiosService__WEBPACK_IMPORTED_MODULE_0__["default"].defaults.headers.common.Authorization) {// empty
  } else {
    var token = localStorage.getItem('access_token'); // const token = store.state.auth.access_token;

    setHttpToken(token);
  }
};

var prepareParams = function prepareParams(getParams) {
  var result = {};

  for (var prop in getParams) {
    if (getParams[prop] || typeof getParams[prop] === 'boolean') {
      result[prop] = getParams[prop];
    }
  }

  return result;
};

var setupMultipartFormData = function setupMultipartFormData(obj, form, namespace) {
  try {
    var fd = form || new FormData();
    var formKey; // debugger;

    for (var property in obj) {
      if (obj[property]) {
        if (namespace) {
          formKey = namespace + '[' + property + ']';
        } else {
          formKey = property;
        } // console.log(formKey)
        // if the property is an object, but not a File, use recursivity.


        if (_typeof(obj[property]) === 'object' && !(obj[property] instanceof File)) {
          setupMultipartFormData(obj[property], fd, formKey);
        } else {
          // if it's a string or a File object
          fd.append(formKey, obj[property]);
        }
      }
    }

    return fd;
  } catch (e) {
    console.warn(e);
  }
};

var parsePayload = function parsePayload(payloadData, method) {
  var result = {};

  if (payloadData) {
    var payload = _objectSpread({}, payloadData);

    var newData = null;
    var newMethod = null;

    if (payload.withFile) {
      newData = setupMultipartFormData(payload.data);

      if (method == 'PUT') {
        newData.set('_method', 'PUT');
      }

      newMethod = newData && newData.has('_method') ? 'POST' : method;
      payload.headers = {
        'Content-Type': 'multipart/form-data'
      }; // console.log(newData.get('brand'))
      // console.log(newData.get('title_ru'))
    } // if (!isEmpty(payload)) {


    if (payload.params) result.params = prepareParams(payload.params);
    if (payload.data) result.data = newData || payload.data;
    if (payload.url) result.mod_url = payload.url;
    if (payload.headers) result.headers = payload.headers;
    result.newMethod = newMethod || method; // }
  }

  return result;
}; // ------------------------


var isSuccessStatus = function isSuccessStatus(_ref2) {
  var status = _ref2.status,
      data = _ref2.data;

  if (status >= 200 && status < 300) {
    if (data && data.data) {
      return true;
    } else if (data && data.status) {
      return true;
    } else if (data && data.id) {
      return true;
    }
  }

  return false;
}; // --------------------------


var getResponseMessage = function getResponseMessage(originalResponse) {
  var message = '';

  if (originalResponse) {
    var response = originalResponse.data ? originalResponse.data : originalResponse.response;

    if (response && response.data) {
      var messages = response.data.messages;

      if (messages instanceof Array) {
        for (var i = 0; i < messages.length; i++) {
          for (var j = 0; j < messages[i].length; j++) {
            var comma = j === messages[i].length - 1 ? '.' : ', ';
            message += "".concat(messages[i][j]).concat(comma);
          }
        }
      }
    }
  }

  return message;
};

var getResultMessage = function getResultMessage(resultMessageData, itemData) {
  var message = '';

  if (resultMessageData) {
    var is_true = resultMessageData.is_true,
        is_false = resultMessageData.is_false,
        flag = resultMessageData.flag,
        text = resultMessageData.text;

    if (text) {
      message = text;
    } else if (flag && itemData) {
      message = itemData[flag] ? is_true : is_false;
    }
  }

  return message;
};

var handleError = function handleError(error, _ref3) {
  var commit = _ref3.commit,
      customMessage = _ref3.customMessage,
      _ref3$reject = _ref3.reject,
      reject = _ref3$reject === void 0 ? null : _ref3$reject,
      loading = _ref3.loading,
      notify = _ref3.notify,
      loadingProp = _ref3.loadingProp;

  try {
    var message = getResponseMessage(error);

    if (error.response) {
      if (error.response.status === 401) {
        // store.dispatch('auth/clear_auth', { root: true });
        // router.push('/login');
        if (reject) reject(error);
        /*Notification.warning({
        	title: `Not authorized`,
        	message: message || 'Try sign in again'
        });*/

        return;
      }
    } // console.log(reject)


    if (reject) {
      reject(error);
    }

    if (notify) {// Notification.error({ title: `Error`, message: customMessage || message || error.message, duration: 0 });
    }
  } catch (e) {
    console.log(e);
  }
};



/***/ }),

/***/ "./resources/js/mixins/validateForm.js":
/*!*********************************************!*\
  !*** ./resources/js/mixins/validateForm.js ***!
  \*********************************************/
/*! exports provided: validateForm */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony export (binding) */ __webpack_require__.d(__webpack_exports__, "validateForm", function() { return validateForm; });
var validateForm = function validateForm(required, formData) {
  var errors = [];
  var parsedobj = JSON.parse(JSON.stringify(formData));
  required.forEach(function (item) {
    for (var key in parsedobj) {
      if (item == key) {
        if (parsedobj[key] <= 0 || parsedobj[key] == null) {
          errors.push(1);
        }
      }
    }
  });
  return errors.length > 0;
};



/***/ })

}]);