"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_components_features_modal_PvLoginModal_vue"],{

/***/ "./resources/js/components/features/modal/PvLoginModal.vue":
/*!*****************************************************************!*\
  !*** ./resources/js/components/features/modal/PvLoginModal.vue ***!
  \*****************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _PvLoginModal_vue_vue_type_template_id_7689d8c3___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./PvLoginModal.vue?vue&type=template&id=7689d8c3& */ "./resources/js/components/features/modal/PvLoginModal.vue?vue&type=template&id=7689d8c3&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");

var script = {}


/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_1__.default)(
  script,
  _PvLoginModal_vue_vue_type_template_id_7689d8c3___WEBPACK_IMPORTED_MODULE_0__.render,
  _PvLoginModal_vue_vue_type_template_id_7689d8c3___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/features/modal/PvLoginModal.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/features/modal/PvLoginModal.vue?vue&type=template&id=7689d8c3&":
/*!************************************************************************************************!*\
  !*** ./resources/js/components/features/modal/PvLoginModal.vue?vue&type=template&id=7689d8c3& ***!
  \************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PvLoginModal_vue_vue_type_template_id_7689d8c3___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PvLoginModal_vue_vue_type_template_id_7689d8c3___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PvLoginModal_vue_vue_type_template_id_7689d8c3___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./PvLoginModal.vue?vue&type=template&id=7689d8c3& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/features/modal/PvLoginModal.vue?vue&type=template&id=7689d8c3&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/features/modal/PvLoginModal.vue?vue&type=template&id=7689d8c3&":
/*!***************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/features/modal/PvLoginModal.vue?vue&type=template&id=7689d8c3& ***!
  \***************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* binding */ render),
/* harmony export */   "staticRenderFns": () => (/* binding */ staticRenderFns)
/* harmony export */ });
var render = function() {
  var _vm = this
  var _h = _vm.$createElement
  var _c = _vm._self._c || _h
  return _c("div", { staticClass: "modal-wrapper login-popup" }, [
    _c("div", { staticClass: "container" }, [
      _c("h2", { staticClass: "title" }, [_vm._v("Login")]),
      _vm._v(" "),
      _c("form", { staticClass: "mb-0", attrs: { action: "#" } }, [
        _vm._m(0),
        _vm._v(" "),
        _c("input", {
          staticClass: "form-input form-wide mb-2",
          attrs: { type: "email", id: "login-email", required: "" }
        }),
        _vm._v(" "),
        _vm._m(1),
        _vm._v(" "),
        _c("input", {
          staticClass: "form-input form-wide mb-2",
          attrs: { type: "password", id: "login-password", required: "" }
        }),
        _vm._v(" "),
        _c("div", { staticClass: "form-footer" }, [
          _vm._m(2),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "form-footer-right" },
            [
              _c(
                "nuxt-link",
                {
                  staticClass: "forget-password text-dark",
                  attrs: { to: "/pages/forgot-password" }
                },
                [_vm._v("Forgot Password?")]
              )
            ],
            1
          )
        ]),
        _vm._v(" "),
        _c(
          "div",
          { staticClass: "text-center" },
          [
            _c(
              "button",
              {
                staticClass: "btn btn-dark btn-block btn-md",
                attrs: { type: "submit" }
              },
              [_vm._v("LOGIN")]
            ),
            _vm._v(" "),
            _c(
              "nuxt-link",
              {
                staticClass:
                  "btn btn-regist bg-transparent text-transform-none p-0",
                attrs: { to: "/pages/login" }
              },
              [_vm._v("Register Now!")]
            )
          ],
          1
        )
      ])
    ]),
    _vm._v(" "),
    _c(
      "button",
      {
        staticClass: "mfp-close",
        attrs: { title: "Close (Esc)", type: "button" },
        on: {
          click: function($event) {
            return _vm.$emit("close")
          }
        }
      },
      [_vm._v("×")]
    )
  ])
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { attrs: { for: "login-email" } }, [
      _vm._v("\n\t\t\t\tUsername or email address\n\t\t\t\t"),
      _c("span", { staticClass: "required" }, [_vm._v("*")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("label", { attrs: { for: "login-password" } }, [
      _vm._v("\n\t\t\t\tPassword\n\t\t\t\t"),
      _c("span", { staticClass: "required" }, [_vm._v("*")])
    ])
  },
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "custom-control custom-checkbox ml-0" }, [
      _c("input", {
        staticClass: "custom-control-input",
        attrs: { type: "checkbox", id: "lost-password" }
      }),
      _vm._v(" "),
      _c(
        "label",
        {
          staticClass: "custom-control-label form-footer-right",
          attrs: { for: "lost-password" }
        },
        [_vm._v("Remember me")]
      )
    ])
  }
]
render._withStripped = true



/***/ })

}]);