<template>
  <div class="product-area pt-60 pb-60">
    <div class="container">
      <div class="row">
        <div class="col-lg-4">
          <div class="new-arrivals-area">
            <div class="section-border mb-40">
              <h4 class="section-title section-bg-white">New Arrivals</h4>
            </div>
            <div class="product-slider-active-2 nav-style">
              <div class="single-product-bundle">
                <sy-product-six
                  v-for="(product, index) in products.slice(0, 3)"
                  :key="index"
                  :product="product"
                ></sy-product-six>
              </div>
              <div class="single-product-bundle">
                <sy-product-six
                  v-for="(product, index) in products.slice(3, 6)"
                  :key="index"
                  :product="product"
                ></sy-product-six>
              </div>
              <div class="single-product-bundle">
                <sy-product-six
                  v-for="(product, index) in products.slice(6, 9)"
                  :key="index"
                  :product="product"
                ></sy-product-six>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="new-arrivals-area mrg-top-md mrg-top-sm">
            <div class="section-border mb-40">
              <h4 class="section-title section-bg-white">On Sale Products</h4>
            </div>
            <div class="product-slider-active-2 nav-style">
              <div class="single-product-bundle">
                <sy-product-six
                  v-for="(product, index) in products.slice(0, 3)"
                  :key="index"
                  :product="product"
                ></sy-product-six>
              </div>
              <div class="single-product-bundle">
                <sy-product-six
                  v-for="(product, index) in products.slice(3, 6)"
                  :key="index"
                  :product="product"
                ></sy-product-six>
              </div>
              <div class="single-product-bundle">
                <sy-product-six
                  v-for="(product, index) in products.slice(6, 9)"
                  :key="index"
                  :product="product"
                ></sy-product-six>
              </div>
            </div>
          </div>
        </div>
        <div class="col-lg-4">
          <div class="new-arrivals-area mrg-top-md mrg-top-sm">
            <div class="section-border mb-40">
              <h4 class="section-title section-bg-white">
                Top Selling Products
              </h4>
            </div>
            <div class="product-slider-active-2 nav-style">
              <div class="single-product-bundle">
                <sy-product-six
                  v-for="(product, index) in products.slice(0, 3)"
                  :key="index"
                  :product="product"
                ></sy-product-six>
              </div>
              <div class="single-product-bundle">
                <sy-product-six
                  v-for="(product, index) in products.slice(3, 6)"
                  :key="index"
                  :product="product"
                ></sy-product-six>
              </div>
              <div class="single-product-bundle">
                <sy-product-six
                  v-for="(product, index) in products.slice(6, 9)"
                  :key="index"
                  :product="product"
                ></sy-product-six>
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import SyProductSix from "../product/single/SyProductSix.vue";
export default {
  components: { SyProductSix },
  name: "SyHomeFooterProduct",
  props: {
    products: Array,
  },
};
</script>