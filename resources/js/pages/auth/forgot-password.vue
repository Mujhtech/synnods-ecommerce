<template>
  <div class="container reset-password-container">
    <pre-loader v-if="loading"></pre-loader>
    <div class="row">
      <div class="col-lg-6 offset-lg-3">
        <div class="feature-box border-top-primary">
          <div class="feature-box-content">
            <form class="mb-0" action="#" v-on:submit.prevent="recover">
              <p>
                Lost your password? Please enter your email address. You will
                receive a link to create a new password via email.
              </p>
              <div class="form-group mb-0">
                <label for="reset-email" class="font-weight-normal"
                  >Email address</label
                >
                <input
                  type="email"
                  class="form-input"
                  id="reset-email"
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
import { required, email } from "vuelidate/lib/validators";

export default {
  name: "Recover",
  metaInfo: {
    title: "Forgot Password",
    titleTemplate: "%s - Synoods Ecommerce",
  },
  components: {
    PreLoader,
  },
  validations: {
    user: {
      email: { required, email },
    },
  },
  data() {
    return {
      user: {
        email: "",
      },
      errors: {},
      loading: false,
    };
  },
  methods: {
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
    recover: async function () {
      this.$v.user.$touch();
      if (this.$v.user.$invalid) {
        return;
      }
      let submit = document.getElementById("submit");
      try {
        this.errors = [];
        this.loading = true;
        submit.innerText = "Loading...";
        console.log(this.user);
        const response = await auth.recover(this.user);
        this.loading = false;
        //this.user.email = "";
        this.addNotification({
          type: "success",
          message: response.data.data.message,
        });
        submit.innerText = "Reset Password";
        this.$router.go();
        //console.log(response);
      } catch (error) {
        this.loading = false;
        submit.innerText = "Reset Password";
        this.addNotification({
          type: "error",
          message: error.response.data.data
            ? error.response.data.data.message
            : "Something went wrong",
        });
        //console.log(error.response);
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