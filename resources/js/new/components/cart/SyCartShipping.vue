<template>
  <div class="panel-body">
    <pre-loader v-if="loading"></pre-loader>
    <div class="shipping-information-wrapper">
      <div class="ship-wrapper">
        <div class="single-ship">
          <input type="radio" name="address" value="address" checked="" />
          <label>Ship to this address</label>
        </div>
        <div class="single-ship">
          <input type="radio" name="address" value="dadress" />
          <label>Ship to different address</label>
        </div>
      </div>
      <div class="billing-select">
        <select
          class="email s-email s-wid"
          @change="address($event)"
          v-model="my_address"
        >
          <option value="0">Select Your Address</option>
          <option value="11">Add New Address</option>
          <option v-for="(item, index) in items" :key="index" :value="item.id">
            {{ item.address }},{{ item.postal_code }} {{ item.city }},
            {{ item.state }} {{ item.country }}.
          </option>
        </select>
      </div>
      <div class="row" v-if="my_address == 11">
        <form
          class="mb-2"
          action="#"
          v-on:submit.prevent="createShippingAddress"
        >
          <div class="col-lg-12 col-md-12">
            <div class="billing-info">
              <label>Address</label>
              <input
                type="text"
                v-model.trim="$v.shipping.address.$model"
                :class="status($v.shipping.address)"
                :disabled="loading"
              />
            </div>
            <small
              v-if="!checkRequired($v.shipping.address)"
              style="display: block; color: red; font-size: 12px"
              >Shipping address is required</small
            >
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="billing-info">
              <label>city</label>
              <input
                type="text"
                :class="status($v.shipping.city)"
                :disabled="loading"
                v-model.trim="$v.shipping.city.$model"
              />
            </div>
            <small
              v-if="!checkRequired($v.shipping.city)"
              style="display: block; color: red; font-size: 12px"
              >Shipping city is required</small
            >
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="billing-info">
              <label>State/Province</label>
              <input
                type="text"
                :class="status($v.shipping.state)"
                :disabled="loading"
                v-model.trim="$v.shipping.state.$model"
              />
            </div>
            <small
              v-if="!checkRequired($v.shipping.state)"
              style="display: block; color: red; font-size: 12px"
              >Shipping state is required</small
            >
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="billing-info">
              <label>Zip/Postal Code</label>
              <input
                type="text"
                :class="status($v.shipping.postal_code)"
                :disabled="loading"
                v-model.trim="$v.shipping.postal_code.$model"
              />
            </div>
            <small
              v-if="!checkRequired($v.shipping.postal_code)"
              style="display: block; color: red; font-size: 12px"
              >Shipping postal code is required</small
            >
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="billing-select">
              <label>Country</label>
              <select
                :class="status($v.shipping.country)"
                :disabled="loading"
                v-model="$v.shipping.country.$model"
              >
                <option value="Nigeria">Nigeria</option>
              </select>
            </div>
            <small
              v-if="!checkRequired($v.shipping.country)"
              style="display: block; color: red; font-size: 12px"
              >Shipping country is required</small
            >
          </div>
          <div class="col-lg-6 col-md-6">
            <div class="billing-info">
              <label>Telephone</label>
              <input
                type="text"
                v-model="$v.shipping.phone.$model"
                :class="status($v.shipping.phone)"
                :disabled="loading"
              />
            </div>
            <small
              v-if="!checkRequired($v.shipping.phone)"
              style="display: block; color: red; font-size: 12px"
              >Shipping phone number is required</small
            >
          </div>
          <div class="billing-btn">
            <button type="submit" id="shipping_submit">Save Address</button>
          </div>
        </form>
      </div>
      <div class="billing-back-btn">
        <div class="billing-back">
          <a href="#"><i class="ion-arrow-up-c"></i> back</a>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { required, maxLength } from "vuelidate/lib/validators";
import * as userService from "../../../services/user";
import * as auth from "../../../services/auth";
import PreLoader from "../commons/PreLoader";
import { mapActions } from "vuex";
export default {
  components: { PreLoader },
  name: "SyCartShipping",
  props: {
    items: Array,
  },
  data: function () {
    return {
      my_address: 0,
      loading: false,
      shipping: {
        address: "",
        state: "",
        country: "Nigeria",
        postal_code: "",
        phone: "",
        city: "",
      },
    };
  },
  validations: {
    shipping: {
      country: { required },
      state: { required },
      city: { required },
      address: { required },
      phone: { required, maxLength: maxLength(11) },
      postal_code: { required },
    },
  },
  methods: {
    ...mapActions("user", ["userLogin", "userLogout"]),
    ...mapActions("notification", ["addNotification"]),
    address: function () {
      if (this.my_address == 11 || this.my_address == 0) return;
      this.$emit("changeAddress", this.my_address);
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
  },
};
</script>