<template>
  <div class="container login-container">
    <pre-loader v-if="loading"></pre-loader>
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="row">
          <div class="col-md-12">
            <div class="heading mb-1">
              <h2 class="title">Login</h2>
            </div>

            <form action="#" v-on:submit.prevent="login">
              <label for="login-email">
                Email address
                <span class="required">*</span>
              </label>
              <input
                type="email"
                class="form-input form-wide"
                id="login-email"
                v-model="email"
                :disabled="loading"
                :class="errors.email ? 'error-input' : ''"
              />
              <small
                v-if="errors.email"
                style="display: block; color: red; font-size: 12px"
                >{{ errors.email }}</small
              >
              <label for="login-password">
                Password
                <span class="required">*</span>
              </label>
              <input
                type="password"
                class="form-input form-wide"
                id="login-password"
                v-model="password"
                :class="errors.password ? 'error-input' : ''"
                :disabled="loading"
              />
              <small
                v-if="errors.password"
                style="display: block; color: red; font-size: 12px"
                >{{ errors.password }}</small
              >

              <div class="form-footer">
                <div class="custom-control custom-checkbox mb-0">
                  <input
                    type="checkbox"
                    class="custom-control-input"
                    id="lost-password"
                    v-model="remember_me"
                  />
                  <label class="custom-control-label mb-0" for="lost-password">
                    Remember me
                  </label>
                </div>

                <router-link
                  to="/auth/forgot-password"
                  class="forget-password text-dark form-footer-right"
                >
                  Forgot Password?
                </router-link>
              </div>
              <button
                type="submit"
                id="submit"
                class="btn btn-dark btn-md w-100"
                :disabled="loading"
              >
                Login
              </button>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import PreLoader from "../../components/common/PreLoader";
import { mapActions } from "vuex";
import * as auth from "../../services/auth";
export default {
  name: "Login",
  metaInfo: {
    title: "Login",
    titleTemplate: "%s - Synoods Ecommerce",
  },
  components: {
    PreLoader,
  },
  watch: {
    email(value) {
      this.email = value;
      this.validateEmail(value);
    },
    password(value) {
      this.password = value;
      this.validatePassword(value);
    },
  },
  data() {
    return {
      email: "",
      password: "",
      remember_me: false,
      errors: {},
      loading: false,
    };
  },
  methods: {
    ...mapActions("user", ["userLogin"]),
    ...mapActions("notification", ["addNotification"]),
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
        this.errors.email = "";
        return true;
      }
    },
    validatePassword: function (value) {
      if (!value || value === "") {
        this.errors.password = "Password is required";
        return false;
      } else {
        this.errors.password = "";
        return true;
      }
    },
    login: async function () {
      if (!this.validateEmail(this.email)) {
        return;
      }
      if (!this.validatePassword(this.password)) {
        return;
      }
      let submit = document.getElementById("submit");
      try {
        this.loading = true;
        submit.innerText = "Loading...";
        const response = await auth.login({
          password: this.password,
          email: this.email,
          remember_me: this.remember_me,
        });
        this.loading = false;
        submit.innerText = "Login";

        if (response.status === 200) {
          this.email = "";
          this.password = "";
          this.remember_me = false;
          auth.setToken(response.data.data.access_token);
          this.userLogin(response.data.data.user);
          this.addNotification({
            type: "success",
            message: "Successfully logged in",
          });
          this.$router.push("/account");
        }
      } catch (error) {
        if (!error.response) return;
        this.loading = false;
        submit.innerText = "Login";
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