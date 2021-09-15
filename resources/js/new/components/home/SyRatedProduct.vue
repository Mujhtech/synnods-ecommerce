<template>
    <div class="tab-pane" id="home3">
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
    name: "RatedProduct",
    props: {
        products: Array
    }
};
</script>
