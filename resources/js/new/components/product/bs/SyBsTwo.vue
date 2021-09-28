<template>
  <div class="col-lg-6 col-md-6">
    <div class="best-selling-pro-wrapper mb-20">
      <div class="product-img">
        <router-link :to="`/product/${product.slug}`"
          ><!--<img
          v-lazy="`${product.featured_image}`"
          :alt="product.name"
          width="110"
          height="110"
      />-->
          <img :src="`assets/img/product/product-${product.id}.jpg`" />
        </router-link>
        <span v-if="product.is_sale && product.price">-{{ discount }}%</span>
      </div>
      <div class="product-content best-pro-content">
        <span>
          <router-link
            :to="{
              path: '/shop',
              query: { category: product.category.slug },
            }"
            >{{ product.category.name }}</router-link
          >
          ,
          <router-link
            :to="{
              path: '/shop',
              query: {
                sub_category: product.sub_category.slug,
              },
            }"
            >{{ product.sub_category.name }}</router-link
          >
        </span>
        <h4>
          <router-link :to="`/product/${product.slug}`">{{
            product.name
          }}</router-link>
        </h4>
        <div class="product-price-wrapper">
          <template v-if="!product.is_sale">
            <span>₦{{ product.price }}</span>
          </template>

          <template v-else>
            <span>₦{{ product.sale_price }}</span>
            <span class="product-price-old">₦{{ product.price }}</span>
          </template>
        </div>
        <div class="product-action best-pro-action">
          <router-link
            to="/wishlist"
            class="btn-icon-wish added-wishlist"
            title="Go to Wishlist"
            v-if="isWishlisted"
          >
            <i class="fa fa-heart-o"></i>
          </router-link>
          <a
            class="same-action"
            title="Wishlist"
            href="javascript:;"
            @click="addWishlist($event)"
            v-if="!isWishlisted"
          >
            <i class="fa fa-heart-o"></i>
          </a>
          <a
            class="action-cart"
            title="Add To Cart"
            href="javascript:;"
            @click="addCart"
          >
            Add to Cart
          </a>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import { mapActions, mapGetters } from "vuex";
export default {
  name: "SyBsTwo",
  props: {
    product: Object,
  },
  data: function () {
    return {
      discount: 0,
    };
  },
  computed: {
    ...mapGetters("wishlist", ["wishList"]),
    isWishlisted: function () {
      if (
        this.wishList.findIndex((item) => item.name === this.product.name) > -1
      )
        return true;
      return false;
    },
  },
  mounted: function () {
    if (this.product.is_sale && this.product.price) {
      this.discount =
        ((this.product.price - this.product.sale_price) / this.product.price) *
        100;
      this.discount = parseInt(this.discount);
    }
  },
  methods: {
    ...mapActions("wishlist", ["addToWishlist"]),
    ...mapActions("cart", ["addToCart"]),
    addWishlist: function () {
      setTimeout(() => {
        this.addToWishlist({ product: this.product });
        /*document
                    .querySelector(".wishlist-popup")
                    .classList.add("active");

                setTimeout(() => {
                    document
                        .querySelector(".wishlist-popup")
                        .classList.remove("active");
                }, 1000);*/
      }, 1000);
    },
    addCart: function () {
      if (this.product.quantity_in_stock > 0) {
        let saledProduct = { ...this.product };
        if (this.product.is_sale) {
          saledProduct.price = this.product.sale_price;
        }

        this.addToCart({ product: saledProduct });
      }
    },
  },
};
</script>
