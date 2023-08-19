<template>
    <!-- Start of Header -->
    <header class="header">
        <div class="header-middle">
            <div class="container">
                <div class="header-left mr-md-4">
                    <a href="#" class="mobile-menu-toggle w-icon-hamburger"></a>
                    <a href="/" class="logo ml-lg-0">
                        <h1>Test Project</h1>
                    </a>
                    <form @submit.prevent="searchProducts()" method="get" class="header-search hs-expanded hs-round d-none d-md-flex input-wrapper">
                        <div class="select-box">
                            <select v-model="search.category" id="category" name="category">
                                <option value="">All Categories</option>
                                <option v-for="cate in cateStore.categories" :key="cate.id" :value="cate.id">{{cate.title}}</option>
                            </select>
                        </div>
                        <input type="text" class="form-control" name="search" id="search" v-model="search.query"
                            placeholder="Search in..." />
                        <button class="btn btn-search" type="submit"><i class="w-icon-search"></i></button>
                    </form>
                </div>
                <div class="header-right ml-4">
                    <a class="wishlist label-down link d-xs-show" href="#">
                        <i class="w-icon-heart"></i>
                        <span class="wishlist-label d-lg-show">Wishlist</span>
                    </a>
                    <div class="dropdown cart-dropdown cart-offcanvas mr-0 mr-lg-2">
                        <div class="cart-overlay"></div>
                        <a href="#" class="cart-toggle label-down link">
                            <i class="w-icon-cart">
                                <!-- <span class="cart-count">2</span> -->
                            </i>
                            <span class="cart-label">Cart</span>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </header>
    <!-- End of Header -->
</template>

<script setup>
    import { ref } from 'vue'
    import { useRouter } from 'vue-router'
    import { useRoute } from 'vue-router'
    import { useCategoriesStore } from '@/stores/categories'
    import { useCommonHelper } from '@/helpers/commonHelper';
    const cateStore = useCategoriesStore()
    const router = useRouter()
    const route = useRoute()
    const helper = useCommonHelper()

    if(cateStore.categories.length == 0) {
        cateStore.getCategories()
    }

    const search = ref({
        category: route.query.category ? route.query.category : '',
        query: route.query.query ? route.query.query : ''
    });

    const searchProducts = () => {
        // if (search.value.category || search.value.query) {
            router.push({ name: 'shop', query: helper.removeEmptyValues(search.value)})
        // }
    }
</script>