<script setup>
import TheHeader from '../components/common/TheHeader.vue'
import TheFooter from '../components/common/TheFooter.vue'
</script>

<template>
    <div class="page-wrapper">
        <TheHeader />
        <!-- Start of Main -->
        <main class="main">
            <div class="page-content mb-10">
                <div class="container">
                    <slot />
                </div>
            </div>
        </main>
        <!-- End of Main -->
        <TheFooter />
    </div>
</template>
