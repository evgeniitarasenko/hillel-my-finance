<template>
    <div class="row toolbar">
        <div class="col-auto logo-box">
            <span class="logo">Lo</span>
            <span class="title">Kitty</span>
        </div>
        <div class="col-auto">
            <div class="account-icon">{{ accountStore.account.name.slice(0, 1) }}</div>
        </div>
    </div>
</template>

<script>

import {mapStores} from "pinia";
import {useAccountStore} from "@/stores/account.js";

export default {
    data() {
        return {

        }
    },
    computed: {
        ...mapStores(useAccountStore)
    }
}
</script>