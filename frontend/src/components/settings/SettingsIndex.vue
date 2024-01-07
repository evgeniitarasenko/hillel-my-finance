<template>
    <div class="settings">
        <div class="header">
            <h2 class="title">Settings</h2>

            <div class="account-box">
                <div class="avatar">{{ accountStore.account.name.slice(0, 1) }}</div>
                <div class="contacts">
                    <div class="name">{{ accountStore.account.name }}</div>
                    <div class="email">{{ accountStore.account.email }}</div>
                </div>
            </div>
        </div>

        <div class="settings-list">
            <div class="settings-item" @click="activePage = 'account'">
                <div class="title">
                    <font-awesome-icon icon="user"/>
                    Manage Account
                </div>

                <div class="icon">
                    <font-awesome-icon icon="angle-right"/>
                </div>
            </div>

            <div class="settings-item">
                <div class="title">
                    <font-awesome-icon icon="tag"/>
                    Manage Categories
                </div>

                <div class="icon">
                    <font-awesome-icon icon="angle-right"/>
                </div>
            </div>

            <div class="settings-item" @click="logout">
                <div class="title">
                    <font-awesome-icon icon="right-from-bracket"/>
                    Logout
                </div>
            </div>
        </div>
    </div>

    <settings-account v-if="activePage === 'account'" @close="activePage = null"/>
</template>

<script>

import {mapStores} from "pinia";
import {useAccountStore} from "@/stores/account.js";
import SettingsAccount from "@/components/settings/SettingsAccount.vue";

export default {
    data() {
        return {
            activePage: null,
        }
    },
    components: {SettingsAccount},
    computed: {
        ...mapStores(useAccountStore),
    },
    methods: {
        logout() {
            axios.post(`/logout`).then(() => {
                this.accountStore.fetchMyAccount();
            });
        }
    }
}
</script>