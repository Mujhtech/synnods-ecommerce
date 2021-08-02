<template>
	<main class="main skeleton-body home-page">
		<pv-shop-banner></pv-shop-banner>

		<div class="container">
			<nav
				aria-label="breadcrumb"
				class="breadcrumb-nav"
			>
				<ol class="breadcrumb">
					<li class="breadcrumb-item">
						<router-link to="/">
							Home
						</router-link>
					</li>
					<li class="breadcrumb-item active">Shop</li>
				</ol>
			</nav>

			<div class="row pt-3">
				<div class="col-lg-9">
					<pv-product-list-one></pv-product-list-one>
				</div>

				<div
					class="sidebar-overlay"
					@click.prevent="toggleSidebar"
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
							v-else
						>
							<aside class="widget"></aside>
							<aside class="widget"></aside>
							<aside class="widget"></aside>
						</div>
					</div>
				</aside>
			</div>
		</div>

		<div class="mb-4"></div>
	</main>
</template>

<script>
import { VueTreeList, Tree } from 'vue-tree-list';
import Sticky from 'vue-sticky-directive';
import PvShopBanner from '../../components/partials/shop/PvShopBanner';
import PvSidebarFilterOne from '../../components/partials/shop/sidebar-filter/PvSidebarFilterOne';
import PvProductListOne from '../../components/partials/shop/product-list/PvProductListOne';
import Api, { baseUrl, currentDemo } from '../../api';

export default {
	directives: {
		Sticky
	},
	components: {
		PvSidebarFilterOne,
		PvProductListOne,
		PvShopBanner
	},
	data: function () {
		return {
			categoryList: [],
			featuredProducts: [],
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
		toggleSidebar: function () {
			if (
				document
					.querySelector( 'body' )
					.classList.contains( 'sidebar-opened' )
			) {
				document
					.querySelector( 'body' )
					.classList.remove( 'sidebar-opened' );
			} else {
				document.querySelector( 'body' ).classList.add( 'sidebar-opened' );
			}
		}
	}
};
</script>