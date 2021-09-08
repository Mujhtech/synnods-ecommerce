<template>
    <div class="login-register-form">
        <pre-loader v-if="loading"></pre-loader>
        <form action="#" method="post" v-on:submit.prevent="register">
            <input
                type="text"
                placeholder="First Name"
                id="register-firstname"
                v-model.trim="$v.user.first_name.$model"
                :disabled="loading"
                :class="status($v.user.first_name)"
            />
            <small
                v-if="!checkRequired($v.user.first_name)"
                style="display: block; color: red; font-size: 12px"
                >First name is required</small
            >
            <input
                type="text"
                placeholder="Last Name"
                id="register-lastname"
                v-model="$v.user.last_name.$model"
                :disabled="loading"
                :class="status($v.user.last_name)"
            />
            <small
                v-if="!checkRequired($v.user.last_name)"
                style="display: block; color: red; font-size: 12px"
                >Last name is required</small
            >
            <input
                type="text"
                placeholder="Phone Number"
                id="register-phone"
                v-model="$v.user.phone.$model"
                :disabled="loading"
                :class="status($v.user.phone)"
            />
            <small
                v-if="!checkRequired($v.user.phone)"
                style="display: block; color: red; font-size: 12px"
                >Phone number is required</small
            >
            <small
                v-if="!checkNumb($v.user.phone)"
                style="display: block; color: red; font-size: 12px"
                >Phone number must be numbers</small
            >
            <small
                v-if="!checkLength($v.user.phone)"
                style="display: block; color: red; font-size: 12px"
                >Phone number must not be more than 11 digits</small
            >
            <input
                type="email"
                placeholder="Email Address"
                id="register-email"
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
                placeholder="Password"
                id="register-password"
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
            <div class="button-box">
                <button type="submit" id="submit"><span>Register</span></button>
            </div>
        </form>
    </div>
</template>

<script>
import PreLoader from "../commons/PreLoader";
import * as auth from "../../../services/auth";
import { mapActions } from "vuex";
import {
    required,
    minLength,
    maxLength,
    numeric,
    email
} from "vuelidate/lib/validators";

export default {
    name: "Register",
    components: {
        PreLoader
    },
    validations: {
        user: {
            first_name: { required },
            last_name: { required },
            phone: { required, numeric, maxLength: maxLength(11) },
            password: { required, minLength: minLength(8) },
            email: { required, email }
        }
    },
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
                (!validation.minLength || !validation.maxLength)
            ) {
                return false;
            } else {
                return true;
            }
        },
        checkNumb(validation) {
            if (!validation.$dirty && validation.$model == "") {
                return true;
            } else if (
                validation.$dirty &&
                validation.$error &&
                !validation.numeric
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
        register: async function() {
            this.$v.user.$touch();
            if (this.$v.user.$invalid) {
                return;
            }
            let submit = document.getElementById("submit");
            try {
                this.loading = true;
                submit.innerText = "Loading...";
                const response = await auth.register(this.user);
                this.loading = false;
                submit.innerText = "Register";
                //console.log(response);
                this.user.email = "";
                this.user.password = "";
                this.user.first_name = "";
                this.user.last_name = "";
                this.user.phone = "";
                this.addNotification({
                    type: "success",
                    message: response.data.data.message
                });
                this.$router.push(`/auth/verify/${response.data.data.token}`);
            } catch (error) {
                this.loading = false;
                submit.innerText = "Register";
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
