<template>
  <main class="main">
    <div class="container skeleton-body">
      <nav aria-label="breadcrumb" class="breadcrumb-nav">
        <ol class="breadcrumb">
          <li class="breadcrumb-item">
            <router-link to="/"> Home </router-link>
          </li>
          <li class="breadcrumb-item">
            <router-link to="/shop">Shop</router-link>
          </li>
          <li class="breadcrumb-item" v-if="loaded">
            <router-link
              :to="{
                path: '/shop',
                query: { category: product.category.slug },
              }"
              >{{ product.category.name }}</router-link
            >,
            <router-link
              :to="{
                path: '/shop',
                query: { sub_category: product.sub_category.slug },
              }"
              >{{ product.sub_category.name }}</router-link
            >
          </li>
          <li class="breadcrumb-item active" aria-current="page" v-if="loaded">
            {{ product.name }}
          </li>
        </ol>
      </nav>

      <div class="product-single-container product-single-default">
        <div class="row" v-if="product">
          <div class="col-lg-5 col-md-6 product-single-gallery">
            <pv-media-one :product="product"></pv-media-one>
          </div>

          <div class="col-lg-7 col-md-6 product-single-details">
            <pv-detail-one
              :product="product"
              :prev-product="prevProduct"
              :next-product="nextProduct"
            ></pv-detail-one>
          </div>
        </div>
      </div>

      <div class="skel-group" v-if="!product">
        <div class="summary-before col-lg-5 col-md-6"></div>
        <div class="summary entry-summary col-lg-7 col-md-6"></div>
        <div class="tab-content col-lg-12"></div>
      </div>

      <pv-desc-one :product="product" v-if="product"></pv-desc-one>

      <!--<pv-related-products :products="relatedProducts"></pv-related-products>

      <hr class="mt-0 m-b-5" />

      <pv-small-collection
        :featured-products="featuredProducts"
        :best-products="bestProducts"
        :latest-products="latestProducts"
        :top-rated-products="topRatedProducts"
      ></pv-small-collection>-->
    </div>
  </main>
</template>

<script>
import PvMediaOne from "../../../components/partials/product/media/PvMediaOne";
import PvDetailOne from "../../../components/partials/product/detail/PvDetailOne";
import PvDescOne from "../../../components/partials/product/description/PvDescOne";
import PvRelatedProducts from "../../../components/partials/product/PvRelatedProducts";
import PvSmallCollection from "../../../components/partials/product/PvSmallCollection";
import { fetchSingle } from "../../../services/product";

export default {
  metaInfo: {
    title: "Single Product",
    titleTemplate: "%s - Synoods Ecommerce",
  },
  components: {
    PvMediaOne,
    PvDetailOne,
    PvDescOne,
    PvRelatedProducts,
    PvSmallCollection,
  },
  data: function () {
    return {
      product: null,
      relatedProducts: null,
      featuredProducts: null,
      bestProducts: null,
      latestProducts: null,
      topRatedProducts: null,
      nextProduct: null,
      prevProduct: null,
      loaded: false,
      productCategory: [],
    };
  },
  created: function () {
    this.getProduct();
  },
  methods: {
    getProduct: async function () {
      this.loaded = false;

      try {
        console.log(this.$route.params.slug);
        const response = await fetchSingle(this.$route.params.slug);
        this.product = response.data.data.data;
        /* this.relatedProducts = response.data.relatedProducts;
        this.featuredProducts = response.data.featuredProducts;
        this.bestProducts = response.data.bestSellingProducts;
        this.latestProducts = response.data.latestProducts;
        this.topRatedProducts = response.data.topRatedProducts;
        this.prevProduct = response.data.prevProduct;
        this.nextProduct = response.data.nextProduct;

        this.product.product_categories.map((item) => {
          this.productCategory.push(item);
        });*/
        this.loaded = true;
        console.log(response);
      } catch (err) {
        console.log(err.response);
      }
    },
  },
};
</script>