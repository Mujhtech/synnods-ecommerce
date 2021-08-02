<template>
  <div class="container reset-password-container">
    <div class="row">
      <div class="col-lg-6 offset-lg-3">
        <div class="feature-box border-top-primary">
          <div class="feature-box-content">
            <form class="mb-0" action="#" v-on:submit.prevent="reset">
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
              <div class="form-group mb-0">
                <label for="reset-password" class="font-weight-normal"
                  >New Password</label
                >
                <input
                  type="email"
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
                  type="email"
                  class="form-control"
                  id="reset-cpassword"
                  name="reset-cpassword"
                  v-model="user.cpassword"
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
  data() {
    return {
      user: {
        email: "",
        password: "",
        cpassword: "",
      },
      errors: {},
      loading: false,
    };
  },
  methods: {
    reset: async function () {
      let submit = document.getElementById("submit");
      try {
        this.loading = true;
        submit.innerText = "Loading...";
        console.log(this.user);
        const response = await auth.reset(this.user);
        this.loading = false;
        submit.innerText = "Reset Password";
        console.log(response);
      } catch (error) {
        this.loading = false;
        submit.innerText = "Reset Password";
        console.log(error.response);
      }
    },
  },
};
</script>