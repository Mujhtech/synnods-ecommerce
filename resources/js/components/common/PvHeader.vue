<template>
	<header class="header">
		<div class="header-top d-none d-lg-block">
			<div class="container">
				<div class="header-left">
					<pv-header-search></pv-header-search>
				</div>

				<div class="header-right ml-0 ml-lg-auto">
					<div class="header-dropdowns">
						<div class="header-dropdown mr-auto mr-sm-3 mr-md-0">
							<a href="javascript:;">NGN</a>
							<div class="header-menu">
								<ul>
									<li>
										<a href="javascript:;">NGN</a>
									</li>
									<li>
										<a href="javascript:;">USD</a>
									</li>
								</ul>
							</div>
						</div>

						<div class="header-dropdown dropdown-expanded d-none d-lg-block">
							<a href="javascript:;">Links</a>
							<div class="header-menu">
								<ul>
									<li>
										<router-link to="/pages/about-us">About Us</router-link>
									</li>
									<li>
										<router-link to="/pages/contact-us">Contact Us</router-link>
									</li>
									<li>
										<router-link to="/pages/login">Log In</router-link>
									</li>
								</ul>
							</div>
						</div>
					</div>

					<a
						href="javascript:;"
						@click="openLoginModal"
						class="header-icon text-dark"
						title="login"
					>
						<i class="icon-user-2"></i>
					</a>

					<router-link
						to="/pages/wishlist"
						class="header-icon position-relative"
						title="wishlist"
					>
						<i class="icon-wishlist-2 text-dark"></i>
						<span class="badge-circle">{{ wishList.length }}</span>
					</router-link>

					<pv-cart-menu></pv-cart-menu>
				</div>
			</div>
		</div>

		<div class="header-middle sticky-header">
			<div class="container">
				<div class="header-left d-none d-lg-flex justify-content-center">
					<pv-main-menu></pv-main-menu>
				</div>

				<div class="header-center ml-0">
					<button
						class="mobile-menu-toggler mr-2"
						type="button"
						@click="showMobileMenu"
					>
						<i class="fas fa-bars"></i>
					</button>
					<router-link
						to="/"
						class="logo"
					>
						<img
							src="../../static/images/logo-black.png"
							width="101"
							height="40"
							alt="Porto Logo"
						/>
					</router-link>
				</div>

				<div class="header-right justify-content-center ml-0">
					<nav class="main-nav">
						<ul class="menu">
							<li>
								<router-link to="/pages/blog">Blog</router-link>
							</li>
							<li>
								<router-link to="/pages/about-us">About Us</router-link>
							</li>
						</ul>
					</nav>
				</div>

				<div class="header-right d-lg-none">
					<pv-header-search-two></pv-header-search-two>

					<a
						href="javascript:;"
						@click="openLoginModal"
						class="header-icon text-dark"
						title="login"
					>
						<i class="icon-user-2"></i>
					</a>

					<router-link
						to="/pages/wishlist"
						class="header-icon position-relative"
						title="wishlist"
					>
						<i class="icon-wishlist-2 text-dark"></i>
						<span class="badge-circle">{{ wishList.length }}</span>
					</router-link>

					<pv-cart-menu></pv-cart-menu>
				</div>
			</div>
		</div>
	</header>
</template>

<script>
import { mapGetters } from 'vuex';
import PvMainMenu from './partials/PvMainMenu';
import PvCartMenu from './partials/PvCartMenu';
import PvHeaderSearch from './partials/PvHeaderSearch';
import PvHeaderSearchTwo from './partials/PvHeaderSearchTwo';

document.querySelector( 'body' ).classList.add( 'loaded' );

export default {
	components: {
		PvMainMenu,
		PvCartMenu,
		PvHeaderSearch,
		PvHeaderSearchTwo
	},
	computed: {
		...mapGetters( 'wishlist', [ 'wishList' ] )
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
		}
	}
};
</script>