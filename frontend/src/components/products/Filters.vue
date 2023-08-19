<template>
<!-- Start of Sidebar, Shop Sidebar -->
<aside class="sidebar shop-sidebar sticky-sidebar-wrapper sidebar-fixed">
    <!-- Start of Sidebar Overlay -->
    <div class="sidebar-overlay"></div>
    <a class="sidebar-close" href="#"><i class="close-icon"></i></a>

    <!-- Start of Sidebar Content -->
    <div class="sidebar-content scrollable">
        <!-- Start of Sticky Sidebar -->
        <div class="sticky-sidebar">
            <div class="filter-actions mt-3">
                <label>Filter :</label>
            </div>
            <!-- Start of Collapsible widget -->
            <div class="widget widget-collapsible">
                <h3 class="widget-title"><span>All Categories</span></h3>
                <ul class="widget-body filter-items search-ul">
                    <li v-for="cate in store.categories" :key="cate.id">
                        <div class="form-check">
                            <input class="form-check-input" v-model="store.filters.categories" type="checkbox" :value="cate.id" :id="'cateCheck'+cate.id" @change="updateProducts" >
                            <label class="form-check-label" :for="'cateCheck'+cate.id">
                                {{cate.title}}
                            </label>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- End of Collapsible Widget -->

            <!-- Start of Collapsible Widget -->
            <div class="widget widget-collapsible">
                <h3 class="widget-title"><span>Price</span></h3>
                <div class="widget-body">
                    <div class="price-range">
                        <input type="number" v-model="minPrice" name="min_price" class="min_price text-center"
                            placeholder="$min" @input="handlePriceInput()">
                            <span class="delimiter">-</span>
                            <input
                            type="number" v-model="maxPrice" name="max_price" class="max_price text-center"
                            placeholder="$max" @input="handlePriceInput()">
                    </div>
                </div>
            </div>
            <!-- End of Collapsible Widget -->
            <div class="widget widget-collapsible">
                <h3 class="widget-title"><span>Rating</span></h3>
                <ul class="widget-body filter-items ">
                    <li v-for="rating in 5" :key="rating">
                        <a href="#" v-on:click.prevent="store.filters.rating = rating" :title="rating+' stars and above'">
                            <star-icon :rating="rating" />
                        </a>
                    </li>
                </ul>
            </div>
            <!-- Start of Collapsible Widget -->
            <div class="widget widget-collapsible">
                <h3 class="widget-title"><span>Color</span></h3>
                <ul class="widget-body filter-items item-check">
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" v-model="store.filters.colors" type="checkbox" value="black" id="black" @change="updateProducts">
                            <label class="form-check-label" for="black"> Black </label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" v-model="store.filters.colors" type="checkbox" value="Silver" id="Silver" @change="updateProducts">
                            <label class="form-check-label" for="Silver"> Silver </label>
                        </div>
                    </li>
                    <li>
                        <div class="form-check">
                            <input class="form-check-input" v-model="store.filters.colors" type="checkbox" value="Red" id="Red" @change="updateProducts">
                            <label class="form-check-label" for="Red"> Red </label>
                        </div>
                    </li>
                </ul>
            </div>
            <!-- End of Collapsible Widget -->
        </div>
        <!-- End of Sidebar Content -->
    </div>
    <!-- End of Sidebar Content -->
</aside>
<!-- End of Shop Sidebar -->
</template>
<script setup>
import { watch, ref } from 'vue'
import StarIcon from '@/components/icons/IconStar.vue'
import { useProductsStore } from '@/stores/products'
const store = useProductsStore()
const minPrice = ref('')
const maxPrice = ref('')
// Get List of categories
store.getCategories()

// Set values on Stop Typing 
let typingTimeout = null;
const handlePriceInput = () => {
    clearTimeout(typingTimeout);
    typingTimeout = setTimeout(() => {
        store.filters.minPrice = minPrice.value
        store.filters.maxPrice = maxPrice.value
        updateProducts()
    }, 800);
}
const updateProducts = () => {
    store.getProducts()
}
// Watch filter changes
watch(() => store.filters.rating, async () => {
    updateProducts()
})
</script>