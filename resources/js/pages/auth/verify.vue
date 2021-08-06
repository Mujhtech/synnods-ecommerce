<template>
  <div class="container login-container">
    <pre-loader v-if="loading"></pre-loader>
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="row">
          <div class="col-md-12">
            <div class="heading mb-1">
              <h2 class="title">Verify Account</h2>
            </div>

            <form action="#" v-on:submit.prevent="verify">
              <label for="email-code">
                Email Verification Code
                <span class="required">*</span>
              </label>
              <input
                type="text"
                class="form-input form-wide"
                id="email-code"
                v-model="email_code"
                :disabled="loading"
                :class="errors.email_code ? 'error-input' : ''"
              />
              <small
                v-if="errors.email_code"
                style="display: block; color: red; font-size: 12px"
                >{{ errors.email_code }}</small
              >

              <label for="sms-code">
                SMS Verification Code
                <span class="required">*</span>
              </label>
              <input
                type="text"
                class="form-input form-wide"
                id="sms-code"
                v-model="sms_code"
                :disabled="loading"
                :class="errors.sms_code ? 'error-input' : ''"
              />
              <small
                v-if="errors.sms_code"
                style="display: block; color: red; font-size: 12px"
                >{{ errors.sms_code }}</small
              >
              <div class="form-footer">
                <a
                  href="javascript:void(0)"
                  class="forget-password text-dark form-footer-right"
                  v-on:click="resend"
                >
                  Resend codes
                </a>
              </div>

              <button
                type="submit"
                id="submit"
                class="btn btn-dark btn-md w-100"
                :disabled="loading"
              >
                Verify
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
import * as auth from "../../services/auth";
import { mapActions } from "vuex";

export default {
  name: "Verify",
  metaInfo: {
    title: "Verify Account",
    titleTemplate: "%s - Synoods Ecommerce",
  },
  components: {
    PreLoader,
  },
  mounted() {
    this.token = this.$route.params.token;
  },
  watch: {
    sms_code(value) {
      this.sms_code = value;
      this.validateSms(value);
    },
    email_code(value) {
      this.email_code = value;
      this.validateEmail(value);
    },
  },
  data() {
    return {
      token: "",
      email_code: "",
      sms_code: "",
      errors: {},
      loading: false,
    };
  },
  methods: {
    ...mapActions("notification", ["addNotification"]),
    ...mapActions("user", ["userLogin"]),
    resend: async function () {
      try {
        this.loading = true;
        const response = await auth.resend({ token: this.token });
        this.loading = false;
        this.addNotification({
          type: "success",
          message: response.data.data.message,
        });
      } catch (error) {
        this.loading = false;
        console.log(error.response);
        this.addNotification({
          type: "error",
          message: error.response.data.data
            ? error.response.data.data.message
            : "Something went wrong",
        });
      }
    },
    validateSms: function (value) {
      if (!value || value === "") {
        this.errors.sms_code = "SMS confirmation code is required";
        return false;
      } else if (value.length != 6) {
        this.errors.sms_code = "SMS confirmation code is invalid";
        return false;
      } else {
        this.errors.sms_code = "";
        return true;
      }
    },
    validateEmail: function (value) {
      if (!value || value === "") {
        this.errors.email_code = "Email confirmation code is required";
        return false;
      } else if (value.length != 6) {
        this.errors.email_code = "Email confirmation code is invalid";
        return false;
      } else {
        this.errors.email_code = "";
        return true;
      }
    },
    verify: async function () {
      if (!this.validateEmail(this.email_code)) {
        return;
      }
      if (!this.validateSms(this.sms_code)) {
        return;
      }
      this.errors = {};
      let submit = document.getElementById("submit");
      try {
        this.loading = true;
        submit.innerText = "Loading...";
        const response = await auth.verify({
          token: this.token,
          sms_code: this.sms_code,
          email_code: this.email_code,
        });
        this.loading = false;
        (this.sms_code = ""),
          (this.email_code = ""),
          (submit.innerText = "Verify");
        auth.setToken(response.data.data.access_token);
        this.userLogin(response.data.data.user);
        this.addNotification({
          type: "success",
          message: response.data.data.message,
        });
        console.log(response);
        this.$router.push("/account");
      } catch (error) {
        this.loading = false;
        submit.innerText = "Verify";
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