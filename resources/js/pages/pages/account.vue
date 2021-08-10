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
                    <p v-if="user.address === null">
                      You have not set up this type of address yet.
                    </p>
                    <p v-else>
                      {{ user.address }},<br />
                      {{ user.city }}, {{ user.state }} {{ user.country }}.
                    </p>
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
                    <h4 class="text-dark mb-0">Shipping addresses</h4>
                  </div>

                  <div class="address-box">
                    <ul v-if="getShippingAddesses.length > 0">
                      <li
                        v-for="(address, index) in getShippingAddesses"
                        :key="index"
                      >
                        {{ address.address }},<br />{{ address.postal_code }}
                        {{ address.city }}, {{ address.state }}
                        {{ address.country }}.<br />{{ address.phone }}
                      </li>
                    </ul>
                    <p v-else>You have not set up this type of address yet.</p>
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
                        v-model="userprofile.first_name"
                        :class="
                          !$v.userprofile.first_name.required
                            ? 'error-input'
                            : ''
                        "
                        :disabled="loading"
                      />
                      <small
                        v-if="!$v.userprofile.first_name.required"
                        style="display: block; color: red; font-size: 12px"
                        >Firstname is required</small
                      >
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
                        v-model="userprofile.last_name"
                        :class="
                          !$v.userprofile.last_name.required
                            ? 'error-input'
                            : ''
                        "
                        :disabled="loading"
                        required
                      />
                      <small
                        v-if="!$v.userprofile.last_name.required"
                        style="display: block; color: red; font-size: 12px"
                        >Lastname is required</small
                      >
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
                    v-model="userprofile.phone"
                    :class="!$v.userprofile.phone.required ? 'error-input' : ''"
                    :disabled="loading"
                    placeholder="Phone Number"
                  />
                  <small
                    v-if="!$v.userprofile.phone.required"
                    style="display: block; color: red; font-size: 12px"
                    >Phone number is required</small
                  >
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
                    v-model="userprofile.email"
                    :class="!$v.userprofile.email.required ? 'error-input' : ''"
                    :disabled="loading"
                    placeholder="editor@gmail.com"
                    readonly
                  />
                  <small
                    v-if="!$v.userprofile.email.required"
                    style="display: block; color: red; font-size: 12px"
                    >Email address is required</small
                  >
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
                      :class="errors.old_password ? 'error-input' : ''"
                      :disabled="loading"
                      v-model="userprofile.old_password"
                    />
                    <small
                      v-if="errors.old_password"
                      style="display: block; color: red; font-size: 12px"
                      >{{ errors.old_password }}</small
                    >
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
                      :class="
                        !$v.userprofile.password.minLength ? 'error-input' : ''
                      "
                      :disabled="loading"
                      v-model="userprofile.password"
                    />
                    <small
                      v-if="!$v.userprofile.password.minLength"
                      style="display: block; color: red; font-size: 12px"
                      >Password must not less than 8 character</small
                    >
                  </div>

                  <div class="form-group">
                    <label for="acc-password">Confirm New Password</label>
                    <input
                      type="password"
                      class="form-control"
                      id="acc-confirm-password"
                      name="acc-confirm-password"
                      :class="errors.confirm_password ? 'error-input' : ''"
                      :disabled="loading"
                      v-model="userprofile.confirm_password"
                    />
                    <small
                      v-if="!$v.userprofile.confirm_password.sameAsPassword"
                      style="display: block; color: red; font-size: 12px"
                      >Password not match</small
                    >
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
                    v-model="billing.country"
                    :class="!$v.billing.country.required ? 'error-input' : ''"
                    :disabled="loading"
                  >
                    <option value="Nigeria" selected="selected">Nigeria</option>
                  </select>
                  <small
                    v-if="!$v.billing.country.required"
                    style="display: block; color: red; font-size: 12px"
                    >Billing country is required</small
                  >
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
                    v-model="billing.address"
                    :class="!$v.billing.address.required ? 'error-input' : ''"
                    :disabled="loading"
                  />
                  <small
                    v-if="!$v.billing.address.required"
                    style="display: block; color: red; font-size: 12px"
                    >Billing address is required</small
                  >
                </div>

                <div class="form-group">
                  <label>
                    Town / City
                    <span class="required">*</span>
                  </label>
                  <input
                    type="text"
                    class="form-control"
                    :class="!$v.billing.city.required ? 'error-input' : ''"
                    :disabled="loading"
                    v-model="billing.city"
                  />
                  <small
                    v-if="!$v.billing.city.required"
                    style="display: block; color: red; font-size: 12px"
                    >Billing city is required</small
                  >
                </div>

                <div class="form-group">
                  <label>
                    State
                    <span class="required">*</span>
                  </label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="billing.state"
                    :class="!$v.billing.state.required ? 'error-input' : ''"
                    :disabled="loading"
                  />
                  <small
                    v-if="!$v.billing.state.required"
                    style="display: block; color: red; font-size: 12px"
                    >Billing state is required</small
                  >
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
                    :class="!$v.shipping.country.required ? 'error-input' : ''"
                    :disabled="loading"
                    v-model="shipping.country"
                  >
                    <option value="Nigeria" selected="selected">Nigeria</option>
                  </select>
                  <small
                    v-if="!$v.shipping.country.required"
                    style="display: block; color: red; font-size: 12px"
                    >Shipping country is required</small
                  >
                </div>

                <div class="form-group">
                  <label>
                    Street address
                    <span class="required">*</span>
                  </label>
                  <input
                    type="text"
                    class="form-control"
                    v-model="shipping.address"
                    :class="!$v.shipping.address.required ? 'error-input' : ''"
                    :disabled="loading"
                    placeholder="House number and street name"
                  />
                  <small
                    v-if="!$v.shipping.address.required"
                    style="display: block; color: red; font-size: 12px"
                    >Shipping address is required</small
                  >
                </div>

                <div class="form-group">
                  <label>
                    Town / City
                    <span class="required">*</span>
                  </label>
                  <input
                    type="text"
                    class="form-control"
                    :class="!$v.shipping.city.required ? 'error-input' : ''"
                    :disabled="loading"
                    v-model="shipping.city"
                  />
                  <small
                    v-if="!$v.shipping.city.required"
                    style="display: block; color: red; font-size: 12px"
                    >Shipping city is required</small
                  >
                </div>

                <div class="form-group">
                  <label>
                    State
                    <span class="required">*</span>
                  </label>
                  <input
                    type="text"
                    class="form-control"
                    :class="!$v.shipping.state.required ? 'error-input' : ''"
                    :disabled="loading"
                    v-model="shipping.state"
                  />
                  <small
                    v-if="
                      !$v.shipping.state.required && $v.shipping.state.invalid
                    "
                    style="display: block; color: red; font-size: 12px"
                    >Shipping state is required</small
                  >
                </div>

                <div class="form-group">
                  <label>
                    Postcode / ZIP
                    <span class="required">*</span>
                  </label>
                  <input
                    type="text"
                    class="form-control"
                    :class="
                      !$v.shipping.postal_code.required ? 'error-input' : ''
                    "
                    :disabled="loading"
                    v-model="shipping.postal_code"
                  />
                  <small
                    v-if="!$v.shipping.postal_code.required"
                    style="display: block; color: red; font-size: 12px"
                    >Shipping postal code is required</small
                  >
                </div>
                <div class="form-group mb-3">
                  <label>
                    Phone
                    <span class="required">*</span>
                  </label>
                  <input
                    type="number"
                    v-model="shipping.phone"
                    :class="!$v.shipping.phone.required ? 'error-input' : ''"
                    :disabled="loading"
                    class="form-control"
                  />
                  <small
                    v-if="!$v.shipping.phone.required"
                    style="display: block; color: red; font-size: 12px"
                    >Shipping phone number is required</small
                  >
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
import { required, sameAs, minLength } from "vuelidate/lib/validators";

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
    PreLoader,
  },
  computed: {
    ...mapGetters("user", ["user", "getShippingAddesses"]),
  },
  validations: {
    userprofile: {
      first_name: { required },
      last_name: { required },
      email: { required },
      phone: { required },
      password: {
        minLength: minLength(8),
      },
      confirm_password: {
        sameAsPassword: sameAs("password"),
      },
    },
    billing: {
      country: { required },
      state: { required },
      city: { required },
      address: { required },
    },
    shipping: {
      country: { required },
      state: { required },
      city: { required },
      address: { required },
      phone: { required },
      postal_code: { required },
    },
  },
  created: function () {
    this.userprofile.first_name = this.user.first_name;
    this.userprofile.last_name = this.user.last_name;
    this.userprofile.email = this.user.email;
    this.userprofile.phone = this.user.phone_number;
    this.billing.city = this.user.city;
    this.billing.address = this.user.address;
    this.billing.state = this.user.state;
    //this.billing.country = this.user.country;
  },
  data: function () {
    return {
      isSticky: false,
      loading: false,
      userprofile: {
        first_name: "",
        last_name: "",
        email: "",
        phone: "",
        old_password: "",
        password: "",
        confirm_password: "",
      },
      shipping: {
        address: "",
        state: "",
        country: "Nigeria",
        postal_code: "",
        phone: "",
        city: "",
      },
      billing: {
        address: "",
        state: "",
        city: "",
        country: "Nigeria",
      },
      errors: {},
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
    ...mapActions("user", ["userLogin", "userLogout"]),
    ...mapActions("notification", ["addNotification"]),
    updateProfile: async function () {
      let submit = document.getElementById("billing_submit");
      this.$v.userprofile.$touch();
      if (this.$v.userprofile.$invalid) {
        return;
      }
      try {
        const response = await userService.update(this.userprofile);
        console.log(response);
        this.userLogin(response.data.data.user);
        this.addNotification({
          type: "success",
          message: response.data.data.message,
        });
        submit.innerText = "Save Address";
        this.loading = false;
        this.$router.push("/");
      } catch (err) {
        this.loading = false;
        submit.innerText = "Save Address";
        console.log(err.response);
        this.addNotification({
          type: "success",
          message: err.response.data.data.message,
        });
      }
    },
    updateBillingAddress: async function () {
      let submit = document.getElementById("billing_submit");
      this.$v.billing.$touch();
      if (this.$v.billing.$invalid) {
        return;
      }
      try {
        this.loading = true;
        submit.innerText = "Loading";
        const response = await userService.updateBilling(this.billing);
        console.log(response);
        this.userLogin(response.data.data.user);
        this.addNotification({
          type: "success",
          message: response.data.data.message,
        });
        this.billing.address = "";
        this.billing.city = "";
        this.billing.state = "";
        submit.innerText = "Save Address";
        this.loading = false;
        this.$router.push("/account");
      } catch (err) {
        this.loading = false;
        submit.innerText = "Save Address";
        console.log(err.response);
        this.addNotification({
          type: "success",
          message: err.response.data.data.message,
        });
      }
    },
    createShippingAddress: async function () {
      let submit = document.getElementById("shipping_submit");
      this.$v.shipping.$touch();
      if (this.$v.shipping.$invalid) {
        return;
      }
      try {
        this.loading = true;
        submit.innerText = "Loading";
        const response = await userService.createShipping(this.shipping);
        console.log(response);
        this.userLogin(response.data.data.user);
        this.addNotification({
          type: "success",
          message: response.data.data.message,
        });
        this.shipping.postal_code = "";
        this.shipping.city = "";
        this.shipping.state = "";
        this.shipping.phone = "";
        submit.innerText = "Save Address";
        this.loading = false;
        this.$router.push("/account");
      } catch (err) {
        this.loading = false;
        submit.innerText = "Save Address";
        console.log(err.response);
        this.addNotification({
          type: "success",
          message: err.response.data.data.message,
        });
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