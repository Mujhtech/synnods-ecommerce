<template>
    <div class="tab-pane active" id="home1">
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
    name: "NewArrival",
    props: {
        products: Array
    },
    components: {
        SyProductOne
    }
};
</script>
