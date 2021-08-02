<template>
	<div class="products-section pt-0">
		<h2
			class="section-title font1"
			v-if="products"
			style="margin-bottom: 2.4rem"
		>Best Selling Products</h2>

		<div class="row">
			<pv-carousel
				class="skel-carousel dots-top dots-small w-100"
				:options="baseSlider9"
				v-if="!products"
			>
				<div
					v-for="item in [1,2,3,4,5]"
					:key="item"
					class="swiper-slide skel-pro"
				></div>
			</pv-carousel>

			<pv-carousel
				class="products-slider dots-top dots-small w-100"
				:options="baseSlider9"
				v-if="products && products.length > 0"
			>
				<pv-product-one
					:product="item"
					v-for="(item,index) in products.slice(0, 5)"
					:key="'best-product' + index"
					class="swiper-slide"
				></pv-product-one>
			</pv-carousel>
		</div>
	</div>
</template>

<script>
import PvProductOne from '~/components/features/product/PvProductOne';
import PvCarousel from '~/components/features/PvCarousel';
import { baseSlider9 } from '~/utils/data/carousel';

export default {
	components: {
		PvProductOne,
		PvCarousel
	},
	data: function () {
		return {
			baseSlider9: baseSlider9
		}
	},
	props: {
		products: Array
	}
}
</script>