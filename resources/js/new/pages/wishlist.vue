<template>
  <div>
    <sy-breadcrumb title="Wishlist"></sy-breadcrumb>
    <div class="cart-main-area pt-60 pb-25">
      <div class="container">
        <div class="cart-message carted" style="display: none">
          <strong class="single-cart-notice" v-if="currentProduct"
            >“{{ currentProduct.name }}”</strong
          >
          <span>has been added to cart successfully.</span>
        </div>

        <div class="cart-message removed" style="display: none">
          <strong class="single-cart-notice" v-if="currentProduct"
            >“{{ currentProduct.name }}”</strong
          >
          <span>has been successfully removed.</span>
        </div>
        <h3 class="page-title">Your cart items</h3>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <form action="#">
              <div class="table-content table-responsive wishlist">
                <table>
                  <thead>
                    <tr>
                      <th></th>
                      <th>Product Name</th>
                      <th>Until Price</th>
                      <th>Qty</th>
                      <th>Subtotal</th>
                      <th>Action</th>
                    </tr>
                  </thead>
                  <tbody>
                    <template v-if="wishItems.length > 0">
                      <tr v-for="(product, index) in wishItems" :key="index">
                        <td class="product-thumbnail">
                          <router-link
                            :to="'/product/' + product.slug"
                            class="product-image"
                          >
                            <img
                              :src="`${product.featured_image}`"
                              alt="product"
                              width="200"
                              height="200"
                            />
                          </router-link>
                        </td>
                        <td class="product-name">
                          <router-link :to="'/product/' + product.slug">{{
                            product.name
                          }}</router-link>
                        </td>
                        <td class="product-price-cart">
                          <template v-if="!product.is_sale">
                            <span class="amount">₦{{ product.price }}</span>
                          </template>

                          <template v-else>
                            <span class="amount"
                              >₦{{ product.sale_price }}</span
                            >
                            <span class="amount">₦{{ product.price }}</span>
                          </template>
                        </td>
                        <td class="product-quantity">
                          <div class="pro-dec-cart">
                            <input
                              class="cart-plus-minus-box"
                              type="text"
                              value="02"
                              name="qtybutton"
                            />
                          </div>
                        </td>
                        <td class="product-subtotal">
                          <template v-if="!product.is_sale">
                            <span class="amount">₦{{ product.price }}</span>
                          </template>

                          <template v-else>
                            <span class="amount"
                              >₦{{ product.sale_price }}</span
                            >
                            <span class="amount">₦{{ product.price }}</span>
                          </template>
                        </td>
                        <td class="product-wishlist-cart">
                          <a
                            href="javascript:;"
                            @click="removeWishlist(product)"
                            >remove</a
                          >
                          <a href="javascript:;" @click="addCart(product)"
                            >add to cart</a
                          >
                        </td>
                      </tr>
                    </template>
                    <template v-else>
                        <tr>
                            <td colspan="6">No data found</td>
                        </tr>
                    </template>
                  </tbody>
                </table>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>
<script>
import SyBreadcrumb from "../components/commons/SyBreadcrumb";
import { mapGetters, mapActions } from "vuex";
export default {
  name: "Wishlist",
  components: {
    SyBreadcrumb,
  },
  data: function () {
    return {
      wishItems: [],
      currentProduct: null,
    };
  },
  computed: {
    ...mapGetters("wishlist", ["wishList"]),
  },
  watch: {
    wishList: function () {
      this.makeCartItems();
    },
  },
  mounted: function () {
    this.makeCartItems();
  },
  methods: {
    ...mapActions("wishlist", ["removeFromWishlist"]),
    ...mapActions("cart", ["addToCart"]),
    makeCartItems: function () {
      this.wishItems = this.wishList;
      this.wishItems = this.wishList.reduce((acc, product) => {
        return [
          ...acc,
          {
            ...product,
          },
        ];
      }, []);
    },

    addCart: function (product) {
      this.currentProduct = product;
      document.querySelector(".cart-message.removed").style.display = "none";
      document.querySelector(".cart-message.carted").style.display = "block";
      this.addToCart({ product: product });
      this.removeFromWishlist({ id: product.id });
    },
    removeWishlist: function (product) {
      this.currentProduct = product;
      document.querySelector(".cart-message.carted").style.display = "none";
      document.querySelector(".cart-message.removed").style.display = "block";
      this.removeFromWishlist({ id: product.id });
    },
  },
};
</script>
