<template>
	<section class="top-categories">
		<div class="container">
			<div class="row m-b-3">
				<div class="col-lg-6">
					<div
						class="banner banner1 mb-2 appear-animate"
						data-animation-name="fadeInLeftShorter"
						data-animation-delay="200"
						style="background-color: #f4f4f4;"
						v-animate
					>
						<figure>
							<img
								v-lazy="'/images/home/banner-1.jpg'"
								alt="banner"
								width="700"
								height="236"
							>
						</figure>
						<div class="banner-layer banner-layer-middle banner-layer-left">
							<h3 class="font1 ls-10 text-uppercase mb-0">Action<br>Cameras</h3>
						</div>
						<div class="banner-layer banner-layer-middle banner-layer-right">
							<div class="coupon-sale-text">
								<h4 class="font1 line-height-1 ls-10 text-white bg-primary skew-box m-b-2">
									Starting from</h4>
								<h5 class="d-inline-block font1 text-white bg-primary skew-box mb-0">$399<sub class="text-dark">$499</sub>
								</h5>
							</div>
						</div>
					</div>
				</div>
				<div class="col-lg-6">
					<div
						class="banner banner2 mb-2 appear-animate"
						data-animation-name="fadeInRightShorter"
						data-animation-delay="200"
						style="background-color: #f4f4f4;"
						v-animate
					>
						<figure>
							<img
								v-lazy="'/images/home/banner-2.jpg'"
								alt="banner"
								width="700"
								height="236"
							>
						</figure>
						<div class="banner-layer banner-layer-middle banner-layer-left">
							<h3 class="font1 text-uppercase ls-10 mb-0">For all<br>styles</h3>
						</div>
						<div class="banner-layer banner-layer-middle banner-layer-right">
							<div class="coupon-sale-text">
								<h4 class="font1 line-height-1 ls-10 text-white bg-secondary skew-box m-b-2">
									Starting from</h4>
								<h5 class="d-inline-block font1 text-white bg-secondary skew-box mb-0">$199<sub class="text-dark">$299</sub>
								</h5>
							</div>
						</div>
					</div>
				</div>
			</div>

			<h2 class="section-title line-height-1 ls-10 pb-4 mb-4">Top Categories</h2>

			<div
				class="row mb-2 appear-animate"
				data-animation-name="fadeIn"
				data-animation-delay="200"
				v-animate
			>
				<pv-carousel
					class="categories-slider w-100"
					:options="categorySlider"
				>
					<div class="swiper-slide">
						<router-link :to="{path: '/shop', query: {category: 'fashion'}}">
							<i class="icon-category-fashion"></i>
							<span>Fashion</span>
						</router-link>
					</div>

					<div class="swiper-slide">
						<router-link :to="{path: '/shop', query: {category: 'electronics'}}">
							<i class="icon-category-electronics"></i>
							<span>Electronics</span>
						</router-link>
					</div>

					<div class="swiper-slide">
						<router-link :to="{path: '/shop', query: {category: 'gifts'}}">
							<i class="icon-category-gifts"></i>
							<span>Gifts</span>
						</router-link>
					</div>

					<div class="swiper-slide">
						<router-link :to="{path: '/shop', query: {category: 'garden'}}">
							<i class="icon-category-garden"></i>
							<span>Garden</span>
						</router-link>
					</div>

					<div class="swiper-slide">
						<router-link :to="{path: '/shop', query: {category: 'music'}}">
							<i class="icon-category-music"></i>
							<span>Music</span>
						</router-link>
					</div>

					<div class="swiper-slide">
						<router-link :to="{path: '/shop', query: {category: 'motors'}}">
							<i class="icon-category-motors"></i>
							<span>Motors</span>
						</router-link>
					</div>

					<div class="swiper-slide">
						<router-link :to="{path: '/shop', query: {category: 'furniture'}}">
							<i class="icon-category-furniture"></i>
							<span>Furniture</span>
						</router-link>
					</div>
				</pv-carousel>
			</div>
		</div>
	</section>
</template>

<script>
import PvCarousel from '../../features/PvCarousel';
import { categorySlider } from '../../../utils/data/carousel';

export default {
	components: {
		PvCarousel
	},
	data: function () {
		return {
			categorySlider: categorySlider
		}
	}
}
</script>