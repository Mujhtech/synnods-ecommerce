<template>
	<main class="main skeleton-body home-page">
		<pv-shop-banner></pv-shop-banner>

		<div class="container shop-off-canvas">
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
					<li class="breadcrumb-item active">Shop</li>
				</ol>
			</nav>

			<div class="row">
				<div
					class="sidebar-overlay"
					@click="hideSidebarFilter"
				></div>
				<aside class="sidebar-shop col-lg-3 order-lg-first mobile-sidebar custom-scrollbar position-fixed">
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
				</aside>

				<div class="col-lg-12">
					<pv-product-list-one
						:category-list="categoryList"
						:items-per-row="4"
					></pv-product-list-one>
				</div>
			</div>
		</div>

		<div class="mb-4"></div>
	</main>
</template>

<script>
import { VueTreeList, Tree } from 'vue-tree-list';
import PvShopBanner from '~/components/partials/shop/PvShopBanner';
import PvSidebarFilterOne from '~/components/partials/shop/sidebar-filter/PvSidebarFilterOne';
import PvProductListOne from '~/components/partials/shop/product-list/PvProductListOne';
import Api, { baseUrl, currentDemo } from '~/api';

export default {
	components: {
		PvSidebarFilterOne,
		PvProductListOne,
		PvShopBanner
	},
	data: function () {
		return {
			categoryList: [],
			featuredProducts: []
		};
	},
	mounted: function () {
		this.getCategoryLists();
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
		hideSidebarFilter: function () {
			document.querySelector( 'body' ).classList.remove( 'sidebar-opened' );
		}
	}
};
</script>