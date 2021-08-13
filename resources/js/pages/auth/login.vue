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
              <label for="login-password">
                Password
                <span class="required">*</span>
              </label>
              <input
                type="password"
                class="form-input form-wide"
                id="login-password"
                v-model.trim="$v.user.password.$model"
                :class="status($v.user.password)"
                :disabled="loading"
              />
              <small
                v-if="!checkRequired($v.user.password)"
                style="display: block; color: red; font-size: 12px"
                >Password is required</small
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
              <br /><br />
              <p>
                Create an account?
                <router-link to="/auth/register">Register</router-link>
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
import { mapActions } from "vuex";
import * as auth from "../../services/auth";
import { required, email } from "vuelidate/lib/validators";
export default {
  name: "Login",
  metaInfo: {
    title: "Login",
    titleTemplate: "%s - Synoods Ecommerce",
  },
  components: {
    PreLoader,
  },
  validations: {
    user: {
      email: { required, email },
      password: { required },
    },
  },
  data() {
    return {
      user: {
        email: "",
        password: "",
        remember_me: false,
      },
      errors: {},
      loading: false,
    };
  },
  methods: {
    ...mapActions("user", ["userLogin"]),
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
    checkEmail(validation) {
      if (!validation.$dirty && validation.$model == "") {
        return true;
      } else if (validation.$dirty && validation.$error && !validation.email) {
        return false;
      } else {
        return true;
      }
    },
    login: async function () {
      this.$v.user.$touch();
      if (this.$v.user.$invalid) {
        return;
      }

      let submit = document.getElementById("submit");
      try {
        this.loading = true;
        submit.innerText = "Loading...";
        const response = await auth.login(this.user);
        this.loading = false;
        submit.innerText = "Login";
        if (response.status === 200) {
          this.user.email = "";
          this.user.password = "";
          this.user.remember_me = false;
          auth.setToken(response.data.data.access_token);
          auth.setUser(response.data.data.user);
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
.error {
  border-color: red !important;
}
</style>