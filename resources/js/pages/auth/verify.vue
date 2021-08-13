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
                v-model.trim="$v.user.email_code.$model"
                :disabled="loading"
                :class="status($v.user.email_code)"
              />
              <small
                v-if="!checkRequired($v.user.email_code)"
                style="display: block; color: red; font-size: 12px"
                >Email Verification Code is required</small
              >
              <small
                v-if="!checkLength($v.user.email_code)"
                style="display: block; color: red; font-size: 12px"
                >Email Verification Code is invalid</small
              >

              <label for="sms-code">
                SMS Verification Code
                <span class="required">*</span>
              </label>
              <input
                type="text"
                class="form-input form-wide"
                id="sms-code"
                v-model.trim="$v.user.sms_code.$model"
                :disabled="loading"
                :class="status($v.user.sms_code)"
              />
              <small
                v-if="!checkRequired($v.user.sms_code)"
                style="display: block; color: red; font-size: 12px"
                >SMS Verification Code is required</small
              >
              <small
                v-if="!checkLength($v.user.sms_code)"
                style="display: block; color: red; font-size: 12px"
                >SMS Verification Code is invalid</small
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
import { required, minLength } from "vuelidate/lib/validators";

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
  validations: {
    user: {
      email_code: { required, minLength: minLength(6) },
      sms_code: { required, minLength: minLength(6) },
    },
  },
  data() {
    return {
      user: {
        token: "",
        email_code: "",
        sms_code: "",
      },
      errors: {},
      loading: false,
    };
  },
  methods: {
    ...mapActions("notification", ["addNotification"]),
    ...mapActions("user", ["userLogin"]),
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
        !validation.minLength
      ) {
        return false;
      } else {
        return true;
      }
    },
    resend: async function () {
      try {
        this.loading = true;
        const response = await auth.resend({ token: this.user.token });
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
    verify: async function () {
      this.$v.user.$touch();
      if (this.$v.user.$invalid) {
        return;
      }
      this.errors = {};
      let submit = document.getElementById("submit");
      try {
        this.loading = true;
        submit.innerText = "Loading...";
        const response = await auth.verify(this.user);
        this.loading = false;
        (this.user.sms_code = ""),
          (this.user.email_code = ""),
          (submit.innerText = "Verify");
        auth.setToken(response.data.data.access_token);
        auth.setUser(response.data.data.user);
        this.userLogin(response.data.data.user);
        this.addNotification({
          type: "success",
          message: response.data.data.message,
        });
        //console.log(response);
        this.$router.push("/account");
      } catch (error) {
        this.loading = false;
        submit.innerText = "Verify";
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