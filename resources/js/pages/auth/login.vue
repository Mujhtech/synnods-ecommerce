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
               <p v-if="errors.length">
                  <ul>
                    <li style="text-align:center;color:red" v-for="(error, index) in errors" :key="index">{{ error }}</li>
                  </ul>
                </p>
            </form>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import { mapActions } from 'vuex';
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
      errors: [],
      loading: false,
    };
  },
  methods: {
    ...mapActions( 'user', [ 'userLogin' ] ),
    ...mapActions( 'notification', [ 'addNotification' ] ),
    login: async function () {
      if (!this.user.email) {
        this.errors = [];
        this.errors.push("Email address is required");
        return;
      }
      if (
        !/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(
          this.user.email
        )
      ) {
        this.errors = [];
        this.errors.push("Invalid email address");
        return;
      }
      if (!this.user.password) {
        this.errors = [];
        this.errors.push("Password is required");
        return;
      }
      let submit = document.getElementById("submit");
      try {
        this.errors = [];
        this.loading = true;
        submit.innerText = "Loading...";
        const response = await auth.login(this.user);
        this.loading = false;
        submit.innerText = "Login";

        if(response.status === 200){
          this.user.email = "";
          this.user.password = "";
          this.user.remember_me = false;
          auth.setToken( response.data.data.access_token );
          this.userLogin( response.data.data.user );
          this.addNotification('Successfully logged in');
          this.$router.push('/account');
        }
      } catch (error) {
        if(!error.response) return;
        this.loading = false;
        submit.innerText = "Login";
        this.addNotification(error.response.data.data.message);
      }
    },
  },
};
</script>