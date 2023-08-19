<script setup>
import MainLayout from '../layouts/Main.vue'
import ProductListing from '../components/products/ProductListing.vue'
import QuickView from '../components/products/ProductQuickView.vue'
</script>

<template>
    <main-layout>
        <product-listing />
        <quick-view />
    </main-layout>
</template>
