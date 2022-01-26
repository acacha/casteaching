"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["VideoForm"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/VideoForm.vue?vue&type=script&lang=js&":
/*!****************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/VideoForm.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _bus_js__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../bus.js */ "./resources/js/bus.js");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//

/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  name: "VideoForm",
  data: function data() {
    return {
      video: {},
      status: 'creating'
    };
  },
  methods: {
    save: function save() {
      if (this.status === 'creating') {
        this.store();
      }

      if (this.status === 'editing') {
        this.update();
      }
    },
    store: function store() {
      try {
        window.casteaching.video.create({
          title: this.video.title,
          description: this.video.description,
          url: this.video.url
        });
        _bus_js__WEBPACK_IMPORTED_MODULE_0__["default"].$emit('created');
        _bus_js__WEBPACK_IMPORTED_MODULE_0__["default"].$emit('status', 'Video created successfully');
      } catch (error) {
        console.log(error);
      }
    },
    update: function update() {
      try {
        window.casteaching.video.update(this.video.id, {
          title: this.video.title,
          description: this.video.description,
          url: this.video.url
        });
        _bus_js__WEBPACK_IMPORTED_MODULE_0__["default"].$emit('created');
        _bus_js__WEBPACK_IMPORTED_MODULE_0__["default"].$emit('status', 'Video updated successfully');
      } catch (error) {
        console.log(error);
      }
    }
  },
  created: function created() {
    var _this = this;

    _bus_js__WEBPACK_IMPORTED_MODULE_0__["default"].$on('edit', function (video) {
      _this.video = video;
      _this.status = 'editing';
    });
  }
});

/***/ }),

/***/ "./resources/js/components/VideoForm.vue":
/*!***********************************************!*\
  !*** ./resources/js/components/VideoForm.vue ***!
  \***********************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _VideoForm_vue_vue_type_template_id_3a0e8284_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./VideoForm.vue?vue&type=template&id=3a0e8284&scoped=true& */ "./resources/js/components/VideoForm.vue?vue&type=template&id=3a0e8284&scoped=true&");
/* harmony import */ var _VideoForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./VideoForm.vue?vue&type=script&lang=js& */ "./resources/js/components/VideoForm.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__["default"])(
  _VideoForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__["default"],
  _VideoForm_vue_vue_type_template_id_3a0e8284_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render,
  _VideoForm_vue_vue_type_template_id_3a0e8284_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  "3a0e8284",
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/VideoForm.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/VideoForm.vue?vue&type=script&lang=js&":
/*!************************************************************************!*\
  !*** ./resources/js/components/VideoForm.vue?vue&type=script&lang=js& ***!
  \************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_VideoForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./VideoForm.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/VideoForm.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_VideoForm_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__["default"]); 

/***/ }),

/***/ "./resources/js/components/VideoForm.vue?vue&type=template&id=3a0e8284&scoped=true&":
/*!******************************************************************************************!*\
  !*** ./resources/js/components/VideoForm.vue?vue&type=template&id=3a0e8284&scoped=true& ***!
  \******************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_VideoForm_vue_vue_type_template_id_3a0e8284_scoped_true___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_VideoForm_vue_vue_type_template_id_3a0e8284_scoped_true___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_VideoForm_vue_vue_type_template_id_3a0e8284_scoped_true___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./VideoForm.vue?vue&type=template&id=3a0e8284&scoped=true& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/VideoForm.vue?vue&type=template&id=3a0e8284&scoped=true&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/VideoForm.vue?vue&type=template&id=3a0e8284&scoped=true&":
/*!*********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/VideoForm.vue?vue&type=template&id=3a0e8284&scoped=true& ***!
  \*********************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function () {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c(
    "div",
    {
      staticClass:
        "-my-2 overflow-x-auto sm:-mx-6 lg:-mx-8 mb-1 md:mb-2 lg:mb-4",
    },
    [
      _c(
        "div",
        {
          staticClass:
            "py-2 align-middle inline-block min-w-full sm:px-6 lg:px-8",
        },
        [
          _c(
            "div",
            {
              staticClass:
                "md:grid md:grid-cols-3 md:gap-6 bg-white md:bg-transparent",
            },
            [
              _vm._m(0),
              _vm._v(" "),
              _c("div", { staticClass: "md:mt-0 md:col-span-2" }, [
                _c(
                  "form",
                  {
                    attrs: { "data-qa": "form_video_create", method: "POST" },
                    on: {
                      submit: function ($event) {
                        $event.preventDefault()
                        return _vm.save.apply(null, arguments)
                      },
                    },
                  },
                  [
                    _c(
                      "div",
                      {
                        staticClass:
                          "shadow sm:rounded-md sm:overflow-hidden md:bg-white",
                      },
                      [
                        _c(
                          "div",
                          { staticClass: "px-4 py-5 space-y-6 sm:p-6" },
                          [
                            _c("div", [
                              _c(
                                "label",
                                {
                                  staticClass:
                                    "block text-sm font-medium text-gray-700",
                                  attrs: { for: "title" },
                                },
                                [
                                  _vm._v(
                                    "\n                                    Title\n                                "
                                  ),
                                ]
                              ),
                              _vm._v(" "),
                              _c("div", { staticClass: "mt-1" }, [
                                _c("input", {
                                  directives: [
                                    {
                                      name: "model",
                                      rawName: "v-model",
                                      value: _vm.video.title,
                                      expression: "video.title",
                                    },
                                  ],
                                  staticClass:
                                    "shadow-sm mt-1 block w-full sm:text-sm border border-gray-300 rounded-md p-2",
                                  attrs: {
                                    required: "",
                                    type: "text",
                                    id: "title",
                                    name: "title",
                                    rows: "3",
                                    placeholder: "Titol del vídeo",
                                  },
                                  domProps: { value: _vm.video.title },
                                  on: {
                                    input: function ($event) {
                                      if ($event.target.composing) {
                                        return
                                      }
                                      _vm.$set(
                                        _vm.video,
                                        "title",
                                        $event.target.value
                                      )
                                    },
                                  },
                                }),
                              ]),
                              _vm._v(" "),
                              _c(
                                "p",
                                { staticClass: "mt-2 text-sm text-gray-500" },
                                [
                                  _vm._v(
                                    "\n                                    Titol curt del vídeo\n                                "
                                  ),
                                ]
                              ),
                            ]),
                            _vm._v(" "),
                            _c("div", [
                              _c(
                                "label",
                                {
                                  staticClass:
                                    "block text-sm font-medium text-gray-700",
                                  attrs: { for: "description" },
                                },
                                [
                                  _vm._v(
                                    "\n                                    Description\n                                "
                                  ),
                                ]
                              ),
                              _vm._v(" "),
                              _c("div", { staticClass: "mt-1" }, [
                                _c("textarea", {
                                  directives: [
                                    {
                                      name: "model",
                                      rawName: "v-model",
                                      value: _vm.video.description,
                                      expression: "video.description",
                                    },
                                  ],
                                  staticClass:
                                    "shadow-sm focus:ring-indigo-500 focus:border-indigo-500 mt-1 block w-full sm:text-sm border border-gray-300 rounded-md",
                                  attrs: {
                                    required: "",
                                    id: "description",
                                    name: "description",
                                    rows: "3",
                                    placeholder: "Description",
                                  },
                                  domProps: { value: _vm.video.description },
                                  on: {
                                    input: function ($event) {
                                      if ($event.target.composing) {
                                        return
                                      }
                                      _vm.$set(
                                        _vm.video,
                                        "description",
                                        $event.target.value
                                      )
                                    },
                                  },
                                }),
                              ]),
                              _vm._v(" "),
                              _c(
                                "p",
                                { staticClass: "mt-2 text-sm text-gray-500" },
                                [
                                  _vm._v(
                                    "\n                                    Breu descripció del vídeo\n                                "
                                  ),
                                ]
                              ),
                            ]),
                            _vm._v(" "),
                            _c(
                              "div",
                              { staticClass: "grid grid-cols-3 gap-6" },
                              [
                                _c("div", { staticClass: "col-span-3" }, [
                                  _c(
                                    "label",
                                    {
                                      staticClass:
                                        "block text-sm font-medium text-gray-700",
                                      attrs: { for: "url" },
                                    },
                                    [
                                      _vm._v(
                                        "\n                                        URL\n                                    "
                                      ),
                                    ]
                                  ),
                                  _vm._v(" "),
                                  _c(
                                    "div",
                                    {
                                      staticClass:
                                        "mt-1 flex rounded-md shadow-sm",
                                    },
                                    [
                                      _c(
                                        "span",
                                        {
                                          staticClass:
                                            "inline-flex items-center px-3 rounded-l-md border border-r-0 border-gray-300 bg-gray-50 text-gray-500 text-sm",
                                        },
                                        [
                                          _vm._v(
                                            "\n                                                        http://\n                                                      "
                                          ),
                                        ]
                                      ),
                                      _vm._v(" "),
                                      _c("input", {
                                        directives: [
                                          {
                                            name: "model",
                                            rawName: "v-model",
                                            value: _vm.video.url,
                                            expression: "video.url",
                                          },
                                        ],
                                        staticClass:
                                          "focus:ring-indigo-500 focus:border-indigo-500 flex-1 block  rounded-none rounded-r-md sm:text-sm border-gray-300",
                                        attrs: {
                                          required: "",
                                          type: "url",
                                          name: "url",
                                          id: "url",
                                          placeholder: "youtube.com/",
                                        },
                                        domProps: { value: _vm.video.url },
                                        on: {
                                          input: function ($event) {
                                            if ($event.target.composing) {
                                              return
                                            }
                                            _vm.$set(
                                              _vm.video,
                                              "url",
                                              $event.target.value
                                            )
                                          },
                                        },
                                      }),
                                    ]
                                  ),
                                ]),
                              ]
                            ),
                          ]
                        ),
                        _vm._v(" "),
                        _c(
                          "div",
                          {
                            staticClass:
                              "px-4 py-3 bg-gray-50 text-right sm:px-6",
                          },
                          [
                            _c(
                              "button",
                              {
                                staticClass:
                                  "inline-flex justify-center py-2 px-4 border border-transparent shadow-sm text-sm font-medium rounded-md text-white bg-indigo-600 hover:bg-indigo-700 focus:outline-none focus:ring-2 focus:ring-offset-2 focus:ring-indigo-500",
                                attrs: { type: "submit" },
                              },
                              [
                                _vm.status === "creating"
                                  ? _c("span", [_vm._v("Crear")])
                                  : _vm._e(),
                                _vm._v(" "),
                                _vm.status === "editing"
                                  ? _c("span", [_vm._v("Editar")])
                                  : _vm._e(),
                              ]
                            ),
                          ]
                        ),
                      ]
                    ),
                  ]
                ),
              ]),
            ]
          ),
        ]
      ),
    ]
  )
}
var staticRenderFns = [
  function () {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "md:col-span-1" }, [
      _c("div", { staticClass: "px-4 py-4 sm:px-6 md:px-4" }, [
        _c(
          "h3",
          { staticClass: "text-lg font-medium leading-6 text-gray-900" },
          [_vm._v("Vídeos")]
        ),
        _vm._v(" "),
        _c("p", { staticClass: "mt-1 text-sm text-gray-600" }, [
          _vm._v(
            "\n                        Informació bàsica del vídeo\n                    "
          ),
        ]),
      ]),
    ])
  },
]
render._withStripped = true



/***/ })

}]);