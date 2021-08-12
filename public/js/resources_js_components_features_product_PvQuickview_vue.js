"use strict";
(self["webpackChunk"] = self["webpackChunk"] || []).push([["resources_js_components_features_product_PvQuickview_vue"],{

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/features/product/PvQuickview.vue?vue&type=script&lang=js&":
/*!***********************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/features/product/PvQuickview.vue?vue&type=script&lang=js& ***!
  \***********************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! @babel/runtime/regenerator */ "./node_modules/@babel/runtime/regenerator/index.js");
/* harmony import */ var _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default = /*#__PURE__*/__webpack_require__.n(_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0__);
/* harmony import */ var _partials_product_media_PvMediaOne__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../partials/product/media/PvMediaOne */ "./resources/js/components/partials/product/media/PvMediaOne.vue");
/* harmony import */ var _partials_product_detail_PvDetailOne__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../partials/product/detail/PvDetailOne */ "./resources/js/components/partials/product/detail/PvDetailOne.vue");
/* harmony import */ var _services_product__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../services/product */ "./resources/js/services/product.js");


function asyncGeneratorStep(gen, resolve, reject, _next, _throw, key, arg) { try { var info = gen[key](arg); var value = info.value; } catch (error) { reject(error); return; } if (info.done) { resolve(value); } else { Promise.resolve(value).then(_next, _throw); } }

function _asyncToGenerator(fn) { return function () { var self = this, args = arguments; return new Promise(function (resolve, reject) { var gen = fn.apply(self, args); function _next(value) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "next", value); } function _throw(err) { asyncGeneratorStep(gen, resolve, reject, _next, _throw, "throw", err); } _next(undefined); }); }; }

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  components: {
    PvMediaOne: _partials_product_media_PvMediaOne__WEBPACK_IMPORTED_MODULE_1__.default,
    PvDetailOne: _partials_product_detail_PvDetailOne__WEBPACK_IMPORTED_MODULE_2__.default
  },
  props: {
    slug: String
  },
  data: function data() {
    return {
      product: null
    };
  },
  mounted: function mounted() {
    this.getProduct();
  },
  methods: {
    getProduct: function () {
      var _getProduct = _asyncToGenerator( /*#__PURE__*/_babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().mark(function _callee() {
        var response;
        return _babel_runtime_regenerator__WEBPACK_IMPORTED_MODULE_0___default().wrap(function _callee$(_context) {
          while (1) {
            switch (_context.prev = _context.next) {
              case 0:
                _context.prev = 0;
                _context.next = 3;
                return (0,_services_product__WEBPACK_IMPORTED_MODULE_3__.fetchSingle)(this.slug);

              case 3:
                response = _context.sent;
                console.log(response);
                this.product = response.data.data.data;
                _context.next = 11;
                break;

              case 8:
                _context.prev = 8;
                _context.t0 = _context["catch"](0);
                console.log(_context.t0.response);

              case 11:
              case "end":
                return _context.stop();
            }
          }
        }, _callee, this, [[0, 8]]);
      }));

      function getProduct() {
        return _getProduct.apply(this, arguments);
      }

      return getProduct;
    }()
  }
});

/***/ }),

/***/ "./resources/js/components/features/product/PvQuickview.vue":
/*!******************************************************************!*\
  !*** ./resources/js/components/features/product/PvQuickview.vue ***!
  \******************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _PvQuickview_vue_vue_type_template_id_22ac4965___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./PvQuickview.vue?vue&type=template&id=22ac4965& */ "./resources/js/components/features/product/PvQuickview.vue?vue&type=template&id=22ac4965&");
/* harmony import */ var _PvQuickview_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./PvQuickview.vue?vue&type=script&lang=js& */ "./resources/js/components/features/product/PvQuickview.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _PvQuickview_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _PvQuickview_vue_vue_type_template_id_22ac4965___WEBPACK_IMPORTED_MODULE_0__.render,
  _PvQuickview_vue_vue_type_template_id_22ac4965___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/features/product/PvQuickview.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/features/product/PvQuickview.vue?vue&type=script&lang=js&":
/*!*******************************************************************************************!*\
  !*** ./resources/js/components/features/product/PvQuickview.vue?vue&type=script&lang=js& ***!
  \*******************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PvQuickview_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./PvQuickview.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/features/product/PvQuickview.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PvQuickview_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/components/features/product/PvQuickview.vue?vue&type=template&id=22ac4965&":
/*!*************************************************************************************************!*\
  !*** ./resources/js/components/features/product/PvQuickview.vue?vue&type=template&id=22ac4965& ***!
  \*************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PvQuickview_vue_vue_type_template_id_22ac4965___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PvQuickview_vue_vue_type_template_id_22ac4965___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PvQuickview_vue_vue_type_template_id_22ac4965___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./PvQuickview.vue?vue&type=template&id=22ac4965& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/features/product/PvQuickview.vue?vue&type=template&id=22ac4965&");


/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/features/product/PvQuickview.vue?vue&type=template&id=22ac4965&":
/*!****************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/features/product/PvQuickview.vue?vue&type=template&id=22ac4965& ***!
  \****************************************************************************************************************************************************************************************************************************************/
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
    {
      staticClass:
        "product-single-container product-single-default product-quick-view mb-0 custom-scrollbar skeleton-body"
    },
    [
      !_vm.product
        ? _c("div", { staticClass: "quickview-wrap product" }, [_vm._m(0)])
        : _vm._e(),
      _vm._v(" "),
      _vm.product
        ? _c("div", { staticClass: "row" }, [
            _c(
              "div",
              { staticClass: "col-md-6 product-single-gallery mb-md-0" },
              [
                _c("pv-media-one", {
                  attrs: { product: _vm.product, "is-magnify": false }
                })
              ],
              1
            ),
            _vm._v(" "),
            _c(
              "div",
              { staticClass: "col-md-6 product-single-details mb-0" },
              [
                _c("pv-detail-one", {
                  attrs: { product: _vm.product, "is-product-nav": false }
                })
              ],
              1
            ),
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
        : _vm._e()
    ]
  )
}
var staticRenderFns = [
  function() {
    var _vm = this
    var _h = _vm.$createElement
    var _c = _vm._self._c || _h
    return _c("div", { staticClass: "skel-group" }, [
      _c("div", { staticClass: "col-md-6 summary-before" }),
      _vm._v(" "),
      _c("div", { staticClass: "col-md-6 summary entry-summary" })
    ])
  }
]
render._withStripped = true



/***/ })

}]);