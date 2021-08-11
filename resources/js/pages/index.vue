<template>
  <main class="main home-page">
    <section class="intro-section">
      <div class="container">
        <div class="row">
          <div class="col-lg-9 mb-2">
            <pv-intro-section></pv-intro-section>
          </div>

          <div class="col-lg-3 mb-2">
            <pv-intro-collection
              :products="featuredProducts"
              v-if="featuredProducts.length > 0"
            ></pv-intro-collection>
          </div>
        </div>
      </div>
    </section>

    <pv-service-section></pv-service-section>

    <pv-popular-collection :products="mostViewProducts" v-if="mostViewProducts.length > 0"></pv-popular-collection>

    <pv-category-section></pv-category-section>

    <!--<pv-best-collection
      :products="products"
      v-if="products.length > 0"
    ></pv-best-collection>-->

    <pv-new-collection
      :products="products"
      v-if="products.length > 0"
    ></pv-new-collection>

    <!--<pv-electronics-collection></pv-electronics-collection>

    <pv-mobile-collection></pv-mobile-collection>-->

    <pv-top-collection
      :products="products"
      v-if="products.length > 0"
    ></pv-top-collection>

    <pv-brand-section></pv-brand-section>
  </main>
</template>

<script>
import PvIntroSection from "../components/partials/home/PvIntroSection";
import PvIntroCollection from "../components/partials/home/PvIntroCollection";
import PvServiceSection from "../components/partials/home/PvServiceSection";
import PvPopularCollection from "../components/partials/home/PvPopularCollection";
import PvCategorySection from "../components/partials/home/PvCategorySection";
import PvBestCollection from "../components/partials/home/PvBestCollection";
import PvNewCollection from "../components/partials/home/PvNewCollection";
import PvElectronicsCollection from "../components/partials/home/PvElectronicsCollection";
import PvMobileCollection from "../components/partials/home/PvMobileCollection";
import PvTopCollection from "../components/partials/home/PvTopCollection";
import PvBrandSection from "../components/partials/home/PvBrandSection";

import {
  getProductsByFeatured,
  getProductsByViews
} from "../utils/service";
import { getCookie } from "../utils";
import { fetchProduct } from "../services/product";

export default {
  name: "Home",
  metaInfo: {
    title: "Home",
    titleTemplate: "%s - Synoods Ecommerce",
  },
  components: {
    PvIntroSection,
    PvIntroCollection,
    PvServiceSection,
    PvCategorySection,
    PvPopularCollection,
    PvBestCollection,
    PvNewCollection,
    PvElectronicsCollection,
    PvMobileCollection,
    PvTopCollection,
    PvBrandSection,
  },
  data: function () {
    return {
      products: [],
      posts: [],
      featuredProducts: [],
      newProducts: [],
      bestProducts: [],
      topRatedProducts: [],
      mostViewProducts: [],
      timerId: 0,
    };
  },
  mounted: async function () {
    try {
      const response = await fetchProduct();
      this.products = response.data.data.data;
      this.featuredProducts = getProductsByFeatured(response.data.data.data);
      this.mostViewProducts = getProductsByViews(response.data.data.data);
      //this.newProducts = getProductsByAttri(response.data.data.data, "is_new");
      //this.bestProducts = getTopSellingProducts(response.data.data.data);
      //this.topRatedProducts = getTopRatedProducts(response.data.data.data);
      console.log(response);
    } catch (err) {
      console.log(err.response);
    }
    this.timerId = setTimeout(() => {
      if (this.$route.path === "/" && getCookie("newsletter") !== "false") {
        this.$modal.show(
          () => import("../components/features/modal/PvNewsletterModal"),
          {},
          {
            width: "740",
            height: "auto",
            adaptive: true,
            class: "newsletter-modal",
          }
        );
      }
    }, 10000);
  },
  destroyed: function () {
    clearTimeout(this.timerId);
  },
};
</script>