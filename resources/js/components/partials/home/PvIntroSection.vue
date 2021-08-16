<template>
	<pv-carousel
		class="home-slider custom-nav slide-animate"
		:options="introSlider"
		v-animate
	>
		<div class="home-slide home-slide-1 banner swiper-slide">
			<img
				class="swiper-lazy slide-bg"
				:src="'./images/banners/home_slide1.jpg'"
				alt="slider image"
				width="772"
				height="434"
			>
			<div class="banner-layer banner-layer-middle banner-layer-right">
				<div
					class="appear-animate"
					data-animation-name="rotateInUpLeft"
					v-animate
				>

					<h2 class="font1 ls-10 text-uppercase text-right m-b-4">Electronic<br>Deals
					</h2>
					<div class="coupon-sale-text">
						<h4 class="m-b-2 font1 d-block text-white bg-dark skew-box">Exclusive
							COUPON</h4>
						<h5 class="mb-0 font1 d-inline-block bg-dark skew-box"><i class="text-dark ls-0">UP
								TO</i><b class="text-white">₦100</b><sub class="text-dark">OFF</sub>
						</h5>
					</div>

					<router-link
						to="/shop"
						class="btn btn-light btn-lg ls-10"
					>View All
						Now</router-link>
				</div>
			</div>
			<div class="banner-layer banner-layer-bottom banner-layer-right">
				<p class="ls-0 mb-0">* Only 200 Available</p>
			</div>
		</div>
		<div class="home-slide home-slide-2 banner swiper-slide">
			<img
				class="swiper-lazy slide-bg"
				:src="'./images/banners/home_slide2.jpg'"
				alt="slider image"
				width="772"
				height="434"
			>
			<div class="banner-layer banner-layer-middle banner-layer-left">
				<div
					class="appear-animate"
					data-animation-name="rotateInUpLeft"
					v-animate
				>
					<h2 class="font1 ls-10 text-uppercase m-b-4">Top
						Brands<br>Smartphones</h2>
					<div class="coupon-sale-text d-flex flex-column align-items-start">
						<h4 class="m-b-2 font1 d-block text-uppercase text-white bg-dark skew-box">
							Starting From
						</h4>
						<h5 class="mb-0 font1 d-inline-block bg-dark skew-box"><b class="text-white">₦199</b>
						</h5>
					</div>

					<router-link
						to="/shop"
						class="btn btn-light btn-lg ls-10"
					>View All
						Now</router-link>
				</div>
			</div>
		</div>
	</pv-carousel>
</template>

<script>
import PvCarousel from '../../features/PvCarousel';
import { introSlider } from '../../../utils/data/carousel';

export default {
	components: {
		PvCarousel
	},
	data: function () {
		return {
			introSlider: introSlider
		};
	}
};
</script>