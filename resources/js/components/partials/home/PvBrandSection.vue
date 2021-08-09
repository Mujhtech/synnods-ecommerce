<template>
	<section class="brands-section">
		<div class="container">
			<h2
				class="section-title line-height-1 ls-10 pb-4 mb-5 appear-animate"
				data-animation-name="fadeInUpShorter"
				data-animation-delay="200"
				data-animation-duration="400"
				v-animate
			>
				Top Brands</h2>

			<pv-carousel
				class="brands-slider swiper-carousel swiper-theme images-center appear-animate"
				data-animation-name="fadeIn"
				data-animation-delay="400"
				v-animate
				:options="brandSlider"
			>
				<div class="swiper-slide">
					<img
						:src="'/assets/images/home/brands/brand1.png'"
						width="200"
						height="50"
						alt="brand"
					>
				</div>

				<div class="swiper-slide">
					<img
						:src="'/assets/images/home/brands/brand2.png'"
						width="200"
						height="50"
						alt="brand"
					>
				</div>

				<div class="swiper-slide">
					<img
						:src="'/assets/images/home/brands/brand3.png'"
						width="200"
						height="50"
						alt="brand"
					>
				</div>

				<div class="swiper-slide">
					<img
						:src="'/assets/images/home/brands/brand4.png'"
						width="200"
						height="50"
						alt="brand"
					>
				</div>

				<div class="swiper-slide">
					<img
						:src="'/assets/images/home/brands/brand5.png'"
						width="200"
						height="50"
						alt="brand"
					>
				</div>
			</pv-carousel>
		</div>
	</section>
</template>

<script>
import PvCarousel from '../../features/PvCarousel';
import { brandSlider } from '../../../utils/data/carousel';

export default {
	components: {
		PvCarousel
	},
	data: function () {
		return {
			brandSlider: brandSlider
		}
	}
}
</script>