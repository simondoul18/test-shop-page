import { defineStore } from 'pinia'
import axios from 'axios'
export const useCategoriesStore = defineStore('categories', {
    state: () => ({
        categories: [],
    }),
    actions: {
        async getCategories() {
            const resp = await axios.get('categories')
            if (resp.data.status === 'success') {
                this.categories = resp.data.data
            }
        }
    }
})