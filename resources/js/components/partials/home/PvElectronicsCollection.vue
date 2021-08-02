<template>
	<section
		class="electronics-container appear-animate"
		data-animation-name="fadeIn"
		data-animation-delay="200"
		v-animate
	>
		<div class="container">
			<h2 class="section-title border-0 line-height-1 ls-n-10 m-b-4">Electronics</h2>

			<div class="row no-gutters m-0 bg-gray">
				<div class="col-md-5 col-lg-2">
					<div class="category-lists d-flex flex-md-column flex-wrap">
						<a
							href="javascript:;"
							@click="getProducts('3-d-printer-kit', $event)"
							class="active"
						>3D Printer Kit</a>
						<a
							href="javascript:;"
							@click="getProducts('arduino-compatible-boards', $event)"
						>Arduino Compatible Boards</a>
						<a
							href="javascript:;"
							@click="getProducts('digital-microscope', $event)"
						>Digital Microscope</a>
						<a
							href="javascript:;"
							@click="getProducts('furniture-1', $event)"
						>Furniture</a>
						<a
							href="javascript:;"
							@click="getProducts('ip-camera', $event)"
						>IP Camera</a>
						<a
							href="javascript:;"
							@click="getProducts('toys-1', $event)"
						>Toys</a>
						<a
							href="javascript:;"
							@click="getProducts('tv-box', $event)"
						>TV Box</a>
					</div>
				</div>

				<div class="col-md-7 col-lg-3 order-first order-md-0">
					<div
						class="banner banner4 h-100"
						style="background-color: #f4f4f4;"
					>
						<figure class="h-100">
							<img
								class="h-100"
								v-lazy="'./images/home/banners/banner-4.jpg'"
								alt="baner"
								width="360"
								height="508"
							>
						</figure>
						<div class="banner-layer banner-layer-top">
							<h3 class="font1 text-center text-uppercase">
								Electronic<br>deals
							</h3>
							<div class="coupon-sale-text d-flex flex-column align-items-start">
								<h4 class="m-b-2 font1 d-block text-white bg-dark skew-box">Exclusive
									COUPON</h4>
								<h5 class="mb-0 font1 d-inline-block bg-dark skew-box"><i class="text-dark ls-0">UP
										TO</i><b class="text-white">$100</b><sub class="text-dark">OFF</sub>
								</h5>
							</div>
						</div>
						<div class="banner-layer banner-layer-bottom">
							<router-link
								to="/shop"
								class="btn btn-light"
							>View All Now</router-link>
						</div>
					</div>
				</div>

				<div class="col-lg-7">
					<isotope
						class="grid grid2"
						:options="isotopeOptions"
						:list="products"
						v-if="products && products.length > 0"
					>

						<div
							class="grid-item col-md-8 height-x1"
							:key="'elec-1-' + receiveTime"
						>
							<pv-product-four :product="products[0]"></pv-product-four>
						</div>

						<div
							class="grid-item col-6 col-md-4 height-x2"
							:key="'elec-2-' + receiveTime"
						>
							<pv-product-four :product="products[1]"></pv-product-four>
						</div>

						<div
							class="grid-item col-6 col-md-4 height-x1"
							:key="'elec-3-' + receiveTime"
						>
							<pv-product-four :product="products[2]"></pv-product-four>
						</div>

						<div
							class="grid-item col-6 col-md-4 height-x1"
							:key="'elec-4-' + receiveTime"
						>
							<pv-product-four :product="products[3]"></pv-product-four>
						</div>

						<div
							class="col-1 col-md-4 grid-col-sizer"
							:key="'elec-sizer-' + receiveTime"
						></div>
					</isotope>
				</div>
			</div>
		</div>
	</section>
</template>

<script>
import isotope from 'vueisotope';
import PvProductFour from '../../features/product/PvProductFour';
import Api, { baseUrl, currentDemo } from '../../../api';

export default {
	components: {
		isotope,
		PvProductFour
	},
	data: function () {
		return {
			products: null,
			receiveTime: 0,
			isotopeOptions: {
				itemSelector: 'grid-item',
				layoutMode: 'masonry',
				percentPosition: false,
				masonry: {
					columnWidth: '.grid-col-sizer'
				}
			},
			currentCategory: null
		}
	},
	methods: {
		getProducts: function ( cat, e ) {
			if ( this.currentCategory !== cat ) {
				this.currentCategory = cat;

				if ( e ) {
					e.currentTarget.parentNode.querySelector( '.active' ).classList.remove( 'active' );
					e.currentTarget.classList.add( 'active' );
				}

				this.receiveTime++;

				Api.get( `${ baseUrl }/shop`, {
					params: {
						category: cat,
						demo: currentDemo
					}
				} )
					.then( response => {
						this.products = response.data.products;
					} )
					.catch( error => ( { error: JSON.stringify( error ) } ) );
			}
		}
	},
	created: function () {
		this.getProducts( '3-d-printer-kit' );
	}
}
</script>