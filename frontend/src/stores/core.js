import {defineStore} from 'pinia'

export const useCoreStore = defineStore('core', {
    state: () => {
        return {
            state: 'expenses', // incomes
        }
    },
    getters: {
    },
    actions: {
    }
})
