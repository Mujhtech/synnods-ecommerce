<template>
  <div @click="hideMobileSearch">
    <div class="page-wrapper">
      <div class="top-notice p-0">
        <pv-carousel
          class="info-boxes-slider"
          :options="topBarSlider"
          :class="{ 'd-none': isHide }"
        >
          <div class="info-box info-box-icon-left swiper-slide">
            <i class="icon-shipping"></i>

            <div class="info-box-content">
              <h4>Free Shipping on Orders Over $99</h4>
            </div>
          </div>

          <div class="info-box info-box-icon-left bg-dark swiper-slide">
            <i class="icon-money"></i>

            <div class="info-box-content">
              <h4>Up to 40% OFF on Selected Items</h4>
            </div>
          </div>

          <div class="info-box info-box-icon-left swiper-slide">
            <i class="icon-secure-payment"></i>

            <div class="info-box-content">
              <h4>100% Secure Payment</h4>
            </div>
          </div>
        </pv-carousel>
      </div>

      <pv-header></pv-header>
      <router-view></router-view>
      <pv-footer></pv-footer>

      <div class="wishlist-popup">
        <div class="wishlist-popup-msg">Product added!</div>
      </div>
    </div>

    <pv-cart-popup class="minipopup-area"></pv-cart-popup>

    <a
      id="scroll-top"
      href="javascript:;"
      title="Top"
      role="button"
      @click="scrollToTop"
    >
      <i class="icon-angle-up"></i>
    </a>

    <pv-mobile-menu></pv-mobile-menu>

    <pv-sticky-footer></pv-sticky-footer>
  </div>
</template>

<script>
import PvHeader from './components/common/PvHeader';
import PvFooter from './components/common/PvFooter';
import PvCartPopup from './components/common/partials/PvCartPopup';
import PvMobileMenu from './components/common/partials/PvMobileMenu';
import PvStickyFooter from './components/common/partials/PvStickyFooter';
import PvCarousel from './components/features/PvCarousel';
import {
	scrollTopHandler,
	stickyHeaderHandler,
	resizeHandler,
	showScrollTopHandler,
	scrollTo,
	setCookie,
	getCookie,
	scrollTop
} from './utils';
import { topBarSlider } from './utils/data/carousel';
export default {
  name: "App",
  components: {
    PvHeader,
    PvFooter,
    PvCartPopup,
    PvMobileMenu,
    PvStickyFooter,
    PvCarousel,
  },
  data: function () {
    return {
      isHide: false,
      topBarSlider: topBarSlider,
    };
  },
  watch: {
    $route: function () {
      resizeHandler();
      this.$modal.hideAll();
    },
  },
  mounted: function () {
    window.addEventListener("scroll", stickyHeaderHandler, {
      passive: true,
    });
    window.addEventListener("scroll", showScrollTopHandler, {
      passive: true,
    });
    window.addEventListener("resize", stickyHeaderHandler);
    window.addEventListener("resize", resizeHandler);
  },
  destroyed: function () {
    window.removeEventListener("scroll", showScrollTopHandler, {
      passive: true,
    });
    window.removeEventListener("scroll", stickyHeaderHandler, {
      passive: true,
    });
    window.removeEventListener("resize", stickyHeaderHandler);
    window.removeEventListener("resize", resizeHandler);
  },
  methods: {
    scrollToTop: function () {
      scrollTop(false, 70);
    },
    hideMobileSearch: function () {
      if (document.querySelector(".header-search")) {
        let headerSearch = document.querySelectorAll(".header-search");

        headerSearch.forEach((item) => {
          item.classList.remove("show");
          item.querySelector(".header-search-wrapper").classList.remove("show");
        });
      }
    },
  },
};
</script>
