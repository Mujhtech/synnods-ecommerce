<template>
	<section
		class="top-rated-products appear-animate"
		data-animation-name="fadeIn"
		data-animation-delay="200"
		v-animate
	>
		<div class="container">
			<h2 class="section-title ls-n-10 pb-3 m-b-4">Top Rated Products</h2>

			<div class="row">
				<pv-carousel
					class="products-slider swiper-nav-outisde show-nav-hover nav-image-center custom-nav w-100"
					:options="productSlider"
				>
					<pv-product-one
						v-for="(product,index) in topProducts.slice(0,5)"
						:key="'popular' + index"
						:product="product"
						class="swiper-slide"
					></pv-product-one>
				</pv-carousel>
			</div>
		</div>
	</section>
</template>

<script>
import PvCarousel from '../../features/PvCarousel';
import PvProductOne from '../../features/product/PvProductOne';
import { getTopRatedProducts } from '../../../utils/service';
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
			productSlider: productSlider,
			topProducts: []
		};
	},
	created: function () {
		this.topProducts = getTopRatedProducts( this.products );
	}
};
</script>