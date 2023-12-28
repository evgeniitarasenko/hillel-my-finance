<template>
    <toolbar/>

    <month-toggler/>

    <summary-balance/>

    <div class="row category-balance-box">
        <div
            v-for="category in categories"
            class="col-4 category-balance"
            :class="{
                'income': category.type === 'incomes',
                'expenses': category.type === 'expenses',
            }"
            @click="addToCategory(category)"
        >
            <div class="title">{{ category.title }}</div>
            <div class="icon-box">
                <font-awesome-icon :icon="category.icon"/>
            </div>
            <div class="balance">500</div>
        </div>
    </div>

    <transaction-form></transaction-form>
</template>

<script>

import Toolbar from "@/components/widgets/Toolbar.vue";
import MonthToggler from "@/components/widgets/MonthToggler.vue";
import SummaryBalance from "@/components/widgets/SummaryBalance.vue";
import TransactionForm from "@/components/transactions/TransactionForm.vue";
import {mapStores} from "pinia";
import {useCategoriesStore} from "@/stores/categories.js";
import {useCoreStore} from "@/stores/core.js";
import {useTransactionsStore} from "@/stores/transactions.js";

export default {
    components: {SummaryBalance, MonthToggler, Toolbar, TransactionForm},
    data() {
        return {

        }
    },
    computed: {
        ...mapStores(useCategoriesStore, useCoreStore, useTransactionsStore),
        categories() {
            if (this.coreStore.state === 'expenses') {
                return this.categoriesStore.expensesCategories;
            } else if(this.coreStore.state === 'incomes') {
                return this.categoriesStore.incomesCategories;
            } else {
                return this.categoriesStore.categories;
            }
        }
    },
    methods: {
        addToCategory(category) {
            this.transactionsStore.formTransaction.category_id = category.id;
            this.transactionsStore.formTransaction.type = category.type;

            this.transactionsStore.showForm = true;
        }
    },
    created() {
        this.categoriesStore.fetchCategories();
        this.transactionsStore.fetchTransactions();
    }
}
</script>