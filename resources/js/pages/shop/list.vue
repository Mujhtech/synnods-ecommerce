<template>
  <main class="main skeleton-body home-page">
    <pv-shop-banner></pv-shop-banner>

    <div class="container">
      <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <router-link to="/"> Home </router-link>
          </li>
          <li class="breadcrumb-item active">Shop</li>
        </ol>
      </nav>

      <div class="row">
        <div class="col-lg-9">
          <pv-product-list-one
            :category-list="categoryList"
            :items-per-row="1"
          ></pv-product-list-one>
        </div>

        <div class="sidebar-overlay" @click="hideSidebar"></div>
        <aside
          class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar"
          sticky-container
        >
          <div v-sticky="isSticky" sticky-offset="{top: 75}">
            <pv-sidebar-filter-one
              :category-list="categoryList"
              :featured-products="featuredProducts"
              v-if="featuredProducts.length > 0"
            ></pv-sidebar-filter-one>

            <div class="sidebar-content skeleton-body" v-else>
              <aside class="widget"></aside>
              <aside class="widget"></aside>
              <aside class="widget"></aside>
            </div>
          </div>
        </aside>
      </div>
    </div>

    <div class="mb-4"></div>
  </main>
</template>

<script>
import { VueTreeList, Tree } from "vue-tree-list";
import Sticky from "vue-sticky-directive";
import PvShopBanner from "../../components/partials/shop/PvShopBanner";
import PvSidebarFilterOne from "../../components/partials/shop/sidebar-filter/PvSidebarFilterOne";
import PvProductListOne from "../../components/partials/shop/product-list/PvProductListOne";
import * as catService from "../../services/category";
import { fetchProduct } from "../../services/product";

export default {
  metaInfo: {
    title: "Shop",
    titleTemplate: "%s - Synoods Ecommerce",
  },
  directives: {
    Sticky,
  },
  components: {
    PvSidebarFilterOne,
    PvProductListOne,
    PvShopBanner,
  },
  data: function () {
    return {
      categoryList: [],
      featuredProducts: [],
      isSticky: false,
    };
  },
  mounted: function () {
    this.getCategoryLists();
    this.getProduct();
    this.resizeHandler();
    window.addEventListener("resize", this.resizeHandler, {
      passive: true,
    });
  },
  destroyed: function () {
    window.removeEventListener("resize", this.resizeHandler);
  },
  methods: {
    getCategoryLists: async function () {
      try {
        const response = await catService.category();
        this.categoryList = response.data.data.data;
        //console.log(response);
      } catch (err) {
        console.log(err.response);
      }
    },
    getProduct: async function () {
      try {
        const response = await fetchProduct();
        this.featuredProducts = response.data.data.data;
        //console.log(response);
      } catch (err) {
        console.log(err.response);
      }
    },
    resizeHandler: function () {
      this.isSticky = window.innerWidth > 991 ? true : false;
    },
    hideSidebar: function () {
      document.querySelector("body").classList.remove("sidebar-opened");
    },
  },
};
</script>