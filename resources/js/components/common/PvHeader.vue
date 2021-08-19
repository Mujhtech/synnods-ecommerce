<template>
  <header class="header">
    <div class="header-middle sticky-header mobile-sticky">
      <div class="container">
        <div class="header-left">
          <router-link to="/" class="logo" style="max-width: 200px !important">
            <img
              src="https://havybucket.fra1.cdn.digitaloceanspaces.com/faadaakaa/faadaakaa/faadaakaa_logo.png"
              width="200px"
              height="40"
              alt="Porto Logo"
            />
          </router-link>

          <div class="header-col">
            <pv-header-search :categories="categories"></pv-header-search>

            <div class="tagcloud d-none d-lg-flex">
              <router-link :to="{ path: '/shop', query: { tag: 'clothes' } }"
                >clothes</router-link
              >
              <router-link :to="{ path: '/shop', query: { tag: 'fashion' } }"
                >fashion</router-link
              >
              <router-link :to="{ path: '/shop', query: { tag: 'hub' } }"
                >hub</router-link
              >
              <router-link :to="{ path: '/shop', query: { tag: 'shirt' } }"
                >shirt</router-link
              >
              <router-link :to="{ path: '/shop', query: { tag: 'skirt' } }"
                >skirt</router-link
              >
              <router-link :to="{ path: '/iphone', query: { tag: 'iphone' } }"
                >iphone</router-link
              >
              <router-link :to="{ path: '/shop', query: { tag: 'sweater' } }"
                >sweater</router-link
              >
            </div>
          </div>
        </div>

        <div class="header-right ml-0 ml-lg-auto">
          <div v-if="!isLoggedIn" style="margin-left:10px;margin-right:10px;">
            <router-link to="/auth/login">Login</router-link> |
            <router-link to="/auth/register">Register</router-link>
          </div>
          <router-link
            to="/account"
            v-if="isLoggedIn"
            class="header-icon d-md-block d-none mr-0"
          >
            <div class="header-user">
              <img
                v-if="image"
                style="border-radius: 50px; width: 40px; margin-right: 10px"
                :src="`${baseUrl}${avatar}`"
              />
              <img
                v-else
                style="border-radius: 50px; width: 40px; margin-right: 10px"
                :src="`${avatar}`"
              />
              <div class="header-userinfo">
                <span class="d-inline-block line-height-1 ls-10"
                  >Hello {{ fullname }}!</span
                >
                <h4 class="font1 mb-0">My Account</h4>
              </div>
            </div>
          </router-link>

          <router-link to="/wishlist" class="header-icon" title="wishlist">
            <i class="icon-wishlist-2"></i>
          </router-link>

          <pv-cart-menu></pv-cart-menu>
        </div>
      </div>
    </div>

    <div class="header-bottom sticky-header desktop-sticky">
      <div class="container">
        <div class="header-center">
          <button
            class="mobile-menu-toggler"
            type="button"
            @click="showMobileMenu"
          >
            <i class="fas fa-bars"></i>
          </button>

          <pv-main-menu :categories="categories"></pv-main-menu>

          <div class="header-dropdowns ml-auto">
            <a
              href="javascript:;"
              class="link-seller font-weight-bold d-none d-sm-block"
              >Become a Seller</a
            >

            <div class="header-dropdown">
              <a href="javascript:void(0)">{{ getCurrency }}</a>
              <div class="header-menu">
                <ul>
                  <li>
                    <a href="javascript:;" v-on:click="changeCurrency('NGN')"
                      >NGN</a
                    >
                  </li>
                  <li>
                    <a href="javascript:;" v-on:click="changeCurrency('USD')"
                      >USD</a
                    >
                  </li>
                </ul>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </header>
</template>

<script>
import PvMainMenu from "./partials/PvMainMenu";
import PvCartMenu from "./partials/PvCartMenu";
import PvHeaderSearch from "./partials/PvHeaderSearch";
import { mapActions, mapGetters } from "vuex";
import * as auth from "../../services/auth";
import { baseUrl } from "../../api";

document.querySelector("body").classList.add("loaded");

export default {
  components: {
    PvMainMenu,
    PvCartMenu,
    PvHeaderSearch,
  },
  props: {
    categories: Array,
  },
  data: function () {
    return {
      fullname: null,
      image: null,
      avatar: null,
      loggedIn: null,
      baseUrl: baseUrl,
    };
  },
  watch: {
  },
  created: function () {
    (this.fullname = auth.getUser() != null ? auth.getUser().full_name : null),
      (this.image = auth.getUser() != null ? auth.getUser().image : null),
      (this.avatar = auth.getUser() != null ? auth.getUser().avatar : null);
  },
  computed: {
    ...mapGetters("setting", ["getCurrency"]),
    ...mapGetters("user", ["isLoggedIn"]),
  },
  methods: {
    ...mapActions("setting", ["updateCurrency"]),
    ...mapActions("notification", ["addNotification"]),
    changeCurrency: function (cur) {
      console.log(localStorage.getItem("mod"));
      this.updateCurrency(cur);
      //this.addNotification(`Currency changed to ${cur}`);
    },
    openLoginModal: function () {
      this.$modal.show(
        () => import("../features/modal/PvLoginModal"),
        {},
        { width: "525", height: "auto", adaptive: true }
      );
    },
    showMobileMenu: function () {
      document.querySelector("body").classList.add("mmenu-active");
    },
    showMobileSearch: function (e) {
      let headerSearch = e.currentTarget.closest(".header-search");
      headerSearch.classList.add("show");
      headerSearch
        .querySelector(".header-search-wrapper")
        .classList.add("show");
    },
  },
};
</script>