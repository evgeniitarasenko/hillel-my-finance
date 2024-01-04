<template>
    <div class="transaction-form-box" v-if="transactionsStore.showForm" @click.self="transactionsStore.showForm = false">
        <div class="transaction-form">
            <div  class="mb-3 justify-content-between d-flex align-items-center">
                <div v-if="category" class="category-box">
                    <div class="icon-box d-inline-block mr-3">
                        <font-awesome-icon :icon="category.icon"/>
                    </div>
                    {{ category.title }}
                </div>

                <a href="#"><font-awesome-icon icon="trash"/></a>
            </div>

            <input
                id="transaction-form-amount"
                type="text"
                class="form-control mb-2"
                placeholder="Amount"
                v-model.trim="transactionsStore.formTransaction.amount"
                :class="{
                'is-invalid': hasError('amount')
            }"/>
            <div id="transaction-form-amount" class="invalid-feedback">{{ getError('amount') }}</div>

            <input
                id="transaction-form-description"
                type="text"
                class="form-control mb-2"
                placeholder="Description (optional)"
                v-model.trim="transactionsStore.formTransaction.description"
                :class="{
                'is-invalid': hasError('description')
            }"/>
            <div id="transaction-form-description" class="invalid-feedback">{{ getError('description') }}</div>

            <button type="button" class="btn btn-primary" @click="transactionsStore.save()">
                {{ transactionsStore.formTransaction.id ? 'Edit' : 'Add' }}
            </button>
        </div>
    </div>
</template>

<script>


import {mapStores} from "pinia";
import {useTransactionsStore} from "@/stores/transactions.js";
import {FontAwesomeIcon} from "@fortawesome/vue-fontawesome";
import {useCategoriesStore} from "@/stores/categories.js";

export default {
    components: {FontAwesomeIcon},
    data() {
        return {
            errors: [],
        }
    },
    computed: {
        ...mapStores(useTransactionsStore, useCategoriesStore),
        category: {
            get() {
                if (!this.transactionsStore.formTransaction.category_id) {
                    return null;
                }

                return this.categoriesStore.getCategory(this.transactionsStore.formTransaction.category_id)
            }
        }

    },
    methods: {
        getError(field) {
            return this.errors.find((error) => error.field === field)?.message
        },
        hasError(field) {
            return !!this.getError(field);
        },
        clearErrors() {
            this.errors = [];
        },
    }
}
</script>