<template>
    <h3>register</h3>

    <div>Have an account?</div>
    <button class="btn btn-outline-secondary" @click="goToLogin">Sign Ip</button>
</template>

<script>

export default {
    methods: {
        goToLogin() {
            this.$emit('goToLogin');
        }
    }
}
</script>