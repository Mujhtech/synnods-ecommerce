<template>
    <div>
        <sy-home-slider></sy-home-slider>
        <sy-home-banner></sy-home-banner>
        <div class="product-area pt-65 pb-30">
            <div class="container">
                <div class="product-tab-list mb-30 nav" role="tablist">
                    <a class="active" href="#home1" data-bs-toggle="tab">
                        <h4>New Arrivals</h4>
                    </a>
                    <a href="#home2" data-bs-toggle="tab">
                        <h4>Featured</h4>
                    </a>
                    <a href="#home3" data-bs-toggle="tab">
                        <h4>Top Rated</h4>
                    </a>
                </div>
                <div class="tab-content jump">
                    <sy-new-product v-if="products.length > 0" :products="products"></sy-new-product>
                    <sy-featured-product v-if="products.length > 0" :products="products"></sy-featured-product>
                    <sy-rated-product v-if="products.length > 0" :products="products"></sy-rated-product>
                </div>
            </div>
        </div>
        <div
            class="connect-area bg-img pt-120 pb-125"
            style="background-image: url(assets/img/banner/banner-3.jpg)"
        >
            <div class="container">
                <div class="connect-content">
                    <h2>
                        Stay Connected When You’re Away <br />From Your Phone
                    </h2>
                    <p>
                        Start the year off strong and explore how to track your
                        activities, health, and fitness with Apple Watch and
                        iPhone.
                    </p>
                    <h4>₦128.99</h4>
                    <a class="btn-style-2" href="#">Discover Now</a>
                </div>
            </div>
        </div>
        <sy-home-best-selling v-if="products.length > 0" :products="products"></sy-home-best-selling>
        <sy-home-headphone v-if="products.length > 0" :products="products"></sy-home-headphone>
    </div>
</template>

<script>
import SyHomeSlider from "../components/home/SyHomeSlider";
import SyHomeBanner from "../components/home/SyHomeBanner";
import SyHomeHeadphone from "../components/home/SyHomeHeadphone";
import SyHomeBestSelling from "../components/home/SyHomeBestSelling";
import SyFeaturedProduct from "../components/home/SyFeaturedProduct";
import SyNewProduct from "../components/home/SyNewProduct";
import SyRatedProduct from "../components/home/SyRatedProduct";
import { getProductsByFeatured, getProductsByViews } from "../../utils/service";
import { fetchProduct } from "../../services/product";
export default {
    name: "Home",
    metaInfo: {
        title: "Home",
        titleTemplate: "%s - Faadaakaa Ecommerce"
    },
    components: {
        SyHomeBanner,
        SyHomeSlider,
        SyFeaturedProduct,
        SyNewProduct,
        SyRatedProduct,
        SyHomeBestSelling,
        SyHomeHeadphone
    },
    data: function() {
        return {
            products: [],
            featuredProducts: [],
            newProducts: [],
            bestProducts: [],
            topRatedProducts: [],
            mostViewProducts: [],
            timerId: 0
        };
    },
    mounted: async function() {
        try {
            const response = await fetchProduct();
            this.products = response.data.data.data;
            this.featuredProducts = getProductsByFeatured(
                response.data.data.data
            );
            this.mostViewProducts = getProductsByViews(response.data.data.data);
            //this.newProducts = getProductsByAttri(response.data.data.data, "is_new");
            //this.bestProducts = getTopSellingProducts(response.data.data.data);
            //this.topRatedProducts = getTopRatedProducts(response.data.data.data);
        } catch (err) {
            console.log(err.response);
        }
        this.timerId = setTimeout(() => {}, 10000);
    },
    destroyed: function() {
        clearTimeout(this.timerId);
    }
};
</script>
