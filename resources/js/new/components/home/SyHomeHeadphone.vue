<template>
    <div class="product-area pt-60 pb-45">
        <div class="container">
            <div class="section-border mb-10">
                <h4 class="section-title section-bg-white">Top Headphones</h4>
            </div>
            <div class="product-slider-nav nav-style"></div>
            <div class="headphone-slider-active owl-carousel product-slider">
                <sy-product-two
                    v-for="(product, index) in products"
                    :key="index"
                    :product="product"
                ></sy-product-two>
            </div>
        </div>
    </div>
</template>

<script>
import SyProductTwo from "../product/single/SyProductTwo";
export default {
    name: "HeadPhone",
    props: {
        products: Array
    },
    components: {
      SyProductTwo
    }
};
</script>
