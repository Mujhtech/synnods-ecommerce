<template>
  <div class="container login-container">
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
                v-model="user.email"
                :disabled="loading"
                required
              />

              <label for="login-password">
                Password
                <span class="required">*</span>
              </label>
              <input
                type="password"
                class="form-input form-wide"
                id="login-password"
                v-model="user.password"
                :disabled="loading"
                required
              />

              <div class="form-footer">
                <div class="custom-control custom-checkbox mb-0">
                  <input
                    type="checkbox"
                    class="custom-control-input"
                    id="lost-password"
                    v-model="user.remember_me"
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
import * as auth from "../../services/auth";

export default {
  name: "Login",
  metaInfo: {
    title: "Login",
    titleTemplate: "%s - Synoods Ecommerce",
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
    login: async function () {
      let submit = document.getElementById("submit");
      try {
        this.loading = true;
        submit.innerText = "Loading...";
        const response = await auth.login(this.user);
        this.loading = false;
        submit.innerText = "Login";
        console.log(response);
      } catch (error) {
        this.loading = false;
        submit.innerText = "Login";
        this.$notify({
          group: "notify",
          text: error.response.data.data.message,
          color: "red",
        });
        console.log(error.response);
      }
    },
  },
};
</script>