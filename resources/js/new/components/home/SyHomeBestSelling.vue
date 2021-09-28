<template>
  <div class="best-selling-area pt-60 pb-45 gray-bg best-selling-small">
    <div class="container">
      <div class="top-bar section-border mb-35">
        <div class="section-title-wrapper section-bg-gray">
          <h4 class="section-title">Best Selling Products</h4>
        </div>
        <div class="product-tab-list-2 nav section-bg-gray">
          <a class="active" href="#home4" data-bs-toggle="tab">
            <h4>Smart Phones & Tablets</h4>
          </a>
          <a href="#home5" data-bs-toggle="tab">
            <h4>Laptops & Computers</h4>
          </a>
          <a href="#home6" data-bs-toggle="tab">
            <h4>Video Cameras</h4>
          </a>
        </div>
      </div>
      <div class="tab-content jump">
        <div class="tab-pane active" id="home4">
          <div class="best-selling-active-2 nav-style">
            <carousel :autoplay="true" :nav="false" :dots="false" :items="1">
              <div class="best-selling-bundle-2">
                <div class="row">
                  <div class="col-lg-12 col-xl-8 col-md-12">
                    <sy-bs-one :product="products[0]"></sy-bs-one>
                    <div class="row">
                      <sy-bs-two
                        v-for="(product, index) in products.slice(0, 2)"
                        :product="product"
                        :key="index"
                      ></sy-bs-two>
                    </div>
                  </div>
                  <div class="col-lg-12 col-xl-4 col-md-12">
                    <div class="row">
                      <sy-bs-three
                        v-for="(product, index) in products.slice(0, 3)"
                        :product="product"
                        :key="index"
                      ></sy-bs-three>
                    </div>
                  </div>
                </div>
              </div>
              <div class="best-selling-bundle-2">
                <div class="row">
                  <div class="col-lg-12 col-xl-8 col-md-12">
                    <sy-bs-one :product="products[0]"></sy-bs-one>
                    <div class="row">
                      <sy-bs-two
                        v-for="(product, index) in products.slice(0, 2)"
                        :product="product"
                        :key="index"
                      ></sy-bs-two>
                    </div>
                  </div>
                  <div class="col-lg-12 col-xl-4 col-md-12">
                    <div class="row">
                      <sy-bs-three
                        v-for="(product, index) in products.slice(0, 3)"
                        :product="product"
                        :key="index"
                      ></sy-bs-three>
                    </div>
                  </div>
                </div>
              </div>
            </carousel>
          </div>
        </div>
        <div class="tab-pane" id="home5">
          <div class="best-selling-active-2 nav-style">
            <carousel :autoplay="true" :nav="true" :dots="false" :items="1">
              <div class="best-selling-bundle-2">
                <div class="row">
                  <div class="col-lg-12 col-xl-8 col-md-12">
                    <sy-bs-one :product="products[0]"></sy-bs-one>
                    <div class="row">
                      <sy-bs-two
                        v-for="(product, index) in products.slice(0, 2)"
                        :product="product"
                        :key="index"
                      ></sy-bs-two>
                    </div>
                  </div>
                  <div class="col-lg-12 col-xl-4 col-md-12">
                    <div class="row">
                      <sy-bs-three
                        v-for="(product, index) in products.slice(0, 3)"
                        :product="product"
                        :key="index"
                      ></sy-bs-three>
                    </div>
                  </div>
                </div>
              </div>
              <div class="best-selling-bundle-2">
                <div class="row">
                  <div class="col-lg-12 col-xl-8 col-md-12">
                    <sy-bs-one :product="products[0]"></sy-bs-one>
                    <div class="row">
                      <sy-bs-two
                        v-for="(product, index) in products.slice(0, 2)"
                        :product="product"
                        :key="index"
                      ></sy-bs-two>
                    </div>
                  </div>
                  <div class="col-lg-12 col-xl-4 col-md-12">
                    <div class="row">
                      <sy-bs-three
                        v-for="(product, index) in products.slice(0, 3)"
                        :product="product"
                        :key="index"
                      ></sy-bs-three>
                    </div>
                  </div>
                </div>
              </div>
            </carousel>
          </div>
        </div>
        <div class="tab-pane" id="home6">
          <div class="best-selling-active-2 nav-style">
            <carousel :autoplay="true" :nav="false" :dots="false" :items="1">
              <div class="best-selling-bundle-2">
                <div class="row">
                  <div class="col-lg-12 col-xl-8 col-md-12">
                    <sy-bs-one :product="products[0]"></sy-bs-one>
                    <div class="row">
                      <sy-bs-two
                        v-for="(product, index) in products.slice(0, 2)"
                        :product="product"
                        :key="index"
                      ></sy-bs-two>
                    </div>
                  </div>
                  <div class="col-lg-12 col-xl-4 col-md-12">
                    <div class="row">
                      <sy-bs-three
                        v-for="(product, index) in products.slice(0, 3)"
                        :product="product"
                        :key="index"
                      ></sy-bs-three>
                    </div>
                  </div>
                </div>
              </div>
              <div class="best-selling-bundle-2">
                <div class="row">
                  <div class="col-lg-12 col-xl-8 col-md-12">
                    <sy-bs-one :product="products[0]"></sy-bs-one>
                    <div class="row">
                      <sy-bs-two
                        v-for="(product, index) in products.slice(0, 2)"
                        :product="product"
                        :key="index"
                      ></sy-bs-two>
                    </div>
                  </div>
                  <div class="col-lg-12 col-xl-4 col-md-12">
                    <div class="row">
                      <sy-bs-three
                        v-for="(product, index) in products.slice(0, 3)"
                        :product="product"
                        :key="index"
                      ></sy-bs-three>
                    </div>
                  </div>
                </div>
              </div>
            </carousel>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>


<script>
import SyProductThree from "../product/single/SyProductThree";
import carousel from "vue-owl-carousel";
import SyBsThree from "../product/bs/SyBsThree";
import SyBsTwo from "../product/bs/SyBsTwo";
import SyBsOne from "../product/bs/SyBsOne";
export default {
  name: "BestSellingProduct",
  props: {
    products: Array,
  },
  components: {
    SyProductThree,
    carousel,
    SyBsThree,
    SyBsTwo,
    SyBsOne,
  },
  data: function () {
    return {
      itemPerPage: 3,
    };
  },
};
</script>
