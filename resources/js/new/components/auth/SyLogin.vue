<template>
    <div class="login-register-form">
        <pre-loader v-if="loading"></pre-loader>
        <form action="#" v-on:submit.prevent="login">
            <input
                type="email"
                id="login-email"
                placeholder="Email Address"
                v-model.trim="$v.user.email.$model"
                :disabled="loading"
                :class="status($v.user.email)"
              />
              <small
                v-if="!checkRequired($v.user.email)"
                style="display: block; color: red; font-size: 12px"
                >Email address is required</small
              >
              <small
                v-if="!checkEmail($v.user.email)"
                style="display: block; color: red; font-size: 12px"
                >Email address is invalid</small
              >
            <input
                type="password"
                id="login-password"
                placeholder="Password"
                v-model.trim="$v.user.password.$model"
                :class="status($v.user.password)"
                :disabled="loading"
              />
              <small
                v-if="!checkRequired($v.user.password)"
                style="display: block; color: red; font-size: 12px"
                >Password is required</small
              >
            <div class="button-box">
                <div class="login-toggle-btn">
                    <input type="checkbox" v-model="user.remember_me" />
                    <label>Remember me</label>
                    <router-link to="/auth/forgot">Forgot Password?</router-link>
                </div>
                <button type="submit" id="submit"
                :disabled="loading"><span>Login</span></button>
            </div>
        </form>
    </div>
</template>

<script>
import PreLoader from "../commons/PreLoader";
import { mapActions } from "vuex";
import * as auth from "../../../services/auth";
import { required, email } from "vuelidate/lib/validators";
export default {
  name: "Login",
  components: {
    PreLoader,
  },
  validations: {
    user: {
      email: { required, email },
      password: { required },
    },
  },
  data() {
    return {
      user: {
        email: "",
        password: "",
        remember_me: false,
      },
      errors: {},
      loading: false,
    };
  },
  methods: {
    ...mapActions("user", ["userLogin"]),
    ...mapActions("notification", ["addNotification"]),
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
    checkEmail(validation) {
      if (!validation.$dirty && validation.$model == "") {
        return true;
      } else if (validation.$dirty && validation.$error && !validation.email) {
        return false;
      } else {
        return true;
      }
    },
    login: async function () {
      this.$v.user.$touch();
      if (this.$v.user.$invalid) {
        return;
      }

      let submit = document.getElementById("submit");
      try {
        this.loading = true;
        submit.innerText = "Loading...";
        const response = await auth.login(this.user);
        this.loading = false;
        submit.innerText = "Login";
        if (response.status === 200) {
          this.user.email = "";
          this.user.password = "";
          this.user.remember_me = false;
          auth.setToken(response.data.data.access_token);
          auth.setUser(response.data.data.user);
          this.userLogin(response.data.data.user);
          this.addNotification({
            type: "success",
            message: "Successfully logged in",
          });
          this.$router.push("/account");
        }
      } catch (error) {
        if (!error.response) return;
        this.loading = false;
        submit.innerText = "Login";
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