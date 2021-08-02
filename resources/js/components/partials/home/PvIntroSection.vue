<template>
	<section class="intro-section">
		<div
			class="container"
			v-images-loaded.on="updateIsotope"
		>
			<isotope
				class="grid row"
				ref="introIso"
				:options="isotopeOptions"
				:list="[]"
			>
				<div
					class="grid-item col-md-8 mb-2"
					key="intro-1"
				>
					<div class="banner banner1">
						<figure>
							<img
								src="../../../static/images/home/banners/banner-1.jpg"
								alt="banner"
								width="779"
								height="464"
								style="background: #eee"
							/>
						</figure>

						<div class="banner-layer banner-layer-middle banner-layer-left">
							<div
								class="appear-animate"
								data-animation-name="bounceInLeft"
								data-animation-delay="100"
								v-animate
							>
								<h3 class="text-body m-b-1">Save Big Sale</h3>
								<h4 class="d-flex align-items-center text-uppercase">
									50%
									<small class="d-inline-block">Off</small>
								</h4>
								<h5>
									<span class="d-inline-block align-top ls-n-20 text-uppercase">
										Starting
										At
									</span>
									<b class="coupon-sale-text d-inline-block ls-n-20 text-primary mb-0">
										<sup>$</sup>199<sup>99</sup>
									</b>
								</h5>
								<router-link
									to="/shop"
									class="btn btn-sm text-uppercase ls-10"
								>Shop Now</router-link>
							</div>
						</div>
					</div>
				</div>
				<div
					class="grid-item col-md-4 mb-2"
					key="intro-2"
				>
					<div class="find-form d-flex flex-column justify-content-center">
						<h3 class="line-height-1 ls-n-10 text-center text-uppercase text-white m-b-3">
							Find A
							Product
						</h3>
						<form
							class="mb-0"
							action="#"
							method="get"
						>
							<div class="select-custom">
								<select
									class="form-control"
									@change="goToShop"
									v-model="currentCategory"
								>
									<option value="-1">Select a category</option>
									<option value="accessories-1">Accessories</option>
									<option value="caps">&nbsp;&nbsp;Caps</option>
									<option value="watches-2">&nbsp;&nbsp;Watches</option>
									<option value="beauty">Beauty</option>
									<option value="decor">Decor</option>
									<option value="fashion">Fashion</option>
									<option value="shoes">Shoes</option>
									<option value="footwear">Footwear</option>
									<option value="headphone">&nbsp;&nbsp;Headphone</option>
									<option value="toys">&nbsp;&nbsp;Toys</option>
								</select>
							</div>
							<div class="select-custom mb-0">
								<select
									class="form-control mb-0"
									@change="goToShop"
									v-model="currentBrand"
								>
									<option value="-1">By brand</option>
									<option value="adidas">Adidas</option>
									<option value="calvin-klein">Calvin Klein</option>
									<option value="diesel">Diesel</option>
									<option value="lacoste">Lacoste</option>
								</select>
							</div>
						</form>
					</div>
				</div>
				<div
					class="grid-item col-md-4 mb-2"
					key="intro-3"
				>
					<div
						class="banner banner2 appear-animate"
						data-animation-name="fadeIn"
						data-animation-delay="200"
						v-animate
					>
						<figure>
							<img
								src="../../../static/images/home/banners/banner-2.jpg"
								alt="banner"
								style="background: #eee"
							/>
						</figure>

						<div class="banner-layer banner-layer-middle banner-layer-right text-right">
							<h3 class="ls-10 text-uppercase m-b-3">Electronic<br />Deals</h3>
							<div class="coupon-sale-text d-inline-block text-left">
								<h4 class="font1 d-block text-white bg-dark ls-10">Exclusive COUPON</h4>
								<h5 class="mb-0 font1 d-inline-block bg-dark">
									<i class="text-dark ls-0">
										UP
										TO
									</i>
									<b class="text-white">$100</b>
									<sub class="text-dark">OFF</sub>
								</h5>
							</div>
						</div>
					</div>
				</div>
				<div
					class="grid-col-sizer col-1"
					key="intro-sizer"
				></div>
			</isotope>
		</div>
	</section>
</template>

<script>
import isotope from 'vueisotope';
import imagesLoaded from 'vue-images-loaded';
import PvCarousel from '../../features/PvCarousel';
import { baseSlider1 } from '../../../utils/data/carousel';

export default {
	components: {
		PvCarousel,
		isotope
	},
	directives: {
		imagesLoaded
	},
	data: function () {
		return {
			baseSlider1: baseSlider1,
			currentCategory: '-1',
			currentBrand: '-1',
			isotopeOptions: {
				itemSelector: 'grid-item',
				layoutMode: 'masonry',
				percentPosition: false,
				masonry: {
					columnWidth: '.grid-col-sizer'
				}
			}
		}
	},
	methods: {
		goToShop: function () {
			if ( this.currentCategory !== '-1' ) {
				this.$router.push( { path: '/shop', query: { category: this.currentCategory } } );
			}

			if ( this.currentBrand !== '-1' ) {
				this.$router.push( { path: '/shop', query: { brand: this.currentBrand } } );
			}
		},
		updateIsotope: function () {
			if ( this.$refs.introIso ) {
				this.$refs.introIso.layout( 'masonry' );
			}
		}
	}
}
</script>