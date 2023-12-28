import {defineStore} from 'pinia'

export const useTransactionsStore = defineStore('transactions', {
    state: () => {
        return {
            transactions: [],

            showForm: false,
            formTransaction: {},
        }
    },
    getters: {
    },
    actions: {
        async fetchTransactions() {
            axios.get(`/transactions`).then((response) => {
                this.transactions = response.data;
            }).catch((error) => {
                console.log(error);
            })
        },
        async save() {
            if (this.formTransaction.id) {

            } else {
                await axios.post('/transactions', this.formTransaction).then((response) => {
                    this.transactions.push(response.data);
                });
            }

            this.showForm = false;
            this.formTransaction = {};
        }
    }
})