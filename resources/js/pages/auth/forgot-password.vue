<template>
  <div class="container reset-password-container">
    <pre-loader v-if="loading"></pre-loader>
    <div class="row">
      <div class="col-lg-6 offset-lg-3">
        <div class="feature-box border-top-primary">
          <div class="feature-box-content">
            <form class="mb-0" action="#" v-on:submit.prevent="recover">
              <p>
                Lost your password? Please enter your email address. You will
                receive a link to create a new password via email.
              </p>
              <div class="form-group mb-0">
                <label for="reset-email" class="font-weight-normal"
                  >Email address</label
                >
                <input
                  type="email"
                  class="form-input"
                  id="reset-email"
                  v-model="email"
                  :disabled="loading"
                  :class="errors.email ? 'error-input' : ''"
                />
                <small
                  v-if="errors.email"
                  style="display: block; color: red; font-size: 12px"
                  >{{ errors.email }}</small
                >
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
  name: "Recover",
  metaInfo: {
    title: "Forgot Password",
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
  },
  data() {
    return {
      email: "",
      errors: {},
      loading: false,
    };
  },
  methods: {
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
    recover: async function () {
      if (!this.validateEmail(this.email)) {
        return;
      }
      let submit = document.getElementById("submit");
      try {
        this.errors = [];
        this.loading = true;
        submit.innerText = "Loading...";
        console.log(this.user);
        const response = await auth.recover({ email: this.email });
        this.loading = false;
        (this.email = ""),
          this.addNotification({
            type: "success",
            message: response.data.data.message,
          });
        submit.innerText = "Reset Password";
        console.log(response);
      } catch (error) {
        this.loading = false;
        submit.innerText = "Reset Password";
        this.addNotification({
          type: "error",
          message: error.response.data.data
            ? error.response.data.data.message
            : "Something went wrong",
        });
        console.log(error.response);
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