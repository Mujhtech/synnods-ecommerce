<template>
	<section class="recent-products">
		<div class="container">
			<div
				class="appear-animate"
				data-animation-name="fadeIn"
				data-animation-delay="200"
				v-animate
			>
				<h2 class="section-title ls-n-10 pb-3 m-b-4">Recent Products</h2>

				<div class="row">
					<pv-carousel
						class="products-slider swiper-nav-outisde show-nav-hover nav-image-center custom-nav w-100"
						:options="productSlider"
					>
						<pv-product-one
							v-for="(product,index) in newProducts.slice(0,6)"
							:key="'popular' + index"
							:product="product"
							class="swiper-slide"
						></pv-product-one>
					</pv-carousel>
				</div>
			</div>

			<div
				class="banner banner3 bg-dark appear-animate"
				data-animation-name="fadeIn"
				data-animation-delay="200"
				v-animate
			>
				<div class="row m-0 no-gutters align-items-center">
					<div class="col-md-6 col-lg-3 align-self-baseline">
						<figure>
							<img
								:src="'./images/home/banners/banner-3.jpg'"
								alt="image"
								width="380"
								height="136"
							>
						</figure>
					</div>
					<div class="col-md-6 col-lg-4 py-4 py-lg-5">
						<div class="px-5 px-md-0">
							<h3 class="font1 text-uppercase m-b-2">Check new arrivals</h3>
							<h2 class="font1 ls-10 text-uppercase text-white mb-0">Explore Smartphones</h2>
						</div>
					</div>
					<div class="col-md-6 col-lg-3 py-4 py-lg-5 d-flex justify-content-md-center">
						<div class="px-5 px-md-0">
							<div class="coupon-sale-text d-flex flex-column align-items-start">
								<h4 class="m-b-2 font1 d-block text-dark bg-white skew-box">Exclusive
									COUPON</h4>
								<h5 class="mb-0 font1 d-inline-block bg-primary skew-box"><i class="text-white ls-0">UP
										TO</i><b class="text-white">$200</b><sub class="text-white">OFF</sub>
								</h5>
							</div>
						</div>
					</div>
					<div class="col-md-6 col-lg-2 py-4 py-lg-5">
						<div class="px-5 px-md-0">
							<nuxt-link
								to="/shop"
								class="btn btn-dark font1 ls-10"
							>View All Now</nuxt-link>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<script>
import PvCarousel from '../../features/PvCarousel';
import PvProductOne from '../../features/product/PvProductOne';
import { getProductsByAttri } from '../../../utils/service';
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
			newProducts: []
		};
	},
	created: function () {
		this.newProducts = getProductsByAttri( this.products, 'is_new' );
	}
};
</script>