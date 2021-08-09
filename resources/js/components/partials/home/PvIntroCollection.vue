<template>
	<pv-carousel
		class="featured-products-slider dot-inside dots-small"
		:options="dealSlider"
	>
		<pv-product-three
			v-for="(product,index) in saleProducts"
			:key="'sale' + index"
			:product="product"
			class="swiper-slide"
		>
		</pv-product-three>
	</pv-carousel>
</template>

<script>
import PvCarousel from '../../features/PvCarousel';
import PvProductThree from '../../features/product/PvProductThree';
import { dealSlider } from '../../../utils/data/carousel';

export default {
	components: {
		PvCarousel,
		PvProductThree
	},
	props: {
		products: Array
	},
	data: function () {
		return {
			dealSlider: dealSlider,
			saleProducts: []
		};
	},
	created: function () {
		this.saleProducts = this.products.filter( item => item.until !== null );
	}
};
</script>