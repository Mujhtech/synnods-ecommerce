<template>
	<div
		class="brands-section appear-animate"
		data-animation-name="fadeIn"
		data-animation-duration="500"
		data-animation-delay="700"
		v-animate
	>
		<div class="container">
			<pv-carousel
				class="brands-slider images-center"
				:options="brandSlider"
			>
				<div class="swiper-slide">
					<img
						v-lazy="'./images/brands/small/brand1.png'"
						width="130"
						height="56"
						alt="brand"
					/>
				</div>

				<div class="swiper-slide">
					<img
						v-lazy="'./images/brands/small/brand2.png'"
						width="130"
						height="56"
						alt="brand"
					/>
				</div>

				<div class="swiper-slide">
					<img
						v-lazy="'./images/brands/small/brand3.png'"
						width="130"
						height="56"
						alt="brand"
					/>
				</div>

				<div class="swiper-slide">
					<img
						v-lazy="'./images/brands/small/brand4.png'"
						width="130"
						height="56"
						alt="brand"
					/>
				</div>

				<div class="swiper-slide">
					<img
						v-lazy="'./images/brands/small/brand5.png'"
						width="130"
						height="56"
						alt="brand"
					/>
				</div>

				<div class="swiper-slide">
					<img
						v-lazy="'./images/brands/small/brand6.png'"
						width="130"
						height="56"
						alt="brand"
					/>
				</div>
			</pv-carousel>
		</div>
	</div>
</template>

<script>
import PvCarousel from '~/components/features/PvCarousel';
import { brandSlider } from '~/utils/data/carousel';

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