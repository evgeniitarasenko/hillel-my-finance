import {defineStore} from 'pinia'

export const useTransactionsStore = defineStore('transactions', {
    state: () => {
        return {
            transactions: [],

            showForm: false,
            formTransaction: {},
        }
    },
    getters: {},
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
                await axios.put(`/transactions/${this.formTransaction.id}`, this.formTransaction).then((response) => {
                    let index = this.transactions.findIndex((item) => item.id === this.formTransaction.id);

                    if (index === -1) {
                        this.transactions.push(response.data);
                    } else {
                        this.transactions[index] = response.data;
                    }
                });
            } else {
                await axios.post('/transactions', this.formTransaction).then((response) => {
                    this.transactions.push(response.data);
                });
            }

            this.showForm = false;
            this.formTransaction = {};
        },
        async remove() {
            await axios.delete(`/transactions/${this.formTransaction.id}`).then((response) => {
                let index = this.transactions.findIndex((item) => item.id === this.formTransaction.id);

                if (index !== -1) {
                    this.transactions.splice(index, 1);
                }
            });

            this.showForm = false;
            this.formTransaction = {};
        }
    }
})
