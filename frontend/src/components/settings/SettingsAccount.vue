<template>
    <div class="settings-account">
        <div class="header">
            <h2 class="title">Settings | Account</h2>

            <div class="account-box">
                <input id="account-avatar-form" class="form-control mb-2" type="file" placeholder="Avatar">
                <input class="form-control mb-2" type="text" v-model="account.name" placeholder="Name">
                <input class="form-control mb-2" type="email" v-model="account.email" placeholder="Email">

                <button class="btn btn-success mb-2" type="button" @click="save">Save</button>
            </div>
        </div>
    </div>
</template>

<script>

import {mapStores} from "pinia";
import {useAccountStore} from "@/stores/account.js";

export default {
    data() {
        return {
            account: {}
        }
    },
    computed: {
        ...mapStores(useAccountStore),
    },
    methods: {
        setAvatar(e) {
            this.account.avatar = e.target.files[0];
        },
        save() {
            let formData = new FormData();

            formData.append("avatar", document.getElementById('account-avatar-form').files[0]);
            formData.append("name", this.account.name);
            formData.append("email", this.account.email);

            axios.post('/my-account', formData, {
                headers: {
                    'Content-Type': 'multipart/form-data'
                }
            }).then((response) => {

            })
        }
    },
    created() {
        this.account = {
            name: this.accountStore.account.name,
            email: this.accountStore.account.email,
        }
    }
}
</script>