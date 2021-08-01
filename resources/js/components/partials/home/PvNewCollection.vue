<template>
	<section
		class="new-products-section appear-animate"
		v-animate
	>
		<div class="container">
			<h2 class="section-title heading-border ls-20 border-0">New Arrivals</h2>

			<pv-carousel
				class="products-slider custom-products nav-outer show-nav-hover nav-image-center"
				:options="productSlider"
				v-if="products.length === 0"
			>
				<div
					v-for="item in [1,2,3,4,5]"
					:key="item"
					class="swiper-slide product-loading-overlay"
				></div>
			</pv-carousel>

			<pv-carousel
				class="products-slider custom-products nav-outer show-nav-hover nav-image-center mb-2"
				:options="productSlider"
				v-if="products"
			>
				<pv-product-one
					v-for="(product,index) in products"
					:key="'featured' + index"
					:product="product"
					class="swiper-slide"
				></pv-product-one>
			</pv-carousel>

			<div
				class="banner banner-big-sale appear-animate"
				v-animate
				data-animation-delay="200"
				data-animation-name="fadeInUpShorter"
				style="background: #2A95CB center/cover url('./images/home/banners/banner-4.jpg');"
			>
				<div class="banner-content row align-items-center mx-0">
					<div class="col-md-9 col-sm-8">
						<h2 class="text-white text-uppercase text-center text-sm-left ls-n-20 mb-md-0 px-4">
							<b class="d-inline-block mr-3 mb-1 mb-md-0">Big Sale</b>
							All new fashion brands items up to 70% off
							<small class="text-transform-none align-middle">Online Purchases Only</small>
						</h2>
					</div>
					<div class="col-md-3 col-sm-4 text-center text-sm-right">
						<nuxt-link
							class="btn btn-light btn-white btn-lg"
							to="/shop"
						>View Sale</nuxt-link>
					</div>
				</div>
			</div>

			<h2
				class="section-title categories-section-title heading-border border-0 ls-0 appear-animate"
				data-animation-delay="100"
				data-animation-name="fadeInUpShorter"
				v-animate
			>Browse Our Categories</h2>

			<pv-carousel
				class="categories-slider show-nav-hover nav-outer"
				:options="categorySlider"
			>
				<div
					class="product-category swiper-slide appear-animate"
					data-animation-name="fadeInUpShorter"
					v-animate
				>
					<nuxt-link to="/shop">
						<figure>
							<img
								v-lazy="'./images/home/categories/category-1.jpg'"
								alt="category"
								width="220"
								height="220"
							/>
						</figure>
						<div class="category-content">
							<h3>Dress</h3>
							<span>
								<mark class="count">3</mark> products
							</span>
						</div>
					</nuxt-link>
				</div>

				<div
					class="product-category swiper-slide appear-animate"
					data-animation-name="fadeInUpShorter"
					v-animate
				>
					<nuxt-link to="/shop">
						<figure>
							<img
								v-lazy="'./images/home/categories/category-2.jpg'"
								alt="category"
								width="220"
								height="220"
							/>
						</figure>
						<div class="category-content">
							<h3>Watches</h3>
							<span>
								<mark class="count">3</mark> products
							</span>
						</div>
					</nuxt-link>
				</div>

				<div
					class="product-category swiper-slide appear-animate"
					data-animation-name="fadeInUpShorter"
					v-animate
				>
					<nuxt-link to="/shop">
						<figure>
							<img
								v-lazy="'./images/home/categories/category-3.jpg'"
								alt="category"
								width="220"
								height="220"
							/>
						</figure>
						<div class="category-content">
							<h3>Machine</h3>
							<span>
								<mark class="count">3</mark> products
							</span>
						</div>
					</nuxt-link>
				</div>

				<div
					class="product-category swiper-slide appear-animate"
					data-animation-name="fadeInUpShorter"
					v-animate
				>
					<nuxt-link to="/shop">
						<figure>
							<img
								v-lazy="'./images/home/categories/category-4.jpg'"
								alt="category"
								width="220"
								height="220"
							/>
						</figure>
						<div class="category-content">
							<h3>Sofa</h3>
							<span>
								<mark class="count">3</mark> products
							</span>
						</div>
					</nuxt-link>
				</div>

				<div
					class="product-category swiper-slide appear-animate"
					data-animation-name="fadeInUpShorter"
					v-animate
				>
					<nuxt-link to="/shop">
						<figure>
							<img
								v-lazy="'./images/home/categories/category-6.jpg'"
								alt="category"
								width="220"
								height="220"
							/>
						</figure>
						<div class="category-content">
							<h3>Headphone</h3>
							<span>
								<mark class="count">3</mark> products
							</span>
						</div>
					</nuxt-link>
				</div>

				<div
					class="product-category swiper-slide appear-animate"
					data-animation-name="fadeInUpShorter"
					v-animate
				>
					<nuxt-link to="/shop">
						<figure>
							<img
								v-lazy="'./images/home/categories/category-5.jpg'"
								alt="category"
								width="220"
								height="220"
							/>
						</figure>
						<div class="category-content">
							<h3>Sports</h3>
							<span>
								<mark class="count">3</mark> products
							</span>
						</div>
					</nuxt-link>
				</div>
			</pv-carousel>
		</div>
	</section>
</template>

<script>
import PvCarousel from '~/components/features/PvCarousel';
import PvProductOne from '~/components/features/product/PvProductOne';
import { productSlider, categorySlider } from '~/utils/data/carousel';

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
			categorySlider: categorySlider
		};
	},
	mounted: function () { }
};
</script>