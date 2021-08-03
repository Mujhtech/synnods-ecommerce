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
  name: "Recover",
  metaInfo: {
    title: "Register",
    titleTemplate: "%s - Synoods Ecommerce",
  },
  data() {
    return {
      user: {
        email: "",
        first_name: "",
        last_name: "",
        phone: "",
        password: "",
      },
      errors: [],
      loading: false,
    };
  },
  methods: {
    register: async function () {
      if (!this.user.first_name) {
        this.errors.push("First name is required");
        return;
      }
      if (!this.user.last_name) {
        this.errors.push("Last name is required");
        return;
      }
      if (!this.user.phone) {
        this.errors.push("Phone number is required");
        return;
      }
      if (!this.user.email) {
        this.errors.push("Email address is required");
        return;
      }
      if (
        !/^[a-zA-Z0-9.!#$%&’*+/=?^_`{|}~-]+@[a-zA-Z0-9-]+(?:\.[a-zA-Z0-9-]+)*$/.test(
          this.user.email
        )
      ) {
        this.errors.push("Invalid email address");
        return;
      }
      if (!this.user.password) {
        this.errors.push("Password is required");
        return;
      }
      if (this.user.password.lenght < 8) {
        this.errors.push("Password length must be atleast 8 characters");
        return;
      }
      let submit = document.getElementById("submit");
      try {
        this.loading = true;
        submit.innerText = "Loading...";
        const response = await auth.register(this.user);
        this.loading = false;
        submit.innerText = "Register";
        console.log(response);
        this.$notify({
          group: "notify",
          text: 'Account created successfully',
          color: "red",
        });
      } catch (error) {
        this.loading = false;
        submit.innerText = "Register";
        console.log(error.response);
        this.$notify({
          group: "notify",
          text: error.response.data.data.message,
          color: "red",
        });
      }
    },
  },
};
</script>