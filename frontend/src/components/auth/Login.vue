<template>
    <h3>login</h3>

    <input class="form-control">

    <div>Don’t have an account?</div>
    <button class="btn btn-outline-secondary" @click="goToRegister">Sign Up</button>

</template>

<script>

export default {
    methods: {
        goToRegister() {
            this.$emit('goToRegister');
        }
    }
}
</script>