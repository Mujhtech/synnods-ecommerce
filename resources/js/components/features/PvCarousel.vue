<template>
	<div class="swiper-carousel swiper-theme">
		<div
			ref="pvCarousel"
			v-swiper="sliderOption"
			@resize="resizeHandler"
		>
			<div class="swiper-wrapper">
				<slot></slot>
			</div>

			<div
				class="swiper-nav"
				:class="{disabled: isNavDisabled}"
				v-if="sliderOption.navigation && !sliderOption.isCustomNav"
			>
				<button
					type="button"
					role="presentation"
					class="swiper-prev"
				>
					<i :class="sliderOption.navIcon.prev"></i>
				</button>

				<button
					type="button"
					role="presentation"
					class="swiper-next"
				>
					<i :class="sliderOption.navIcon.next"></i>
				</button>
			</div>

			<div
				class="swiper-dots swiper-pagination-bullets"
				v-if="sliderOption.pagination"
				:class="{ 'disabled' : isDotDisabled }"
			></div>
		</div>
	</div>
</template>

<script>
const defaultOption = {
	loop: false,
	scrollbar: {
		draggable: false
	},
	spaceBetween: 20,
	slidesPerView: 4,
	watchSlidesVisibility: true,
	clickable: true,
	navIcon: {
		prev: 'icon-angle-left',
		next: 'icon-angle-right'
	},
	isCustomNav: false
};
export default {
	props: {
		options: Object
	},
	data: function () {
		return {
			sliderOption: Object.assign( {}, defaultOption, this.options ),
			isNavDisabled: false,
			isDotDisabled: false
		};
	},
	mounted: function () {
		let self = this;
		this.$nextTick( () => {
			if ( self.$refs.pvCarousel ) {
				self.$refs.pvCarousel.swiper.emit( 'update' );
				self.isNavDisabled = self.$refs.pvCarousel.querySelectorAll( '.swiper-button-disabled' ) && self.$refs.pvCarousel.querySelectorAll( '.swiper-button-disabled' ).length > 1 ? true : false;
				self.isDotDisabled = self.$refs.pvCarousel.querySelectorAll( '.swiper-pagination-bullet' ) && self.$refs.pvCarousel.querySelectorAll( '.swiper-pagination-bullet' ).length < 2 ? true : false;

				if ( self.sliderOption.navigation && document.querySelector( self.sliderOption.navigation.nextEl ).parentNode.querySelectorAll( '.swiper-button-disabled' ).length > 1 ) {
					document.querySelector( self.sliderOption.navigation.nextEl ).parentNode.classList.add( 'disabled' );
				}
			}
		} )
	},
	methods: {
		resizeHandler: function () {
			this.isNavDisabled = this.$refs.pvCarousel.querySelectorAll( '.swiper-button-disabled' ) && this.$refs.pvCarousel.querySelectorAll( '.swiper-button-disabled' ).length > 1;
			this.isDotDisabled = this.$refs.pvCarousel.querySelectorAll( '.swiper-pagination-bullet' ) && this.$refs.pvCarousel.querySelectorAll( '.swiper-pagination-bullet' ).length < 2;
		}
	}
};
</script>