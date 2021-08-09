<template>
	<div
		class="product-single-gallery"
		v-images-loaded.on="removeSkeleton"
	>
		<pv-carousel
			class="product-single-carousel swiper-carousel swiper-theme show-nav-hover"
			:options="baseSlider7"
		>
			<div
				class="swiper-slide"
				v-for="(item,index) in product.large_pictures"
				:key="'picture' + index"
			>
				<img
					class="product-single-image"
					:src="`${baseUrl}${item.url}`"
					:width="item.width"
					:height="item.height"
					alt="product-single-image"
				/>
			</div>
		</pv-carousel>
	</div>
</template>

<script>
import imagesLoaded from 'vue-images-loaded';
import PvCarousel from '~/components/features/PvCarousel';
import { baseSlider7 } from '~/utils/data/carousel';
import { baseUrl } from '~/api';

export default {
	components: {
		PvCarousel
	},
	directives: {
		imagesLoaded
	},
	props: {
		product: Object
	},
	data: function () {
		return {
			baseSlider7: baseSlider7,
			baseUrl: baseUrl
		};
	},
	methods: {
		removeSkeleton: function () {
			document.querySelector( '.product-layout-extended' ).classList.add( 'loaded' );
		}
	}
};
</script>