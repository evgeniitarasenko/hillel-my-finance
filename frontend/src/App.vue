<template>
    <auth-index v-if="!isAuthenticated"/>

    <div class="container" v-if="isAuthenticated">
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

export default {
    data() {
        return {
            activePage: 'home'
        }
    },
    components: {SettingsIndex, HomeIndex, HistoryIndex, AuthIndex},
    computed: {
        isAuthenticated() {
            // TODO: fix me
            return false;
        }
    }
}
</script>