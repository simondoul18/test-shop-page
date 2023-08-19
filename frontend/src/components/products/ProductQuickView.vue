<template>
    <!-- Start of Quick View -->
    <div class="modal fade" id="staticBackdrop" data-bs-backdrop="static" data-bs-keyboard="false" tabindex="-1" aria-labelledby="staticBackdropLabel" aria-hidden="true">
        <div class="modal-dialog modal-xl modal-dialog-centered modal-dialog-scrollable">
            <div class="modal-content">
                <div class="modal-body">
                    <div class="product product-single">
                        <div class="row gutter-lg">
                            <div class="col-12 text-right ">
                                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" @click="quantity = 1"></button>
                            </div>
                            <div class="col-md-5 mb-4 mb-md-0">
                                <div class="product-gallery product-gallery-sticky mb-0">
                                    <div class="product-single-carousel owl-carousel owl-theme owl-nav-inner row cols-1 gutter-no">
                                        <img :src="'./src/assets/images/shop/'+store.QVProduct?.image"
                                                :alt="store.QVProduct?.title" width="700" height="800">
                                    </div>
                                </div>
                            </div>
                            <div class="col-md-7 overflow-hidden p-relative" v-if="store.QVProduct">
                                <div class="product-details scrollable pl-0">
                                    <h2 class="product-title">{{store.QVProduct?.title}}</h2>
                                    <div class="product-bm-wrapper">
                                        <div class="product-meta">
                                            <div class="product-categories">
                                                Category:
                                                <span class="product-category"><a href="#">{{store.QVProduct?.category?.title}}</a></span>
                                            </div>
                                            <div class="product-sku mb-2">
                                                SKU: <span>{{store.QVProduct?.sku}}</span>
                                            </div>
                                            <div class="product-sku">
                                                Vendor: <span>{{store.QVProduct?.vendor?.business_name}}</span>
                                            </div>
                                        </div>
                                    </div>

                                    <hr class="product-divider">

                                    <div class="ratings-container">
                                        <star-icon :rating="store.QVProduct?.rating" :size="15" />
                                        <a href="#" class="rating-reviews"> ({{ store.QVProduct?.rating }})</a>
                                    </div>

                                    <hr class="product-divider">

                                    <div class="product-form product-variation-form product-color-swatch">
                                        <label>Color:</label>
                                        <div class="d-flex align-items-center product-variations">
                                            {{store.QVProduct?.color}}
                                        </div>
                                    </div>
                                    <div class="row mb-4" v-if="store.QVProduct?.isDynamicPrice == 1">
                                        <div class="col-md-2">
                                            <label>Length:</label> 
                                            <input v-model="DPAttr.length" type="text" class="form-control" placeholder="Length" name="length" />
                                        </div>
                                        <div class="col-md-2">
                                            <label>Width:</label> 
                                            <input v-model="DPAttr.width" type="text" class="form-control" placeholder="Width" name="width" />
                                        </div>
                                        <div class="col-md-2">
                                            <label>Height:</label> 
                                            <input v-model="DPAttr.height" type="text" class="form-control" placeholder="Height" name="height" />
                                        </div>
                                    </div>
                                    <div class="product-price">${{calculatePrice}}</div>
                                    <div class="product-form">
                                        <div class="product-qty-form">
                                            <div class="input-group">
                                                <span class="mt-3 mr-2" style="font-size: 13px;">Quantity: </span> <input v-model="quantity" class="quantity form-control" type="number" min="1" max="10000000" placeholder="quantity">
                                            </div>
                                        </div>
                                        <button class="btn btn-primary btn-cart">
                                            <i class="w-icon-cart"></i>
                                            <span>Add to Cart</span>
                                        </button>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- End of Quick view -->
</template>
<script setup>
import { ref,computed } from 'vue'
import StarIcon from '@/components/icons/IconStar.vue'
import { useProductsStore } from '@/stores/products'
const store = useProductsStore()
const DPAttr = ref({ length: 1, width: 1, height: 1 });
const quantity = ref(1)

const calculatePrice = computed(() => {
    let price = 0;
    let length = DPAttr.value.length > 0 ? DPAttr.value.length : 1
    let width = DPAttr.value.width > 0 ? DPAttr.value.width : 1
    let height = DPAttr.value.height > 0 ? DPAttr.value.height : 1
    if(store.QVProduct?.isDynamicPrice == 1){
        price = ( (parseInt(length) * parseInt(width) * parseInt(height)) * parseInt(store.QVProduct.price))
    }else{
        price = store.QVProduct.price
    }
    return (price * (quantity.value > 0 ? quantity.value : 1))
})
</script>