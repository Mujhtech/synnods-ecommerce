<template>
	<section class="blog-section pb-0">
		<div class="container">
			<h2
				class="section-title heading-border border-0 appear-animate"
				data-animation-name="fadeInUp"
				v-animate
			>Latest News</h2>

			<pv-carousel
				class="appear-animate"
				data-animation-name="fadeIn"
				:options="blogSlider"
				v-animate
			>
				<pv-post-one
					class="swiper-slide"
					v-for="(post,index) in posts"
					:key="'post' + index"
					:post="post"
				></pv-post-one>
			</pv-carousel>

			<hr class="mt-0 m-b-5" />

			<pv-brand-section></pv-brand-section>

			<hr class="mt-4 m-b-5" />
		</div>
	</section>
</template>

<script>
import PvCarousel from '~/components/features/PvCarousel';
import PvPostOne from '~/components/features/post/PvPostOne';
import PvBrandSection from '~/components/partials/home/PvBrandSection';
import { blogSlider } from '~/utils/data/carousel';

export default {
	components: {
		PvCarousel,
		PvPostOne,
		PvBrandSection
	},
	props: {
		posts: Array
	},
	data: function () {
		return {
			blogSlider: blogSlider
		}
	}
}
</script>