<template>
  <div class="container reset-password-container">
    <div class="row">
      <div class="col-lg-6 offset-lg-3">
        <div class="feature-box border-top-primary">
          <div class="feature-box-content">
            <form class="mb-0" action="#" v-on:submit.prevent="recover">
              <p>
                Lost your password? Please enter your email address.
                You will receive a link to create a new password via email.
              </p>
              <div class="form-group mb-0">
                <label for="reset-email" class="font-weight-normal"
                  >Email address</label
                >
                <input
                  type="email"
                  class="form-control"
                  id="reset-email"
                  name="reset-email"
                  v-model="user.email"
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
          </div>
        </div>
      </div>
    </div>
  </div>
</template>

<script>
import * as auth from "../../services/auth";

export default {
  name: "Recover",
  metaInfo: {
    title: "Forgot Password",
    titleTemplate: "%s - Synoods Ecommerce",
  },
  data() {
    return {
      user: {
        email: ""
      },
      errors: {},
      loading: false
    };
  },
  methods: {
    recover: async function () {
      let submit = document.getElementById("submit");
      try {
        this.loading = true;
        submit.innerText = 'Loading...'
        console.log(this.user);
        const response = await auth.recover(this.user);
        this.loading = false;
        submit.innerText = 'Reset Password'
        console.log(response);
      } catch (error) {
        this.loading = false;
        submit.innerText = 'Reset Password'
        console.log(error.response);
      }
    },
  },
};
</script>