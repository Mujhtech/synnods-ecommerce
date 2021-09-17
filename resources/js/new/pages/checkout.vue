<template>
  <div>
    <sy-breadcrumb title="My Checkout"></sy-breadcrumb>
    <!-- checkout-area start -->
    <div class="checkout-area pb-45 pt-65">
      <div class="container">
        <div class="row">
          <div class="col-lg-9">
            <div class="checkout-wrapper">
              <div id="faq" class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h5 class="panel-title">
                      <span>1.</span>
                      <a data-bs-toggle="collapse" href="#payment-1"
                        >Checkout method</a
                      >
                    </h5>
                  </div>
                  <div
                    id="payment-1"
                    class="panel-collapse collapse show"
                    data-bs-parent="#faq"
                  >
                    <sy-cart-user></sy-cart-user>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h5 class="panel-title">
                      <span>2.</span>
                      <a data-bs-toggle="collapse" href="#payment-2"
                        >billing information</a
                      >
                    </h5>
                  </div>
                  <div
                    id="payment-2"
                    class="panel-collapse collapse"
                    data-bs-parent="#faq"
                  >
                    <sy-cart-billing></sy-cart-billing>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h5 class="panel-title">
                      <span>3.</span>
                      <a data-bs-toggle="collapse" href="#payment-3"
                        >shipping information</a
                      >
                    </h5>
                  </div>
                  <div
                    id="payment-3"
                    class="panel-collapse collapse"
                    data-bs-parent="#faq"
                  >
                  <sy-cart-shipping :items="getShippingAddesses" @changeAddress="changeAddress"></sy-cart-shipping>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h5 class="panel-title">
                      <span>4.</span>
                      <a data-bs-toggle="collapse" href="#payment-4"
                        >Shipping method</a
                      >
                    </h5>
                  </div>
                  <div
                    id="payment-4"
                    class="panel-collapse collapse"
                    data-bs-parent="#faq"
                  >
                    <div class="panel-body">
                      <div class="shipping-method-wrapper">
                        <div class="shipping-method">
                          <p>Flat Rate</p>
                          <p>Fixed $40.00</p>
                        </div>
                        <div class="billing-back-btn">
                          <div class="billing-back">
                            <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                          </div>
                          <div class="billing-btn">
                            <button type="submit">Continue</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h5 class="panel-title">
                      <span>5.</span>
                      <a data-bs-toggle="collapse" href="#payment-5"
                        >payment information</a
                      >
                    </h5>
                  </div>
                  <div
                    id="payment-5"
                    class="panel-collapse collapse"
                    data-bs-parent="#faq"
                  >
                    <div class="panel-body">
                      <div class="payment-info-wrapper">
                        <div class="ship-wrapper">
                          <div
                            class="single-ship"
                            v-for="(item, index) in payment_methods"
                            :key="index"
                          >
                            <input
                              type="radio"
                              checked=""
                              :value="item.type"
                              name="methods"
                              v-model="methods"
                            />
                            <label>{{item.name}}</label>
                          </div>
                        </div>
                        <div class="billing-back-btn">
                          <div class="billing-back">
                            <a href="#"><i class="ion-arrow-up-c"></i> back</a>
                          </div>
                          <div class="billing-btn">
                            <button type="submit">Continue</button>
                          </div>
                        </div>
                      </div>
                    </div>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h5 class="panel-title">
                      <span>6.</span>
                      <a data-bs-toggle="collapse" href="#payment-6"
                        >Order Review</a
                      >
                    </h5>
                  </div>
                  <div
                    id="payment-6"
                    class="panel-collapse collapse"
                    data-bs-parent="#faq"
                  >
                    <sy-cart-item
                      :items="cartList"
                      :totalPrice="totalPrice"
                    ></sy-cart-item>
                  </div>
                </div>
              </div>
            </div>
          </div>
          <div class="col-lg-3">
            <div class="checkout-progress">
              <h4>Checkout Progress</h4>
              <ul>
                <li>Billing Address</li>
                <li>Shipping Address</li>
                <li>Shipping Method</li>
                <li>Payment Method</li>
              </ul>
            </div>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import SyBreadcrumb from "../components/commons/SyBreadcrumb";
import SyCartUser from "../components/cart/SyCartUser";
import SyCartBilling from "../components/cart/SyCartBilling";
import { mapGetters, mapActions } from "vuex";
import SyCartItem from "../components/cart/SyCartItem";
import * as service from "../../services/checkout";
import * as auth from "../../services/auth";
import SyCartShipping from '../components/cart/SyCartShipping';

export default {
  name: "Checkout",
  components: {
    SyBreadcrumb,
    SyCartUser,
    SyCartBilling,
    SyCartItem,
    SyCartShipping,
  },
  metaInfo: {
    title: "Checkout",
    titleTemplate: "%s - Faadaakaa Ecommerce",
  },
  data: function () {
    return {
      cartItems: [],
      payment_methods: [],
      shipping_address: null,
      methods: null,
      billing: {
        first_name: "",
        last_name: "",
        email: "",
        phone: "",
        address: "",
        state: "",
        city: "",
        country: "Nigeria",
      },
    };
  },
  created: function () {
    this.billing.first_name = auth.getUser().first_name;
    this.billing.last_name = auth.getUser().last_name;
    this.billing.email = auth.getUser().email;
    this.billing.phone = auth.getUser().phone_number;
    this.billing.city = auth.getUser().city;
    this.billing.address = auth.getUser().address;
    this.billing.state = auth.getUser().state;
  },
  mounted: function(){
    this.getPaymentMethod();
  },
  computed: {
    ...mapGetters("cart", ["cartList", "totalPrice"]),
    ...mapGetters("user", ["user", "getShippingAddesses", "getOrders"]),
  },
  methods: {
    ...mapActions("cart", ["updateCart", "removeFromCart", "clearCart"]),
    getPaymentMethod: async function () {
      try {
        let response = await service.getPaymentMethod();
        this.payment_methods = response.data.data.data;
      } catch(err){
        console.log(err.response)
      }
    },
    changeAddress: function(id){
      this.shipping_address = id;
    },
    getQuote: async function(){

    }
  },
};
</script>