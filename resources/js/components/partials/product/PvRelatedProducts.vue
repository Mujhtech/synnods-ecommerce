<template>
	<div class="products-section pt-0">
		<h2
			class="section-title"
			v-if="products"
			style="margin-bottom: 2.4rem"
		>Related Products</h2>

		<pv-carousel
			class="skel-carousel dots-top dots-small"
			:options="baseSlider3"
			v-if="!products"
		>
			<div
				v-for="item in [1,2,3,4,5]"
				:key="item"
				class="swiper-slide skel-pro"
			></div>
		</pv-carousel>

		<pv-carousel
			class="products-slider dots-top dots-small"
			:options="baseSlider3"
			v-if="products"
		>
			<pv-product-one
				:product="item"
				v-for="(item,index) in products.slice(0, 5)"
				:key="'related-product' + index"
				class="swiper-slide"
			></pv-product-one>
		</pv-carousel>

		<div
			class="info-box with-icon p-0"
			v-if="products && products.length === 0"
			style="margin-bottom: 1.6rem"
		>
			<p>No products were found matching your selection.</p>
		</div>
	</div>
</template>

<script>
import PvProductOne from '~/components/features/product/PvProductOne';
import PvCarousel from '~/components/features/PvCarousel';
import { baseSlider3 } from '~/utils/data/carousel';

export default {
	components: {
		PvProductOne,
		PvCarousel
	},
	data: function () {
		return {
			baseSlider3: baseSlider3
		}
	},
	props: {
		products: Array
	}
}
</script>