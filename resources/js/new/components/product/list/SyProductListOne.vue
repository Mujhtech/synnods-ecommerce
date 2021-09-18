<template>
  <div class="tab-content jump">
    <div class="tab-pane active pb-20" id="product-grid">
      <div class="row">
        <template v-if="products.length > 0">
          <sy-product-four
            v-for="(product, index) in products"
            :key="index"
            :product="product"
          ></sy-product-four>
        </template>
        <template v-else>
          <div class="col-lg-12 col-md-12">
            <p>No products were found matching your selection.</p>
          </div>
        </template>
      </div>
    </div>
    <div class="tab-pane" id="product-list">
      <div class="row">
        <template v-if="products.length > 0">
          <sy-product-five
            v-for="(product, index) in products"
            :key="index"
            :product="product"
          ></sy-product-five>
        </template>
        <template v-else>
          <div class="col-lg-12 col-md-12">
            <p>No products were found matching your selection.</p>
          </div>
        </template>
      </div>
    </div>
    <div class="pagination-total-pages">
      <div class="pagination-style">
        <ul>
          <li>
            <a class="prev-next prev" href="#"
              ><i class="ion-ios-arrow-left"></i> Prev</a
            >
          </li>
          <li>
            <a class="active" href="#">1</a>
          </li>
          <li><a href="#">2</a></li>
          <li><a href="#">3</a></li>
          <li><a href="#">...</a></li>
          <li><a href="#">10</a></li>
          <li>
            <a class="prev-next next" href="#"
              >Next<i class="ion-ios-arrow-right"></i>
            </a>
          </li>
        </ul>
      </div>
      <div class="total-pages">
        <p>Showing 1 - 20 of 30 results</p>
      </div>
    </div>
  </div>
</template>

<script>
import { fetchShop } from "../../../../services/product";
import SyProductFour from "../single/SyProductFour";
import SyProductFive from "../single/SyProductFive";
export default {
  name: "SyProductListOne",
  components: { SyProductFour, SyProductFive },
  props: {
    itemsPerPage: Number,
    orderBy: String,
  },
  data: function () {
    return {
      products: [],
      repeatCount: new Array(100),
      totalCount: 0,
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
      this.products = [];

      try {
        const response = await fetchShop({
          params: {
            ...this.$route.query,
            order_by: this.orderBy,
            per_page: this.itemsPerPage,
          },
        });
        console.log(response);
        this.products = response.data.data.data;
        this.totalCount = response.data.data.data.length;
      } catch (err) {
        console.log(err.response);
      }
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
  },
};
</script>
