import {defineStore} from 'pinia'

export const useCategoriesStore = defineStore('categories', {
    state: () => {
        return {
            categories: [],
        }
    },
    getters: {
        incomesCategories: (state) => state.categories.filter((item) => item.type === 'incomes'),
        expensesCategories: (state) => state.categories.filter((item) => item.type === 'expenses'),
    },
    actions: {
        async fetchCategories() {
            axios.get(`/categories`).then((response) => {
                this.categories = response.data;
            }).catch((error) => {
                console.log(error);
            })
        },
        getCategory(id) {
            return this.categories.find((item) => item.id === id);
        }
    }
})
