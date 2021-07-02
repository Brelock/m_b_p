(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["creditTechForm"],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/calculator/creditTechForm.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/calculator/creditTechForm.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _mixins__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../mixins */ "./resources/js/mixins/index.js");
/* harmony import */ var _helpers_messages__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../helpers/messages */ "./resources/js/helpers/messages.js");
/* harmony import */ var _mixins_validateForm__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../mixins/validateForm */ "./resources/js/mixins/validateForm.js");
/* harmony import */ var _api__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! @/api */ "./resources/js/api/index.js");
function _createForOfIteratorHelper(o, allowArrayLike) { var it; if (typeof Symbol === "undefined" || o[Symbol.iterator] == null) { if (Array.isArray(o) || (it = _unsupportedIterableToArray(o)) || allowArrayLike && o && typeof o.length === "number") { if (it) o = it; var i = 0; var F = function F() {}; return { s: F, n: function n() { if (i >= o.length) return { done: true }; return { done: false, value: o[i++] }; }, e: function e(_e) { throw _e; }, f: F }; } throw new TypeError("Invalid attempt to iterate non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); } var normalCompletion = true, didErr = false, err; return { s: function s() { it = o[Symbol.iterator](); }, n: function n() { var step = it.next(); normalCompletion = step.done; return step; }, e: function e(_e2) { didErr = true; err = _e2; }, f: function f() { try { if (!normalCompletion && it["return"] != null) it["return"](); } finally { if (didErr) throw err; } } }; }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _arrayLikeToArray(arr, len) { if (len == null || len > arr.length) len = arr.length; for (var i = 0, arr2 = new Array(len); i < len; i++) { arr2[i] = arr[i]; } return arr2; }

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
  data: function data() {
    return {
      progress: 1,
      eula: false,
      // isDisabled: true,
      selectedImage: '',
      selImg: "",
      showSelectedFiles: true,
      formSaving: false,
      formData: {
        type: "",
        model: "",
        brand: "",
        condition: null,
        kit: null,
        user_name: '',
        phone_number: '',
        images: []
      }
    };
  },
  methods: {
    toggleProgress: function toggleProgress(val) {
      this.progress += val;
    },
    handleSelectImage: function handleSelectImage(_ref) {
      var target = _ref.target;
      var files = target.files;
      this.formData.images = [];

      if (files.length) {
        this.selectedImage = files[0].name; // this.selectedImage = files;

        var _iterator = _createForOfIteratorHelper(files),
            _step;

        try {
          for (_iterator.s(); !(_step = _iterator.n()).done;) {
            var img = _step.value;
            this.formData.images.push(img);
          }
        } catch (err) {
          _iterator.e(err);
        } finally {
          _iterator.f();
        }

        this.showSelectedFiles = false;
      } // console.log(target.files)

    },
    focusOnInput: function focusOnInput(_ref2) {
      var currentTarget = _ref2.currentTarget;
      currentTarget.querySelector('input').focus();
    },
    handleSubmit: function handleSubmit() {
      var _this = this;

      var payload = {
        data: this.formData,
        withFile: !!this.formData.images.length
      };
      this.formSaving = true; // console.log(payload)

      Object(_api__WEBPACK_IMPORTED_MODULE_3__["api"])('POST', '/tech', payload).then(function () {
        _this.formSaving = false; // show notification
      })["catch"](function (error) {// show notification
      }); // this.$emit('submitForm', payload);
    }
  },
  computed: {
    isDisabled: function isDisabled() {
      return Object(_mixins_validateForm__WEBPACK_IMPORTED_MODULE_2__["validateForm"])(this.required_fields, this.formData);
    },
    required_fields: function required_fields() {
      var result;

      switch (this.progress) {
        case 1:
          result = ['type', 'model', 'brand'];
          break;

        case 2:
          result = ['condition'];
          break;

        case 3:
          result = ['kit'];
          break;

        case 4:
          result = ['user_name', 'phone_number'];
          break;

        default:
          [];
      }

      return result;
    },
    messages: function messages() {
      return _helpers_messages__WEBPACK_IMPORTED_MODULE_1__["messages"];
    },
    techConditions: function techConditions(that) {
      return [{
        id: 1,
        label: _helpers_messages__WEBPACK_IMPORTED_MODULE_1__["messages"][that.lang].perfect_state
      }, {
        id: 2,
        label: _helpers_messages__WEBPACK_IMPORTED_MODULE_1__["messages"][that.lang].good_state
      }, {
        id: 3,
        label: _helpers_messages__WEBPACK_IMPORTED_MODULE_1__["messages"][that.lang].bad_state
      }];
    },
    techKits: function techKits(that) {
      return [{
        id: 1,
        label: _helpers_messages__WEBPACK_IMPORTED_MODULE_1__["messages"][that.lang].full_kit
      }, {
        id: 2,
        label: _helpers_messages__WEBPACK_IMPORTED_MODULE_1__["messages"][that.lang].partial_kit
      }, {
        id: 3,
        label: _helpers_messages__WEBPACK_IMPORTED_MODULE_1__["messages"][that.lang].absent_kit
      }];
    }
  },
  created: function created() {},
  mounted: function mounted() {}
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/calculator/creditTechForm.vue?vue&type=template&id=53dc3cf6&":
/*!****************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/calculator/creditTechForm.vue?vue&type=template&id=53dc3cf6& ***!
  \****************************************************************************************************************************************************************************************************************************/
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
    _c(
      "form",
      {
        staticClass: "calc-form",
        attrs: { action: "#" },
        on: {
          submit: function($event) {
            $event.preventDefault()
            return _vm.handleSubmit($event)
          }
        }
      },
      [
        _c("div", { staticClass: "progress-bar-container" }, [
          _c(
            "div",
            {
              directives: [
                {
                  name: "show",
                  rawName: "v-show",
                  value: _vm.progress != 1,
                  expression: "progress != 1"
                }
              ],
              staticClass: "prev-button"
            },
            [
              _c(
                "button",
                {
                  attrs: { type: "button" },
                  on: {
                    click: function() {
                      return _vm.toggleProgress(-1)
                    }
                  }
                },
                [_c("span", { staticClass: "icon-arrow-l-secondColor" })]
              )
            ]
          ),
          _vm._v(" "),
          _c(
            "div",
            {
              staticClass: "progress-item",
              class: { active: _vm.progress >= 1 }
            },
            [
              _vm._m(0),
              _vm._v(" "),
              _c("div", { staticClass: "label" }, [
                _vm._v(_vm._s(_vm.messages[_vm.lang].device))
              ])
            ]
          ),
          _vm._v(" "),
          _c(
            "div",
            {
              staticClass: "progress-item",
              class: { active: _vm.progress >= 2 }
            },
            [
              _vm._m(1),
              _vm._v(" "),
              _c("div", { staticClass: "label" }, [
                _vm._v(_vm._s(_vm.messages[_vm.lang].state))
              ])
            ]
          ),
          _vm._v(" "),
          _c(
            "div",
            {
              staticClass: "progress-item",
              class: { active: _vm.progress >= 3 }
            },
            [
              _vm._m(2),
              _vm._v(" "),
              _c("div", { staticClass: "label" }, [
                _vm._v(_vm._s(_vm.messages[_vm.lang].kit))
              ])
            ]
          ),
          _vm._v(" "),
          _c(
            "div",
            {
              staticClass: "progress-item",
              class: { active: _vm.progress >= 4 }
            },
            [
              _vm._m(3),
              _vm._v(" "),
              _c("div", { staticClass: "label" }, [
                _vm._v(_vm._s(_vm.messages[_vm.lang].data))
              ])
            ]
          )
        ]),
        _vm._v(" "),
        _c(
          "div",
          {
            directives: [
              {
                name: "show",
                rawName: "v-show",
                value: _vm.progress == 1,
                expression: "progress == 1"
              }
            ],
            staticClass: "form-body"
          },
          [
            _c("div", { staticClass: "wrap-input-form mob_mb_20" }, [
              _c("div", { staticClass: "col-input" }, [
                _c(
                  "div",
                  {
                    staticClass: "section-input",
                    on: { click: _vm.focusOnInput }
                  },
                  [
                    _c("span", { staticClass: "sup-title" }, [
                      _vm._v(_vm._s(_vm.messages[_vm.lang].type_of_equipment))
                    ]),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model.trim",
                          value: _vm.formData.type,
                          expression: "formData.type",
                          modifiers: { trim: true }
                        }
                      ],
                      staticClass: "isCheck",
                      attrs: {
                        type: "text",
                        autocomplete: "off",
                        placeholder: _vm.messages[_vm.lang].type_placeholder
                      },
                      domProps: { value: _vm.formData.type },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(
                            _vm.formData,
                            "type",
                            $event.target.value.trim()
                          )
                        },
                        blur: function($event) {
                          return _vm.$forceUpdate()
                        }
                      }
                    })
                  ]
                ),
                _vm._v(" "),
                _c(
                  "div",
                  {
                    staticClass: "section-input",
                    on: { click: _vm.focusOnInput }
                  },
                  [
                    _c("span", { staticClass: "sup-title" }, [
                      _vm._v(_vm._s(_vm.messages[_vm.lang].model))
                    ]),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model.trim",
                          value: _vm.formData.model,
                          expression: "formData.model",
                          modifiers: { trim: true }
                        }
                      ],
                      staticClass: "isCheck",
                      attrs: {
                        type: "text",
                        autocomplete: "off",
                        placeholder: _vm.messages[_vm.lang].model_placeholder
                      },
                      domProps: { value: _vm.formData.model },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(
                            _vm.formData,
                            "model",
                            $event.target.value.trim()
                          )
                        },
                        blur: function($event) {
                          return _vm.$forceUpdate()
                        }
                      }
                    })
                  ]
                )
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-input" }, [
                _c(
                  "div",
                  {
                    staticClass: "section-input",
                    on: { click: _vm.focusOnInput }
                  },
                  [
                    _c("span", { staticClass: "sup-title" }, [
                      _vm._v(_vm._s(_vm.messages[_vm.lang].brand))
                    ]),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model.trim",
                          value: _vm.formData.brand,
                          expression: "formData.brand",
                          modifiers: { trim: true }
                        }
                      ],
                      staticClass: "isCheck",
                      attrs: {
                        type: "text",
                        autocomplete: "off",
                        placeholder: _vm.messages[_vm.lang].brand_placeholder
                      },
                      domProps: { value: _vm.formData.brand },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(
                            _vm.formData,
                            "brand",
                            $event.target.value.trim()
                          )
                        },
                        blur: function($event) {
                          return _vm.$forceUpdate()
                        }
                      }
                    })
                  ]
                ),
                _vm._v(" "),
                _c(
                  "div",
                  {
                    staticClass: "section-input",
                    on: { click: _vm.focusOnInput }
                  },
                  [
                    _c("input", {
                      staticClass: "isCheck",
                      attrs: {
                        autocomplete: "off",
                        multiple: "",
                        id: "getFile",
                        type: "file",
                        accept:
                          "image/jpg, image/jpeg, image/svg, image/png, image/gif"
                      },
                      on: { change: _vm.handleSelectImage }
                    }),
                    _vm._v(" "),
                    _c(
                      "label",
                      { staticClass: "getFile", attrs: { for: "getFile" } },
                      [
                        _vm.showSelectedFiles
                          ? _c("span", { staticClass: "get_file_title" }, [
                              _vm._v(
                                _vm._s(_vm.messages[_vm.lang].device_photo)
                              )
                            ])
                          : _c("span", { staticClass: "get_file_title" }, [
                              _vm._v(_vm._s(_vm.selectedImage))
                            ]),
                        _vm._v(" "),
                        _c("span", { staticClass: "icon-get-photo" })
                      ]
                    )
                  ]
                )
              ])
            ])
          ]
        ),
        _vm._v(" "),
        _c(
          "div",
          {
            directives: [
              {
                name: "show",
                rawName: "v-show",
                value: _vm.progress == 2,
                expression: "progress == 2"
              }
            ],
            staticClass: "form-body"
          },
          [
            _c(
              "div",
              { staticClass: "radio-buttons-container" },
              _vm._l(_vm.techConditions, function(item) {
                return _c(
                  "div",
                  { key: "condition-" + item.id, staticClass: "radio-item" },
                  [
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.formData.condition,
                          expression: "formData.condition"
                        }
                      ],
                      staticClass: "custom-radio",
                      attrs: {
                        id: "c_input-" + item.id,
                        type: "radio",
                        name: "condition"
                      },
                      domProps: {
                        value: item.id,
                        checked: _vm._q(_vm.formData.condition, item.id)
                      },
                      on: {
                        change: function($event) {
                          return _vm.$set(_vm.formData, "condition", item.id)
                        }
                      }
                    }),
                    _vm._v(" "),
                    _c("label", { attrs: { for: "c_input-" + item.id } }, [
                      _c("span", [_vm._v(_vm._s(item.label))])
                    ])
                  ]
                )
              }),
              0
            )
          ]
        ),
        _vm._v(" "),
        _c(
          "div",
          {
            directives: [
              {
                name: "show",
                rawName: "v-show",
                value: _vm.progress == 3,
                expression: "progress == 3"
              }
            ],
            staticClass: "form-body"
          },
          [
            _c(
              "div",
              { staticClass: "radio-buttons-container" },
              _vm._l(_vm.techKits, function(item) {
                return _c(
                  "div",
                  { key: "kit-" + item.id, staticClass: "radio-item" },
                  [
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.formData.kit,
                          expression: "formData.kit"
                        }
                      ],
                      staticClass: "custom-radio",
                      attrs: {
                        id: "kit_input-" + item.id,
                        type: "radio",
                        name: "kit"
                      },
                      domProps: {
                        value: item.id,
                        checked: _vm._q(_vm.formData.kit, item.id)
                      },
                      on: {
                        change: function($event) {
                          return _vm.$set(_vm.formData, "kit", item.id)
                        }
                      }
                    }),
                    _vm._v(" "),
                    _c("label", { attrs: { for: "kit_input-" + item.id } }, [
                      _c("span", [_vm._v(_vm._s(item.label))])
                    ])
                  ]
                )
              }),
              0
            )
          ]
        ),
        _vm._v(" "),
        _c(
          "div",
          {
            directives: [
              {
                name: "show",
                rawName: "v-show",
                value: _vm.progress == 4,
                expression: "progress == 4"
              }
            ],
            staticClass: "form-body mob_mb_20"
          },
          [
            _c("div", { staticClass: "title-section" }, [
              _vm._v(
                "\n\t\t\t\t" +
                  _vm._s(_vm.messages[_vm.lang].data_device_description) +
                  "\n\t\t\t"
              )
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "wrap-input-form mb_0" }, [
              _c("div", { staticClass: "col-input" }, [
                _c(
                  "div",
                  {
                    staticClass: "section-input",
                    on: { click: _vm.focusOnInput }
                  },
                  [
                    _c("span", { staticClass: "sup-title" }, [
                      _vm._v(_vm._s(_vm.messages[_vm.lang].full_name_user))
                    ]),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model.trim",
                          value: _vm.formData.user_name,
                          expression: "formData.user_name",
                          modifiers: { trim: true }
                        }
                      ],
                      staticClass: "isCheck",
                      attrs: {
                        type: "text",
                        autocomplete: "off",
                        placeholder:
                          _vm.messages[_vm.lang].full_name_user_placeholder
                      },
                      domProps: { value: _vm.formData.user_name },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(
                            _vm.formData,
                            "user_name",
                            $event.target.value.trim()
                          )
                        },
                        blur: function($event) {
                          return _vm.$forceUpdate()
                        }
                      }
                    })
                  ]
                )
              ]),
              _vm._v(" "),
              _c("div", { staticClass: "col-input" }, [
                _c(
                  "div",
                  {
                    staticClass: "section-input",
                    on: { click: _vm.focusOnInput }
                  },
                  [
                    _c("span", { staticClass: "sup-title" }, [
                      _vm._v(_vm._s(_vm.messages[_vm.lang].phone))
                    ]),
                    _vm._v(" "),
                    _c("input", {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model.trim",
                          value: _vm.formData.phone_number,
                          expression: "formData.phone_number",
                          modifiers: { trim: true }
                        }
                      ],
                      staticClass: "isCheck",
                      attrs: {
                        type: "text",
                        autocomplete: "off",
                        placeholder: _vm.messages[_vm.lang].phone_placholder
                      },
                      domProps: { value: _vm.formData.phone_number },
                      on: {
                        input: function($event) {
                          if ($event.target.composing) {
                            return
                          }
                          _vm.$set(
                            _vm.formData,
                            "phone_number",
                            $event.target.value.trim()
                          )
                        },
                        blur: function($event) {
                          return _vm.$forceUpdate()
                        }
                      }
                    })
                  ]
                )
              ])
            ]),
            _vm._v(" "),
            _c("div", { staticClass: "check-box" }, [
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model",
                    value: _vm.eula,
                    expression: "eula"
                  }
                ],
                attrs: { id: "eula", type: "checkbox" },
                domProps: {
                  checked: Array.isArray(_vm.eula)
                    ? _vm._i(_vm.eula, null) > -1
                    : _vm.eula
                },
                on: {
                  change: function($event) {
                    var $$a = _vm.eula,
                      $$el = $event.target,
                      $$c = $$el.checked ? true : false
                    if (Array.isArray($$a)) {
                      var $$v = null,
                        $$i = _vm._i($$a, $$v)
                      if ($$el.checked) {
                        $$i < 0 && (_vm.eula = $$a.concat([$$v]))
                      } else {
                        $$i > -1 &&
                          (_vm.eula = $$a
                            .slice(0, $$i)
                            .concat($$a.slice($$i + 1)))
                      }
                    } else {
                      _vm.eula = $$c
                    }
                  }
                }
              }),
              _vm._v(" "),
              _c("label", {
                staticClass: "checkbox-label",
                attrs: { for: "eula" }
              }),
              _vm._v(" "),
              _c("span", [
                _vm._v(_vm._s(_vm.messages[_vm.lang].person_data_check))
              ])
            ])
          ]
        ),
        _vm._v(" "),
        _c(
          "button",
          {
            directives: [
              {
                name: "show",
                rawName: "v-show",
                value: _vm.progress != 4,
                expression: "progress != 4"
              }
            ],
            class: [{ disabled: _vm.isDisabled }, "button"],
            attrs: { type: "button", disabled: _vm.isDisabled },
            on: {
              click: function() {
                return _vm.toggleProgress(1)
              }
            }
          },
          [_vm._v(_vm._s(_vm.messages[_vm.lang].next) + "\n\t\t")]
        ),
        _vm._v(" "),
        _c(
          "button",
          {
            directives: [
              {
                name: "show",
                rawName: "v-show",
                value: _vm.progress == 4,
                expression: "progress == 4"
              }
            ],
            class: [{ disabled: _vm.isDisabled || !_vm.eula }, "button"],
            attrs: { type: "submit", disabled: _vm.isDisabled || !_vm.eula }
          },
          [
            _vm._v(
              "\n\t\t        " + _vm._s(_vm.messages[_vm.lang].send) + "\n\t\t"
            )
          ]
        )
      ]
    )
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "number" }, [_c("span", [_vm._v("1")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "number" }, [_c("span", [_vm._v("2")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "number" }, [_c("span", [_vm._v("3")])])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "number" }, [_c("span", [_vm._v("4")])])
  }
]
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

/***/ "./resources/js/components/calculator/creditTechForm.vue":
/*!***************************************************************!*\
  !*** ./resources/js/components/calculator/creditTechForm.vue ***!
  \***************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _creditTechForm_vue_vue_type_template_id_53dc3cf6___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./creditTechForm.vue?vue&type=template&id=53dc3cf6& */ "./resources/js/components/calculator/creditTechForm.vue?vue&type=template&id=53dc3cf6&");
/* harmony import */ var _creditTechForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./creditTechForm.vue?vue&type=script&lang=js& */ "./resources/js/components/calculator/creditTechForm.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _creditTechForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _creditTechForm_vue_vue_type_template_id_53dc3cf6___WEBPACK_IMPORTED_MODULE_0__["render"],
  _creditTechForm_vue_vue_type_template_id_53dc3cf6___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/calculator/creditTechForm.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/calculator/creditTechForm.vue?vue&type=script&lang=js&":
/*!****************************************************************************************!*\
  !*** ./resources/js/components/calculator/creditTechForm.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_creditTechForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./creditTechForm.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/calculator/creditTechForm.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_creditTechForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/calculator/creditTechForm.vue?vue&type=template&id=53dc3cf6&":
/*!**********************************************************************************************!*\
  !*** ./resources/js/components/calculator/creditTechForm.vue?vue&type=template&id=53dc3cf6& ***!
  \**********************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_creditTechForm_vue_vue_type_template_id_53dc3cf6___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./creditTechForm.vue?vue&type=template&id=53dc3cf6& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/calculator/creditTechForm.vue?vue&type=template&id=53dc3cf6&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_creditTechForm_vue_vue_type_template_id_53dc3cf6___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_creditTechForm_vue_vue_type_template_id_53dc3cf6___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



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