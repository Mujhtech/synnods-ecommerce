<template>
	<section class="featured-products-section nav-outer-section">
		<div class="container">
			<h2 class="section-title ls-n-10 text-center text-uppercase m-b-3">Featured Products</h2>

			<pv-carousel
				class="featured-products nav-outer show-nav-hover nav-image-center appear-animate"
				data-animation-name="fadeIn"
				data-animation-delay="200"
				v-animate
				:options="featuredSlider"
			>
				<pv-product-one
					v-for="(product,index) in products"
					:key="'featured' + index"
					:product="product"
					class="swiper-slide"
				></pv-product-one>
			</pv-carousel>

			<div class="swiper-nav outer-nav">
				<button
					type="button"
					role="button"
					class="swiper-prev"
				>
					<i class="icon-left-open-big"></i>
				</button>

				<button
					type="button"
					role="button"
					class="swiper-next"
				>
					<i class="icon-right-open-big"></i>
				</button>
			</div>
		</div>
	</section>
</template>

<script>
import PvCarousel from '~/components/features/PvCarousel';
import PvProductOne from '~/components/features/product/PvProductOne';
import { featuredSlider } from '~/utils/data/carousel';

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
			featuredSlider: featuredSlider
		};
	}
};
</script>