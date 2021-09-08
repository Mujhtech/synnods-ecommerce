<template>
    <div>
        <sy-breadcrumb title="Reset Password"></sy-breadcrumb>
        <pre-loader v-if="loading"></pre-loader>
        <div class="login-register-area pt-60 pb-65">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ms-auto me-auto">
                        <div class="login-register-wrapper">
                            <h4>Reset Password</h4>
                            <div class="login-form-container">
                                <form action="#" v-on:submit.prevent="reset">
                                    <input
                                        type="password"
                                        placeholder="New Password"
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
                                        >Password must be greate than 8
                                        character</small
                                    >
                                    <input
                                        type="password"
                                        placeholder="Confirm Password"
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
                                    <div class="button-box">
                                        <div class="login-toggle-btn">
                                            <router-link to="/authentication"
                                                >Login</router-link
                                            >
                                        </div>
                                        <button
                                            type="submit"
                                            id="submit"
                                            :disabled="loading"
                                        >
                                            <span>Reset Password</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import SyBreadcrumb from "../../components/commons/SyBreadcrumb";
import PreLoader from "../../components/commons/PreLoader";
import * as auth from "../../../services/auth";
import { mapActions } from "vuex";
import { required, sameAs, minLength } from "vuelidate/lib/validators";

export default {
    name: "Reset",
    metaInfo: {
        title: "Reset Password",
        titleTemplate: "%s - Faadaakaa Ecommerce"
    },
    components: {
        SyBreadcrumb,
        PreLoader
    },
    validations: {
        user: {
            password: { required, minLength: minLength(8) },
            confirmed: { sameAsPassword: sameAs("password") }
        }
    },
    mounted() {
        this.token = this.$route.params.token;
    },
    data() {
        return {
            user: {
                token: "",
                password: "",
                confirmed: ""
            },
            errors: {},
            loading: false
        };
    },
    methods: {
        ...mapActions("notification", ["addNotification"]),
        status(validation) {
            return {
                error: validation.$error
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
        reset: async function() {
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
                    message: "Password reset successfully"
                });
                this.$router.push("/auth/login");
                //console.log(response);
            } catch (error) {
                this.loading = false;
                submit.innerText = "Reset Password";
                //console.log(error.response);
                this.addNotification({
                    type: "error",
                    message: error.response.data.data
                        ? error.response.data.data.message
                        : "Something went wrong"
                });
            }
        }
    }
};
</script>

<style scoped>
.error {
    border-color: red !important;
}
</style>
