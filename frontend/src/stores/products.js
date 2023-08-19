import { defineStore } from 'pinia'
// import { useCommonHelper } from '@/helpers/commonHelper';
import axios from 'axios'
export const useProductsStore = defineStore('products', {
    state: () => ({ 
        filters:{
            categories: [],
            minPrice:'',
            maxPrice:'',
            colors: [],
            rating: '',
            sorting:'',
        },
        categories: [],
        products: [],
        QVProduct:{}
    }),
    actions: {
        async getCategories() {
            const resp = await axios.get('categories')
            if (resp.data.status === 'success') {
                this.categories = resp.data.data
            }
        },
        async getProducts() {
            // const helper = useCommonHelper()
            // const params = JSON.parse(JSON.stringify(this.filters));
            console.log(this.filters)
            // if (queryParams.category && !params.categories.includes(queryParams.category)) {
            //     params.categories.push(queryParams.category)
            // }
            // if (queryParams.query) {
            //     params.query = queryParams.query
            // }
            const resp = await axios.get('products',{params: this.filters})
            if (resp.data.status === 'success') {
                this.products = resp.data.data
            }
        },
        clearFilters(){
            this.filters = {
                categories: [],
                minPrice:'',
                maxPrice:'',
                colors: [],
                rating: '',
                sorting:'',
            }
        }
    }
})