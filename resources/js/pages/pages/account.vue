<template>
  <main class="main">
    <div class="page-header">
      <div class="container d-flex flex-column align-items-center">
        <nav aria-label="breadcrumb" class="breadcrumb-nav border-0">
          <ol class="breadcrumb">
            <li class="breadcrumb-item">
              <router-link to="/">Home</router-link>
            </li>
            <li class="breadcrumb-item" aria-current="shop">
              <router-link to="/shop">Shop</router-link>
            </li>
            <li class="breadcrumb-item active" aria-current="page">
              My Account
            </li>
          </ol>
        </nav>

        <h1>My Account</h1>
      </div>
    </div>
    <pre-loader v-if="loading"></pre-loader>
    <div class="container account-container custom-account-container">
      <div class="row">
        <div
          class="sidebar widget widget-dashboard col-lg-3 order-0"
          sticky-container
        >
          <div v-sticky="isSticky" sticky-offset="{top: 75}">
            <h2 class="text-uppercase">My Account</h2>

            <pv-tabs>
              <ul class="nav nav-tabs list flex-column mb-0" role="tablist">
                <li class="nav-item">
                  <a
                    class="nav-link active"
                    id="dashboard-tab"
                    data-toggle="tab"
                    href="#dashboard"
                    role="tab"
                    aria-controls="dashboard"
                    aria-selected="true"
                    >Dashboard</a
                  >
                </li>

                <li class="nav-item">
                  <a
                    class="nav-link"
                    id="order-tab"
                    data-toggle="tab"
                    href="#order"
                    role="tab"
                    aria-controls="order"
                    aria-selected="false"
                    >Orders</a
                  >
                </li>

                <li class="nav-item">
                  <a
                    class="nav-link"
                    id="address-tab"
                    data-toggle="tab"
                    href="#address"
                    role="tab"
                    aria-controls="address"
                    aria-selected="false"
                    >Addresses</a
                  >
                </li>

                <li class="nav-item">
                  <a
                    class="nav-link"
                    id="edit-tab"
                    data-toggle="tab"
                    href="#edit"
                    role="tab"
                    aria-controls="edit"
                    aria-selected="false"
                    >Account details</a
                  >
                </li>

                <li>
                  <router-link to="/wishlist">Wishlist</router-link>
                </li>

                <li>
                  <a href="javascript:void(0)" v-on:click="logout">Logout</a>
                </li>

                <li class="nav-item d-none">
                  <a
                    class="nav-link"
                    id="billing-tab"
                    data-toggle="tab"
                    href="#billing"
                    role="tab"
                    aria-controls="billing"
                    aria-selected="false"
                    >Billing</a
                  >
                </li>

                <li class="nav-item d-none">
                  <a
                    class="nav-link"
                    id="shipping-tab"
                    data-toggle="tab"
                    href="#shipping"
                    role="tab"
                    aria-controls="shipping"
                    aria-selected="false"
                    >Shipping</a
                  >
                </li>
              </ul>
            </pv-tabs>
          </div>
        </div>

        <div class="tab-content col-lg-9 order-1 order-lg-last mt-lg-0 mt-4">
          <div
            class="tab-pane fade show active"
            id="dashboard"
            role="tabpanel"
            aria-labelledby="dashboard-tab"
          >
            <div class="dashboard-content">
              <p>
                Hello
                <strong class="text-dark">{{ user.full_name }}</strong> (
                <a
                  href="javascript:void(0)"
                  v-on:click="logout"
                  class="btn btn-link"
                  >Log out</a
                >)
              </p>

              <p>
                From your account dashboard you can view your
                <a
                  class="btn btn-link link-to-tab"
                  href="#order"
                  data-toggle="order"
                  @click.prevent="tabClicked($event)"
                  >recent orders</a
                >, manage your
                <a
                  class="btn btn-link link-to-tab"
                  href="#address"
                  data-toggle="address"
                  @click.prevent="tabClicked($event)"
                  >shipping and billing addresses</a
                >, and
                <a
                  class="btn btn-link link-to-tab"
                  href="#edit"
                  data-toggle="edit"
                  @click.prevent="tabClicked($event)"
                  >edit your password and account details.</a
                >
              </p>

              <div class="mb-4"></div>

              <div class="row row-lg">
                <div class="col-6 col-md-4">
                  <div
                    class="feature-box text-center pb-4"
                    data-toggle="order"
                    @click.prevent="tabClicked($event)"
                  >
                    <a href="#order" class="link-to-tab">
                      <i class="sicon-social-dropbox"></i>
                    </a>
                    <div class="feature-box-content">
                      <h3>ORDERS</h3>
                    </div>
                  </div>
                </div>

                <div class="col-6 col-md-4">
                  <div
                    class="feature-box text-center pb-4"
                    data-toggle="address"
                    @click.prevent="tabClicked($event)"
                  >
                    <a href="#address" class="link-to-tab">
                      <i class="sicon-location-pin"></i>
                    </a>
                    <div class="feature-box-content">
                      <h3>ADDRESSES</h3>
                    </div>
                  </div>
                </div>

                <div class="col-6 col-md-4">
                  <div
                    class="feature-box text-center pb-4"
                    data-toggle="edit"
                    @click.prevent="tabClicked($event)"
                  >
                    <a href="#edit" class="link-to-tab">
                      <i class="icon-user-2"></i>
                    </a>
                    <div class="feature-box-content p-0">
                      <h3>ACCOUNT DETAILS</h3>
                    </div>
                  </div>
                </div>

                <div class="col-6 col-md-4">
                  <div class="feature-box text-center pb-4">
                    <router-link to="/wishlist">
                      <i class="sicon-heart"></i>
                    </router-link>
                    <div class="feature-box-content">
                      <h3>WISHLIST</h3>
                    </div>
                  </div>
                </div>

                <div class="col-6 col-md-4">
                  <div class="feature-box text-center pb-4">
                    <a href="javascript:void(0)" v-on:click="logout">
                      <i class="sicon-logout"></i>
                    </a>
                    <div class="feature-box-content">
                      <h3>LOGOUT</h3>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

          <div
            class="tab-pane fade"
            id="order"
            role="tabpanel"
            aria-labelledby="order-tab"
          >
            <div class="order-content">
              <h3 class="account-sub-title d-none d-md-block">
                <i class="sicon-social-dropbox align-middle mr-3"></i>Orders
              </h3>
              <div class="order-table-container text-center">
                <table class="table table-order text-left">
                  <thead>
                    <tr>
                      <th class="order-id">ORDER</th>
                      <th class="order-date">DATE</th>
                      <th class="order-status">STATUS</th>
                      <th class="order-price">TOTAL</th>
                      <th class="order-action">ACTIONS</th>
                    </tr>
                  </thead>
                  <tbody>
                    <tr>
                      <td class="text-center p-0" colspan="5">
                        <p class="mb-5 mt-5">No Order has been made yet.</p>
                      </td>
                    </tr>
                  </tbody>
                </table>
                <hr class="mt-0 mb-3 pb-2" />

                <router-link to="/shop" class="btn btn-dark"
                  >Go Shop</router-link
                >
              </div>
            </div>
          </div>

          <div
            class="tab-pane fade"
            id="address"
            role="tabpanel"
            aria-labelledby="address-tab"
          >
            <h3 class="account-sub-title d-none d-md-block mb-1">
              <i class="sicon-location-pin align-middle mr-3"></i>Addresses
            </h3>
            <div class="addresses-content">
              <p class="mb-4">
                The following addresses will be used on the checkout page by
                default.
              </p>

              <div class="row">
                <div class="address col-md-6">
                  <div class="heading d-flex">
                    <h4 class="text-dark mb-0">Billing address</h4>
                  </div>

                  <div class="address-box">
                    You have not set up this type of address yet.
                  </div>

                  <a
                    href="#address"
                    class="btn btn-default address-action link-to-tab"
                    data-toggle="billing"
                    @click.prevent="tabClicked($event), handler($event)"
                    >Update Address</a
                  >
                </div>

                <div class="address col-md-6 mt-5 mt-md-0">
                  <div class="heading d-flex">
                    <h4 class="text-dark mb-0">Shipping address</h4>
                  </div>

                  <div class="address-box">
                    You have not set up this type of address yet.
                  </div>

                  <a
                    href="#address"
                    class="btn btn-default address-action link-to-tab"
                    data-toggle="shipping"
                    @click.prevent="tabClicked($event), handler($event)"
                    >Add Address</a
                  >
                </div>
              </div>
            </div>
          </div>

          <div
            class="tab-pane fade"
            id="edit"
            role="tabpanel"
            aria-labelledby="edit-tab"
          >
            <h3 class="account-sub-title d-none d-md-block mt-0 pt-1 ml-1">
              <i class="icon-user-2 align-middle mr-3 pr-1"></i>Account Details
            </h3>
            <div class="account-content">
              <form action="#" v-on:submit.prevent="updateProfile">
                <div class="row">
                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="acc-name">
                        First name
                        <span class="required">*</span>
                      </label>
                      <input
                        type="text"
                        class="form-control"
                        placeholder="Editor"
                        id="acc-name"
                        name="acc-name"
                        v-model="first_name"
                        required
                      />
                    </div>
                  </div>

                  <div class="col-md-6">
                    <div class="form-group">
                      <label for="acc-lastname">
                        Last name
                        <span class="required">*</span>
                      </label>
                      <input
                        type="text"
                        class="form-control"
                        id="acc-lastname"
                        name="acc-lastname"
                        v-model="last_name"
                        required
                      />
                    </div>
                  </div>
                </div>

                <div class="form-group mb-2">
                  <label for="acc-text">
                    Phone Number
                    <span class="required">*</span>
                  </label>
                  <input
                    type="text"
                    class="form-control"
                    id="acc-text"
                    name="acc-text"
                    v-model="phone"
                    placeholder="Phone Number"
                    required
                  />
                </div>

                <div class="form-group mb-4">
                  <label for="acc-email">
                    Email address
                    <span class="required">*</span>
                  </label>
                  <input
                    type="email"
                    class="form-control"
                    id="acc-email"
                    name="acc-email"
                    v-model="email"
                    placeholder="editor@gmail.com"
                    readonly
                    required
                  />
                </div>

                <div class="change-password">
                  <h3 class="text-uppercase mb-2">Password Change</h3>

                  <div class="form-group">
                    <label for="acc-password"
                      >Current Password (leave blank to leave unchanged)</label
                    >
                    <input
                      type="password"
                      class="form-control"
                      id="acc-password"
                      name="acc-password"
                      v-model="old_password"
                    />
                  </div>

                  <div class="form-group">
                    <label for="acc-password"
                      >New Password (leave blank to leave unchanged)</label
                    >
                    <input
                      type="password"
                      class="form-control"
                      id="acc-new-password"
                      name="acc-new-password"
                      v-model="password"
                    />
                  </div>

                  <div class="form-group">
                    <label for="acc-password">Confirm New Password</label>
                    <input
                      type="password"
                      class="form-control"
                      id="acc-confirm-password"
                      name="acc-confirm-password"
                      v-model="confirm_password"
                    />
                  </div>
                </div>

                <div class="form-footer mt-3 mb-0">
                  <button
                    type="submit"
                    id="update-acc"
                    class="btn btn-dark mr-0"
                  >
                    Save changes
                  </button>
                </div>
              </form>
            </div>
          </div>

          <div
            class="tab-pane fade"
            id="billing"
            role="tabpanel"
            aria-labelledby="billing-tab"
          >
            <div class="address account-content mt-0 pt-2">
              <h4 class="title">Billing address</h4>

              <form
                class="mb-2"
                action="#"
                v-on:submit.prevent="updateBillingAddress"
              >
                <div class="select-custom">
                  <label>
                    Country / Region
                    <span class="required">*</span>
                  </label>
                  <select
                    name="orderby"
                    class="form-control"
                    v-model="billing_country"
                  >
                    <option value="Nigeria">Nigeria</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>
                    Street address
                    <span class="required">*</span>
                  </label>
                  <input
                    type="text"
                    class="form-control"
                    placeholder="House number and street name"
                    v-model="billing_address"
                    required
                  />
                </div>

                <div class="form-group">
                  <label>
                    Town / City
                    <span class="required">*</span>
                  </label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="billing_city"
                    required
                  />
                </div>

                <div class="form-group">
                  <label>
                    State
                    <span class="required">*</span>
                  </label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="billing_state"
                    required
                  />
                </div>

                <div class="form-footer mb-0">
                  <div class="form-footer-right">
                    <button
                      type="submit"
                      id="billing_submit"
                      class="btn btn-dark py-4"
                    >
                      Save Address
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>

          <div
            class="tab-pane fade"
            id="shipping"
            role="tabpanel"
            aria-labelledby="shipping-tab"
          >
            <div class="address account-content mt-0 pt-2">
              <h4 class="title mb-3">Shipping Address</h4>

              <form
                class="mb-2"
                action="#"
                v-on:submit.prevent="createShippingAddress"
              >
                <div class="select-custom">
                  <label>
                    Country / Region
                    <span class="required">*</span>
                  </label>
                  <select
                    name="orderby"
                    class="form-control"
                    v-model="shipping_country"
                  >
                    <option value="Nigeri">Nigeria</option>
                  </select>
                </div>

                <div class="form-group">
                  <label>
                    Street address
                    <span class="required">*</span>
                  </label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="shipping_address"
                    placeholder="House number and street name"
                    required
                  />
                </div>

                <div class="form-group">
                  <label>
                    Town / City
                    <span class="required">*</span>
                  </label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="shipping_city"
                    required
                  />
                </div>

                <div class="form-group">
                  <label>
                    State
                    <span class="required">*</span>
                  </label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="shipping_state"
                    required
                  />
                </div>

                <div class="form-group">
                  <label>
                    Postcode / ZIP
                    <span class="required">*</span>
                  </label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="shipping_postcode"
                    required
                  />
                </div>

                <div class="form-footer mb-0">
                  <div class="form-footer-right">
                    <button
                      type="submit"
                      id="shipping_submit"
                      class="btn btn-dark py-4"
                    >
                      Save Address
                    </button>
                  </div>
                </div>
              </form>
            </div>
          </div>
        </div>
      </div>
    </div>
  </main>
</template>

<script>
import PvTabs from "../../components/features/PvTabs";
import PreLoader from "../../components/common/PreLoader";
import Sticky from "vue-sticky-directive";
import { mapGetters, mapActions } from "vuex";
import * as auth from "../../services/auth";
import * as userService from "../../services/user";

export default {
  name: "Account",
  metaInfo: {
    title: "Account",
    titleTemplate: "%s - Synoods Ecommerce",
  },
  directives: {
    Sticky,
  },
  components: {
    PvTabs,
    PreLoader
  },
  computed: {
    ...mapGetters("user", ["user"]),
  },
  created: function () {
    this.first_name = this.user.first_name;
    this.last_name = this.user.last_name;
    this.email = this.user.email;
    this.phone = this.user.phone_number;
  },
  data: function () {
    return {
      isSticky: false,
      loading: false,
      first_name: "",
      last_name: "",
      email: "",
      phone: "",
      old_password: "",
      password: "",
      confirm_password: "",
      shipping_address: "",
      shipping_state: "",
      shipping_country: "",
      shipping_city: "",
      shipping_postcode: "",
      shipping_phone: "",
      billing_address: "",
      billing_state: "",
      billing_city: "",
      billing_country: "",
    };
  },
  mounted: function () {
    this.resizeHandler();
    window.addEventListener("resize", this.resizeHandler, {
      passive: true,
    });
  },
  destroyed: function () {
    window.removeEventListener("resize", this.resizeHandler);
  },
  methods: {
    ...mapActions("user", ["userLogout"]),
    ...mapActions("notification", ["addNotification"]),
    updateProfile: async function () {
      try {
        const response = await userService.update({
          first_name: this.first_name,
          last_name: this.last_name,
          phone: this.phone,
          email: this.email,
          password: this.password,
          old_password: this.old_password,
          password: this.password,
        });
        console.log(response);
      } catch (err) {
        console.log(err.response);
      }
    },
    updateBillingAddress: async function () {
      try {
        const response = await userService.updateBilling({
          address: billing_address,
          state: this.billing_state,
          country: this.billing_country,
          city: this.billing_city,
        });
        console.log(response);
      } catch (err) {
        console.log(err.response);
      }
    },
    createBillingAddress: async function () {
      try {
        const response = await userService.createShipping({
          address: shipping_address,
          state: shipping_state,
          country: shipping_country,
          city: shipping_city,
          postal_code: shipping_postcode,
          phone: shipping_phone,
        });
        console.log(response);
      } catch (err) {
        console.log(err.response);
      }
    },
    logout: async function () {
      try {
        const response = await auth.logout();
        this.userLogout({});
        this.addNotification({
          type: "success",
          message: "Successfully logged out",
        });
        console.log(response);
        this.$router.push("/");
      } catch (err) {
        console.log(err.response);
      }
    },
    tabClicked: function (e) {
      let linkId = e.target.getAttribute("data-toggle");
      if (!linkId)
        linkId = e.target.parentNode.parentNode.getAttribute("data-toggle");
      if (document.getElementById(linkId + "-tab"))
        document.getElementById(linkId + "-tab").click();
    },
    handler: function (e) {
      let linkId = e.target.getAttribute("href");
      if (document.querySelector(linkId + "-tab")) {
        document.querySelector(linkId + "-tab").classList.add("active");
      }
    },
    resizeHandler: function () {
      this.isSticky = window.innerWidth > 991 ? true : false;
    },
  },
};
</script>

<style scoped>
.error-input {
  border-color: red !important;
}
</style>