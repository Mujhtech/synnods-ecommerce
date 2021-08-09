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
                  v-model="password"
                  :disabled="loading"
                  :class="errors.password ? 'error-input' : ''"
                />
                <small
                  v-if="errors.password"
                  style="display: block; color: red; font-size: 12px"
                  >{{ errors.password }}</small
                >
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
                  v-model="confirmed"
                  :disabled="loading"
                  :class="errors.confirmed ? 'error-input' : ''"
                />
                <small
                  v-if="errors.confirmed"
                  style="display: block; color: red; font-size: 12px"
                  >{{ errors.confirmed }}</small
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
  name: "Reset",
  metaInfo: {
    title: "Reset Account",
    titleTemplate: "%s - Synoods Ecommerce",
  },
  components: {
    PreLoader,
  },
  mounted() {
    this.token = this.$route.params.token;
  },
  watch: {
    confirmed(value) {
      this.confirmed = value;
      this.validateCPassword(value);
    },
    password(value) {
      this.password = value;
      this.validatePassword(value);
    },
  },
  data() {
    return {
      token: "",
      password: "",
      confirmed: "",
      errors: {},
      loading: false,
    };
  },
  methods: {
    ...mapActions("notification", ["addNotification"]),
    validatePassword: function (value) {
      if (!value || value === "") {
        this.errors.password = "Password is required";
        return false;
      } else {
        this.errors.password = "";
        return true;
      }
    },
    validateCPassword: function (value) {
      if (!value || value === "") {
        this.errors.confirmed = "Confirm Password is required";
        return false;
      } else if (this.password != value) {
        this.errors.confirmed = "Password must be match";
        return false;
      } else {
        this.errors.confirmed = "";
        return true;
      }
    },
    reset: async function () {
      if (!this.validatePassword(this.password)) {
        return;
      }
      if (!this.validateCPassword(this.confirmed)) {
        return;
      }
      this.errors = {};
      let submit = document.getElementById("submit");
      try {
        this.loading = true;
        submit.innerText = "Loading...";
        const response = await auth.reset({
          confirmed: this.confirmed,
          password: this.password,
          token: this.token,
        });
        this.loading = false;
        (this.password = ""),
          (this.confirmed = ""),
          (submit.innerText = "Reset Password");
        this.addNotification({
          type: "success",
          message: "Password reset successfully",
        });
        console.log(response);
      } catch (error) {
        this.loading = false;
        submit.innerText = "Reset Password";
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