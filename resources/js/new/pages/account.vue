<template>
  <div>
    <pre-loader v-if="loading"></pre-loader>
    <sy-breadcrumb title="My Account"></sy-breadcrumb>
    <!-- my account start -->
    <div class="checkout-area pb-45 pt-65">
      <div class="container">
        <div class="row">
          <div class="ms-auto me-auto col-lg-9">
            <div class="checkout-wrapper">
              <div id="faq" class="panel-group">
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h5 class="panel-title">
                      <span>1</span>
                      <a data-bs-toggle="collapse" href="#my-account-1"
                        >Edit your account information
                      </a>
                    </h5>
                  </div>
                  <div
                    id="my-account-1"
                    class="panel-collapse collapse show"
                    data-bs-parent="#faq"
                  >
                    <form action="#" v-on:submit.prevent="updateProfile()">
                      <div class="panel-body">
                        <div class="billing-information-wrapper">
                          <div class="account-info-wrapper">
                            <h4>My Account Information</h4>
                            <h5>Your Personal Details</h5>
                          </div>
                          <div class="row">
                            <div class="col-lg-6 col-md-6">
                              <div class="billing-info">
                                <label>First Name</label>
                                <input
                                  type="text"
                                  v-model.trim="
                                    $v.userprofile.first_name.$model
                                  "
                                  :class="status($v.userprofile.first_name)"
                                  :disabled="loading"
                                />
                              </div>
                              <small
                                v-if="!checkRequired($v.userprofile.first_name)"
                                style="
                                  display: block;
                                  color: red;
                                  font-size: 12px;
                                "
                                >Firstname is required</small
                              >
                            </div>
                            <div class="col-lg-6 col-md-6">
                              <div class="billing-info">
                                <label>Last Name</label>
                                <input
                                  type="text"
                                  v-model.trim="$v.userprofile.last_name.$model"
                                  :class="status($v.userprofile.last_name)"
                                  :disabled="loading"
                                />
                              </div>
                              <small
                                v-if="!checkRequired($v.userprofile.last_name)"
                                style="
                                  display: block;
                                  color: red;
                                  font-size: 12px;
                                "
                                >Lastname is required</small
                              >
                            </div>
                            <div class="col-lg-12 col-md-12">
                              <div class="billing-info">
                                <label>Email Address</label>
                                <input
                                  type="email"
                                  v-model.trim="$v.userprofile.email.$model"
                                  :class="status($v.userprofile.email)"
                                  :disabled="loading"
                                  readonly
                                />
                              </div>
                              <small
                                v-if="!checkRequired($v.userprofile.email)"
                                style="
                                  display: block;
                                  color: red;
                                  font-size: 12px;
                                "
                                >Email address is required</small
                              >
                            </div>
                            <div class="col-lg-6 col-md-6">
                              <div class="billing-info">
                                <label>Telephone</label>
                                <input
                                  type="text"
                                  v-model.trim="$v.userprofile.phone.$model"
                                  :class="status($v.userprofile.phone)"
                                  :disabled="loading"
                                />
                              </div>

                              <small
                                v-if="!checkRequired($v.userprofile.phone)"
                                style="
                                  display: block;
                                  color: red;
                                  font-size: 12px;
                                "
                                >Phone number is required</small
                              >
                              <small
                                v-if="!checkLength($v.userprofile.phone)"
                                style="
                                  display: block;
                                  color: red;
                                  font-size: 12px;
                                "
                                >Phone number must not be more than 11
                                digits</small
                              >
                            </div>
                          </div>
                          <div class="billing-back-btn">
                            <div class="billing-back">
                              <a href="#"
                                ><i class="ion-arrow-up-c"></i> back</a
                              >
                            </div>
                            <div class="billing-btn">
                              <button type="submit" id="update_account">
                                Continue
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h5 class="panel-title">
                      <span>2</span>
                      <a data-bs-toggle="collapse" href="#my-account-2"
                        >Change your password
                      </a>
                    </h5>
                  </div>
                  <div
                    id="my-account-2"
                    class="panel-collapse collapse"
                    data-bs-parent="#faq"
                  >
                    <form action="#" v-on:submit.prevent="updatePassword()">
                      <div class="panel-body">
                        <div class="billing-information-wrapper">
                          <div class="account-info-wrapper">
                            <h4>Change Password</h4>
                            <h5>Your Password</h5>
                          </div>
                          <div class="row">
                            <div class="col-lg-12 col-md-12">
                              <div class="billing-info">
                                <label>Old Password</label>
                                <input
                                  type="password"
                                  :class="status($v.password.old_password)"
                                  :disabled="loading"
                                  v-model.trim="$v.password.old_password.$model"
                                />
                                <small
                                  v-if="
                                    !checkRequired($v.password.old_password)
                                  "
                                  style="
                                    display: block;
                                    color: red;
                                    font-size: 12px;
                                  "
                                  >Old Password is required</small
                                >
                                <small
                                  v-if="!checkLength($v.password.old_password)"
                                  style="
                                    display: block;
                                    color: red;
                                    font-size: 12px;
                                  "
                                  >Invalid old password</small
                                >
                              </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                              <div class="billing-info">
                                <label>Password</label>
                                <input
                                  type="password"
                                  :class="status($v.password.password)"
                                  :disabled="loading"
                                  v-model.trim="$v.password.password.$model"
                                />
                                <small
                                  v-if="!checkRequired($v.password.password)"
                                  style="
                                    display: block;
                                    color: red;
                                    font-size: 12px;
                                  "
                                  >Password is required</small
                                >
                                <small
                                  v-if="!checkLength($v.password.password)"
                                  style="
                                    display: block;
                                    color: red;
                                    font-size: 12px;
                                  "
                                  >Password must not less than 8
                                  character</small
                                >
                              </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                              <div class="billing-info">
                                <label>Password Confirm</label>
                                <input
                                  type="password"
                                  :class="status($v.password.confirm_password)"
                                  :disabled="loading"
                                  v-model.trim="
                                    $v.password.confirm_password.$model
                                  "
                                />
                              </div>
                              <small
                                v-if="
                                  !checkRequired($v.password.confirm_password)
                                "
                                style="
                                  display: block;
                                  color: red;
                                  font-size: 12px;
                                "
                                >Confirm Password is required</small
                              >
                              <small
                                v-if="!checkSame($v.password.confirm_password)"
                                style="
                                  display: block;
                                  color: red;
                                  font-size: 12px;
                                "
                                >Password not match</small
                              >
                            </div>
                          </div>
                          <div class="billing-back-btn">
                            <div class="billing-back">
                              <a href="#"
                                ><i class="ion-arrow-up-c"></i> back</a
                              >
                            </div>
                            <div class="billing-btn">
                              <button type="submit" id="update_password">
                                Continue
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h5 class="panel-title">
                      <span>3</span>
                      <a data-bs-toggle="collapse" href="#my-account-3"
                        >Billing Address
                      </a>
                    </h5>
                  </div>
                  <div
                    id="my-account-3"
                    class="panel-collapse collapse"
                    data-bs-parent="#faq"
                  >
                    <form
                      action="#"
                      v-on:submit.prevent="updateBillingAddress()"
                    >
                      <div class="panel-body">
                        <div class="billing-information-wrapper">
                          <div class="account-info-wrapper">
                            <h4>Update billing address</h4>
                          </div>
                          <div class="row">
                            <div class="col-lg-12 col-md-12">
                              <div class="billing-info">
                                <label> Country / Region </label>
                                <select
                                  name="orderby"
                                  class="form-control"
                                  v-model="$v.billing.country.$model"
                                  :class="status($v.billing.country)"
                                  :disabled="loading"
                                >
                                  <option value="Nigeria" selected="selected">
                                    Nigeria
                                  </option>
                                </select>
                                <small
                                  v-if="!checkRequired($v.billing.country)"
                                  style="
                                    display: block;
                                    color: red;
                                    font-size: 12px;
                                  "
                                  >Billing country is required</small
                                >
                              </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                              <div class="billing-info">
                                <label> Street address </label>
                                <input
                                  type="text"
                                  class="form-control"
                                  placeholder="House number and street name"
                                  v-model.trim="$v.billing.address.$model"
                                  :class="status($v.billing.address)"
                                  :disabled="loading"
                                />
                                <small
                                  v-if="!checkRequired($v.billing.address)"
                                  style="
                                    display: block;
                                    color: red;
                                    font-size: 12px;
                                  "
                                  >Billing address is required</small
                                >
                              </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                              <div class="billing-info">
                                <label> Town / City </label>
                                <input
                                  type="text"
                                  class="form-control"
                                  :class="status($v.billing.city)"
                                  :disabled="loading"
                                  v-model.trim="$v.billing.city.$model"
                                />
                                <small
                                  v-if="!checkRequired($v.billing.city)"
                                  style="
                                    display: block;
                                    color: red;
                                    font-size: 12px;
                                  "
                                  >Billing city is required</small
                                >
                              </div>
                            </div>
                            <div class="col-lg-12 col-md-12">
                              <div class="billing-info">
                                <label> State </label>
                                <input
                                  type="text"
                                  class="form-control"
                                  v-model.trim="$v.billing.state.$model"
                                  :class="status($v.billing.state)"
                                  :disabled="loading"
                                />
                                <small
                                  v-if="!checkRequired($v.billing.state)"
                                  style="
                                    display: block;
                                    color: red;
                                    font-size: 12px;
                                  "
                                  >Billing state is required</small
                                >
                              </div>
                            </div>
                          </div>
                          <div class="billing-back-btn">
                            <div class="billing-back">
                              <a href="#"
                                ><i class="ion-arrow-up-c"></i> back</a
                              >
                            </div>
                            <div class="billing-btn">
                              <button type="submit" id="billing_submit">
                                Continue
                              </button>
                            </div>
                          </div>
                        </div>
                      </div>
                    </form>
                  </div>
                </div>
                <div class="panel panel-default">
                  <div class="panel-heading">
                    <h5 class="panel-title">
                      <span>4</span>
                      <a data-bs-toggle="collapse" href="#my-account-4"
                        >Modify your address book entries
                      </a>
                    </h5>
                  </div>
                  <div
                    id="my-account-4"
                    class="panel-collapse collapse"
                    data-bs-parent="#faq"
                  >
                    <div class="panel-body">
                      <div class="billing-information-wrapper">
                        <div class="account-info-wrapper">
                          <h4>Address Book Entries</h4>
                        </div>
                        <div class="entries-wrapper">
                          <template v-if="getShippingAddesses.length > 0">
                            <div
                              class="row"
                              v-for="(address, index) in getShippingAddesses"
                              :key="index"
                            >
                              <div
                                class="
                                  col-lg-6 col-md-6
                                  d-flex
                                  align-items-center
                                  justify-content-center
                                "
                              >
                                <div class="entries-info text-center">
                                  <p>{{ address.address }},</p>
                                  <p>{{ address.postal_code }}</p>
                                  <p>{{ address.city }}, {{ address.state }}</p>
                                  <p>{{ address.country }}.</p>
                                  <p>{{ address.phone }}.</p>
                                </div>
                              </div>
                              <div
                                class="
                                  col-lg-6 col-md-6
                                  d-flex
                                  align-items-center
                                  justify-content-center
                                "
                              >
                                <div class="entries-edit-delete text-center">
                                  <a class="edit" href="#">Deactivate</a>
                                  <a href="#">Delete</a>
                                </div>
                              </div>
                            </div>
                          </template>
                          <template v-else>
                            <div class="row">
                              <div class="col-md-12">
                                <div class="entries-info text-center">
                                  <h4>No entries found</h4>
                                </div>
                              </div>
                            </div>
                          </template>
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
                      <span>5</span>
                      <router-link to="/wishlist"
                        >Modify your wish list
                      </router-link>
                    </h5>
                  </div>
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
import PreLoader from "../components/commons/PreLoader";
import SyBreadcrumb from "../components/commons/SyBreadcrumb";
import { mapGetters, mapActions } from "vuex";
import { baseUrl } from "../../api";
import * as auth from "../../services/auth";
import * as userService from "../../services/user";
import {
  required,
  sameAs,
  minLength,
  maxLength,
} from "vuelidate/lib/validators";

export default {
  name: "Account",
  metaInfo: {
    title: "Account",
    titleTemplate: "%s - Faadaakaa Ecommerce",
  },
  components: {
    PreLoader,
    SyBreadcrumb,
  },
  watch: {
    wishList: function () {
      this.makeCartItems();
    },
  },
  computed: {
    ...mapGetters("user", ["user", "getShippingAddesses", "getOrders"]),
    ...mapGetters("wishlist", ["wishList"]),
  },
  validations: {
    userprofile: {
      first_name: { required },
      last_name: { required },
      email: { required },
      phone: { required },
    },
    password: {
      old_password: {
        required,
        minLength: minLength(8),
      },
      password: {
        required,
        minLength: minLength(8),
      },
      confirm_password: {
        required,
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
      phone: { required, maxLength: maxLength(11) },
      postal_code: { required },
    },
  },
  created: function () {
    this.userprofile.first_name = auth.getUser().first_name;
    this.userprofile.last_name = auth.getUser().last_name;
    this.userprofile.email = auth.getUser().email;
    this.userprofile.phone = auth.getUser().phone_number;
    this.billing.city = auth.getUser().city;
    this.billing.address = auth.getUser().address;
    this.billing.state = auth.getUser().state;
    //this.billing.country = auth.getUser().country;
  },
  data: function () {
    return {
      isSticky: false,
      loading: false,
      baseUrl: baseUrl,
      wishItems: [],
      currentProduct: null,
      userprofile: {
        first_name: "",
        last_name: "",
        email: "",
        phone: "",
        type: "account",
      },
      password: {
        old_password: "",
        password: "",
        confirm_password: "",
        type: "password",
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
    this.makeCartItems();
  },
  destroyed: function () {},
  methods: {
    ...mapActions("user", ["userLogin", "userLogout"]),
    ...mapActions("notification", ["addNotification"]),
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
    checkLength(validation) {
      if (!validation.$dirty && validation.$model == "") {
        return true;
      } else if (
        validation.$dirty &&
        validation.$error &&
        (!validation.minLength || !validation.maxLength)
      ) {
        return false;
      } else {
        return true;
      }
    },
    checkSame(validation) {
      if (!validation.$dirty && validation.$model == "") {
        return true;
      } else if (
        validation.$dirty &&
        validation.$error &&
        !validation.sameAsPassword
      ) {
        return false;
      } else {
        return true;
      }
    },
    updateProfile: async function () {
      let submit = document.getElementById("update_account");
      this.$v.userprofile.$touch();
      if (this.$v.userprofile.$invalid) {
        return;
      }
      try {
        this.loading = true;
        const response = await userService.update(this.userprofile);
        console.log(response);
        this.userLogin(response.data.data.user);
        auth.setUser(response.data.data.user);
        this.addNotification({
          type: "success",
          message: response.data.data.message,
        });
        submit.innerText = "Save Address";
        this.loading = false;
        this.$router.go();
      } catch (err) {
        this.loading = false;
        submit.innerText = "Save Address";
        console.log(err.response);
        this.addNotification({
          type: "error",
          message: err.response.data.data.message,
        });
      }
    },
    updatePassword: async function () {
      let submit = document.getElementById("update_password");
      this.$v.password.$touch();
      if (this.$v.password.$invalid) {
        return;
      }
      try {
        this.loading = true;
        const response = await userService.update(this.password);
        console.log(response);
        this.userLogin(response.data.data.user);
        auth.setUser(response.data.data.user);
        this.addNotification({
          type: "success",
          message: response.data.data.message,
        });
        submit.innerText = "Save Address";
        this.loading = false;
        this.$router.go();
      } catch (err) {
        this.loading = false;
        submit.innerText = "Save Address";
        console.log(err.response);
        this.addNotification({
          type: "error",
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
        auth.setUser(response.data.data.user);
        this.addNotification({
          type: "success",
          message: response.data.data.message,
        });
        this.billing.address = "";
        this.billing.city = "";
        this.billing.state = "";
        submit.innerText = "Save Address";
        this.loading = false;
        this.$router.go();
      } catch (err) {
        this.loading = false;
        submit.innerText = "Save Address";
        console.log(err.response);
        this.addNotification({
          type: "error",
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
        auth.setUser(response.data.data.user);
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
        this.$router.go();
      } catch (err) {
        this.loading = false;
        submit.innerText = "Save Address";
        console.log(err.response);
        this.addNotification({
          type: "error",
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
  },
};
</script>

<style scoped>
.error {
  border-color: red !important;
}
</style>
