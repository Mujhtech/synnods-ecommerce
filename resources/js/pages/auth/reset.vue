<template>
  <div class="container reset-password-container">
    <pre-loader v-if="loading"></pre-loader>
    <div class="row">
      <div class="col-lg-6 offset-lg-3">
        <div class="feature-box border-top-primary">
          <div class="feature-box-content">
            <form class="mb-0" action="#" v-on:submit.prevent="reset">
              <div class="form-group mb-0">
                <label for="reset-password" class="font-weight-normal"
                  >New Password</label
                >
                <input
                  type="password"
                  class="form-control"
                  id="reset-password"
                  name="reset-password"
                  v-model.trim="$v.user.password.$model"
                  :disabled="loading"
                  :class="status($v.user.password)"
                />
                <small
                  v-if="!checkRequired($v.user.password)"
                  style="display: block; color: red; font-size: 12px"
                  >Password is required</small
                >
                <small
                  v-if="!checkLength($v.user.password)"
                  style="display: block; color: red; font-size: 12px"
                  >Password must be greate than 8 character</small
                >
              </div>
              <div class="form-group mb-0">
                <label for="reset-cpassword" class="font-weight-normal"
                  >Confirm Password</label
                >
                <input
                  type="password"
                  class="form-control"
                  id="reset-cpassword"
                  name="reset-cpassword"
                  v-model.trim="$v.user.confirmed.$model"
                  :disabled="loading"
                  :class="status($v.user.confirmed)"
                />
                <small
                  v-if="!checkSame($v.user.confirmed)"
                  style="display: block; color: red; font-size: 12px"
                  >Password not match</small
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
import { required, sameAs, minLength } from "vuelidate/lib/validators";

export default {
  name: "Reset",
  metaInfo: {
    title: "Reset Account",
    titleTemplate: "%s - Synoods Ecommerce",
  },
  components: {
    PreLoader,
  },
  validations: {
    user: {
      password: { required },
      confirmed: { sameAsPassword: sameAs("password") },
    },
  },
  mounted() {
    this.token = this.$route.params.token;
  },
  data() {
    return {
      user: {
        token: "",
        password: "",
        confirmed: "",
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
    checkSame(validation) {
      if (!validation.$dirty && validation.$model == "") {
        return true;
      } else if (
        validation.$dirty &&
        validation.$error &&
        !validation.sameAsPassword
      ) {
        return false;
      } else {
        return true;
      }
    },
    reset: async function () {
      this.$v.user.$touch();
      if (this.$v.user.$invalid) {
        return;
      }
      this.errors = {};
      let submit = document.getElementById("submit");
      try {
        this.loading = true;
        submit.innerText = "Loading...";
        const response = await auth.reset(this.user);
        this.loading = false;
        (this.user.password = ""),
          (this.user.confirmed = ""),
          (submit.innerText = "Reset Password");
        this.addNotification({
          type: "success",
          message: "Password reset successfully",
        });
        this.$router.push('/auth/login');
        //console.log(response);
      } catch (error) {
        this.loading = false;
        submit.innerText = "Reset Password";
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