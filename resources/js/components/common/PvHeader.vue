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
							<a href="javascript:;">USD</a>
							<div class="header-menu">
								<ul>
									<li>
										<a href="javascript:;">EUR</a>
									</li>
									<li>
										<a href="javascript:;">USD</a>
									</li>
								</ul>
							</div>
						</div>

						<div class="header-dropdown">
							<a href="javascript:;"><i class="flag-us flag"></i>ENG</a>

							<div class="header-menu">
								<ul>
									<li>
										<a href="javascript:;">
											<i class="flag-us flag mr-2"></i>ENG
										</a>
									</li>
									<li>
										<a href="javascript:;">
											<i class="flag-fr flag mr-2"></i>FRA
										</a>
									</li>
								</ul>
							</div>
						</div>

						<div class="header-dropdown dropdown-expanded d-none d-lg-block">
							<a href="javascript:;">Links</a>
							<div class="header-menu">
								<ul>
									<li>
										<nuxt-link to="/pages/about-us">About Us</nuxt-link>
									</li>
									<li>
										<nuxt-link to="/pages/contact-us">Contact Us</nuxt-link>
									</li>
									<li>
										<nuxt-link to="/pages/login">Log In</nuxt-link>
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

					<nuxt-link
						to="/pages/wishlist"
						class="header-icon position-relative"
						title="wishlist"
					>
						<i class="icon-wishlist-2 text-dark"></i>
						<span class="badge-circle">{{ wishList.length }}</span>
					</nuxt-link>

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
					<nuxt-link
						to="/"
						class="logo"
					>
						<img
							src="~/static/images/logo-black.png"
							width="101"
							height="40"
							alt="Porto Logo"
						/>
					</nuxt-link>
				</div>

				<div class="header-right justify-content-center ml-0">
					<nav class="main-nav">
						<ul class="menu">
							<li>
								<nuxt-link to="/pages/blog">Blog</nuxt-link>
							</li>
							<li>
								<nuxt-link to="/pages/about-us">About Us</nuxt-link>
							</li>
							<li>
								<a href="javascript:;">Elements</a>
							</li>
							<li>
								<a
									href="https://1.envato.market/DdLk5"
									target="_blank"
								>Buy Porto!</a>
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

					<nuxt-link
						to="/pages/wishlist"
						class="header-icon position-relative"
						title="wishlist"
					>
						<i class="icon-wishlist-2 text-dark"></i>
						<span class="badge-circle">{{ wishList.length }}</span>
					</nuxt-link>

					<pv-cart-menu></pv-cart-menu>
				</div>
			</div>
		</div>
	</header>
</template>

<script>
import { mapGetters } from 'vuex';
import PvMainMenu from '~/components/common/partials/PvMainMenu';
import PvCartMenu from '~/components/common/partials/PvCartMenu';
import PvHeaderSearch from '~/components/common/partials/PvHeaderSearch';
import PvHeaderSearchTwo from '~/components/common/partials/PvHeaderSearchTwo';

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
				() => import( '~/components/features/modal/PvLoginModal' ),
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