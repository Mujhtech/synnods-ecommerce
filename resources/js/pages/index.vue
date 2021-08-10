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
              :products="products"
              v-if="products.length > 0"
            ></pv-intro-collection>
          </div>
        </div>
      </div>
    </section>

    <pv-service-section></pv-service-section>

    <pv-popular-collection :products="products"></pv-popular-collection>

    <pv-category-section></pv-category-section>

    <pv-best-collection
      :products="products"
      v-if="products.length > 0"
    ></pv-best-collection>

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
  getProductsByAttri,
  getTopSellingProducts,
  getTopRatedProducts,
} from "../utils/service";
import { getCookie } from "../utils";
import Api, { baseUrl } from "../api";

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
      timerId: 0,
    };
  },
  mounted: function () {
    Api.get(`${baseUrl}/demo22`)
      .then((response) => {
        this.products = response.data.products;
        this.posts = response.data.posts;
        this.featuredProducts = getProductsByAttri(response.data.products);
        this.newProducts = getProductsByAttri(response.data.products, "is_new");
        this.bestProducts = getTopSellingProducts(response.data.products);
        this.topRatedProducts = getTopRatedProducts(response.data.products);
      })
      .catch((error) => ({ error: JSON.stringify(error) }));

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