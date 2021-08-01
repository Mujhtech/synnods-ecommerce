<template>
	<main class="main skeleton-body">
		<div class="container">
			<nav
				aria-label="breadcrumb"
				class="breadcrumb-nav"
			>
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<nuxt-link to="/">
							Home
						</nuxt-link>
					</li>
					<li class="breadcrumb-item">
						<nuxt-link :to="{ path: '/shop' }">Shop</nuxt-link>
					</li>
					<li
						class="breadcrumb-item active"
						aria-current="page"
					>Boxed Slider</li>
				</ol>
			</nav>

			<div class="row">
				<div class="col-lg-9">
					<pv-carousel
						class="boxed-slider mb-1"
						:options="baseSlider6"
					>
						<div class="category-banner-container swiper-slide">
							<div class="container">
								<div class="banner banner1">
									<figure>
										<img
											:src="'./images/home/banners/shop-banner.jpg'"
											alt="banner"
											width="1180"
											height="300"
											style="background-color: #efefef"
										>
									</figure>

									<div class="banner-layer banner-layer-middle banner-layer-left">
										<h3 class="text-body m-b-1 ml-0">Save Big Sale</h3>
										<h4 class="d-flex align-items-center text-uppercase m-b-2">50%<small class="d-inline-block">Off</small></h4>
										<h5 class="mb-1">
											<span class="d-inline-block align-top ls-n-20 text-uppercase">Starting At</span>
											<b class="coupon-sale-text d-inline-block ls-n-20 text-primary mb-0"><sup>$</sup>199<sup>99</sup></b>
										</h5>
										<nuxt-link
											to="/shop"
											class="btn btn-sm text-uppercase ls-10"
										>Shop Now</nuxt-link>
									</div>
								</div>
							</div>
						</div>
					</pv-carousel>

					<pv-product-list-one :category-list="categoryList"></pv-product-list-one>
				</div>

				<div
					class="sidebar-overlay"
					@click="hideSidebar"
				></div>
				<aside
					class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar"
					sticky-container
				>
					<div
						v-sticky="isSticky"
						sticky-offset="{top: 75}"
					>
						<pv-sidebar-filter-one
							:category-list="categoryList"
							:featured-products="featuredProducts"
							v-if="featuredProducts.length > 0"
						></pv-sidebar-filter-one>

						<div
							class="sidebar-content skeleton-body"
							v-if="featuredProducts.length === 0"
						>
							<aside class="widget"></aside>
							<aside class="widget"></aside>
							<aside class="widget"></aside>
						</div>
					</div>
				</aside>
			</div>

			<div class="mb-4"></div>
		</div>
	</main>
</template>

<script>
import { VueTreeList, Tree } from 'vue-tree-list';
import Sticky from 'vue-sticky-directive';
import PvCarousel from '~/components/features/PvCarousel';
import PvSidebarFilterOne from '~/components/partials/shop/sidebar-filter/PvSidebarFilterOne';
import PvProductListOne from '~/components/partials/shop/product-list/PvProductListOne';
import Api, { baseUrl, currentDemo } from '~/api';
import { baseSlider6 } from '~/utils/data/carousel';

export default {
	directives: {
		Sticky
	},
	components: {
		PvSidebarFilterOne,
		PvProductListOne,
		PvCarousel
	},
	data: function () {
		return {
			categoryList: [],
			featuredProducts: [],
			baseSlider6: baseSlider6,
			isSticky: false
		};
	},
	mounted: function () {
		this.getCategoryLists();
		this.resizeHandler();
		window.addEventListener( 'resize', this.resizeHandler, {
			passive: true
		} );
	},
	destroyed: function () {
		window.removeEventListener( 'resize', this.resizeHandler );
	},
	methods: {
		getCategoryLists: function () {
			Api.get( `${ baseUrl }/shop/sidebar-list`, {
				params: { demo: currentDemo }
			} )
				.then( response => {
					this.categoryList = response.data.sidebarList;
					this.featuredProducts = response.data.featuredProducts;
				} )
				.catch( error => ( { error: JSON.stringify( error ) } ) );
		},
		resizeHandler: function () {
			this.isSticky = window.innerWidth > 991 ? true : false;
		},
		hideSidebar: function () {
			document.querySelector( 'body' ).classList.remove( 'sidebar-opened' );
		}
	}
};
</script>