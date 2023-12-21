<template>
    <div class="auth-box">
        <div class="brand-box">
            <div class="logo"></div>
            <div class="title">My Finance</div>
        </div>

        <div class="form-box">
            <login v-if="activePage === 'login'" @goToRegister="activePage = 'register'"/>
            <register v-if="activePage === 'register'" @goToLogin="activePage = 'login'"/>
        </div>
    </div>
</template>

<script>

import Login from "@/components/auth/Login.vue";
import Register from "@/components/auth/Register.vue";

export default {
    components: {Register, Login},
    data() {
        return {
            activePage: 'login', // register
        }
    },
}
</script>