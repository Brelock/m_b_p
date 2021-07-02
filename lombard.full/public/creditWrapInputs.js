(window["webpackJsonp"] = window["webpackJsonp"] || []).push([["creditWrapInputs"],{

/***/ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/calculator/creditWrapInputs.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib??ref--4-0!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/calculator/creditWrapInputs.vue?vue&type=script&lang=js& ***!
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
  components: {
    uiSlider: function uiSlider() {
      return __webpack_require__.e(/*! import() | uiSlider */ "uiSlider").then(__webpack_require__.bind(null, /*! ./uiSlider.vue */ "./resources/js/components/calculator/uiSlider.vue"));
    }
  },
  data: function data() {
    return {
      visible: false,
      tabletView: false,
      dropdownyDepartment: false,
      dropdownyProbe: false,
      dropdownyDiscount: false,
      isEmptyDepartment: false,
      isEmptyProbe: false,
      isEmptyDiscount: false,
      departmentName: '',
      prodeName: '',
      discountName: '',
      formData: {
        department: 0,
        weight: '',
        probe: 0,
        isInserts: false,
        discount: false,
        creditDays: 1
      },
      required: ['department', 'weight', 'probe']
    };
  },
  // props: ['categoryId'],
  methods: {
    getUnits: function getUnits() {},
    updateCreditDay: function updateCreditDay(val) {
      this.formData.creditDays = Number(val);
    },
    handleView: function handleView() {
      window.innerWidth <= 992 ? this.tabletView = true : this.tabletView = false;
    },
    switcherValues: function switcherValues() {
      this.formData.isInserts = !this.formData.isInserts;
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
    },
    focusOnInput: function focusOnInput(_ref) {
      var currentTarget = _ref.currentTarget;
      currentTarget.querySelector('input').focus();
    },
    getOptionInSelect: function getOptionInSelect(_ref2, prop, propname, propEmpty, drop) {
      var currentTarget = _ref2.currentTarget;

      if (propEmpty == 'isEptyDepartment') {
        this.isEmptyDepartment = true;
      } else if (propEmpty == 'isEmptyProbe') {
        this.isEmptyProbe = true;
      } else if (propEmpty == 'isEmptyDiscount') {
        this.isEmptyDiscount = true;
      }

      if (this[drop] != true) {
        this[drop] = true;
      }

      this[propname] = currentTarget.getAttribute("data-name");
      this.formData[prop] = currentTarget.value;
    },
    handlerSelect: function handlerSelect(prop) {
      this[prop] = !this[prop];
    }
  },
  computed: {
    isDisabled: function isDisabled() {
      return Object(_mixins_validateForm__WEBPACK_IMPORTED_MODULE_2__["validateForm"])(this.required, this.formData);
    },
    citiesList: function citiesList() {
      return [{
        id: 1,
        title_ru: 'Запорожье',
        title_ua: 'Запорiжжя'
      }, {
        id: 2,
        title_ru: 'Днепр',
        title_ua: 'Днепр'
      }, {
        id: 3,
        title_ru: 'Киев',
        title_ua: 'Киев'
      }, {
        id: 4,
        title_ru: 'Харьков',
        title_ua: 'Харкiв'
      }];
    },
    prodeList: function prodeList() {
      return [{
        id: 1,
        title: 999
      }, {
        id: 2,
        title: 958
      }, {
        id: 3,
        title: 916
      }, {
        id: 4,
        title: 875
      }, {
        id: 5,
        title: 750
      }];
    },
    discountList: function discountList() {
      return [{
        val: false,
        title_ru: 'Без дисконта',
        title_ua: 'Без дисконту'
      }, {
        val: true,
        title_ru: 'С дисконтом',
        title_ua: 'З дисконтом'
      }];
    },
    messages: function messages() {
      return _helpers_messages__WEBPACK_IMPORTED_MODULE_1__["messages"];
    }
  },
  mounted: function mounted() {
    var _this2 = this;

    this.setLang();
    this.handleView();
    window.addEventListener('mouseup', function () {
      if (_this2.dropdownyDepartment === true) {
        _this2.dropdownyDepartment = false;
      } else if (_this2.dropdownyProbe === true) {
        _this2.dropdownyProbe = false;
      } else if (_this2.dropdownyDiscount === true) {
        _this2.dropdownyDiscount = false;
      }
    });
  }
});

/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/calculator/creditWrapInputs.vue?vue&type=template&id=eb5a1ac4&":
/*!******************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib??vue-loader-options!./resources/js/components/calculator/creditWrapInputs.vue?vue&type=template&id=eb5a1ac4& ***!
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
    _c("div", { staticClass: "flex_wrapper" }, [
      _c("div", { staticClass: "wrap-input-form mob_mb_20" }, [
        _c("div", { staticClass: "col-input" }, [
          _c(
            "div",
            {
              staticClass: "section-input",
              on: {
                click: function($event) {
                  return _vm.handlerSelect("dropdownyDepartment")
                }
              }
            },
            [
              _c("span", { staticClass: "sup-title" }, [
                _vm._v(" " + _vm._s(_vm.messages[_vm.lang].departments) + " ")
              ]),
              _vm._v(" "),
              _c("span", {
                class: [
                  { active: _vm.dropdownyDepartment },
                  "icon-arrow-down-gray"
                ]
              }),
              _vm._v(" "),
              !_vm.tabletView
                ? _c("div", { staticClass: "customSelect" }, [
                    _c("a", { staticClass: "chosen-single" }, [
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.formData.department,
                            expression: "formData.department"
                          }
                        ],
                        attrs: { hidden: "", type: "text" },
                        domProps: { value: _vm.formData.department },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(
                              _vm.formData,
                              "department",
                              $event.target.value
                            )
                          }
                        }
                      }),
                      _vm._v(" "),
                      _c(
                        "span",
                        {
                          directives: [
                            {
                              name: "show",
                              rawName: "v-show",
                              value: !_vm.isEmptyDepartment,
                              expression: "!isEmptyDepartment"
                            }
                          ],
                          staticClass: "placeholder"
                        },
                        [_vm._v(_vm._s(_vm.messages[_vm.lang].select__branch))]
                      ),
                      _vm._v(" "),
                      _c(
                        "span",
                        { staticClass: "placeholder", attrs: { else: "" } },
                        [_vm._v(_vm._s(_vm.departmentName))]
                      )
                    ]),
                    _vm._v(" "),
                    _c(
                      "ul",
                      {
                        directives: [
                          {
                            name: "show",
                            rawName: "v-show",
                            value: _vm.dropdownyDepartment,
                            expression: "dropdownyDepartment"
                          }
                        ],
                        staticClass: "dropdownSelect"
                      },
                      _vm._l(_vm.citiesList, function(city) {
                        return _c(
                          "li",
                          {
                            key: "city-" + city.id,
                            staticClass: "option",
                            attrs: {
                              "data-name": city["title_" + _vm.lang],
                              value: city.id
                            },
                            on: {
                              click: function($event) {
                                return _vm.getOptionInSelect(
                                  $event,
                                  "department",
                                  "departmentName",
                                  "isEptyDepartment",
                                  "dropdownyDepartment"
                                )
                              }
                            }
                          },
                          [_vm._v(_vm._s(city["title_" + _vm.lang]))]
                        )
                      }),
                      0
                    )
                  ])
                : _vm._e(),
              _vm._v(" "),
              _vm.tabletView
                ? _c(
                    "select",
                    {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.formData.department,
                          expression: "formData.department"
                        }
                      ],
                      staticClass: "isCheck",
                      attrs: { name: "department", id: "department" },
                      on: {
                        change: function($event) {
                          var $$selectedVal = Array.prototype.filter
                            .call($event.target.options, function(o) {
                              return o.selected
                            })
                            .map(function(o) {
                              var val = "_value" in o ? o._value : o.value
                              return val
                            })
                          _vm.$set(
                            _vm.formData,
                            "department",
                            $event.target.multiple
                              ? $$selectedVal
                              : $$selectedVal[0]
                          )
                        }
                      }
                    },
                    [
                      _c("option", { attrs: { disabled: "", value: "0" } }, [
                        _vm._v(_vm._s(_vm.messages[_vm.lang].select__branch))
                      ]),
                      _vm._v(" "),
                      _vm._l(_vm.citiesList, function(city) {
                        return _c(
                          "option",
                          {
                            key: "city-" + city.id,
                            domProps: { value: city.id }
                          },
                          [_vm._v(_vm._s(city["title_" + _vm.lang]))]
                        )
                      })
                    ],
                    2
                  )
                : _vm._e()
            ]
          ),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "section-input", on: { click: _vm.focusOnInput } },
            [
              _c("span", { staticClass: "sup-title" }, [
                _vm._v(_vm._s(_vm.messages[_vm.lang].product__weight))
              ]),
              _vm._v(" "),
              _c("input", {
                directives: [
                  {
                    name: "model",
                    rawName: "v-model.trim",
                    value: _vm.formData.weight,
                    expression: "formData.weight",
                    modifiers: { trim: true }
                  }
                ],
                staticClass: "isCheck",
                attrs: {
                  id: "weight",
                  type: "text",
                  autocomplete: "off",
                  placeholder: _vm.messages[_vm.lang].weight_placeholder
                },
                domProps: { value: _vm.formData.weight },
                on: {
                  input: function($event) {
                    if ($event.target.composing) {
                      return
                    }
                    _vm.$set(_vm.formData, "weight", $event.target.value.trim())
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
              on: {
                click: function($event) {
                  return _vm.handlerSelect("dropdownyProbe")
                }
              }
            },
            [
              _c("span", { staticClass: "sup-title" }, [
                _vm._v(
                  " " + _vm._s(_vm.messages[_vm.lang].product__sample) + " "
                )
              ]),
              _vm._v(" "),
              _c("span", {
                class: [{ active: _vm.dropdownyProbe }, "icon-arrow-down-gray"]
              }),
              _vm._v(" "),
              !_vm.tabletView
                ? _c("div", { staticClass: "customSelect" }, [
                    _c("a", { staticClass: "chosen-single" }, [
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.formData.probe,
                            expression: "formData.probe"
                          }
                        ],
                        attrs: { hidden: "", type: "text" },
                        domProps: { value: _vm.formData.probe },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(_vm.formData, "probe", $event.target.value)
                          }
                        }
                      }),
                      _vm._v(" "),
                      _c(
                        "span",
                        {
                          directives: [
                            {
                              name: "show",
                              rawName: "v-show",
                              value: !_vm.isEmptyProbe,
                              expression: "!isEmptyProbe"
                            }
                          ],
                          staticClass: "placeholder"
                        },
                        [_vm._v(_vm._s(_vm.messages[_vm.lang].product__probe))]
                      ),
                      _vm._v(" "),
                      _c(
                        "span",
                        { staticClass: "placeholder", attrs: { else: "" } },
                        [_vm._v(_vm._s(_vm.prodeName))]
                      )
                    ]),
                    _vm._v(" "),
                    _c(
                      "ul",
                      {
                        directives: [
                          {
                            name: "show",
                            rawName: "v-show",
                            value: _vm.dropdownyProbe,
                            expression: "dropdownyProbe"
                          }
                        ],
                        staticClass: "dropdownSelect"
                      },
                      _vm._l(_vm.prodeList, function(probe) {
                        return _c(
                          "li",
                          {
                            key: "probe-" + probe.id,
                            staticClass: "option",
                            attrs: {
                              "data-name": probe["title"],
                              value: probe.id
                            },
                            on: {
                              click: function($event) {
                                return _vm.getOptionInSelect(
                                  $event,
                                  "probe",
                                  "prodeName",
                                  "isEmptyProbe",
                                  "dropdownyProbe"
                                )
                              }
                            }
                          },
                          [_vm._v(_vm._s(probe["title"]))]
                        )
                      }),
                      0
                    )
                  ])
                : _vm._e(),
              _vm._v(" "),
              _vm.tabletView
                ? _c(
                    "select",
                    {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.formData.probe,
                          expression: "formData.probe"
                        }
                      ],
                      staticClass: "isCheck",
                      attrs: { name: "probe", id: "probe" },
                      on: {
                        change: function($event) {
                          var $$selectedVal = Array.prototype.filter
                            .call($event.target.options, function(o) {
                              return o.selected
                            })
                            .map(function(o) {
                              var val = "_value" in o ? o._value : o.value
                              return val
                            })
                          _vm.$set(
                            _vm.formData,
                            "probe",
                            $event.target.multiple
                              ? $$selectedVal
                              : $$selectedVal[0]
                          )
                        }
                      }
                    },
                    [
                      _c(
                        "option",
                        { attrs: { disabled: "" }, domProps: { value: 0 } },
                        [
                          _vm._v(
                            " " +
                              _vm._s(_vm.messages[_vm.lang].product__probe) +
                              " "
                          )
                        ]
                      ),
                      _vm._v(" "),
                      _vm._l(_vm.prodeList, function(probe) {
                        return _c(
                          "option",
                          {
                            key: "probe-" + probe.id,
                            domProps: { value: probe.id }
                          },
                          [_vm._v(_vm._s(probe["title"]))]
                        )
                      })
                    ],
                    2
                  )
                : _vm._e()
            ]
          )
        ]),
        _vm._v(" "),
        _c("div", { staticClass: "col-input" }, [
          _c("div", { staticClass: "wrapper-btn-check" }, [
            _c("span", { staticClass: "title-btn-check" }, [
              _vm._v(
                " " + _vm._s(_vm.messages[_vm.lang].stones_and_inserts) + " "
              )
            ]),
            _vm._v(" "),
            _c("div", [
              _c(
                "span",
                {
                  class: [{ active: _vm.formData.isInserts }, "btn-check"],
                  on: { click: _vm.switcherValues }
                },
                [
                  _vm._v(
                    "\n\t\t\t\t\t\t\t\t\t\t" +
                      _vm._s(_vm.messages[_vm.lang].true) +
                      " \n\t\t\t\t\t\t\t\t\t"
                  )
                ]
              ),
              _vm._v(" "),
              _c(
                "span",
                {
                  class: [{ active: !_vm.formData.isInserts }, "btn-check"],
                  on: { click: _vm.switcherValues }
                },
                [
                  _vm._v(
                    "\n\t\t\t\t\t\t\t\t\t\t" +
                      _vm._s(_vm.messages[_vm.lang].false) +
                      "\n\t\t\t\t\t\t\t\t\t"
                  )
                ]
              )
            ])
          ]),
          _vm._v(" "),
          _c(
            "div",
            {
              staticClass: "section-input",
              on: {
                click: function($event) {
                  return _vm.handlerSelect("dropdownyDiscount")
                }
              }
            },
            [
              _c("span", { staticClass: "sup-title" }, [
                _vm._v(_vm._s(_vm.messages[_vm.lang].placeholder_discount))
              ]),
              _vm._v(" "),
              _c("span", {
                class: [
                  { active: _vm.dropdownyDiscount },
                  "icon-arrow-down-gray"
                ]
              }),
              _vm._v(" "),
              !_vm.tabletView
                ? _c("div", { staticClass: "customSelect" }, [
                    _c("a", { staticClass: "chosen-single" }, [
                      _c("input", {
                        directives: [
                          {
                            name: "model",
                            rawName: "v-model",
                            value: _vm.formData.probe,
                            expression: "formData.probe"
                          }
                        ],
                        attrs: { hidden: "", type: "text" },
                        domProps: { value: _vm.formData.probe },
                        on: {
                          input: function($event) {
                            if ($event.target.composing) {
                              return
                            }
                            _vm.$set(_vm.formData, "probe", $event.target.value)
                          }
                        }
                      }),
                      _vm._v(" "),
                      _c(
                        "span",
                        {
                          directives: [
                            {
                              name: "show",
                              rawName: "v-show",
                              value: !_vm.isEmptyDiscount,
                              expression: "!isEmptyDiscount"
                            }
                          ],
                          staticClass: "placeholder"
                        },
                        [_vm._v(_vm._s(_vm.messages[_vm.lang].no_discount))]
                      ),
                      _vm._v(" "),
                      _c(
                        "span",
                        { staticClass: "placeholder", attrs: { else: "" } },
                        [_vm._v(_vm._s(_vm.discountName))]
                      )
                    ]),
                    _vm._v(" "),
                    _c(
                      "ul",
                      {
                        directives: [
                          {
                            name: "show",
                            rawName: "v-show",
                            value: _vm.dropdownyDiscount,
                            expression: "dropdownyDiscount"
                          }
                        ],
                        staticClass: "dropdownSelect"
                      },
                      _vm._l(_vm.discountList, function(discount) {
                        return _c(
                          "li",
                          {
                            key: "discount-" + discount.val,
                            staticClass: "option",
                            attrs: {
                              "data-name": discount["title_" + _vm.lang],
                              value: discount.val
                            },
                            on: {
                              click: function($event) {
                                return _vm.getOptionInSelect(
                                  $event,
                                  "discount",
                                  "discountName",
                                  "isEmptyDiscount",
                                  "dropdownyDiscount"
                                )
                              }
                            }
                          },
                          [_vm._v(_vm._s(discount["title_" + _vm.lang]))]
                        )
                      }),
                      0
                    )
                  ])
                : _vm._e(),
              _vm._v(" "),
              _vm.tabletView
                ? _c(
                    "select",
                    {
                      directives: [
                        {
                          name: "model",
                          rawName: "v-model",
                          value: _vm.formData.discount,
                          expression: "formData.discount"
                        }
                      ],
                      attrs: { name: "discount", id: "discount" },
                      on: {
                        change: function($event) {
                          var $$selectedVal = Array.prototype.filter
                            .call($event.target.options, function(o) {
                              return o.selected
                            })
                            .map(function(o) {
                              var val = "_value" in o ? o._value : o.value
                              return val
                            })
                          _vm.$set(
                            _vm.formData,
                            "discount",
                            $event.target.multiple
                              ? $$selectedVal
                              : $$selectedVal[0]
                          )
                        }
                      }
                    },
                    [
                      _c("option", { domProps: { value: false } }, [
                        _vm._v(_vm._s(_vm.messages[_vm.lang].no_discount) + " ")
                      ]),
                      _vm._v(" "),
                      _c("option", { domProps: { value: true } }, [
                        _vm._v(_vm._s(_vm.messages[_vm.lang].discount))
                      ])
                    ]
                  )
                : _vm._e()
            ]
          ),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "section-input ui-slider" },
            [
              _c("span", { staticClass: "sup-title" }, [
                _vm._v(" " + _vm._s(_vm.messages[_vm.lang].lending_term) + " ")
              ]),
              _vm._v(" "),
              _c("uiSlider", { on: { updateSlider: _vm.updateCreditDay } })
            ],
            1
          )
        ])
      ]),
      _vm._v(" "),
      _c(
        "button",
        {
          class: [{ disabled: _vm.isDisabled }, "button"],
          attrs: { type: "button", disabled: _vm.isDisabled },
          on: { click: _vm.handleSubmit }
        },
        [
          _vm._v(
            "\n\t\t\t\t\t\t\t\t " +
              _vm._s(_vm.messages[_vm.lang].calculate__btn) +
              "\n\t\t\t\t "
          )
        ]
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

/***/ "./resources/js/components/calculator/creditWrapInputs.vue":
/*!*****************************************************************!*\
  !*** ./resources/js/components/calculator/creditWrapInputs.vue ***!
  \*****************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _creditWrapInputs_vue_vue_type_template_id_eb5a1ac4___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./creditWrapInputs.vue?vue&type=template&id=eb5a1ac4& */ "./resources/js/components/calculator/creditWrapInputs.vue?vue&type=template&id=eb5a1ac4&");
/* harmony import */ var _creditWrapInputs_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./creditWrapInputs.vue?vue&type=script&lang=js& */ "./resources/js/components/calculator/creditWrapInputs.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport *//* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */

var component = Object(_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _creditWrapInputs_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _creditWrapInputs_vue_vue_type_template_id_eb5a1ac4___WEBPACK_IMPORTED_MODULE_0__["render"],
  _creditWrapInputs_vue_vue_type_template_id_eb5a1ac4___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"],
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/calculator/creditWrapInputs.vue"
/* harmony default export */ __webpack_exports__["default"] = (component.exports);

/***/ }),

/***/ "./resources/js/components/calculator/creditWrapInputs.vue?vue&type=script&lang=js&":
/*!******************************************************************************************!*\
  !*** ./resources/js/components/calculator/creditWrapInputs.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************/
/*! exports provided: default */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_creditWrapInputs_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/babel-loader/lib??ref--4-0!../../../../node_modules/vue-loader/lib??vue-loader-options!./creditWrapInputs.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/calculator/creditWrapInputs.vue?vue&type=script&lang=js&");
/* empty/unused harmony star reexport */ /* harmony default export */ __webpack_exports__["default"] = (_node_modules_babel_loader_lib_index_js_ref_4_0_node_modules_vue_loader_lib_index_js_vue_loader_options_creditWrapInputs_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/calculator/creditWrapInputs.vue?vue&type=template&id=eb5a1ac4&":
/*!************************************************************************************************!*\
  !*** ./resources/js/components/calculator/creditWrapInputs.vue?vue&type=template&id=eb5a1ac4& ***!
  \************************************************************************************************/
/*! exports provided: render, staticRenderFns */
/***/ (function(module, __webpack_exports__, __webpack_require__) {

"use strict";
__webpack_require__.r(__webpack_exports__);
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_creditWrapInputs_vue_vue_type_template_id_eb5a1ac4___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../node_modules/vue-loader/lib??vue-loader-options!./creditWrapInputs.vue?vue&type=template&id=eb5a1ac4& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js?!./node_modules/vue-loader/lib/index.js?!./resources/js/components/calculator/creditWrapInputs.vue?vue&type=template&id=eb5a1ac4&");
/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "render", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_creditWrapInputs_vue_vue_type_template_id_eb5a1ac4___WEBPACK_IMPORTED_MODULE_0__["render"]; });

/* harmony reexport (safe) */ __webpack_require__.d(__webpack_exports__, "staticRenderFns", function() { return _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_creditWrapInputs_vue_vue_type_template_id_eb5a1ac4___WEBPACK_IMPORTED_MODULE_0__["staticRenderFns"]; });



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