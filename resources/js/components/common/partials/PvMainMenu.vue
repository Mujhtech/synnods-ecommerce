<template>
  <nav class="main-nav d-none d-lg-flex flex-wrap">
    <div class="menu-depart" :class="{ 'show-always': isHome }">
      <a href="javascript:;" class="toggle"
        ><i class="fas fa-bars"></i>Shop by Category</a
      >
      <div class="submenu">
        <router-link :to="{ path: '/' }"
          ><!--<i class="icon-category-home"></i>-->Home</router-link
        >

        <router-link
          :to="{ path: '/shop', query: { category: category.slug } }"
          v-for="(category, index) in categories"
          :key="'header-cat-' + index"
          :class="{ active: category.slug === currentCategory }"
          ><!--<i class="icon-category-electronics"></i
          >-->{{ category.name }}</router-link
        >

        <router-link :to="{ path: '/shop' }"
          >VIEW ALL <i class="icon-angle-right"></i
        ></router-link>
      </div>
    </div>

    <ul class="menu main-menu menu-arrow">
      <li>
        <router-link to="/">Home</router-link>
      </li>

      <li>
        <router-link
          to="/vendor"
          :class="{ active: $route.path.indexOf('/vendor') > -1 }"
          >Vendors</router-link
        >
      </li>

      <li>
        <router-link
          to="/shop"
          class="sub-menu-link menu-with-ul"
          :class="{ active: $route.path.indexOf('/shop') > -1 }"
          >Categories</router-link
        >

        <div class="megamenu megamenu-fixed-width megamenu-2cols">
          <div class="row">
            <div class="col-lg-6">
              <ul class="submenu">
                <li v-for="(item, index) in categories" :key="'cat-' + index">
                  <router-link :to="item.slug">
                    {{ item.name }}
                    <span class="tip tip-hot" v-if="item.hot">Hot</span>
                  </router-link>
                </li>
              </ul>
            </div>

            <div class="col-lg-6 p-0">
              <div class="menu-banner">
                <figure>
                  <img
                    :src="'/assets/images/menu-banner.jpg'"
                    alt="Menu banner"
                    width="300"
                    height="300"
                  />
                </figure>
                <div class="banner-content">
                  <h4>
                    <span class>UP TO</span>
                    <br />
                    <b class>50%</b>
                    <i>OFF</i>
                  </h4>
                  <router-link to="/shop" class="btn btn-sm btn-dark"
                    >SHOP NOW</router-link
                  >
                </div>
              </div>
            </div>
          </div>
        </div>
      </li>
      <li>
        <router-link
          to="/blog"
          :class="{ active: $route.path.indexOf('/pages/blog') > -1 }"
          >Blog</router-link
        >
      </li>
      <li>
        <router-link to="/about-us">About Us</router-link>
      </li>
      <li>
        <router-link to="/contact-us">Contact Us</router-link>
      </li>
    </ul>
  </nav>
</template>

<script>
import { mainMenu } from "../../../utils/data/menu";
import { headerCats } from "../../../utils/data/shop";

export default {
  data: function () {
    return {
      mainMenu: mainMenu,
      headerCats: headerCats,
    };
  },
  props: {
    categories: Array,
  },
  computed: {
    isPageItemActived: function () {
      let exItems = ["blog", "about-us", "contact-us"];

      if (
        this.$route.path.includes("/pages") &&
        exItems.findIndex((item) => this.$route.path.includes(item)) === -1
      ) {
        return true;
      }

      return false;
    },
    isHome: function () {
      if (this.$route.path === "/") return true;
      return false;
    },
    currentCategory: function () {
      if (this.$route.query && this.$route.query.category)
        return this.$route.query.category;
      return "";
    },
  },
};
</script>