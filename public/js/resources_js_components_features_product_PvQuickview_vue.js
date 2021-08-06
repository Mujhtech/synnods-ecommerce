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
/* harmony import */ var _partials_product_media_PvMediaOne__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../partials/product/media/PvMediaOne */ "./resources/js/components/partials/product/media/PvMediaOne.vue");
/* harmony import */ var _partials_product_detail_PvDetailOne__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../partials/product/detail/PvDetailOne */ "./resources/js/components/partials/product/detail/PvDetailOne.vue");
/* harmony import */ var _api__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../api */ "./resources/js/api/index.js");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
    PvMediaOne: _partials_product_media_PvMediaOne__WEBPACK_IMPORTED_MODULE_0__.default,
    PvDetailOne: _partials_product_detail_PvDetailOne__WEBPACK_IMPORTED_MODULE_1__.default
  },
  props: {
    slug: String
  },
  data: function data() {
    return {
      product: null,
      currentDemo: _api__WEBPACK_IMPORTED_MODULE_2__.currentDemo
    };
  },
  mounted: function mounted() {
    this.getProduct();
  },
  methods: {
    getProduct: function getProduct() {
      var _this = this;

      _api__WEBPACK_IMPORTED_MODULE_2__.default.get("".concat(_api__WEBPACK_IMPORTED_MODULE_2__.baseUrl, "/products/").concat(this.slug), {
        params: {
          demo: _api__WEBPACK_IMPORTED_MODULE_2__.currentDemo,
          'quick_view': true
        }
      }).then(function (response) {
        _this.product = response.data.product;
      })["catch"](function (error) {
        return {
          error: JSON.stringify(error)
        };
      });
    }
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/partials/product/PvProductNav.vue?vue&type=script&lang=js&":
/*!************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/partials/product/PvProductNav.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _api__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../api */ "./resources/js/api/index.js");
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
  props: {
    prevProduct: Object,
    nextProduct: Object
  },
  data: function data() {
    return {
      baseUrl: _api__WEBPACK_IMPORTED_MODULE_0__.baseUrl,
      type: 'default'
    };
  },
  mounted: function mounted() {
    var paths = this.$route.path.split('/');
    this.type = paths[paths.length - 2];
    var defaults = ['simple', 'variable', 'sale', 'featured'];
    if (defaults.includes(this.type)) this.type = 'default';
  }
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/partials/product/detail/PvDetailOne.vue?vue&type=script&lang=js&":
/*!******************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/partials/product/detail/PvDetailOne.vue?vue&type=script&lang=js& ***!
  \******************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var vuex__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! vuex */ "./node_modules/vuex/dist/vuex.esm.js");
/* harmony import */ var vue_slide_toggle__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! vue-slide-toggle */ "./node_modules/vue-slide-toggle/dist/vue-slide-toggle.es.js");
/* harmony import */ var _partials_product_PvProductNav__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ../../../partials/product/PvProductNav */ "./resources/js/components/partials/product/PvProductNav.vue");
/* harmony import */ var _features_PvQuantityInput__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../features/PvQuantityInput */ "./resources/js/components/features/PvQuantityInput.vue");
/* harmony import */ var _api__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../api */ "./resources/js/api/index.js");
function ownKeys(object, enumerableOnly) { var keys = Object.keys(object); if (Object.getOwnPropertySymbols) { var symbols = Object.getOwnPropertySymbols(object); if (enumerableOnly) { symbols = symbols.filter(function (sym) { return Object.getOwnPropertyDescriptor(object, sym).enumerable; }); } keys.push.apply(keys, symbols); } return keys; }

function _objectSpread(target) { for (var i = 1; i < arguments.length; i++) { var source = arguments[i] != null ? arguments[i] : {}; if (i % 2) { ownKeys(Object(source), true).forEach(function (key) { _defineProperty(target, key, source[key]); }); } else if (Object.getOwnPropertyDescriptors) { Object.defineProperties(target, Object.getOwnPropertyDescriptors(source)); } else { ownKeys(Object(source)).forEach(function (key) { Object.defineProperty(target, key, Object.getOwnPropertyDescriptor(source, key)); }); } } return target; }

function _defineProperty(obj, key, value) { if (key in obj) { Object.defineProperty(obj, key, { value: value, enumerable: true, configurable: true, writable: true }); } else { obj[key] = value; } return obj; }

//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
//
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
    VueSlideToggle: vue_slide_toggle__WEBPACK_IMPORTED_MODULE_0__.VueSlideToggle,
    PvProductNav: _partials_product_PvProductNav__WEBPACK_IMPORTED_MODULE_1__.default,
    PvQuantityInput: _features_PvQuantityInput__WEBPACK_IMPORTED_MODULE_2__.default
  },
  props: {
    product: Object,
    prevProduct: Object,
    nextProduct: Object,
    isProductNav: {
      type: Boolean,
      "default": true
    }
  },
  data: function data() {
    return {
      minPrice: 0,
      maxPrice: 0,
      qty: 1,
      currentIndex: 0,
      baseUrl: _api__WEBPACK_IMPORTED_MODULE_3__.baseUrl,
      vSizes: [],
      vColors: [],
      curSize: {
        name: null,
        text: null,
        image: null
      },
      curColor: {
        name: null,
        text: null,
        image: null
      },
      tIndex: 0,
      isShare: {
        type: Boolean,
        "default": true
      }
    };
  },
  watch: {
    $route: function $route() {
      this.getFlag();
    }
  },
  computed: _objectSpread(_objectSpread({}, (0,vuex__WEBPACK_IMPORTED_MODULE_4__.mapGetters)('wishlist', ['wishList'])), {}, {
    curIndex: function curIndex() {
      var _this = this;

      if (this.curColor.name !== null && this.vSizes.length === 0) {
        var index = this.product.variants.findIndex(function (item) {
          return item.colors[0].color_name === _this.curColor.name;
        });
        this.tIndex = index;
        return index;
      }

      if (this.curSize.name !== null && this.vColors.length === 0) {
        var _index = this.product.variants.findIndex(function (item) {
          return item.size[0].size_name === _this.curSize.name;
        });

        this.tIndex = _index;
        return _index;
      }

      if (this.curColor.name !== null && this.curSize.name !== null) {
        var _index2 = this.product.variants.findIndex(function (item) {
          return item.colors[0].color_name === _this.curColor.name && item.size[0].size_name === _this.curSize.name;
        });

        this.tIndex = _index2;
        return _index2;
      } else {
        return this.tIndex;
      }
    },
    isCartActive: function isCartActive() {
      if (this.product.stock < parseInt(this.qty)) return false;
      if (this.product.variants.length === 0) return true;
      if (this.curSize.name !== null && this.curColor.name !== null) return true;
      if (this.curColor.name !== null && this.vSizes.length === 0) return true;
      if (this.curSize.name !== null && this.vColors.length === 0) return true;
      return false;
    },
    isWishlisted: function isWishlisted() {
      var _this2 = this;

      if (this.wishList.findIndex(function (item) {
        return item.name === _this2.product.name;
      }) > -1) return true;
      return false;
    },
    isPriceShow: function isPriceShow() {
      if (this.curSize.name !== null && this.curColor.name !== null) return true;
      if (this.curColor.name !== null && this.vSizes.length === 0) return true;
      if (this.curSize.name !== null && this.vColors.length === 0) return true;
      return false;
    }
  }),
  created: function created() {
    this.getFlag();
  },
  mounted: function mounted() {
    var _this3 = this;

    if (this.product.variants && !this.product.price) {
      this.minPrice = this.product.variants[0].price;
      this.product.variants.forEach(function (item) {
        var itemPrice = item.sale_price ? item.sale_price : item.price;
        if (_this3.minPrice > itemPrice) _this3.minPrice = itemPrice;
        if (_this3.maxPrice < itemPrice) _this3.maxPrice = itemPrice;
      });
    }

    if (this.product.variants.length > 0) {
      if (this.product.variants[0].size[0]) this.product.variants.forEach(function (item) {
        if (_this3.vSizes.findIndex(function (vsize) {
          return vsize.name === item.size[0].size_name;
        }) === -1) _this3.vSizes.push({
          name: item.size[0].size_name,
          text: item.size[0].size,
          image: item.size[0].size_thumbnail
        });
      });
      if (this.product.variants[0].colors[0]) this.product.variants.forEach(function (item) {
        if (_this3.vColors.findIndex(function (vColor) {
          return vColor.name === item.colors[0].color_name;
        }) === -1) _this3.vColors.push({
          name: item.colors[0].color_name,
          text: item.colors[0].color,
          image: item.colors[0].color_thumbnail
        });
      });
    }
  },
  methods: _objectSpread(_objectSpread(_objectSpread({}, (0,vuex__WEBPACK_IMPORTED_MODULE_4__.mapActions)('cart', ['addToCart'])), (0,vuex__WEBPACK_IMPORTED_MODULE_4__.mapActions)('wishlist', ['addToWishlist'])), {}, {
    addCart: function addCart() {
      if (this.isCartActive) {
        var saledProduct;

        if (this.product.variants.length > 0) {
          var saledPrice;
          if (this.product.price) saledPrice = this.product.sale_price ? this.product.sale_price : this.product.price;else {
            saledPrice = this.product.variants[this.curIndex].sale_price ? this.product.variants[this.curIndex].sale_price : this.product.variants[this.curIndex].price;
          }
          var saledName;

          if (this.curColor.name && this.curSize.name) {
            saledName = this.curColor.name.charAt(0).toUpperCase() + this.curColor.name.slice(1) + ', ' + this.curSize.name;
          }

          if (!this.curColor.name) {
            saledName = this.curSize.name;
          }

          if (!this.curSize.name) {
            saledName = this.curColor.name.charAt(0).toUpperCase() + this.curColor.name.slice(1);
          }

          saledProduct = _objectSpread(_objectSpread({}, this.product), {}, {
            qty: this.qty,
            name: this.product.name + ' - ' + saledName,
            price: saledPrice
          });
        } else {
          saledProduct = _objectSpread(_objectSpread({}, this.product), {}, {
            qty: this.qty,
            price: this.product.sale_price ? this.product.sale_price : this.product.price
          });
        }

        this.addToCart({
          product: saledProduct
        });
      }
    },
    addWishlist: function addWishlist(e) {
      var _this4 = this;

      e.currentTarget.classList.add('load-more-overlay', 'loading');
      setTimeout(function () {
        _this4.addToWishlist({
          product: _this4.product
        });

        document.querySelector('.wishlist-popup').classList.add('active');
        setTimeout(function () {
          document.querySelector('.wishlist-popup').classList.remove('active');
        }, 1000);
      }, 1000);
    },
    isDisabled: function isDisabled(color, size) {
      if (!color.name || !size.name) return false;

      if (this.vSizes.length === 0) {
        return this.product.variants.findIndex(function (item) {
          return item.colors[0].color_name === color.name;
        }) === -1;
      }

      if (this.vColors.length === 0) {
        return this.product.variants.findIndex(function (item) {
          return item.size[0].size_name === size.name;
        }) === -1;
      }

      return this.product.variants.findIndex(function (item) {
        return item.colors[0].color_name === color.name && item.size[0].size_name === size.name;
      }) === -1;
    },
    toggleColorItem: function toggleColorItem(color) {
      if (!this.isDisabled(color, this.curSize)) {
        if (this.curColor === color) {
          this.curColor = {
            name: null,
            text: null,
            image: null
          };
        } else {
          this.curColor = color;
        }
      }
    },
    toggleSizeItem: function toggleSizeItem(size) {
      if (!this.isDisabled(this.curColor, size)) {
        if (this.curSize === size) {
          this.curSize = {
            name: null,
            text: null,
            image: null
          };
        } else {
          this.curSize = size;
        }
      }
    },
    resetValue: function resetValue() {
      this.curColor = {
        name: null,
        text: null,
        image: null
      };
      this.curSize = {
        name: null,
        text: null,
        image: null
      };
    },
    getFlag: function getFlag() {
      if (this.$route.path.includes('sticky-info')) this.isShare = false;
    },
    changeQty: function changeQty(quantity) {
      this.qty = quantity;
    }
  })
});

/***/ }),

/***/ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/partials/product/media/PvMediaOne.vue?vue&type=script&lang=js&":
/*!****************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/partials/product/media/PvMediaOne.vue?vue&type=script&lang=js& ***!
  \****************************************************************************************************************************************************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _features_PvCarousel__WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ../../../features/PvCarousel */ "./resources/js/components/features/PvCarousel.vue");
/* harmony import */ var vue_image_lightbox__WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! vue-image-lightbox */ "./node_modules/vue-image-lightbox/dist/vue-image-lightbox.min.js");
/* harmony import */ var vue_image_lightbox__WEBPACK_IMPORTED_MODULE_1___default = /*#__PURE__*/__webpack_require__.n(vue_image_lightbox__WEBPACK_IMPORTED_MODULE_1__);
/* harmony import */ var _api__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! ../../../../api */ "./resources/js/api/index.js");
/* harmony import */ var _utils_data_carousel__WEBPACK_IMPORTED_MODULE_3__ = __webpack_require__(/*! ../../../../utils/data/carousel */ "./resources/js/utils/data/carousel.js");
/* harmony import */ var vue_image_lightbox_dist_vue_image_lightbox_min_css__WEBPACK_IMPORTED_MODULE_4__ = __webpack_require__(/*! vue-image-lightbox/dist/vue-image-lightbox.min.css */ "./node_modules/vue-image-lightbox/dist/vue-image-lightbox.min.css");
function _toConsumableArray(arr) { return _arrayWithoutHoles(arr) || _iterableToArray(arr) || _unsupportedIterableToArray(arr) || _nonIterableSpread(); }

function _nonIterableSpread() { throw new TypeError("Invalid attempt to spread non-iterable instance.\nIn order to be iterable, non-array objects must have a [Symbol.iterator]() method."); }

function _unsupportedIterableToArray(o, minLen) { if (!o) return; if (typeof o === "string") return _arrayLikeToArray(o, minLen); var n = Object.prototype.toString.call(o).slice(8, -1); if (n === "Object" && o.constructor) n = o.constructor.name; if (n === "Map" || n === "Set") return Array.from(o); if (n === "Arguments" || /^(?:Ui|I)nt(?:8|16|32)(?:Clamped)?Array$/.test(n)) return _arrayLikeToArray(o, minLen); }

function _iterableToArray(iter) { if (typeof Symbol !== "undefined" && iter[Symbol.iterator] != null || iter["@@iterator"] != null) return Array.from(iter); }

function _arrayWithoutHoles(arr) { if (Array.isArray(arr)) return _arrayLikeToArray(arr); }

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





/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = ({
  components: {
    PvCarousel: _features_PvCarousel__WEBPACK_IMPORTED_MODULE_0__.default,
    LightBox: (vue_image_lightbox__WEBPACK_IMPORTED_MODULE_1___default())
  },
  props: {
    product: Object,
    isMagnify: {
      type: Boolean,
      "default": true
    }
  },
  data: function data() {
    return {
      baseSlider1: _utils_data_carousel__WEBPACK_IMPORTED_MODULE_3__.baseSlider1,
      baseSlider2: _utils_data_carousel__WEBPACK_IMPORTED_MODULE_3__.baseSlider2,
      baseUrl: _api__WEBPACK_IMPORTED_MODULE_2__.baseUrl
    };
  },
  computed: {
    lightBoxMedia: function lightBoxMedia() {
      return this.product.large_pictures.reduce(function (acc, cur) {
        return [].concat(_toConsumableArray(acc), [{
          src: "".concat(_api__WEBPACK_IMPORTED_MODULE_2__.baseUrl).concat(cur.url),
          thumb: "".concat(_api__WEBPACK_IMPORTED_MODULE_2__.baseUrl).concat(cur.url)
        }]);
      }, []);
    }
  },
  mounted: function mounted() {
    var _this = this;

    if (this.product !== null) {
      this.$nextTick(function () {
        var self = _this;

        _this.$refs.mediaRef.swiper.on("transitionStart", function () {
          var activeIndex = self.$refs.mediaRef.swiper.activeIndex;
          self.$refs.thumbRef.swiper.slideTo(activeIndex);
          self.$refs.thumbRef.swiper.$el.find(".swiper-wrapper").find(".swiper-dot.active")[0].classList.remove("active");
          self.$refs.thumbRef.swiper.$el.find(".swiper-wrapper").find(".swiper-dot")[activeIndex].classList.add("active");
        });
      });
    }
  },
  methods: {
    activeThumbItem: function activeThumbItem(index, e) {
      // remove active class from previous active item
      e.currentTarget.parentNode.querySelector(".swiper-dot.active").classList.remove("active"); // active current selected item

      e.currentTarget.classList.add("active"); // translate thumb carousel

      this.$refs.mediaRef.swiper.slideTo(index);
    },
    openLightBox: function openLightBox() {
      this.$refs.lightBox.showImage(this.$refs.mediaRef.swiper.activeIndex);
    }
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

/***/ "./resources/js/components/partials/product/PvProductNav.vue":
/*!*******************************************************************!*\
  !*** ./resources/js/components/partials/product/PvProductNav.vue ***!
  \*******************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _PvProductNav_vue_vue_type_template_id_375092bc___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./PvProductNav.vue?vue&type=template&id=375092bc& */ "./resources/js/components/partials/product/PvProductNav.vue?vue&type=template&id=375092bc&");
/* harmony import */ var _PvProductNav_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./PvProductNav.vue?vue&type=script&lang=js& */ "./resources/js/components/partials/product/PvProductNav.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _PvProductNav_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _PvProductNav_vue_vue_type_template_id_375092bc___WEBPACK_IMPORTED_MODULE_0__.render,
  _PvProductNav_vue_vue_type_template_id_375092bc___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/partials/product/PvProductNav.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/partials/product/detail/PvDetailOne.vue":
/*!*************************************************************************!*\
  !*** ./resources/js/components/partials/product/detail/PvDetailOne.vue ***!
  \*************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _PvDetailOne_vue_vue_type_template_id_39e7395a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./PvDetailOne.vue?vue&type=template&id=39e7395a& */ "./resources/js/components/partials/product/detail/PvDetailOne.vue?vue&type=template&id=39e7395a&");
/* harmony import */ var _PvDetailOne_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./PvDetailOne.vue?vue&type=script&lang=js& */ "./resources/js/components/partials/product/detail/PvDetailOne.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _PvDetailOne_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _PvDetailOne_vue_vue_type_template_id_39e7395a___WEBPACK_IMPORTED_MODULE_0__.render,
  _PvDetailOne_vue_vue_type_template_id_39e7395a___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/partials/product/detail/PvDetailOne.vue"
/* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (component.exports);

/***/ }),

/***/ "./resources/js/components/partials/product/media/PvMediaOne.vue":
/*!***********************************************************************!*\
  !*** ./resources/js/components/partials/product/media/PvMediaOne.vue ***!
  \***********************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _PvMediaOne_vue_vue_type_template_id_7c92eff5___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! ./PvMediaOne.vue?vue&type=template&id=7c92eff5& */ "./resources/js/components/partials/product/media/PvMediaOne.vue?vue&type=template&id=7c92eff5&");
/* harmony import */ var _PvMediaOne_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__ = __webpack_require__(/*! ./PvMediaOne.vue?vue&type=script&lang=js& */ "./resources/js/components/partials/product/media/PvMediaOne.vue?vue&type=script&lang=js&");
/* harmony import */ var _node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__ = __webpack_require__(/*! !../../../../../../node_modules/vue-loader/lib/runtime/componentNormalizer.js */ "./node_modules/vue-loader/lib/runtime/componentNormalizer.js");





/* normalize component */
;
var component = (0,_node_modules_vue_loader_lib_runtime_componentNormalizer_js__WEBPACK_IMPORTED_MODULE_2__.default)(
  _PvMediaOne_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_1__.default,
  _PvMediaOne_vue_vue_type_template_id_7c92eff5___WEBPACK_IMPORTED_MODULE_0__.render,
  _PvMediaOne_vue_vue_type_template_id_7c92eff5___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns,
  false,
  null,
  null,
  null
  
)

/* hot reload */
if (false) { var api; }
component.options.__file = "resources/js/components/partials/product/media/PvMediaOne.vue"
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

/***/ "./resources/js/components/partials/product/PvProductNav.vue?vue&type=script&lang=js&":
/*!********************************************************************************************!*\
  !*** ./resources/js/components/partials/product/PvProductNav.vue?vue&type=script&lang=js& ***!
  \********************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PvProductNav_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./PvProductNav.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/partials/product/PvProductNav.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PvProductNav_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/components/partials/product/detail/PvDetailOne.vue?vue&type=script&lang=js&":
/*!**************************************************************************************************!*\
  !*** ./resources/js/components/partials/product/detail/PvDetailOne.vue?vue&type=script&lang=js& ***!
  \**************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PvDetailOne_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./PvDetailOne.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/partials/product/detail/PvDetailOne.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PvDetailOne_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

/***/ }),

/***/ "./resources/js/components/partials/product/media/PvMediaOne.vue?vue&type=script&lang=js&":
/*!************************************************************************************************!*\
  !*** ./resources/js/components/partials/product/media/PvMediaOne.vue?vue&type=script&lang=js& ***!
  \************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "default": () => (__WEBPACK_DEFAULT_EXPORT__)
/* harmony export */ });
/* harmony import */ var _node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PvMediaOne_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!../../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./PvMediaOne.vue?vue&type=script&lang=js& */ "./node_modules/babel-loader/lib/index.js??clonedRuleSet-5[0].rules[0].use[0]!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/partials/product/media/PvMediaOne.vue?vue&type=script&lang=js&");
 /* harmony default export */ const __WEBPACK_DEFAULT_EXPORT__ = (_node_modules_babel_loader_lib_index_js_clonedRuleSet_5_0_rules_0_use_0_node_modules_vue_loader_lib_index_js_vue_loader_options_PvMediaOne_vue_vue_type_script_lang_js___WEBPACK_IMPORTED_MODULE_0__.default); 

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

/***/ "./resources/js/components/partials/product/PvProductNav.vue?vue&type=template&id=375092bc&":
/*!**************************************************************************************************!*\
  !*** ./resources/js/components/partials/product/PvProductNav.vue?vue&type=template&id=375092bc& ***!
  \**************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PvProductNav_vue_vue_type_template_id_375092bc___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PvProductNav_vue_vue_type_template_id_375092bc___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PvProductNav_vue_vue_type_template_id_375092bc___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./PvProductNav.vue?vue&type=template&id=375092bc& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/partials/product/PvProductNav.vue?vue&type=template&id=375092bc&");


/***/ }),

/***/ "./resources/js/components/partials/product/detail/PvDetailOne.vue?vue&type=template&id=39e7395a&":
/*!********************************************************************************************************!*\
  !*** ./resources/js/components/partials/product/detail/PvDetailOne.vue?vue&type=template&id=39e7395a& ***!
  \********************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PvDetailOne_vue_vue_type_template_id_39e7395a___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PvDetailOne_vue_vue_type_template_id_39e7395a___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PvDetailOne_vue_vue_type_template_id_39e7395a___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./PvDetailOne.vue?vue&type=template&id=39e7395a& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/partials/product/detail/PvDetailOne.vue?vue&type=template&id=39e7395a&");


/***/ }),

/***/ "./resources/js/components/partials/product/media/PvMediaOne.vue?vue&type=template&id=7c92eff5&":
/*!******************************************************************************************************!*\
  !*** ./resources/js/components/partials/product/media/PvMediaOne.vue?vue&type=template&id=7c92eff5& ***!
  \******************************************************************************************************/
/***/ ((__unused_webpack_module, __webpack_exports__, __webpack_require__) => {

__webpack_require__.r(__webpack_exports__);
/* harmony export */ __webpack_require__.d(__webpack_exports__, {
/* harmony export */   "render": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PvMediaOne_vue_vue_type_template_id_7c92eff5___WEBPACK_IMPORTED_MODULE_0__.render),
/* harmony export */   "staticRenderFns": () => (/* reexport safe */ _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PvMediaOne_vue_vue_type_template_id_7c92eff5___WEBPACK_IMPORTED_MODULE_0__.staticRenderFns)
/* harmony export */ });
/* harmony import */ var _node_modules_vue_loader_lib_loaders_templateLoader_js_vue_loader_options_node_modules_vue_loader_lib_index_js_vue_loader_options_PvMediaOne_vue_vue_type_template_id_7c92eff5___WEBPACK_IMPORTED_MODULE_0__ = __webpack_require__(/*! -!../../../../../../node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!../../../../../../node_modules/vue-loader/lib/index.js??vue-loader-options!./PvMediaOne.vue?vue&type=template&id=7c92eff5& */ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/partials/product/media/PvMediaOne.vue?vue&type=template&id=7c92eff5&");


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



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/partials/product/PvProductNav.vue?vue&type=template&id=375092bc&":
/*!*****************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/partials/product/PvProductNav.vue?vue&type=template&id=375092bc& ***!
  \*****************************************************************************************************************************************************************************************************************************************/
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
  return _c("div", { staticClass: "product-nav" }, [
    _c(
      "div",
      { staticClass: "product-prev", class: { disabled: !_vm.prevProduct } },
      [
        _vm.prevProduct
          ? _c(
              "router-link",
              {
                key: "toPrevProduct",
                attrs: {
                  to: "/product/" + _vm.type + "/" + _vm.prevProduct.slug
                }
              },
              [
                _c("span", { staticClass: "product-link" }),
                _vm._v(" "),
                _c("span", { staticClass: "product-popup" }, [
                  _c("span", { staticClass: "box-content" }, [
                    _c("img", {
                      staticStyle: { "padding-top": "0px" },
                      attrs: {
                        alt: "product",
                        width: _vm.prevProduct.width,
                        height: _vm.prevProduct.height,
                        src: "" + _vm.baseUrl + _vm.prevProduct.pictures[0].url
                      }
                    }),
                    _vm._v(" "),
                    _c("span", [_vm._v(_vm._s(_vm.prevProduct.name))])
                  ])
                ])
              ]
            )
          : _c("a", { attrs: { href: "javascript:;" } }, [
              _c("span", { staticClass: "product-link" })
            ])
      ],
      1
    ),
    _vm._v(" "),
    _c(
      "div",
      { staticClass: "product-next", class: { disabled: !_vm.nextProduct } },
      [
        _vm.nextProduct
          ? _c(
              "router-link",
              {
                key: "toNexProduct",
                attrs: {
                  to: "/product/" + _vm.type + "/" + _vm.nextProduct.slug
                }
              },
              [
                _c("span", { staticClass: "product-link" }),
                _vm._v(" "),
                _c("span", { staticClass: "product-popup" }, [
                  _c("span", { staticClass: "box-content" }, [
                    _c("img", {
                      staticStyle: { "padding-top": "0px" },
                      attrs: {
                        alt: "product",
                        width: _vm.nextProduct.width,
                        height: _vm.nextProduct.height,
                        src: "" + _vm.baseUrl + _vm.nextProduct.pictures[0].url
                      }
                    }),
                    _vm._v(" "),
                    _c("span", [_vm._v(_vm._s(_vm.nextProduct.name))])
                  ])
                ])
              ]
            )
          : _c("a", { attrs: { href: "javascript:;" } }, [
              _c("span", { staticClass: "product-link" })
            ])
      ],
      1
    )
  ])
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/partials/product/detail/PvDetailOne.vue?vue&type=template&id=39e7395a&":
/*!***********************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/partials/product/detail/PvDetailOne.vue?vue&type=template&id=39e7395a& ***!
  \***********************************************************************************************************************************************************************************************************************************************/
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
    [
      _c("h1", { staticClass: "product-title" }, [
        _vm._v(_vm._s(_vm.product.name))
      ]),
      _vm._v(" "),
      _vm.isProductNav
        ? _c("pv-product-nav", {
            attrs: {
              "prev-product": _vm.prevProduct,
              "next-product": _vm.nextProduct
            }
          })
        : _vm._e(),
      _vm._v(" "),
      _c("div", { staticClass: "ratings-container" }, [
        _c("div", { staticClass: "product-ratings" }, [
          _c("span", {
            staticClass: "ratings",
            style: "width:" + _vm.product.ratings * 20 + "%"
          }),
          _vm._v(" "),
          _c("span", { staticClass: "tooltiptext tooltip-top" }, [
            _vm._v(_vm._s(_vm._f("priceFormat")(_vm.product.ratings)))
          ])
        ]),
        _vm._v(" "),
        _vm.product.reviews > 0
          ? _c(
              "a",
              { staticClass: "rating-link", attrs: { href: "javascript:;" } },
              [_vm._v("( " + _vm._s(_vm.product.reviews) + " Reviews )")]
            )
          : _c(
              "a",
              { staticClass: "rating-link", attrs: { href: "javascript:;" } },
              [_vm._v("( There is no review yet. )")]
            )
      ]),
      _vm._v(" "),
      _c("hr", { staticClass: "short-divider" }),
      _vm._v(" "),
      _vm.product.price
        ? _c(
            "div",
            { key: "singlePrice", staticClass: "price-box" },
            [
              !_vm.product.is_sale
                ? [
                    _c("span", { staticClass: "new-price" }, [
                      _vm._v(
                        "$" + _vm._s(_vm._f("priceFormat")(_vm.product.price))
                      )
                    ])
                  ]
                : [
                    _c("span", { staticClass: "new-price" }, [
                      _vm._v(
                        "$" +
                          _vm._s(_vm._f("priceFormat")(_vm.product.sale_price))
                      )
                    ]),
                    _vm._v(" "),
                    _c("span", { staticClass: "old-price" }, [
                      _vm._v(
                        "$" + _vm._s(_vm._f("priceFormat")(_vm.product.price))
                      )
                    ])
                  ]
            ],
            2
          )
        : _c(
            "div",
            { staticClass: "price-box" },
            [
              _vm.minPrice !== _vm.maxPrice
                ? [
                    _c("span", { staticClass: "new-price" }, [
                      _vm._v(
                        "$" +
                          _vm._s(_vm._f("priceFormat")(_vm.minPrice)) +
                          " – $" +
                          _vm._s(_vm._f("priceFormat")(_vm.maxPrice))
                      )
                    ])
                  ]
                : [
                    _c("span", { staticClass: "new-price" }, [
                      _vm._v("$" + _vm._s(_vm._f("priceFormat")(_vm.minPrice)))
                    ])
                  ]
            ],
            2
          ),
      _vm._v(" "),
      _vm.product.short_description
        ? _c("div", { staticClass: "product-desc" }, [
            _c("p", [_vm._v(_vm._s(_vm.product.short_description))])
          ])
        : _vm._e(),
      _vm._v(" "),
      _c("ul", { staticClass: "single-info-list" }, [
        _vm.product.sku
          ? _c("li", [
              _vm._v("\n\t\t\tSKU:\n\t\t\t"),
              _c("strong", [_vm._v(_vm._s(_vm.product.sku))])
            ])
          : _vm._e(),
        _vm._v(" "),
        _c("li", [
          _vm._v("\n\t\t\tCATEGORY:\n\t\t\t"),
          _c(
            "strong",
            _vm._l(_vm.product.product_categories, function(item, index) {
              return _c(
                "nuxt-link",
                {
                  key: "product-category-" + index,
                  staticClass: "product-category",
                  attrs: {
                    to: { path: "/shop", query: { category: item.slug } }
                  }
                },
                [
                  _vm._v("\n\t\t\t\t\t" + _vm._s(item.name) + "\n\t\t\t\t\t"),
                  index < _vm.product.product_categories.length - 1
                    ? [_vm._v(",")]
                    : _vm._e()
                ],
                2
              )
            }),
            1
          )
        ]),
        _vm._v(" "),
        _vm.product.product_tags.length > 0
          ? _c("li", [
              _vm._v("\n\t\t\tTAGS:\n\t\t\t"),
              _c(
                "strong",
                _vm._l(_vm.product.product_tags, function(item, index) {
                  return _c(
                    "nuxt-link",
                    {
                      key: "product-category-" + index,
                      staticClass: "product-category",
                      attrs: {
                        to: { path: "/shop", query: { tag: item.slug } }
                      }
                    },
                    [
                      _vm._v(
                        "\n\t\t\t\t\t" + _vm._s(item.name) + "\n\t\t\t\t\t"
                      ),
                      index < _vm.product.product_tags.length - 1
                        ? [_vm._v(",")]
                        : _vm._e()
                    ],
                    2
                  )
                }),
                1
              )
            ])
          : _vm._e()
      ]),
      _vm._v(" "),
      _vm.product.variants.length > 0
        ? _c("div", { staticClass: "product-filters-container" }, [
            _vm.vColors.length > 0
              ? _c("div", { staticClass: "product-single-filter" }, [
                  _c("label", [_vm._v("Color:")]),
                  _vm._v(" "),
                  _c(
                    "ul",
                    {
                      staticClass:
                        "config-size-list config-color-list config-filter-list"
                    },
                    _vm._l(_vm.vColors, function(item, index) {
                      return _c(
                        "li",
                        {
                          key: "variant-color-" + index,
                          class: {
                            disabled: _vm.isDisabled(item, _vm.curSize),
                            active: _vm.curColor === item
                          },
                          on: {
                            click: function($event) {
                              return _vm.toggleColorItem(item)
                            }
                          }
                        },
                        [
                          item.image[0]
                            ? _c(
                                "a",
                                {
                                  key: "thumbForm",
                                  staticClass: "filter-thumb p-0",
                                  class: {
                                    disabled: _vm.isDisabled(item, _vm.curSize)
                                  },
                                  attrs: { href: "javascript:;" }
                                },
                                [
                                  _c("img", {
                                    attrs: {
                                      src: "" + _vm.baseUrl + item.image[0].url,
                                      width: item.image[0].width,
                                      height: item.image[0].height,
                                      alt: "color thumb"
                                    }
                                  })
                                ]
                              )
                            : _c("a", {
                                key: "colorForm",
                                staticClass: "filter-color border-0",
                                class: {
                                  disabled: _vm.isDisabled(item, _vm.curSize)
                                },
                                style: { backgroundColor: item.text },
                                attrs: { href: "javascript:;" }
                              })
                        ]
                      )
                    }),
                    0
                  )
                ])
              : _vm._e(),
            _vm._v(" "),
            _vm.vSizes.length > 0
              ? _c("div", { staticClass: "product-single-filter" }, [
                  _c("label", [_vm._v("Size:")]),
                  _vm._v(" "),
                  _c(
                    "ul",
                    { staticClass: "config-size-list" },
                    _vm._l(_vm.vSizes, function(item, index) {
                      return _c(
                        "li",
                        {
                          key: "variant-size-" + index,
                          class: {
                            disabled: _vm.isDisabled(_vm.curColor, item),
                            active: _vm.curSize === item
                          },
                          on: {
                            click: function($event) {
                              return _vm.toggleSizeItem(item)
                            }
                          }
                        },
                        [
                          item.image[0]
                            ? _c(
                                "a",
                                {
                                  key: "thumbSizeForm",
                                  staticClass: "filter-thumb p-0",
                                  class: {
                                    disabled: _vm.isDisabled(item, _vm.curSize)
                                  },
                                  attrs: { href: "javascript:;" }
                                },
                                [
                                  _c("img", {
                                    attrs: {
                                      src: "" + _vm.baseUrl + item.image[0].url,
                                      width: item.image[0].width,
                                      height: item.image[0].height,
                                      alt: "size thumb"
                                    }
                                  })
                                ]
                              )
                            : _c(
                                "a",
                                {
                                  staticClass:
                                    "d-flex align-items-center justify-content-center",
                                  class: {
                                    disabled: _vm.isDisabled(_vm.curColor, item)
                                  },
                                  attrs: { href: "javascript:;" }
                                },
                                [
                                  item.text
                                    ? [_vm._v(_vm._s(item.text))]
                                    : _c("img", {
                                        attrs: {
                                          src:
                                            "" + _vm.baseUrl + item.thumbnail[0]
                                        }
                                      })
                                ],
                                2
                              )
                        ]
                      )
                    }),
                    0
                  )
                ])
              : _vm._e(),
            _vm._v(" "),
            _c(
              "div",
              { staticClass: "product-single-filter" },
              [
                _c(
                  "vue-slide-toggle",
                  {
                    attrs: {
                      open:
                        _vm.curColor.name !== null || _vm.curSize.name !== null
                    }
                  },
                  [
                    _c("label"),
                    _vm._v(" "),
                    _c(
                      "a",
                      {
                        staticClass: "font1 text-uppercase clear-btn",
                        attrs: { href: "javascript:;" },
                        on: { click: _vm.resetValue }
                      },
                      [_vm._v("Clear")]
                    )
                  ]
                )
              ],
              1
            )
          ])
        : _vm._e(),
      _vm._v(" "),
      _c(
        "div",
        { staticClass: "product-action" },
        [
          _vm.product.variants.length > 0
            ? _c("vue-slide-toggle", { attrs: { open: _vm.isPriceShow } }, [
                _vm.minPrice === _vm.maxPrice || _vm.product.price
                  ? _c(
                      "div",
                      {
                        key: "samePrice",
                        staticClass: "price-box product-filtered-price"
                      },
                      [
                        _c("span", { staticClass: "product-stock" }, [
                          _vm._v(_vm._s(_vm.product.stock) + " in stock")
                        ])
                      ]
                    )
                  : _c(
                      "div",
                      { staticClass: "price-box product-filtered-price" },
                      [
                        _vm.product.variants[_vm.curIndex].sale_price
                          ? [
                              _c("del", { staticClass: "old-price" }, [
                                _c("span", [
                                  _vm._v(
                                    "$" +
                                      _vm._s(
                                        _vm._f("priceFormat")(
                                          _vm.product.variants[_vm.curIndex]
                                            .price
                                        )
                                      )
                                  )
                                ])
                              ]),
                              _vm._v(" "),
                              _c("span", { staticClass: "product-price" }, [
                                _vm._v(
                                  "$" +
                                    _vm._s(
                                      _vm._f("priceFormat")(
                                        _vm.product.variants[_vm.curIndex]
                                          .sale_price
                                      )
                                    )
                                )
                              ])
                            ]
                          : [
                              _c("span", { staticClass: "product-price" }, [
                                _vm._v(
                                  "$" +
                                    _vm._s(
                                      _vm._f("priceFormat")(
                                        _vm.product.variants[_vm.curIndex].price
                                      )
                                    )
                                )
                              ])
                            ]
                      ],
                      2
                    )
              ])
            : _vm._e(),
          _vm._v(" "),
          _c(
            "div",
            { staticClass: "product-single-qty" },
            [
              _c("pv-quantity-input", {
                attrs: { product: _vm.product, qty: 1 },
                on: { changeCurrentQty: _vm.changeQty }
              })
            ],
            1
          ),
          _vm._v(" "),
          _c(
            "a",
            {
              staticClass: "btn btn-dark add-cart mr-2",
              class: { disabled: !_vm.isCartActive },
              attrs: { href: "javascript:;", title: "Add to Cart" },
              on: { click: _vm.addCart }
            },
            [_vm._v("Add to Cart")]
          ),
          _vm._v(" "),
          _c(
            "nuxt-link",
            {
              staticClass: "btn btn-gray view-cart d-none",
              attrs: { to: "/pages/cart" }
            },
            [_vm._v("View cart")]
          )
        ],
        1
      ),
      _vm._v(" "),
      _c("hr", { staticClass: "divider mb-0 mt-0" }),
      _vm._v(" "),
      _c(
        "div",
        { staticClass: "product-single-share mb-3" },
        [
          _c("label", { staticClass: "sr-only" }, [_vm._v("Share:")]),
          _vm._v(" "),
          _vm.isShare
            ? _c("div", { staticClass: "social-icons mr-2" }, [
                _c("a", {
                  staticClass: "social-icon social-facebook icon-facebook",
                  attrs: { href: "javascript:;", title: "Facebook" }
                }),
                _vm._v(" "),
                _c("a", {
                  staticClass: "social-icon social-twitter icon-twitter",
                  attrs: { href: "javascript:;", title: "Twitter" }
                }),
                _vm._v(" "),
                _c("a", {
                  staticClass: "social-icon social-linkedin fab fa-linkedin-in",
                  attrs: { href: "javascript:;", title: "Linkedin" }
                }),
                _vm._v(" "),
                _c("a", {
                  staticClass: "social-icon social-gplus fab fa-google-plus-g",
                  attrs: { href: "javascript:;", title: "Google +" }
                }),
                _vm._v(" "),
                _c("a", {
                  staticClass: "social-icon social-mail icon-mail-alt",
                  attrs: { href: "javascript:;", title: "Mail" }
                })
              ])
            : _vm._e(),
          _vm._v(" "),
          _vm.isWishlisted
            ? _c(
                "nuxt-link",
                {
                  staticClass: "btn-icon-wish add-wishlist added-wishlist",
                  attrs: { to: "/pages/wishlist", title: "Go to Wishlist" }
                },
                [
                  _c("i", { staticClass: "icon-wishlist-2" }),
                  _vm._v(" "),
                  _c("span", [_vm._v("Go to Wishlist")])
                ]
              )
            : _vm._e(),
          _vm._v(" "),
          !_vm.isWishlisted
            ? _c(
                "a",
                {
                  staticClass: "btn-icon-wish add-wishlist",
                  attrs: { href: "javascript:;", title: "Add to Wishlist" },
                  on: {
                    click: function($event) {
                      return _vm.addWishlist($event)
                    }
                  }
                },
                [
                  _c("i", { staticClass: "icon-wishlist-2" }),
                  _vm._v(" "),
                  _c("span", [_vm._v("Add to Wishlist")])
                ]
              )
            : _vm._e()
        ],
        1
      )
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ }),

/***/ "./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/partials/product/media/PvMediaOne.vue?vue&type=template&id=7c92eff5&":
/*!*********************************************************************************************************************************************************************************************************************************************!*\
  !*** ./node_modules/vue-loader/lib/loaders/templateLoader.js??vue-loader-options!./node_modules/vue-loader/lib/index.js??vue-loader-options!./resources/js/components/partials/product/media/PvMediaOne.vue?vue&type=template&id=7c92eff5& ***!
  \*********************************************************************************************************************************************************************************************************************************************/
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
    [
      _c(
        "div",
        { staticClass: "product-slider-container" },
        [
          _c("div", { staticClass: "label-group" }, [
            _vm.product.is_hot
              ? _c("div", { staticClass: "product-label label-hot" }, [
                  _vm._v("HOT")
                ])
              : _vm._e(),
            _vm._v(" "),
            _vm.product.is_sale
              ? _c("div", { staticClass: "product-label label-sale" }, [
                  _vm._v("Sale")
                ])
              : _vm._e()
          ]),
          _vm._v(" "),
          _c(
            "PvCarousel",
            {
              ref: "mediaRef",
              staticClass: "product-single-carousel show-nav-hover",
              attrs: { options: _vm.baseSlider1 }
            },
            _vm._l(_vm.product.large_pictures, function(item) {
              return _c(
                "div",
                { key: item.name, staticClass: "swiper-slide" },
                [
                  _c("img", {
                    directives: [
                      {
                        name: "lazy",
                        rawName: "v-lazy",
                        value: "" + _vm.baseUrl + item.url,
                        expression: "`${baseUrl}${item.url}`"
                      }
                    ],
                    staticClass: "product-single-image",
                    attrs: {
                      width: item.width,
                      height: item.height,
                      alt: "lgPicture"
                    }
                  })
                ]
              )
            }),
            0
          ),
          _vm._v(" "),
          _vm.isMagnify
            ? _c(
                "span",
                {
                  staticClass: "prod-full-screen",
                  on: { click: _vm.openLightBox }
                },
                [_c("i", { staticClass: "icon-plus" })]
              )
            : _vm._e()
        ],
        1
      ),
      _vm._v(" "),
      _c(
        "PvCarousel",
        {
          ref: "thumbRef",
          staticClass: "prod-thumbnail swiper-dots show-nav-hover",
          attrs: { options: _vm.baseSlider2 }
        },
        _vm._l(_vm.product.pictures, function(item, index) {
          return _c(
            "div",
            {
              key: "media-one" + index,
              staticClass: "swiper-dot swiper-slide",
              class: { active: index === 0 },
              on: {
                click: function($event) {
                  return _vm.activeThumbItem(index, $event)
                }
              }
            },
            [
              _c("img", {
                directives: [
                  {
                    name: "lazy",
                    rawName: "v-lazy",
                    value: "" + _vm.baseUrl + item.url,
                    expression: "`${baseUrl}${item.url}`"
                  }
                ],
                attrs: {
                  width: item.width,
                  height: item.height,
                  alt: "product-thumbnail"
                }
              })
            ]
          )
        }),
        0
      ),
      _vm._v(" "),
      _c("light-box", {
        ref: "lightBox",
        attrs: { media: _vm.lightBoxMedia, "show-light-box": false }
      })
    ],
    1
  )
}
var staticRenderFns = []
render._withStripped = true



/***/ })

}]);