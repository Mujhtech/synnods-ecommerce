<template>
	<header class="header">
		<div class="header-middle sticky-header mobile-sticky">
			<div class="container">
				<div class="header-left">
					<router-link
						to="/"
						class="logo"
					>
						<img
							:src="'/assets/images/logo-white.png'"
							width="101"
							height="40"
							alt="Porto Logo"
						/>
					</router-link>

					<div class="header-col">
						<pv-header-search></pv-header-search>

						<div class="tagcloud d-none d-lg-flex">
							<router-link :to="{path: '/shop', query: {tag: 'clothes'}}">clothes</router-link>
							<router-link :to="{path: '/shop', query: {tag: 'fashion'}}">fashion</router-link>
							<router-link :to="{path: '/shop', query: {tag: 'hub'}}">hub</router-link>
							<router-link :to="{path: '/shop', query: {tag: 'shirt'}}">shirt</router-link>
							<router-link :to="{path: '/shop', query: {tag: 'skirt'}}">skirt</router-link>
							<router-link :to="{path: '/shop', query: {tag: 'sports'}}">sports</router-link>
							<router-link :to="{path: '/shop', query: {tag: 'sweater'}}">sweater</router-link>
						</div>
					</div>
				</div>

				<div class="header-right ml-0 ml-lg-auto">
					<router-link
						to="/auth/login"
						class="header-icon d-md-block d-none mr-0"
					>
						<div class="header-user">
							<i class="icon-user-2"></i>
							<div class="header-userinfo">
								<span class="d-inline-block line-height-1 ls-10">Hello!</span>
								<h4 class="font1 mb-0">My Account</h4>
							</div>
						</div>
					</router-link>

					<router-link
						to="/wishlist"
						class="header-icon"
						title="wishlist"
					>
						<i class="icon-wishlist-2"></i>
					</router-link>

					<pv-cart-menu></pv-cart-menu>
				</div>
			</div>
		</div>

		<div class="header-bottom sticky-header desktop-sticky">
			<div class="container">
				<div class="header-center">
					<button
						class="mobile-menu-toggler"
						type="button"
						@click="showMobileMenu"
					>
						<i class="fas fa-bars"></i>
					</button>

					<pv-main-menu></pv-main-menu>

					<div class="header-dropdowns ml-auto">
						<a
							href="javascript:;"
							class="link-seller font-weight-bold d-none d-sm-block"
						>Become a Seller</a>

						<div class="header-dropdown">
							<a href="javascript:;">NGN</a>
							<div class="header-menu">
								<ul>
									<li><a href="javascript:;">NGN</a></li>
									<li><a href="javascript:;">USD</a></li>
								</ul>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</header>
</template>

<script>
import PvMainMenu from './partials/PvMainMenu';
import PvCartMenu from './partials/PvCartMenu';
import PvHeaderSearch from './partials/PvHeaderSearch';

document.querySelector( 'body' ).classList.add( 'loaded' );

export default {
	components: {
		PvMainMenu,
		PvCartMenu,
		PvHeaderSearch
	},
	methods: {
		openLoginModal: function () {
			this.$modal.show(
				() => import( '../features/modal/PvLoginModal' ),
				{},
				{ width: '525', height: 'auto', adaptive: true }
			);
		},
		showMobileMenu: function () {
			document.querySelector( 'body' ).classList.add( 'mmenu-active' );
		},
		showMobileSearch: function ( e ) {
			let headerSearch = e.currentTarget.closest( '.header-search' );
			headerSearch.classList.add( 'show' );
			headerSearch
				.querySelector( '.header-search-wrapper' )
				.classList.add( 'show' );
		}
	}
};
</script>