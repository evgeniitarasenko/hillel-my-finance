<template>
    <div class="register-form">
        <h3>Create an account</h3>
        <input
            id="register-name"
            type="text"
            class="form-control"
            placeholder="Name"
            v-model.trim="registerData.name"
            :class="{
                'is-invalid': hasError('name')
            }"
        >
        <div id="register-name" class="invalid-feedback">{{ getError('name') }}</div>

        <input
            id="register-email"
            type="email"
            class="form-control"
            placeholder="Email"
            v-model.trim="registerData.email"
            :class="{
                'is-invalid': hasError('email')
            }"
        >
        <div id="register-email" class="invalid-feedback">{{ getError('email') }}</div>

        <input
            id="register-password"
            type="password"
            class="form-control"
            placeholder="Password"
            v-model.trim="registerData.password"
            :class="{
                'is-invalid': hasError('password')
            }"
        >
        <div id="register-password" class="invalid-feedback">{{ getError('password') }}</div>

        <input
            id="register-password_confirmation"
            type="password"
            class="form-control"
            placeholder="Confirm Password"
            v-model.trim="registerData.password_confirmation"
            :class="{
                'is-invalid': hasError('password_confirmation')
            }"
        >
        <div id="register-password_confirmation" class="invalid-feedback">{{ getError('password_confirmation') }}</div>

        <button type="button" class="btn btn-primary" @click="register">Sign Up</button>

        <div class="description-box">
            <div>Have an account?</div>
            <button type="button" class="btn btn-outline-secondary" @click="goToLogin">Sign In</button>
        </div>
    </div>
</template>

<script>

import {mapStores} from "pinia";
import {useAccountStore} from "@/stores/account.js";

export default {
    data() {
        return {
            registerData: {
                name: null,
                email: null,
                password: null,
                password_confirmation: null,
            },
            errors: [],
        }
    },
    computed: {
        ...mapStores(useAccountStore),
    },
    methods: {
        register() {
            this.clearErrors();

            axios.post('/register', this.registerData).then(() => {
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
        goToLogin() {
            this.$emit('goToLogin');
        }
    }
}
</script>