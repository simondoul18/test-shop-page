<template>
    <span>
        <img v-for="i in 5" :key="i" :src="'/src/assets/images/icons/star'+(rating >= i ? '-full':'')+'.png'" :width="size" />
    </span>
</template>
<script setup>
defineProps({ 
    // type: String,
    rating: Number,
    size:{
        type: Number,
        default() {
            return 25;
        }
    } 
})
</script>