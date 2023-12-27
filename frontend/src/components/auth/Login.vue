<template>
    <div class="login-form">
        <h3>Login</h3>
        <input
            id="login-email"
            type="email"
            class="form-control"
            placeholder="Email"
            v-model.trim="loginData.email"
            :class="{
                'is-invalid': hasError('email')
            }"
        >
        <div id="login-email" class="invalid-feedback">{{ getError('email') }}</div>

        <input
            id="login-password"
            type="password"
            class="form-control"
            placeholder="Password"
            v-model.trim="loginData.password"
            :class="{
                'is-invalid': hasError('password')
            }"
        >
        <div id="login-password" class="invalid-feedback">{{ getError('password') }}</div>

        <button type="button" class="btn btn-primary" @click="login">Sign In</button>

        <div class="description-box">
            <div>Don’t have an account?</div>
            <button type="button" class="btn btn-outline-secondary" @click="goToRegister">Sign Up</button>
        </div>
    </div>
</template>

<script>
import {mapStores} from "pinia";
import {useAccountStore} from "@/stores/account.js";

export default {
    data() {
        return {
            loginData: {
                email: null,
                password: null,
            },
            errors: [],
        }
    },
    computed: {
        ...mapStores(useAccountStore),
    },
    methods: {
        login() {
            this.clearErrors();

            axios.post(`/login`, this.loginData).then((response) => {
                this.accountStore.fetchMyAccount();
            }).catch((error) => {
                if (error.response.status === 422) {
                    Object.entries(error.response.data.errors).forEach(([field, error]) => {
                        this.errors.push({field: field, message: error.join(' ')})
                    });
                }
            });
        },
        getError(field) {
            return this.errors.find((error) => error.field === field)?.message
        },
        hasError(field) {
            return !!this.getError(field);
        },
        clearErrors() {
            this.errors = [];
        },
        goToRegister() {
            this.$emit('goToRegister');
        }
    }
}
</script>