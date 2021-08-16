<template>
  <section
    class="mobile-phones-container appear-animate"
    data-animation-name="fadeIn"
    data-animation-delay="200"
    v-animate
  >
    <div class="container">
      <h2 class="section-title border-0 line-height-1 ls-n-10 m-b-4">
        Mobile Phones &amp; Accessories
      </h2>

      <div class="row no-gutters m-0 bg-gray">
        <div class="col-md-5 col-lg-2">
          <div class="category-lists d-flex flex-md-column flex-wrap">
            <a
              href="javascript:;"
              @click="getProducts('tecno', $event)"
              class="active"
              >Tecno</a
            >
            <a href="javascript:;" @click="getProducts('oneplus6', $event)"
              >Oneplus 6</a
            >
            <a href="javascript:;" @click="getProducts('power-bank', $event)"
              >Power Bank</a
            >
            <a href="javascript:;" @click="getProducts('smart-watch', $event)"
              >Smart Watch</a
            >
            <a href="javascript:;" @click="getProducts('type-c-cable', $event)"
              >Type-c Cable</a
            >
            <a href="javascript:;" @click="getProducts('xiaomi-mi-a2', $event)"
              >Xiaomi Mi A2</a
            >
            <a
              href="javascript:;"
              @click="getProducts('xiaomi-mi-band3', $event)"
              >Xiaomi Mi Band 3</a
            >
          </div>
        </div>

        <div class="col-md-7 col-lg-3 order-first order-md-0">
          <div class="banner banner5 h-100" style="background-color: #f4f4f4">
            <figure class="h-100">
              <img
                class="h-100"
                v-lazy="'./images/home/banner-5.jpg'"
                alt="baner"
                width="360"
                height="508"
              />
            </figure>
            <div class="banner-layer banner-layer-top">
              <h3 class="font1 text-center text-uppercase">
                Top Brands<br />Smartphones
              </h3>
              <div
                class="coupon-sale-text d-flex flex-column align-items-start"
              >
                <h4
                  class="
                    m-b-2
                    font1
                    d-block
                    text-uppercase text-white
                    bg-dark
                    skew-box
                  "
                >
                  Starting From
                </h4>
                <h5 class="mb-0 font1 d-inline-block bg-dark skew-box">
                  <b class="text-white">₦199</b>
                </h5>
              </div>
            </div>
            <div class="banner-layer banner-layer-bottom">
              <router-link to="/shop" class="btn btn-primary"
                >View All Now</router-link
              >
            </div>
          </div>
        </div>

        <div class="col-lg-7">
          <isotope
            class="grid grid2"
            :options="isotopeOptions"
            :list="products"
            v-if="products && products.length > 0"
          >
            <div
              class="grid-item col-md-8 height-x1"
              :key="'mobile-0-' + index"
            >
              <pv-product-four :product="products[0]"></pv-product-four>
            </div>

            <div
              class="grid-item col-6 col-md-4 height-x2"
              :key="'mobile-2-' + index"
            >
              <pv-product-four :product="products[1]"></pv-product-four>
            </div>

            <div
              class="grid-item col-6 col-md-4 height-x1"
              :key="'mobile-3-' + index"
            >
              <pv-product-four :product="products[2]"></pv-product-four>
            </div>

            <div
              class="grid-item col-6 col-md-4 height-x1"
              :key="'mobile-4-' + index"
            >
              <pv-product-four :product="products[3]"></pv-product-four>
            </div>

            <div
              class="col-1 col-md-4 grid-col-sizer"
              :key="'mobile-sizer+' + index"
            ></div>
          </isotope>
        </div>
      </div>
    </div>
  </section>
</template>

<script>
import isotope from "vueisotope";
import PvProductFour from "../../features/product/PvProductFour";
import { fetchShop } from "../../../services/product";

export default {
  components: {
    isotope,
    PvProductFour,
  },
  data: function () {
    return {
      products: null,
      index: 0,
      isotopeOptions: {
        itemSelector: "grid-item",
        layoutMode: "masonry",
        percentPosition: false,
        masonry: {
          columnWidth: ".grid-col-sizer",
        },
      },
      currentCategory: null,
    };
  },
  methods: {
    getProducts: async function (cat, e) {
      if (this.currentCategory !== cat) {
        this.currentCategory = cat;
        if (e) {
          e.currentTarget.parentNode
            .querySelector(".active")
            .classList.remove("active");
          e.currentTarget.classList.add("active");
        }

        this.index++;

        try {
          const response = await fetchShop({
            params: {
              brand: cat,
            },
          });
          this.products = response.data.data.data;
        } catch (err) {
          console.log(err.response);
        }
      }
    },
  },
  created: function () {
    this.getProducts("tecno");
  },
};
</script>