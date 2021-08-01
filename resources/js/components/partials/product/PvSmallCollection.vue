<template>
    <div class="product-widgets-container row pb-2">
        <div class="col-lg-3 col-sm-6 pb-5 pb-md-0">
            <h4 class="section-sub-title">Featured Products</h4>

            <div v-if="!featuredProducts">
                <div
                    class="skel-product-col skel-pro mb-2"
                    v-for="(item,index) in [0,1,2]"
                    :key="'featured' + index"
                ></div>
            </div>

            <pv-small-product
                :product="product"
                v-for="(product,index) in featuredProducts"
                :key="'featured-product' + index"
            ></pv-small-product>
        </div>

        <div class="col-lg-3 col-sm-6 pb-5 pb-md-0">
            <h4 class="section-sub-title">Best Selling Products</h4>

            <div v-if="!bestProducts">
                <div
                    class="skel-product-col skel-pro mb-2"
                    v-for="(item,index) in [0,1,2]"
                    :key="'best' + index"
                ></div>
            </div>

            <pv-small-product
                :product="product"
                v-for="(product,index) in bestProducts"
                :key="'best-product' + index"
            ></pv-small-product>
        </div>

        <div class="col-lg-3 col-sm-6 pb-5 pb-md-0">
            <h4 class="section-sub-title">Latest Products</h4>

            <div v-if="!latestProducts">
                <div
                    class="skel-product-col skel-pro mb-2"
                    v-for="(item,index) in [0,1,2]"
                    :key="'latest' + index"
                ></div>
            </div>

            <pv-small-product
                :product="product"
                v-for="(product,index) in latestProducts"
                :key="'latest-product' + index"
            ></pv-small-product>
        </div>

        <div class="col-lg-3 col-sm-6 pb-5 pb-md-0">
            <h4 class="section-sub-title">Top Rated Products</h4>

            <div v-if="!topRatedProducts">
                <div
                    class="skel-product-col skel-pro mb-2"
                    v-for="(item,index) in [0,1,2]"
                    :key="'top' + index"
                ></div>
            </div>

            <pv-small-product
                :product="product"
                v-for="(product,index) in topRatedProducts"
                :key="'top-rated-product' + index"
            ></pv-small-product>
        </div>
    </div>
</template>

<script>
import PvSmallProduct from '~/components/features/product/PvSmallProduct';

export default {
	components: {
		PvSmallProduct
	},
	props: {
		featuredProducts: Array,
		bestProducts: Array,
		latestProducts: Array,
		topRatedProducts: Array
	}
};
</script>