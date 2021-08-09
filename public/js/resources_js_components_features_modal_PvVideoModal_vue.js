"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_components_features_modal_PvVideoModal_vue"],{

/***/ "./resources/js/components/features/modal/PvVideoModal.vue":
/*!*****************************************************************!*\
  !*** ./resources/js/components/features/modal/PvVideoModal.vue ***!
  \*****************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _PvVideoModal_vue_vue_type_template_id_3bc347f1___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./PvVideoModal.vue?vue&type=template&id=3bc347f1& */ "./resources/js/components/features/modal/PvVideoModal.vue?vue&type=template&id=3bc347f1&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! !../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");

var script = {}


/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_1__.default)(
  script,
  _PvVideoModal_vue_vue_type_template_id_3bc347f1___WEBPACK_IMPORTED_MODULE_0__.render,
  _PvVideoModal_vue_vue_type_template_id_3bc347f1___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/features/modal/PvVideoModal.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/features/modal/PvVideoModal.vue?vue&type=template&id=3bc347f1&":
/*!************************************************************************************************!*\
  !*** ./resources/js/components/features/modal/PvVideoModal.vue?vue&type=template&id=3bc347f1& ***!
  \************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PvVideoModal_vue_vue_type_template_id_3bc347f1___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PvVideoModal_vue_vue_type_template_id_3bc347f1___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PvVideoModal_vue_vue_type_template_id_3bc347f1___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./PvVideoModal.vue?vue&type=template&id=3bc347f1& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/features/modal/PvVideoModal.vue?vue&type=template&id=3bc347f1&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/features/modal/PvVideoModal.vue?vue&type=template&id=3bc347f1&":
/*!***************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/features/modal/PvVideoModal.vue?vue&type=template&id=3bc347f1& ***!
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
  return _c(
    "div",
    { staticClass: "video-modal bg-white m-3", attrs: { id: "video-modal" } },
    [
      _c(
        "button",
        {
          staticClass: "close",
          attrs: { type: "button" },
          on: {
            click: function($event) {
              return _vm.$emit("close")
            }
          }
        },
        [_vm._m(0)]
      ),
      _vm._v(" "),
      _c("iframe", {
        staticClass: "mfp-iframe",
        attrs: {
          src: "//www.youtube.com/embed/vBPgmASQ1A0?autoplay=1",
          frameborder: "0",
          title: "youtube"
        }
      })
    ]
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("span", [_c("i", { staticClass: "icon-close" })])
  }
]
render._withStripped = true



/***/ })

}]);