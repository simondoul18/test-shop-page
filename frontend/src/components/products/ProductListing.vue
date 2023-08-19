<template>
    <!-- Start of Shop Content -->
    <div class="shop-content row gutter-lg">
        <filters />
        <!-- Start of Main Content -->
        <div class="main-content">
            <nav class="toolbox sticky-toolbox sticky-content fix-top">
                <div class="toolbox-right mt-5">
                    <a href="#" class="btn btn-primary btn-outline btn-rounded left-sidebar-toggle 
                        btn-icon-left d-block d-lg-none"><i
                            class="w-icon-category"></i><span>Filters</span></a>
                    <div class="toolbox-item toolbox-sort select-box text-dark">
                        <label>Sort By :</label>
                        <select name="orderby" class="form-control" v-model="store.filters.sorting">
                            <option value="">Default sorting</option>
                            <option value="rating-low">Sort by rating: low to high</option>
                            <option value="rating-high">Sort by rating: high to low</option>
                            <option value="date">Sort by latest</option>
                            <option value="price-low">Sort by pric: low to high</option>
                            <option value="price-high">Sort by price: high to low</option>
                        </select>
                    </div>
                </div>
            </nav>
            <!-- Button trigger modal -->
            <div class="product-wrapper row cols-md-3 cols-sm-2 cols-2" v-if="store.products.length > 0">
                <product-grid v-for="product in store.products" :key="product.id" :product="product" />
            </div>
            <div class="text-center" v-else>No product found.</div>
        </div>
        <!-- End of Main Content -->
    </div>
    <!-- End of Shop Content -->
</template>
<script setup>
import { watch } from 'vue'
import Filters from '@/components/products/Filters.vue'
import ProductGrid from '@/components/products/ProductGrid.vue'
import { useProductsStore } from '@/stores/products'

import { useRoute } from 'vue-router'
const route = useRoute()
const store = useProductsStore()
const setQueryParams = () => {
    if (route.query.category && store.filters.categories.indexOf(route.query.category) == -1) {
        store.filters.categories.push(parseInt(route.query.category))
    }
    if (route.query.query) {
        store.filters.search = route.query.query
    }
}
setQueryParams()
store.getProducts()

watch(() => route.query, async () => {
    store.clearFilters()
    setQueryParams()
    store.getProducts()
})
watch(() => store.filters.sorting, async () => {
    store.getProducts()
})
</script>