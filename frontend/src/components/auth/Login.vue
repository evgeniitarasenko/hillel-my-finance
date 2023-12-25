<template>
    <div class="login-form">
        <h3>Login</h3>
        <input type="email" class="form-control" placeholder="Email" v-model.trim="loginData.email">
        <input type="password" class="form-control" placeholder="Password" v-model.trim="loginData.password">
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
                email: 'test@test.com',
                password: '12345678',
            }
        }
    },
    computed: {
        ...mapStores(useAccountStore),
    },
    methods: {
        login() {
            axios.post(`/login`, this.loginData).then((response) => {
                this.accountStore.fetchMyAccount();
            });
        },
        goToRegister() {
            this.$emit('goToRegister');
        }
    }
}
</script>