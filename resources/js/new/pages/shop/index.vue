<template>
  <div>
    <sy-breadcrumb title="Shop"></sy-breadcrumb>
    <div class="shop-page-area pt-30 pb-65">
      <div class="container">
        <div class="row flex-row-reverse">
          <div class="col-lg-9">
            <sy-shop-banner></sy-shop-banner>
            <div class="shop-topbar-wrapper">
              <div class="shop-topbar-left">
                <div class="grid-list-options nav view-mode">
                  <a
                    class="active"
                    href="#product-grid"
                    data-view="product-grid"
                    data-bs-toggle="tab"
                    ><i class="fa fa-th"></i
                  ></a>
                  <a
                    href="#product-list"
                    data-view="product-list"
                    data-bs-toggle="tab"
                    ><i class="fa fa-list-ul"></i
                  ></a>
                </div>
                <p>Showing 1 - 20 of 30 results</p>
              </div>
              <div class="product-sorting-wrapper">
                <div class="product-shorting shorting-style">
                  <label>View:</label>
                  <select @change="changePerPage" v-model="itemsPerPage">
                    <option :value="8">8</option>
                    <option :value="12">12</option>
                    <option :value="24">24</option>
                    <option :value="36">36</option>
                  </select>
                </div>
                <div class="product-show shorting-style">
                  <label>Sort by:</label>
                  <select v-model="orderBy" @change="changeOrder">
                    <option value="default" selected="default">
                      Default sorting
                    </option>
                    <option value="featured">Sort by popularity</option>
                    <option value="rating">Sort by average rating</option>
                    <option value="new">Sort by newness</option>
                    <option value="price-asc">
                      Sort by price: low to high
                    </option>
                    <option value="price-dec">
                      Sort by price: high to low
                    </option>
                  </select>
                </div>
              </div>
            </div>
            <sy-product-list-one
              :itemsPerPage="itemsPerPage"
              :orderBy="orderBy"
            ></sy-product-list-one>
          </div>
          <div class="col-lg-3">
            <div class="shop-sidebar-wrapper gray-bg-7 mrg-top-md mrg-top-sm">
              <div class="shop-widget">
                <h4 class="shop-sidebar-title">Shop By Categories</h4>
                <div class="shop-catigory">
                  <ul id="faq">
                    <li v-for="(category, index) in categoryList" :key="index">
                      <a
                        data-bs-toggle="collapse"
                        :href="`#shop-catigory-${category.id}`"
                        >{{ category.name }} <i class="ion-ios-arrow-down"></i
                      ></a>
                      <ul
                        :id="`shop-catigory-${category.id}`"
                        :class="[
                          category.id == 1
                            ? 'panel-collapse collapse show'
                            : 'panel-collapse collapse',
                        ]"
                        data-bs-parent="#faq"
                      >
                        <li
                          v-for="(sub_cat, i) in category.sub_categories"
                          :key="i"
                        >
                          <router-link
                            :to="`/shop?sub_category=${sub_cat.slug}`"
                            >{{ sub_cat.name }}</router-link
                          >
                        </li>
                      </ul>
                    </li>
                  </ul>
                </div>
              </div>
              <div class="shop-price-filter mt-40 shop-sidebar-border pt-35">
                <h4 class="shop-sidebar-title">Price Filter</h4>
                <div class="price_filter mt-25">
                  <span>Price: ₦{{ prices[0] }} - ₦{{ prices[1] }}</span>
                  <vue-nouislider
                    :config="priceSettings"
                    :values="prices"
                    v-if="priceReset"
                    id="price-slider"
                  ></vue-nouislider>
                  <br />
                  <div class="price_slider_amount">
                    <button @click="priceFilterRoute" type="button">
                      Filter
                    </button>
                  </div>
                </div>
              </div>
              <div class="shop-widget mt-40 shop-sidebar-border pt-35">
                <h4 class="shop-sidebar-title">By Brand</h4>
                <div class="sidebar-list-style mt-20">
                  <ul>
                    <li><input type="checkbox" /><a href="#">Samsung </a></li>
                  </ul>
                </div>
              </div>
              <div class="shop-widget mt-40 shop-sidebar-border pt-35">
                <h4 class="shop-sidebar-title">Compare Products</h4>
                <div class="compare-product">
                  <p>You have no item to compare.</p>
                  <div class="compare-product-btn">
                    <span>Clear all </span>
                    <a href="#">Compare <i class="fa fa-check"></i></a>
                  </div>
                </div>
              </div>
              <div class="shop-widget mt-40 shop-sidebar-border pt-35">
                <h4 class="shop-sidebar-title">Popular Tags</h4>
                <div class="shop-tags mt-25">
                  <ul>
                    <li><a href="#">Computer</a></li>
                  </ul>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import SyBreadcrumb from "../../components/commons/SyBreadcrumb";
import * as catService from "../../../services/category";
import { fetchProduct } from "../../../services/product";
import SyProductListOne from "../../components/product/list/SyProductListOne";
import SyShopBanner from "../../components/shop/SyShopBanner";
export default {
  components: { SyBreadcrumb, SyProductListOne, SyShopBanner },
  name: "Shop",
  metaInfo: {
    title: "Shop",
    titleTemplate: "%s - Faadaakaa Ecommerce",
  },
  data: function () {
    return {
      categoryList: [],
      featuredProducts: [],
      itemsPerPage: 8,
      orderBy: "default",
      isSticky: false,
      priceOpenened: true,
      prices: [0, 100000],
      priceSettings: {
        connect: true,
        step: 50,
        margin: 100,
        range: {
          min: 0,
          max: 100000,
        },
        format: {
          from: Number,
          to: Number,
        },
      },
      emptyObject: {},
      isFeatured: true,
      priceReset: true,
      currentCategory: "",
    };
  },
  mounted: function () {
    this.getCategoryLists();
    this.getProduct();
  },
  watch: {
    $route: function () {
      if (this.$route.query.min_price) {
        this.prices = [
          this.$route.query.min_price,
          this.$route.query.max_price,
        ];
      } else {
        this.prices = [0, 100000];
      }

      this.priceReset = false;

      this.currentCategory = this.$route.query.category;

      this.$nextTick(function () {
        this.priceReset = true;
      });
    },
  },
  created: function () {
    if (this.$route.query.min_price) {
      this.prices = [this.$route.query.min_price, this.$route.query.max_price];
    } else {
      this.prices = [0, 100000];
    }
  },
  computed: {
    isEmptyQuery: function () {
      for (let key in this.$route.query) {
        if (key !== "page" && key !== "per_page" && this.$route.query[key]) {
          return false;
        }
      }

      return true;
    },
  },
  methods: {
    getCategoryLists: async function () {
      try {
        const response = await catService.category();
        this.categoryList = response.data.data.data;
        console.log(response);
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
    priceFilterRoute: function () {
      this.$router.push({
        path: this.$route.path,
        query: {
          ...this.$route.query,
          page: 1,
          max_price: this.prices[1],
          min_price: this.prices[0],
        },
      });
    },
    changePerPage: function () {
      this.$router.push({
        ...this.$route,
        query: {
          ...this.$route.query,
          per_page: this.itemsPerPage,
          page: 1,
        },
      });
    },
    changeOrder: function () {
      this.$router.push({
        ...this.$route,
        query: {
          ...this.$route.query,
          order_by: this.orderBy,
        },
      });
    },
  },
};
</script>
