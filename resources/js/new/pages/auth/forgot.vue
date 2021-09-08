<template>
    <div>
        <sy-breadcrumb title="Forgot Password"></sy-breadcrumb>
        <pre-loader v-if="loading"></pre-loader>
        <div class="login-register-area pt-60 pb-65">
            <div class="container">
                <div class="row">
                    <div class="col-lg-7 col-md-12 ms-auto me-auto">
                        <div class="login-register-wrapper">
                            <h4>Forgot Password</h4>
                            <div class="login-form-container">
                                <form action="#" v-on:submit.prevent="recover">
                                    <input
                                        type="email"
                                        placeholder="Email Address"
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
import { required, email } from "vuelidate/lib/validators";

export default {
    name: "Forgot",
    metaInfo: {
        title: "Forgot Password",
        titleTemplate: "%s - Faadaakaa Ecommerce"
    },
    components: {
        SyBreadcrumb,
        PreLoader
    },
    validations: {
        user: {
            email: { required, email }
        }
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
        checkEmail(validation) {
            if (!validation.$dirty && validation.$model == "") {
                return true;
            } else if (
                validation.$dirty &&
                validation.$error &&
                !validation.email
            ) {
                return false;
            } else {
                return true;
            }
        },
        recover: async function() {
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
                    message: response.data.data.message
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
                        : "Something went wrong"
                });
                //console.log(error.response);
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
