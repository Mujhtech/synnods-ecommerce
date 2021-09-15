<template>
    <div class="tab-pane" id="home2">
        <div class="custom-row">
            <sy-product-one
                v-for="(product, index) in products"
                :key="index"
                :product="product"
            ></sy-product-one>
        </div>
    </div>
</template>

<script>
import SyProductOne from "../product/single/SyProductOne.vue";
export default {
    components: { SyProductOne },
    name: "FeaturedProduct",
    props: {
        products: Array
    }
};
</script>
