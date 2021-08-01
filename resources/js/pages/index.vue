<template>
	<main class="main home-page">
		<pv-intro-section></pv-intro-section>

		<pv-category-section></pv-category-section>

		<pv-featured-collection
			:products="featuredProducts"
			v-if="featuredProducts"
		></pv-featured-collection>

		<pv-newsletter-section></pv-newsletter-section>

		<pv-brand-section></pv-brand-section>
	</main>
</template>

<script>
import PvIntroSection from '~/components/partials/home/PvIntroSection';
import PvFeaturedCollection from '~/components/partials/home/PvFeaturedCollection';
import PvCategorySection from '~/components/partials/home/PvCategorySection';
import PvNewsletterSection from '~/components/partials/home/PvNewsletterSection';
import PvBrandSection from '~/components/partials/home/PvBrandSection';
import Api, { baseUrl } from '~/api';
import { getProductsByAttri } from '~/utils/service';
import { getCookie } from '~/utils';

export default {
	components: {
		PvIntroSection,
		PvCategorySection,
		PvFeaturedCollection,
		PvBrandSection,
		PvNewsletterSection
	},
	data: function () {
		return {
			products: [],
			posts: [],
			featuredProducts: [],
			timerId: 0
		};
	},
	mounted: function () {
		Api.get( `${ baseUrl }/demo20` )
			.then( response => {
				this.products = response.data.products;
				this.posts = response.data.posts;
				this.featuredProducts = getProductsByAttri(
					response.data.products
				);
			} )
			.catch( error => ( { error: JSON.stringify( error ) } ) );

		this.timerId = setTimeout( () => {
			if (
				this.$route.path === '/' &&
				getCookie( 'newsletter' ) !== 'false'
			) {
				this.$modal.show(
					() =>
						import( '~/components/features/modal/PvNewsletterModal' ),
					{},
					{ width: '740', height: 'auto', adaptive: true, class: 'newsletter-modal' }
				);
			}
		}, 10000 );
	},
	destroyed: function () {
		clearTimeout( this.timerId );
	}
};
</script>