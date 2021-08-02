<template>
  <div class="container login-container">
    <div class="row">
      <div class="col-md-6 offset-md-3">
        <div class="row">
          <div class="col-md-12">
            <div class="heading mb-1">
              <h2 class="title">Register</h2>
            </div>

            <form action="#" v-on:submit.prevent="register">
              <label for="register-firstname">
                First Name
                <span class="required">*</span>
              </label>
              <input
                type="text"
                class="form-input form-wide"
                id="register-firstname"
                v-model="user.first_name"
                :disabled="loading"
                required
              />
              <label for="register-lastname">
                Last Name
                <span class="required">*</span>
              </label>
              <input
                type="text"
                class="form-input form-wide"
                id="register-lastname"
                v-model="user.last_name"
                :disabled="loading"
                required
              />
              <label for="register-phone">
                Phone Number
                <span class="required">*</span>
              </label>
              <input
                type="text"
                class="form-input form-wide"
                id="register-phone"
                v-model="user.phone"
                :disabled="loading"
                required
              />
              <label for="register-email">
                Email address
                <span class="required">*</span>
              </label>
              <input
                type="email"
                class="form-input form-wide"
                id="register-email"
                v-model="user.email"
                :disabled="loading"
                required
              />

              <label for="register-password">
                Password
                <span class="required">*</span>
              </label>
              <input
                type="password"
                class="form-input form-wide"
                id="register-password"
                v-model="user.password"
                :disabled="loading"
                required
              />

              <div class="form-footer mb-2">
                <button
                  type="submit"
                  id="submit"
                  class="btn btn-dark btn-md w-100 mr-0"
                >
                  Register
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
        first_name: "",
        last_name: "",
        phone: "",
        password: ""
      },
      errors: {},
      loading: false,
    };
  },
  methods: {
    register: async function () {
      let submit = document.getElementById("submit");
      try {
        this.loading = true;
        submit.innerText = "Loading...";
        const response = await auth.register(this.user);
        this.loading = false;
        submit.innerText = "Register";
        console.log(response);
      } catch (error) {
        this.loading = false;
        submit.innerText = "Register";
        console.log(error.response);
        this.$notify({
          group: 'notify',
          text: error.response.data.data.message,
          color: 'red'
        });
      }
    },
  },
};
</script>