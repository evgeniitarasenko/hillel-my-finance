import {defineStore} from 'pinia'

export const useAccountStore = defineStore('account', {
    state: () => {
        return {
            account: null,
        }
    },
    getters: {
        isAuthenticated: (state) => !!state.account,
    },
    actions: {
        async fetchMyAccount() {
            axios.get(`/my-account`).then((response) => {
                this.account = response.data;
            }).catch((error) => {
                this.account = null;
            })
        }
    }
})
