<template>
    <div class="best-selling-area pt-60 pb-45 gray-bg best-selling-small">
        <div class="container">
            <div class="top-bar section-border mb-20">
                <div class="section-title-wrapper section-bg-gray">
                    <h4 class="section-title">Best Selling Products</h4>
                </div>
                <div class="product-tab-list-2 nav section-bg-gray">
                    <a class="active" href="#home4" data-bs-toggle="tab">
                        <h4>Smart Phones & Tablets</h4>
                    </a>
                    <a href="#home5" data-bs-toggle="tab">
                        <h4>Laptops & Computers</h4>
                    </a>
                    <a href="#home6" data-bs-toggle="tab">
                        <h4>Video Cameras</h4>
                    </a>
                </div>
            </div>
            <div class="tab-content jump">
                <div class="tab-pane active" id="home4">
                    <div class="best-selling-active nav-style owl-carousel">
                        <sy-product-three
                            v-for="(product, index) in products"
                            :key="index"
                            :product="product"
                        ></sy-product-three>
                    </div>
                </div>
                <div class="tab-pane" id="home5">
                    <div class="best-selling-active nav-style owl-carousel">
                        <sy-product-three
                            v-for="(product, index) in products"
                            :key="index"
                            :product="product"
                        ></sy-product-three>
                    </div>
                </div>
                <div class="tab-pane" id="home6">
                    <div class="best-selling-active nav-style owl-carousel">
                        <sy-product-three
                            v-for="(product, index) in products"
                            :key="index"
                            :product="product"
                        ></sy-product-three>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import SyProductThree from "../product/single/SyProductThree";
export default {
    name: "BestSellingProduct",
    props: {
        products: Array
    },
    components: {
        SyProductThree
    }
};
</script>
