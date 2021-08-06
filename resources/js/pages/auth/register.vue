<template>
  <div class="container login-container">
    <pre-loader v-if="loading"></pre-loader>
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="row">
          <div class="col-md-12">
            <div class="heading mb-1">
              <h2 class="title">Register</h2>
            </div>

            <form action="#" v-on:submit.prevent="register">
              <label for="register-firstname">
                First Name
                <span class="required">*</span>
              </label>
              <input
                type="text"
                class="form-input form-wide"
                id="register-firstname"
                v-model="first_name"
                :disabled="loading"
                :class="errors.first_name ? 'error-input' : ''"
              />
              <small
                v-if="errors.first_name"
                style="display: block; color: red; font-size: 12px"
                >{{ errors.first_name }}</small
              >
              <label for="register-lastname">
                Last Name
                <span class="required">*</span>
              </label>
              <input
                type="text"
                class="form-input form-wide"
                id="register-lastname"
                v-model="last_name"
                :disabled="loading"
                :class="errors.last_name ? 'error-input' : ''"
              />
              <small
                v-if="errors.last_name"
                style="display: block; color: red; font-size: 12px"
                >{{ errors.last_name }}</small
              >
              <label for="register-phone">
                Phone Number
                <span class="required">*</span>
              </label>
              <input
                type="text"
                class="form-input form-wide"
                id="register-phone"
                v-model="phone"
                :disabled="loading"
                :class="errors.phone ? 'error-input' : ''"
              />
              <small v-if="errors.phone" style="display: block; color: red; font-size: 12px">{{
                errors.phone
              }}</small>
              <label for="register-email">
                Email address
                <span class="required">*</span>
              </label>
              <input
                type="email"
                class="form-input form-wide"
                id="register-email"
                v-model="email"
                :disabled="loading"
                :class="errors.email ? 'error-input' : ''"
              />
              <small v-if="errors.email" style="display: block; color: red; font-size: 12px">{{
                errors.email
              }}</small>
              <label for="register-password">
                Password
                <span class="required">*</span>
              </label>
              <input
                type="password"
                class="form-input form-wide"
                id="register-password"
                v-model="password"
                :disabled="loading"
                :class="errors.password ? 'error-input' : ''"
              />
              <small
                v-if="errors.password"
                style="display: block; color: red; font-size: 12px"
                >{{ errors.password }}</small
              >
              <div class="form-footer mb-2">
                <button
                  type="submit"
                  id="submit"
                  class="btn btn-dark btn-md w-100 mr-0"
                >
                  Register
                </button>
              </div>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import PreLoader from "../../components/common/PreLoader";
import * as auth from "../../services/auth";
import { mapActions } from "vuex";

export default {
  name: "Register",
  metaInfo: {
    title: "Register",
    titleTemplate: "%s - Synoods Ecommerce",
  },
  components: {
    PreLoader,
  },
  data() {
    return {
      email: "",
      first_name: "",
      last_name: "",
      phone: "",
      password: "",
      errors: {},
      loading: false,
    };
  },
  watch: {
    email(value) {
      this.email = value;
      this.validateEmail(value);
    },
    first_name(value) {
      this.first_name = value;
      this.validateFirstName(value);
    },
    last_name(value) {
      this.last_name = value;
      this.validateLastName(value);
    },
    phone(value) {
      this.phone = value;
      this.validatePhone(value);
    },
    password(value) {
      this.password = value;
      this.validatePassword(value);
    },
  },
  methods: {
    ...mapActions("notification", ["addNotification"]),
    validateFirstName: function (value) {
      if (!value || value == "") {
        this.errors.first_name = "First name is required";
        return false;
      } else {
        this.errors.first_name = '';
        return true;
      }
    },
    validateLastName: function (value) {
      if (!value || value === "") {
        this.errors.last_name = "Last name is required";
        return false;
      } else {
        this.errors.last_name = '';
        return true;
      }
    },
    validateEmail: function (value) {
      if (!value || value === "") {
        this.errors.email = "Email address is required";
        return false;
      } else if (
        !/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(
          value
        )
      ) {
        this.errors.email = "Invalid email address";
        return false;
      } else {
        this.errors.email = '';
        return true;
      }
    },
    validatePhone: function (value) {
      if (!value || value === "") {
        this.errors.phone = "Phone number is required";
        return false;
      } else if (value.length > 11) {
        this.errors.phone = "Phone number must be more than 11 digits";
        return false;
      } else if (!/^-?\d+$/.test(value)) {
        this.errors.phone = "Phone number must be a number";
        return false;
      } else {
        this.errors.phone = '';
        return true;
      }
    },
    validatePassword: function (value) {
      if (!value || value === "") {
        this.errors.password = "Password is required";
        return false;
      } else if (value.length < 8) {
        this.errors.password = "Password length must be atleast 8 characters";
        return false;
      } else if (!value.match(/[0-9]/g)) {
        this.errors.password = "Password must contain number";
        return false
      } else {
        this.errors.password = '';
        return true;
      }
    },
    register: async function () {
      if(!this.validateFirstName(this.first_name)){
        return;
      }
      if(!this.validateLastName(this.last_name)){
        return;
      }
      if(!this.validatePhone(this.phone)){
        return;
      }
      if(!this.validateEmail(this.email)){
        return;
      }
      if(!this.validatePassword(this.password)){
        return;
      }
      let submit = document.getElementById("submit");
      try {
        this.loading = true;
        submit.innerText = "Loading...";
        const response = await auth.register({
          email: this.email,
          password: this.password,
          first_name: this.first_name,
          last_name: this.last_name,
          phone: this.phone,
        });
        this.loading = false;
        submit.innerText = "Register";
        console.log(response);
        this.email = "";
        this.password = "";
        this.first_name = "";
        this.last_name = "";
        this.phone = "";
        this.addNotification({
          type: "success",
          message: response.data.data.message,
        });
        this.$router.push(`/auth/verify/${response.data.data.token}`);
      } catch (error) {
        this.loading = false;
        submit.innerText = "Register";
        console.log(error.response);
        this.addNotification({
          type: "error",
          message: error.response.data.data
            ? error.response.data.data.message
            : "Something went wrong",
        });
      }
    },
  },
};
</script>

<style scoped>
.error-input {
  border-color: red !important;
}
</style>