<template>
	<div
		class="container appear-animate"
		v-animate
	>
		<pv-carousel
			class="info-boxes-slider mb-2"
			:options="serviceSlider"
		>
			<div class="info-box info-box-icon-left swiper-slide">
				<i class="icon-shipping"></i>

				<div class="info-box-content">
					<h4>FREE SHIPPING &amp; RETURN</h4>
					<p class="text-body">Free shipping on all orders over $99.</p>
				</div>
			</div>

			<div class="info-box info-box-icon-left swiper-slide">
				<i class="icon-money"></i>

				<div class="info-box-content">
					<h4>MONEY BACK GUARANTEE</h4>
					<p class="text-body">100% money back guarantee</p>
				</div>
			</div>

			<div class="info-box info-box-icon-left swiper-slide">
				<i class="icon-support"></i>

				<div class="info-box-content">
					<h4>ONLINE SUPPORT 24/7</h4>
					<p class="text-body">Lorem ipsum dolor sit amet.</p>
				</div>
			</div>
		</pv-carousel>

		<div class="banners-container mb-2">
			<pv-carousel
				class="banners-slider"
				:options="bannerSlider"
			>
				<div
					class="banner banner1 banner-sm-vw d-flex align-items-center appear-animate swiper-slide"
					data-animation-name="fadeInLeftShorter"
					data-animation-delay="500"
					v-animate
				>
					<figure class="w-100">
						<img
							v-lazy="'./images/home/banners/banner-1.jpg'"
							alt="banner"
							width="380"
							height="175"
						/>
					</figure>
					<div class="banner-layer">
						<h3 class="m-b-2">Porto Watches</h3>
						<h4 class="m-b-3 text-primary">
							<sup class="text-dark">
								<del>20%</del>
							</sup>30%
							<sup>OFF</sup>
						</h4>
						<nuxt-link
							to="/shop"
							class="btn btn-sm btn-dark"
						>Shop Now</nuxt-link>
					</div>
				</div>

				<div
					class="banner banner2 banner-sm-vw text-uppercase d-flex align-items-center appear-animate swiper-slide"
					v-animate
					data-animation-name="fadeInUpShorter"
					data-animation-delay="200"
				>
					<figure class="w-100">
						<img
							v-lazy="'./images/home/banners/banner-2.jpg'"
							alt="banner"
							width="380"
							height="175"
						/>
					</figure>
					<div class="banner-layer text-center">
						<div class="row align-items-lg-center">
							<div class="col-lg-7 text-lg-right">
								<h3>Deal Promos</h3>
								<h4 class="pb-4 pb-lg-0 mb-0 text-body">Starting at $99</h4>
							</div>
							<div class="col-lg-5 text-lg-left px-0 px-xl-3">
								<nuxt-link
									to="/shop"
									class="btn btn-sm btn-dark"
								>Shop Now</nuxt-link>
							</div>
						</div>
					</div>
				</div>

				<div
					class="banner banner3 banner-sm-vw d-flex align-items-center appear-animate swiper-slide"
					data-animation-name="fadeInRightShorter"
					data-animation-delay="500"
					v-animate
				>
					<figure class="w-100">
						<img
							v-lazy="'./images/home/banners/banner-3.jpg'"
							alt="banner"
							width="380"
							height="175"
						/>
					</figure>
					<div class="banner-layer text-right">
						<h3 class="m-b-2">Handbags</h3>
						<h4 class="m-b-2 text-secondary text-uppercase">Starting at $99</h4>
						<nuxt-link
							to="/shop"
							class="btn btn-sm btn-dark"
						>Shop Now</nuxt-link>
					</div>
				</div>
			</pv-carousel>
		</div>
	</div>
</template>

<script>
import PvCarousel from '~/components/features/PvCarousel';
import { serviceSlider, bannerSlider } from '~/utils/data/carousel'

export default {
	components: {
		PvCarousel
	},
	data: function () {
		return {
			serviceSlider: serviceSlider,
			bannerSlider: bannerSlider
		}
	}
}
</script>