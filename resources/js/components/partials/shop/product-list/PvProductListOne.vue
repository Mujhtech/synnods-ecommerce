<template>
  <div>
    <nav
      class="toolbox sticky-header mobile-sticky"
      data-start-top="500"
      data-offset-top="56"
      v-if="!products || (products && products.length > 0)"
      v-sticky
    >
      <div class="toolbox-left">
        <a
          href="javascript:;"
          class="sidebar-toggle"
          @click="showSidebarFilter"
        >
          <svg
            data-name="Layer 3"
            id="Layer_3"
            viewBox="0 0 32 32"
            xmlns="http://www.w3.org/2000/svg"
          >
            <line x1="15" x2="26" y1="9" y2="9" class="cls-1" />
            <line x1="6" x2="9" y1="9" y2="9" class="cls-1" />
            <line x1="23" x2="26" y1="16" y2="16" class="cls-1" />
            <line x1="6" x2="17" y1="16" y2="16" class="cls-1" />
            <line x1="17" x2="26" y1="23" y2="23" class="cls-1" />
            <line x1="6" x2="11" y1="23" y2="23" class="cls-1" />
            <path
              d="M14.5,8.92A2.6,2.6,0,0,1,12,11.5,2.6,2.6,0,0,1,9.5,8.92a2.5,2.5,0,0,1,5,0Z"
              class="cls-2"
            />
            <path
              d="M22.5,15.92a2.5,2.5,0,1,1-5,0,2.5,2.5,0,0,1,5,0Z"
              class="cls-2"
            />
            <path d="M21,16a1,1,0,1,1-2,0,1,1,0,0,1,2,0Z" class="cls-3" />
            <path
              d="M16.5,22.92A2.6,2.6,0,0,1,14,25.5a2.6,2.6,0,0,1-2.5-2.58,2.5,2.5,0,0,1,5,0Z"
              class="cls-2"
            />
          </svg>
          <span>Filter</span>
        </a>

        <div class="toolbox-item toolbox-sort" v-if="!isOffCanvas">
          <label>Sort By:</label>

          <div class="select-custom">
            <select
              name="orderby"
              class="form-control"
              v-model="orderBy"
              @change="getProducts"
            >
              <option value="default" selected="default">
                Default sorting
              </option>
              <option value="featured">Sort by popularity</option>
              <option value="rating">Sort by average rating</option>
              <option value="new">Sort by newness</option>
              <option value="price-asc">Sort by price: low to high</option>
              <option value="price-dec">Sort by price: high to low</option>
            </select>
          </div>
        </div>
      </div>

      <div class="toolbox-right">
        <div class="toolbox-item toolbox-sort" v-if="isOffCanvas">
          <label>Sort By:</label>

          <div class="select-custom">
            <select
              name="orderby"
              class="form-control"
              v-model="orderBy"
              @change="getProducts"
            >
              <option value="default" selected="default">
                Default sorting
              </option>
              <option value="featured">Sort by popularity</option>
              <option value="rating">Sort by average rating</option>
              <option value="new">Sort by newness</option>
              <option value="price-asc">Sort by price: low to high</option>
              <option value="price-dec">Sort by price: high to low</option>
            </select>
          </div>
        </div>

        <div class="toolbox-item toolbox-show" v-if="totalCount > 0">
          <label>Show:</label>

          <div class="select-custom">
            <select
              name="count"
              class="form-control"
              @change="changePerPage"
              v-model="itemsPerPage"
            >
              <option :value="8">8</option>
              <option :value="12">12</option>
              <option :value="24">24</option>
              <option :value="36">36</option>
            </select>
          </div>
        </div>

        <div class="toolbox-item layout-modes">
          <router-link
            :to="{ path: '/shop', query: $route.query }"
            class="layout-btn btn-grid"
            :class="{ active: type !== 'list' }"
            title="Grid"
          >
            <i class="icon-mode-grid"></i>
          </router-link>
          <router-link
            :to="{ path: '/shop/list', query: $route.query }"
            class="layout-btn btn-list"
            :class="{ active: type === 'list' }"
            title="List"
          >
            <i class="icon-mode-list"></i>
          </router-link>
        </div>
      </div>
    </nav>

    <div
      class="row divide-line no-gutters m-0"
      :class="{
        'row-sm sm-padding divide-line no-gutters m-0': itemsPerRow > 6,
      }"
    >
      <template v-if="products && products.length > 0">
        <div
          :class="gridCols[itemsPerRow]"
          v-for="(product, index) in products"
          :key="'shop-product' + index"
        >
          <template v-if="type !== 'list'">
            <pv-product-one
              :product="product"
              :is-actions="false"
              v-if="itemsPerRow > 6"
              key="gridType"
            ></pv-product-one>

            <pv-product-one
              :product="product"
              key="gridType"
              v-else
            ></pv-product-one>
          </template>

          <pv-product-two :product="product" v-else></pv-product-two>
        </div>
      </template>

      <template v-if="products && products.length === 0">
        <div class="info-box with-icon p-0 shop-info">
          <p>No products were found matching your selection.</p>
        </div>
      </template>

      <template v-if="!products">
        <div
          :class="gridCols[itemsPerRow]"
          v-for="(item, index) in repeatCount.slice(0, itemsPerPage)"
          :key="'skel-shop' + index"
        >
          <div
            class="skel-pro mb-2"
            v-if="type !== 'list'"
            key="normalSkel"
          ></div>
          <div class="skel-pro skel-pro-list mb-2" v-else></div>
        </div>
      </template>
    </div>

    <nav
      class="toolbox toolbox-pagination"
      v-if="products && products.length > 0"
    >
      <div class="toolbox-item toolbox-show mb-0">
        <label>Show:</label>

        <div class="select-custom">
          <select
            name="count"
            class="form-control"
            @change="changePerPage"
            v-model="itemsPerPage"
          >
            <option :value="8">8</option>
            <option :value="12">12</option>
            <option :value="24">24</option>
            <option :value="36">36</option>
          </select>
        </div>
      </div>

      <pv-pagination
        :total-count="totalCount"
        :items-per-page="itemsPerPage"
        v-if="totalCount"
      ></pv-pagination>
    </nav>

    <div
      class="sidebar-toggle custom-sidebar-toggle"
      @click="showSidebarFilter"
      v-if="products && products.length === 0"
    >
      <i class="fas fa-sliders-h"></i>
    </div>
  </div>
</template>

<script>
import PvProductOne from "../../../features/product/PvProductOne";
import PvProductTwo from "../../../features/product/PvProductTwo";
import PvPagination from "../../../features/PvPagination";
import { scrollTopHandler } from "../../../../utils";
import { fetchShop } from "../../../../services/product";

export default {
  components: {
    PvProductOne,
    PvProductTwo,
    PvPagination,
  },
  props: {
    //products: Array,
    itemsPerRow: {
      type: Number,
      default: 4,
    },
  },
  data: function () {
    return {
      products: null,
      repeatCount: new Array(100),
      orderBy: "default",
      itemsPerPage: 8,
      totalCount: 0,
      type: {
        type: String,
        default: "grid",
      },
      isOffCanvas: {
        type: Boolean,
        default: false,
      },
      gridCols: {
        1: "col-12",
        3: "col-6 col-sm-4",
        4: "col-6 col-sm-4 col-md-3",
        5: "col-6 col-sm-4 col-md-3 col-xl-5col",
        6: "col-6 col-sm-4 col-md-3 col-xl-2",
        7: "col-6 col-sm-4 col-md-3 col-xl-7col",
        8: "col-6 col-sm-4 col-md-3 col-xl-8col",
      },
    };
  },
  watch: {
    $route: function () {
      this.itemsPerPage = this.$route.query["per_page"]
        ? parseInt(this.$route.query["per_page"])
        : 8;
      this.getProducts();
      this.isOffCanvas = this.$route.path.includes("off-canvas") ? true : false;
      this.type = this.$route.path.includes("list") ? "list" : "grid";
    },
  },
  created: function () {
    this.itemsPerPage = this.$route.query["per_page"]
      ? parseInt(this.$route.query["per_page"])
      : 8;
    this.getProducts(false);
    this.isOffCanvas = this.$route.path.includes("off-canvas") ? true : false;
    this.type = this.$route.path.includes("list") ? "list" : "grid";
  },
  methods: {
    getProducts: async function (isScrll = true) {
      this.products = null;

      try {
        const response = await fetchShop({
          params: {
            ...this.$route.query,
            order_by: this.orderBy,
            per_page: this.itemsPerPage,
          }
        });
		console.log(response);
        this.products = response.data.data.data;
        this.totalCount = response.data.data.data.length;
        if (isScrll) scrollTopHandler();
      } catch (err) {
        console.log(err.response);
      }
    },
    showSidebarFilter: function () {
      document.querySelector("body").classList.add("sidebar-opened");
    },
    changePerPage: function () {
      this.$router.push({
        ...this.$route,
        query: { ...this.$route.query, per_page: this.itemsPerPage, page: 1 },
      });
    },
  },
};
</script>