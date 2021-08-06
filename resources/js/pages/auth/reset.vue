<template>
  <div class="container reset-password-container">
    <pre-loader v-if="loading"></pre-loader>
    <div class="row">
      <div class="col-lg-6 offset-lg-3">
        <div class="feature-box border-top-primary">
          <div class="feature-box-content">
            <form class="mb-0" action="#" v-on:submit.prevent="reset">
              <div class="form-group mb-0">
                <label for="reset-password" class="font-weight-normal"
                  >New Password</label
                >
                <input
                  type="password"
                  class="form-control"
                  id="reset-password"
                  name="reset-password"
                  v-model="user.password"
                  :disabled="loading"
                  required
                />
              </div>
              <div class="form-group mb-0">
                <label for="reset-cpassword" class="font-weight-normal"
                  >Confirm Password</label
                >
                <input
                  type="password"
                  class="form-control"
                  id="reset-cpassword"
                  name="reset-cpassword"
                  v-model="user.confirmed"
                  :disabled="loading"
                  required
                />
              </div>

              <div class="form-footer mb-0">
                <router-link to="/auth/login">Click here to login</router-link>

                <button
                  type="submit"
                  id="submit"
                  class="
                    btn btn-md btn-primary
                    form-footer-right
                    font-weight-normal
                    text-transform-none
                    mr-0
                  "
                >
                  Reset Password
                </button>
              </div>
            </form>
            <p v-if="errors.length">
                  <ul>
                    <li style="text-align:center;color:red" v-for="(error, index) in errors" :key="index">{{ error }}</li>
                  </ul>
                </p>
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import PreLoader from '../../components/common/PreLoader';
import * as auth from "../../services/auth";
import { mapActions } from 'vuex';

export default {
  name: "Reset",
  metaInfo: {
    title: "Reset Account",
    titleTemplate: "%s - Synoods Ecommerce",
  },
  components: {
    PreLoader
  },
  mounted() {
    this.user.token = this.$route.params.token;
  },
  data() {
    return {
      user: {
        token: "",
        password: "",
        confirmed: "",
      },
      errors: [],
      loading: false,
    };
  },
  methods: {
    ...mapActions( 'notification', [ 'addNotification' ] ),
    reset: async function () {
      if (!this.user.password) {
        this.errors = [];
        this.errors.push("Password is required");
        return;
      }
      if (!this.user.confirmed) {
        this.errors = [];
        this.errors.push("Confirm Password is required");
        return;
      }
      if (this.user.password != this.user.confirmed) {
        this.errors = [];
        this.errors.push("Password not match");
        return;
      }
      let submit = document.getElementById("submit");
      try {
        this.errors = [];
        this.loading = true;
        submit.innerText = "Loading...";
        console.log(this.user);
        const response = await auth.reset(this.user);
        this.loading = false;
        this.user.password = "",
        this.user.confirmed = "", 
        submit.innerText = "Reset Password";
        this.addNotification({type: 'success', message: 'Password reset successfully'});
        console.log(response);
      } catch (error) {
        this.loading = false;
        submit.innerText = "Reset Password";
        console.log(error.response);
        this.addNotification({type: 'error', message: error.response.data.data ? error.response.data.data.message: 'Something went wrong'});
      }
    },
  },
};
</script>