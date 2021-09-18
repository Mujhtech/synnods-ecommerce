<template>
  <div>
    <!-- shopping-cart-area start -->
    <pre-loader v-if="loading"></pre-loader>
    <div class="cart-main-area pt-60 pb-65">
      <div class="container">
        <h3 class="page-title">Your cart items</h3>
        <div class="row">
          <div class="col-lg-12 col-md-12 col-sm-12 col-12">
            <form action="#">
              <div class="table-content table-responsive">
                <table>
                  <thead>
                    <tr>
                      <th></th>
                      <th>Product Name</th>
                      <th>Until Price</th>
                      <th>Qty</th>
                      <th>Subtotal</th>
                      <th></th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr v-for="(product, index) in cartItems" :key="index">
                      <td class="product-thumbnail">
                        <router-link
                          :to="'/product/' + product.slug"
                          class="product-image"
                        >
                          <img
                            :src="`${product.featured_image}`"
                            width="150"
                            height="150"
                            :alt="product.name"
                          />
                        </router-link>
                      </td>
                      <td class="product-name">
                        <router-link :to="'/product/' + product.slug">{{
                          product.name
                        }}</router-link>
                      </td>
                      <td class="product-price-cart">
                        <span class="amount">₦{{ product.price }}</span>
                      </td>
                      <td class="product-quantity">
                        <div class="pro-dec-cart">
                          <input
                            class="cart-plus-minus-box"
                            type="number"
                            :value="product.qty"
                            name="qtybutton"
                            :min="1"
                            :max="product.quantity_in_stock"
                            @change="changeQty($event, product)"
                          />
                        </div>
                      </td>
                      <td class="product-subtotal">
                        ₦{{ product.price * product.qty }}
                      </td>
                      <td class="product-remove">
                        <!--<a href="javascript:;"><i class="fa fa-pencil"></i></a>-->
                        <a href="javascript:;" @click="removeCart(product.name)"
                          ><i class="fa fa-times"></i
                        ></a>
                      </td>
                    </tr>
                  </tbody>
                </table>
              </div>
              <div class="row">
                <div class="col-lg-12">
                  <div class="cart-shiping-update-wrapper">
                    <div class="cart-shiping-update">
                      <router-link to="/shop">Continue Shopping</router-link>
                    </div>
                    <div class="cart-clear">
                      <button
                        type="button"
                        @click="updateMyCart"
                        id="update_cart"
                      >
                        Update Shopping Cart
                      </button>
                      <a href="javascript:;" @click="clearMyCart"
                        >Clear Shopping Cart</a
                      >
                    </div>
                  </div>
                </div>
              </div>
            </form>
            <div class="row">
              <div class="col-lg-4 col-md-6">
                <div class="cart-tax">
                  <div class="title-wrap">
                    <h4 class="cart-bottom-title section-bg-white">
                      Estimate Shipping And Tax
                    </h4>
                  </div>
                  <div class="tax-wrapper">
                    <p>Enter your destination to get a shipping estimate.</p>
                    <form v-on:submit.prevent="shippingQuote">
                      <div class="tax-select-wrapper">
                        <div class="tax-select">
                          <label> * Country </label>
                          <select
                            class="email s-email s-wid"
                            v-model.trim="$v.form2.country.$model"
                            :class="status($v.form2.country)"
                            :disabled="loading"
                          >
                            <option>Nigeria</option>
                          </select>
                          <small
                            v-if="!checkRequired($v.form2.country)"
                            style="display: block; color: red; font-size: 12px"
                            >Country is required</small
                          >
                        </div>
                        <div class="tax-select">
                          <label> * State </label>
                          <input
                            type="text"
                            v-model.trim="$v.form2.state.$model"
                            :class="status($v.form2.state)"
                            :disabled="loading"
                          />
                          <small
                            v-if="!checkRequired($v.form2.state)"
                            style="display: block; color: red; font-size: 12px"
                            >State is required</small
                          >
                        </div>
                        <div class="tax-select">
                          <label> * City </label>
                          <input
                            type="text"
                            v-model.trim="$v.form2.city.$model"
                            :class="status($v.form2.city)"
                            :disabled="loading"
                          />
                          <small
                            v-if="!checkRequired($v.form2.city)"
                            style="display: block; color: red; font-size: 12px"
                            >City is required</small
                          >
                        </div>
                        <button class="cart-btn-2" type="submit">
                          Get A Quote
                        </button>
                      </div>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-6">
                <div class="discount-code-wrapper">
                  <div class="title-wrap">
                    <h4 class="cart-bottom-title section-bg-white">
                      Use Coupon Code
                    </h4>
                  </div>
                  <div class="discount-code">
                    <p>Enter your coupon code if you have one.</p>
                    <form v-on:submit.prevent="checkCoupon">
                      <input
                        type="text"
                        v-model.trim="$v.form1.coupon.$model"
                        :class="status($v.form1.coupon)"
                        :disabled="loading"
                        name="coupon"
                      />
                      <small
                        v-if="!checkRequired($v.form1.coupon)"
                        style="display: block; color: red; font-size: 12px"
                        >Coupon code is required</small
                      >
                      <button class="cart-btn-2" type="submit">
                        Apply Coupon
                      </button>
                    </form>
                  </div>
                </div>
              </div>
              <div class="col-lg-4 col-md-12">
                <div class="grand-totall">
                  <div class="title-wrap">
                    <h4 class="cart-bottom-title section-bg-gary-cart">
                      Cart Total
                    </h4>
                  </div>
                  <h5>
                    Total products <span>₦{{ totalPrice }}</span>
                  </h5>
                  <div class="total-shipping">
                    <h5>Total shipping</h5>
                    <ul>
                      <li v-for="(sm, index) in shipping_methods" :key="index">
                        <input type="radio" />
                        Standard <span>₦20.00</span>
                      </li>
                    </ul>
                  </div>
                  <h4 class="grand-totall-title">
                    Grand Total <span>₦{{ totalPrice }}</span>
                  </h4>
                  <router-link to="/checkout">Proceed to Checkout</router-link>
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
import { mapGetters, mapActions } from "vuex";
import PreLoader from "../components/commons/PreLoader.vue";
import * as service from "../../services/checkout";
import { required } from "vuelidate/lib/validators";
export default {
  components: { PreLoader },
  name: "Cart",
  metaInfo: {
    title: "Cart",
    titleTemplate: "%s - Faadaakaa Ecommerce",
  },
  data: function () {
    return {
      cartItems: [],
      loading: false,
      form1: {
        coupon: "",
      },
      form2: {
        country: "Nigeria",
        state: "",
        city: "",
      },
      shipping_methods: [],
    };
  },
  validations: {
    form1: {
      coupon: { required },
    },
    form2: {
      city: { required },
      country: { required },
      state: { required },
    },
  },
  computed: {
    ...mapGetters("cart", ["cartList", "totalPrice"]),
  },
  created: function () {
    this.cartItems = [...this.cartList];
  },
  watch: {
    cartList: function () {
      this.cartItems = [...this.cartList];
    },
  },
  methods: {
    ...mapActions("cart", ["updateCart", "removeFromCart", "clearCart"]),
    ...mapActions("notification", ["addNotification"]),
    status(validation) {
      return {
        error: validation.$error,
      };
    },
    checkRequired(validation) {
      if (!validation.$dirty && validation.$model == "") {
        return true;
      } else if (
        validation.$dirty &&
        validation.$error &&
        validation.$model == ""
      ) {
        return false;
      } else {
        return true;
      }
    },
    clearMyCart: function () {
      this.clearCart({});
    },
    updateMyCart: function () {
      this.loading = true;
      document.getElementById("update_cart").innerText = "Updating";
      this.updateCart({ cartItems: this.cartItems });
      document.getElementById("update_cart").innerText = "Update Shopping Cart";
      this.loading = false;
    },
    changeQty: function (event, product) {
      this.cartItems = this.cartItems.reduce((acc, cur) => {
        if (cur.name === product.name) {
          return [
            ...acc,
            {
              ...cur,
              qty: event.target.value,
            },
          ];
        } else {
          return [...acc, cur];
        }
      }, []);
    },
    removeCart: function (name) {
      this.removeFromCart({ name: name });
      this.cartItems = this.cartItems.reduce((acc, cur) => {
        if (cur.name !== name) {
          return [...acc, cur];
        } else {
          return acc;
        }
      }, []);
    },
    checkCoupon: async function () {
      this.$v.form1.$touch();
      if (this.$v.form1.$invalid) {
        return;
      }
      try {
        this.loading = true;
        let response = await service.getCouponStatus(this.form1);
        console.log(response);
        this.loading = false;
      } catch (err) {
        console.log(err.response);
      }
    },
    shippingQuote: async function () {
      this.$v.form2.$touch();
      if (this.$v.form2.$invalid) {
        return;
      }
      try {
        this.loading = true;
        let response = await service.getShippingQoute(this.form2);
        console.log(response);
        this.loading = false;
      } catch (err) {
        console.log(err.response);
      }
    },
  },
};
</script>

<style scoped>
.error {
  border-color: red !important;
}
</style>
