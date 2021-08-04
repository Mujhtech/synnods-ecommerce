<template>
  <div class="container login-container">
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
                v-model="user.email_code"
                :disabled="loading"
                required
              />

              <label for="sms-code">
                SMS Verification Code
                <span class="required">*</span>
              </label>
              <input
                type="text"
                class="form-input form-wide"
                id="sms-code"
                v-model="user.sms_code"
                :disabled="loading"
                required
              />
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
import * as auth from "../../services/auth";

export default {
  name: "Verify",
  metaInfo: {
    title: "Verify Account",
    titleTemplate: "%s - Synoods Ecommerce",
  },
  mounted() {
    this.user.token = this.$route.params.token;
  },
  data() {
    return {
      user: {
        token: "",
        email_code: "",
        sms_code: ""
      },
      errors: [],
      loading: false,
    };
  },
  methods: {
    resend: async function(){
      try {
        this.loading = true;
        const response = await auth.resend({token: this.user.token});
        this.loading = false;
        this.$notify({
          group: 'notify',
          text: response.data.data.message,
          color: 'red'
        });
      } catch(error) {
        this.loading = false;
        console.log(error.response);
        this.$notify({
          group: 'notify',
          text: error.response.data.data.message,
          color: 'red'
        });
      }
    },
    verify: async function () {
      if (!this.user.email_code) {
        this.errors = [];
        this.errors.push("Email confirmation code is required");
        return;
      }
      if (!this.user.sms_code) {
        this.errors = [];
        this.errors.push("SMS confirmation code is required");
        return;
      }
      if (this.user.email_code.length != 6) {
        this.errors = [];
        this.errors.push("Email confirmation code is invalid");
        return;
      }
      if (this.user.sms_code.length != 6) {
        this.errors = [];
        this.errors.push("SMS confirmation code is invalid");
        return;
      }
      let submit = document.getElementById("submit");
      try {
        this.errors = [];
        this.loading = true;
        submit.innerText = "Loading...";
        const response = await auth.verify(this.user);
        this.loading = false;
        this.user.sms_code = "",
        this.user.email_code = "",
        submit.innerText = "Verify";
        this.$notify({
          group: 'notify',
          text: response.data.data.message ?? 'Account verified successfully',
          color: 'red'
        });
        console.log(response);
        this.$router.push('/auth/login');
      } catch (error) {
        this.loading = false;
        submit.innerText = "Verify";
        console.log(error.response);
        this.$notify({
          group: 'notify',
          text: error.response.data.data.message ?? error.response.data.message,
          color: 'red'
        });
      }
    },
  },
};
</script>