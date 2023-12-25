<template>
    <div class="register-form">
        <h3>Create an account</h3>
        <input type="email" class="form-control" placeholder="Name" v-model.trim="registerData.name">
        <input type="email" class="form-control" placeholder="Email" v-model.trim="registerData.email">
        <input type="password" class="form-control" placeholder="Password" v-model.trim="registerData.password">
        <input type="password" class="form-control" placeholder="Confirm Password" v-model.trim="registerData.password_confirmation">
        <button type="button" class="btn btn-primary" @click="register">Sign Up</button>

        <div class="description-box">
            <div>Have an account?</div>
            <button type="button" class="btn btn-outline-secondary"  @click="goToLogin">Sign In</button>
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
            }
        }
    },
    computed: {
        ...mapStores(useAccountStore),
    },
    methods: {
        register() {
            axios.post(`/register`, this.registerData).then((response) => {
                this.accountStore.fetchMyAccount();
            });
        },
        goToLogin() {
            this.$emit('goToLogin');
        }
    }
}
</script>