<script setup>
import StarIcon from '@/components/icons/IconStar.vue'
import { Modal } from 'bootstrap';
import { useProductsStore } from '@/stores/products'
const store = useProductsStore()
defineProps({
    product: Object,
})
const getIMGPath = (imageName) => {
    return new URL(`../../assets/images/shop/${imageName}`, import.meta.url).href
}
const displayProductModal = (product) => {
    const myModalEl = document.querySelector('#staticBackdrop')
    const modal =  new Modal(myModalEl).show();
    store.QVProduct = product
}
</script>
<template>
    <div class="product-wrap" v-if="product">
        <div class="product text-center">
            <figure class="product-media">
                <a href="#">
                    <img :src="getIMGPath(product?.image)" alt="Product" width="300" height="338" />
                </a>
                <div class="product-action-horizontal">
                    <a href="#" class="btn-product-icon btn-cart w-icon-cart"
                        title="Add to cart"></a>
                    <a href="#" class="btn-product-icon btn-quickview w-icon-search"
                        title="Quick View" v-on:click.prevent="displayProductModal(product)"></a>
                </div>
            </figure>
            <div class="product-details">
                <div class="product-cat">
                    <a href="#">{{product?.category.title}}</a>
                </div>
                <h3 class="product-name">
                    <a href="#">{{product?.title}}</a>
                </h3>
                <div class="ratings-container">
                    <star-icon :rating="product?.rating" :size="15" />
                    <a href="#" class="rating-reviews">({{product?.rating}})</a>
                </div>
                <div class="product-pa-wrapper">
                    <div class="product-price" v-if="product?.isDynamicPrice == 1">
                         ${{ product?.price }} <small>per sq ft</small>
                    </div>
                    <div class="product-price" v-else>
                        ${{ product?.price }}
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>