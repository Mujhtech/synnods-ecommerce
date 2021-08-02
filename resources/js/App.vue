<template>
	<div @click="hideMobileSearch">
		<div class="page-wrapper">
			<div
				class="top-notice"
				:class="{'d-none' : isHide}"
			>
				<div class="container d-flex flex-wrap align-items-center justify-content-center text-center">
					<img
						:src="'./images/home/banners/header-item.png'"
						alt="Top Ads"
						width="237"
						height="49"
					/>
					<div class="notice-content my-2">
						<h3 class="d-inline-block font1 text-secondary mb-0">PortoPlus X Pro Only</h3>
						<div class="d-inline-block">
							<span class="d-inline-block skew-box product-price font1 font-weight-bold bg-secondary">$199</span>
							<span class="d-inline-block font1 old-price text-secondary mr-0">$299</span>
						</div>
					</div>
					<a
						href="javascript:;"
						class="btn btn-dark font1 ls-n-10 round-box my-2"
					>code: <strong>portoplusx</strong></a>
				</div>

				<button
					title="Close (Esc)"
					type="button"
					class="mfp-close"
					@click="hideTopNotice"
				>×</button>
			</div>

			<pv-header></pv-header>
			<router-view></router-view>
			<pv-footer></pv-footer>

			<div class="wishlist-popup">
				<div class="wishlist-popup-msg">Product added!</div>
			</div>
		</div>

		<pv-cart-popup class="minipopup-area"></pv-cart-popup>

		<a
			id="scroll-top"
			href="javascript:;"
			title="Top"
			role="button"
			@click="scrollToTop"
		>
			<i class="icon-angle-up"></i>
		</a>

		<pv-mobile-menu></pv-mobile-menu>

		<pv-sticky-footer></pv-sticky-footer>
	</div>
</template>

<script>
import PvHeader from './components/common/PvHeader';
import PvFooter from './components/common/PvFooter';
import PvCartPopup from './components/common/partials/PvCartPopup';
import PvMobileMenu from './components/common/partials/PvMobileMenu';
import PvStickyFooter from './components/common/partials/PvStickyFooter';
import {
	scrollTopHandler,
	stickyHeaderHandler,
	resizeHandler,
	showScrollTopHandler,
	scrollTo,
	setCookie,
	getCookie,
	scrollTop
} from './utils';

export default {
	components: {
		PvHeader,
		PvFooter,
		PvCartPopup,
		PvMobileMenu,
		PvStickyFooter
	},
	data: function () {
		return {
			isHide: false
		};
	},
	watch: {
		$route: function () {
			resizeHandler();
			this.$modal.hideAll();
			this.isHide = getCookie( 'topNotice' );
		}
	},
	created: function () {
		this.isHide = getCookie( 'topNotice' );
	},
	mounted: function () {
		window.addEventListener( 'scroll', stickyHeaderHandler, {
			passive: true
		} );
		window.addEventListener( 'scroll', showScrollTopHandler, {
			passive: true
		} );
		window.addEventListener( 'resize', stickyHeaderHandler );
		window.addEventListener( 'resize', resizeHandler );
	},
	destroyed: function () {
		window.removeEventListener( 'scroll', showScrollTopHandler, {
			passive: true
		} );
		window.removeEventListener( 'scroll', stickyHeaderHandler, {
			passive: true
		} );
		window.removeEventListener( 'resize', stickyHeaderHandler );
		window.removeEventListener( 'resize', resizeHandler );
	},
	methods: {
		scrollToTop: function () {
			scrollTop( false, 70 );
		},
		hideTopNotice: function () {
			this.isHide = true;
			setCookie( 'topNotice', false );
		},
		hideMobileSearch: function () {
			if ( document.querySelector( '.header-search' ) ) {
				let headerSearch = document.querySelectorAll( '.header-search' );

				headerSearch.forEach( item => {
					item.classList.remove( 'show' );
					item.querySelector( '.header-search-wrapper' ).classList.remove( 'show' );
				} )
			}
		}
	}
};
</script>