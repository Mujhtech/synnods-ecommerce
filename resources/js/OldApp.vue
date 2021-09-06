<template>
  <div @click="hideMobileSearch">
    <div class="page-wrapper">
      <div class="top-notice" :class="{ 'd-none': isHide }">
        <div
          class="
            container
            d-flex
            flex-wrap
            align-items-center
            justify-content-center
            text-center
          "
        >
          <img
            :src="'/images/header-item.png'"
            alt="Top Ads"
            width="237"
            height="49"
          />
          <div class="notice-content my-2">
            <h3 class="d-inline-block font1 text-secondary mb-0">
              PortoPlus X Pro Only
            </h3>
            <div class="d-inline-block">
              <span
                class="
                  d-inline-block
                  skew-box
                  product-price
                  font1
                  font-weight-bold
                  bg-secondary
                "
                >₦199</span
              >
              <span class="d-inline-block font1 old-price text-secondary mr-0"
                >₦299</span
              >
            </div>
          </div>
          <a
            href="javascript:;"
            v-on:click="doCopy('portoplusx')"
            class="btn btn-dark font1 ls-n-10 round-box my-2"
            >code: <strong>portoplusx</strong></a
          >
        </div>

        <button
          title="Close (Esc)"
          type="button"
          class="mfp-close"
          @click="hideTopNotice"
        >
          ×
        </button>
      </div>

      <pv-header :categories="categories"></pv-header>
      <router-view></router-view>
      <pv-footer></pv-footer>

      <div class="wishlist-popup">
        <div class="wishlist-popup-msg">Product added!</div>
      </div>
    </div>

    <pv-cart-popup class="minipopup-area"></pv-cart-popup>
    <pv-new-product class="minipopup-area"></pv-new-product>
    <pv-new-order class="minipopup-area"></pv-new-order>
    <pv-new-user class="minipopup-area"></pv-new-user>

    <a
      id="scroll-top"
      href="javascript:;"
      title="Top"
      role="button"
      @click="scrollToTop"
    >
      <i class="icon-angle-up"></i>
    </a>

    <pv-mobile-menu :categories="categories"></pv-mobile-menu>

    <pv-sticky-footer></pv-sticky-footer>
  </div>
</template>

<script>
import PvHeader from "./components/common/PvHeader";
import PvFooter from "./components/common/PvFooter";
import PvCartPopup from "./components/common/partials/PvCartPopup";
import PvNewProduct from "./components/common/partials/PvNewProduct";
import PvNewOrder from "./components/common/partials/PvNewOrder";
import PvNewUser from "./components/common/partials/PvNewUser";
import PvMobileMenu from "./components/common/partials/PvMobileMenu";
import PvStickyFooter from "./components/common/partials/PvStickyFooter";
import { mapActions } from "vuex";
import * as auth from "./services/auth";
import * as catService from "./services/category";
import {
  scrollTopHandler,
  stickyHeaderHandler,
  resizeHandler,
  showScrollTopHandler,
  scrollTo,
  setCookie,
  getCookie,
  scrollTop,
} from "./utils";

export default {
  components: {
    PvHeader,
    PvFooter,
    PvCartPopup,
    PvNewProduct,
    PvNewUser,
    PvNewOrder,
    PvMobileMenu,
    PvStickyFooter,
  },
  data: function () {
    return {
      isHide: false,
      categories: [],
    };
  },
  watch: {
    $route: function () {
      resizeHandler();
      this.$modal.hideAll();
      this.isHide = getCookie("topNotice");
    },
  },
  created: function () {
    this.isHide = getCookie("topNotice");
  },
  mounted: function () {
    this.fetchCategory();
    this.fetchUser();
    Echo.channel("NewProduct").listen(".new.product", (e) => {
      this.$notify({
        group: "newProduct",
        text: `has been added!`,
        data: e.product,
      });
    });
    Echo.channel("NewUser").listen(".new.user", (e) => {
      this.$notify({
        group: "newUser",
        text: `just joined!`,
        data: e.user,
      });
    });
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
    ...mapActions("user", ["userLogin", "userLogout"]),
    doCopy: function (text) {
      this.$copyText(text).then(
        function (e) {
          alert("Copied");
          console.log(e);
        },
        function (e) {
          console.log(e);
        }
      );
    },
    fetchCategory: async function () {
      try {
        const response = await catService.category();
        this.categories = response.data.data.data;
      } catch (err) {
        console.log(err.response);
      }
    },
    fetchUser: async function () {
      try {
        const response = await auth.getProfile();
        this.userLogin(response.data.data.user);
      } catch (err) {
        //if(!err.response) return;
        console.log(err.response);
        localStorage.removeItem("SYNECT");
        localStorage.removeItem("SYNECUS");
        this.userLogout({});
      }
    },
    scrollToTop: function () {
      scrollTop(false, 70);
    },
    hideTopNotice: function () {
      this.isHide = true;
      setCookie("topNotice", false);
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