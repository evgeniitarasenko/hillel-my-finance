<template>
    <toolbar/>

    <month-toggler/>

    <summary-balance/>

    <div class="day">
        <div class="row day-header">
            <div class="col-auto date">Dec, 12th</div>
            <div class="col-auto summary">+1621</div>
        </div>

        <div
            class="day-transactions"
             v-for="transaction in transactions"
            :key="transaction.id"
            @click="editTransaction(transaction)"
        >
            <div class="row transaction">
                <div class="col-auto general">
                    <div class="icon-box">
                        <font-awesome-icon :icon="this.categoriesStore.getCategory(transaction.category_id)?.icon"/>
                    </div>
                    <div>
                        <div class="transaction-title">{{ transaction.description }}</div>
                        <div class="category-title">{{ this.categoriesStore.getCategory(transaction.category_id)?.title }}</div>
                    </div>
                </div>
                <div class="col-auto amount">
                    {{ transaction.type === 'expenses' ? '-' : '+' }}{{ transaction.amount }}
                </div>
            </div>
        </div>
    </div>

<!--    <div class="add-transaction-button">-->
<!--        <font-awesome-icon icon="plus"/>-->
<!--        Add new-->
<!--    </div>-->

    <transaction-form/>
</template>

<script>

import Toolbar from "@/components/widgets/Toolbar.vue";
import MonthToggler from "@/components/widgets/MonthToggler.vue";
import SummaryBalance from "@/components/widgets/SummaryBalance.vue";
import {mapStores} from "pinia";
import {useTransactionsStore} from "@/stores/transactions.js";
import {useCategoriesStore} from "@/stores/categories.js";
import TransactionForm from "@/components/transactions/TransactionForm.vue";

export default {
    components: {TransactionForm, SummaryBalance, MonthToggler, Toolbar},
    data() {
        return {

        }
    },
    computed: {
        ...mapStores(useTransactionsStore, useCategoriesStore),
        transactions: {
            get() {
                return this.transactionsStore.transactions;
            }
        }
    },
    methods: {
        editTransaction(transaction) {
            this.transactionsStore.formTransaction = {
                id: transaction.id,
                type: transaction.type,
                category_id: transaction.category_id,
                amount: transaction.amount,
                description: transaction.description,
            };

            this.transactionsStore.showForm = true;
        }
    },
    created() {
        this.categoriesStore.fetchCategories();
        this.transactionsStore.fetchTransactions();
    }
}
</script>