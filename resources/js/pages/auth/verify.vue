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
              <label for="login-password">
                Password
                <span class="required">*</span>
              </label>
              <input
                type="password"
                class="form-input form-wide"
                id="login-password"
                v-model="user.password"
                :disabled="loading"
                required
              />

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
import * as auth from "../../services/auth";

export default {
  name: "Verify",
  data() {
    return {
      user: {
        password: "",
      },
      errors: {},
      loading: false,
    };
  },
  methods: {
    verify: async function () {
      let submit = document.getElementById("submit");
      try {
        this.loading = true;
        submit.innerText = "Loading...";
        const response = await auth.verify(this.user);
        this.loading = false;
        submit.innerText = "Verify";
        console.log(response);
      } catch (error) {
        this.loading = false;
        submit.innerText = "Verify";
        console.log(error.response);
      }
    },
  },
};
</script>