<template>
	<section
		class="most-viewed-products appear-animate"
		data-animation-name="fadeInUpShorter"
		data-animation-delay="200"
		v-animate
	>
		<div class="container">
			<h2 class="section-title ls-n-10 pb-3 m-b-4">Most Viewed Products</h2>

			<div
				class="row"
				v-if="popularProducts.length === 0"
			>
				<pv-carousel
					class="products-slider swiper-nav-outisde show-nav-hover nav-image-center custom-nav w-100"
					:options="productSlider"
				>
					<div
						class="product-loading-overlay swiper-slide"
						v-for="index in [1,2,3,4,5,6]"
						:key="'best-skel-' + index"
					></div>
				</pv-carousel>
			</div>

			<div
				class="row"
				v-if="popularProducts.length > 0"
			>
				<pv-carousel
					class="products-slider swiper-nav-outisde show-nav-hover nav-image-center custom-nav w-100"
					:options="productSlider"
				>
					<template v-for="(product,index) in popularProducts.slice(0,6)">
						<pv-product-one
							:key="'popular-special' + index"
							:product="product"
							class="swiper-slide"
						></pv-product-one>
					</template>
				</pv-carousel>
			</div>
		</div>
	</section>
</template>

<script>
import PvCarousel from '../../features/PvCarousel';
import PvProductOne from '../../features/product/PvProductOne';
import { getMostViewedProducts } from '../../../utils/service';
import { productSlider } from '../../../utils/data/carousel';

export default {
	components: {
		PvCarousel,
		PvProductOne
	},
	props: {
		products: Array
	},
	data: function () {
		return {
			productSlider: productSlider
		};
	},
	computed: {
		popularProducts: function () {
			return getMostViewedProducts( this.products );
		}
	}
};
</script>