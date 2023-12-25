<template>
    <auth-index v-if="!isAuthenticated"/>

    <div class="container" v-else>
        <div class="row">
            <div class="col content">
                <history-index v-if="activePage === 'history'"/>
                <home-index v-if="activePage === 'home'"/>
                <settings-index v-if="activePage === 'settings'"/>
            </div>
        </div>

        <div class="row nav">
            <div class="col nav-item" @click="activePage = 'history'" :class="{active: activePage === 'history'}">
                <font-awesome-icon icon="bars"/>
                <span>History</span>
            </div>
            <div class="col nav-item" @click="activePage = 'home'" :class="{active: activePage === 'home'}">
                <font-awesome-icon icon="home"/>
                <span>Home</span>
            </div>
            <div class="col nav-item" @click="activePage = 'settings'" :class="{active: activePage === 'settings'}">
                <font-awesome-icon icon="gear"/>
                <span>Settings</span>
            </div>
        </div>
    </div>
</template>

<script>

import AuthIndex from "@/components/auth/AuthIndex.vue";
import HistoryIndex from "@/components/history/HistoryIndex.vue";
import HomeIndex from "@/components/home/HomeIndex.vue";
import SettingsIndex from "@/components/settings/SettingsIndex.vue";
import { useAccountStore } from './stores/account.js';
import { mapStores } from 'pinia';

export default {
    components: {SettingsIndex, HomeIndex, HistoryIndex, AuthIndex},
    data() {
        return {
            activePage: 'home', // history, settings
        }
    },
    computed: {
        ...mapStores(useAccountStore),
        isAuthenticated() {
            return this.accountStore.isAuthenticated;
        }
    },
    created() {
        this.accountStore.fetchMyAccount();
    }
}
</script>