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
                v-model.trim="$v.user.first_name.$model"
                :disabled="loading"
                :class="status($v.user.first_name)"
              />
              <small
                v-if="!checkRequired($v.user.first_name)"
                style="display: block; color: red; font-size: 12px"
                >First name is required</small
              >
              <label for="register-lastname">
                Last Name
                <span class="required">*</span>
              </label>
              <input
                type="text"
                class="form-input form-wide"
                id="register-lastname"
                v-model="$v.user.last_name.$model"
                :disabled="loading"
                :class="status($v.user.last_name)"
              />
              <small
                v-if="!checkRequired($v.user.last_name)"
                style="display: block; color: red; font-size: 12px"
                >Last name is required</small
              >
              <label for="register-phone">
                Phone Number
                <span class="required">*</span>
              </label>
              <input
                type="text"
                class="form-input form-wide"
                id="register-phone"
                v-model="$v.user.phone.$model"
                :disabled="loading"
                :class="status($v.user.phone)"
              />
              <small
                v-if="!checkRequired($v.user.phone)"
                style="display: block; color: red; font-size: 12px"
                >Phone number is required</small
              >
              <small
                v-if="!checkNumb($v.user.phone)"
                style="display: block; color: red; font-size: 12px"
                >Phone number must be numbers</small
              >
              <small
                v-if="!checkLength($v.user.phone)"
                style="display: block; color: red; font-size: 12px"
                >Phone number must not be more than 11 digits</small
              >
              <label for="register-email">
                Email address
                <span class="required">*</span>
              </label>
              <input
                type="email"
                class="form-input form-wide"
                id="register-email"
                v-model.trim="$v.user.email.$model"
                :disabled="loading"
                :class="status($v.user.email)"
              />
              <small
                v-if="!checkRequired($v.user.email)"
                style="display: block; color: red; font-size: 12px"
                >Email address is required</small
              >
              <small
                v-if="!checkEmail($v.user.email)"
                style="display: block; color: red; font-size: 12px"
                >Email address is invalid</small
              >
              <label for="register-password">
                Password
                <span class="required">*</span>
              </label>
              <input
                type="password"
                class="form-input form-wide"
                id="register-password"
                v-model.trim="$v.user.password.$model"
                :disabled="loading"
                :class="status($v.user.password)"
              />
              <small
                v-if="!checkRequired($v.user.password)"
                style="display: block; color: red; font-size: 12px"
                >Password is required</small
              >
              <small
                v-if="!checkLength($v.user.password)"
                style="display: block; color: red; font-size: 12px"
                >Password must be greate than 8 character</small
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
              <p>
                Already have an account?
                <router-link to="/auth/login">Login</router-link>
              </p>
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
import {
  required,
  minLength,
  maxLength,
  numeric,
  email,
} from "vuelidate/lib/validators";

export default {
  name: "Register",
  metaInfo: {
    title: "Register",
    titleTemplate: "%s - Synoods Ecommerce",
  },
  components: {
    PreLoader,
  },
  validations: {
    user: {
      first_name: { required },
      last_name: { required },
      phone: { required, numeric, maxLength: maxLength(11) },
      password: { required, minLength: minLength(8) },
      email: { required, email },
    },
  },
  data() {
    return {
      user: {
        email: "",
        first_name: "",
        last_name: "",
        phone: "",
        password: "",
      },
      errors: {},
      loading: false,
    };
  },
  methods: {
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
    checkNumb(validation) {
      if (!validation.$dirty && validation.$model == "") {
        return true;
      } else if (
        validation.$dirty &&
        validation.$error &&
        !validation.numeric
      ) {
        return false;
      } else {
        return true;
      }
    },
    checkEmail(validation) {
      if (!validation.$dirty && validation.$model == "") {
        return true;
      } else if (validation.$dirty && validation.$error && !validation.email) {
        return false;
      } else {
        return true;
      }
    },
    register: async function () {
      this.$v.user.$touch();
      if (this.$v.user.$invalid) {
        return;
      }
      let submit = document.getElementById("submit");
      try {
        this.loading = true;
        submit.innerText = "Loading...";
        const response = await auth.register(this.user);
        this.loading = false;
        submit.innerText = "Register";
        //console.log(response);
        this.user.email = "";
        this.user.password = "";
        this.user.first_name = "";
        this.user.last_name = "";
        this.user.phone = "";
        this.addNotification({
          type: "success",
          message: response.data.data.message,
        });
        this.$router.push(`/auth/verify/${response.data.data.token}`);
      } catch (error) {
        this.loading = false;
        submit.innerText = "Register";
        //console.log(error.response);
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
.error {
  border-color: red !important;
}
</style>