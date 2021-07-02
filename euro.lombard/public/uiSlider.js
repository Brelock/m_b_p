(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["uiSlider"],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/calculator/uiSlider.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/calculator/uiSlider.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _mixins__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../mixins */ "./resources/js/mixins/index.js");
/* harmony import */ var _helpers_messages__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../helpers/messages */ "./resources/js/helpers/messages.js");
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
  data: function data() {
    return {
      val: null,
      slider: {
        min: 1,
        max: 30,
        start: 1,
        step: 1
      }
    };
  },
  computed: {
    messages: function messages() {
      return _helpers_messages__WEBPACK_IMPORTED_MODULE_1__["messages"];
    }
  },
  mounted: function mounted() {
    var _this = this;

    this.setLang();
    noUiSlider.create(slider, {
      start: [this.slider.start],
      step: this.slider.step,
      connect: [true, false],
      range: {
        'min': this.slider.min,
        'max': this.slider.max
      }
    });
    slider.noUiSlider.on('update', function (values, handle) {
      _this.val = values[0].split(".")[0];

      _this.$emit('updateSlider', _this.val);
    });
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/calculator/uiSlider.vue?vue&type=template&id=fdb2bbf2&":
/*!**********************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/calculator/uiSlider.vue?vue&type=template&id=fdb2bbf2& ***!
  \**********************************************************************************************************************************************************************************************************************/
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
    _c("div", { staticClass: "ui-slider" }, [
      _c("div", { staticClass: "mslider-title" }, [
        _c("span", { staticClass: "mslider-day" }, [_vm._v(_vm._s(_vm.val))]),
        _vm._v(" "),
        _c("span", { staticClass: "mslider-formData" }, [
          _vm._v(_vm._s(_vm.messages[_vm.lang].days))
        ])
      ]),
      _vm._v(" "),
      _c("div", {
        staticClass: "item-slide slider-common",
        attrs: { id: "bottom-slide-panel", "data-name": "slide-panel" }
      }),
      _vm._v(" "),
      _c("div", { staticClass: "mslider-marking" }, [
        _c("p", { staticClass: "mark-hide" }, [
          _vm._v("1 " + _vm._s(_vm.messages[_vm.lang].day))
        ]),
        _vm._v(" "),
        _c("p", { staticClass: "mark-hide" }, [
          _vm._v("30 " + _vm._s(_vm.messages[_vm.lang].days))
        ])
      ])
    ]),
    _vm._v(" "),
    _c("div", { ref: "slider", attrs: { id: "slider" } })
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./resources/js/components/calculator/uiSlider.vue":
/*!*********************************************************!*\
  !*** ./resources/js/components/calculator/uiSlider.vue ***!
  \*********************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _uiSlider_vue_vue_type_template_id_fdb2bbf2___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./uiSlider.vue?vue&type=template&id=fdb2bbf2& */ "./resources/js/components/calculator/uiSlider.vue?vue&type=template&id=fdb2bbf2&");
/* harmony import */ var _uiSlider_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./uiSlider.vue?vue&type=script&lang=js& */ "./resources/js/components/calculator/uiSlider.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _uiSlider_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _uiSlider_vue_vue_type_template_id_fdb2bbf2___WEBPACK_IMPORTED_MODULE_0__["render"],
  _uiSlider_vue_vue_type_template_id_fdb2bbf2___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/calculator/uiSlider.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/calculator/uiSlider.vue?vue&type=script&lang=js&":
/*!**********************************************************************************!*\
  !*** ./resources/js/components/calculator/uiSlider.vue?vue&type=script&lang=js& ***!
  \**********************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_uiSlider_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./uiSlider.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/calculator/uiSlider.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_uiSlider_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/calculator/uiSlider.vue?vue&type=template&id=fdb2bbf2&":
/*!****************************************************************************************!*\
  !*** ./resources/js/components/calculator/uiSlider.vue?vue&type=template&id=fdb2bbf2& ***!
  \****************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_uiSlider_vue_vue_type_template_id_fdb2bbf2___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./uiSlider.vue?vue&type=template&id=fdb2bbf2& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/calculator/uiSlider.vue?vue&type=template&id=fdb2bbf2&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_uiSlider_vue_vue_type_template_id_fdb2bbf2___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_uiSlider_vue_vue_type_template_id_fdb2bbf2___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



/***/ })

}]);