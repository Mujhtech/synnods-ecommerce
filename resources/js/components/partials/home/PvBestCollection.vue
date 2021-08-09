<template>
	<section
		class="best-sellers bg-gray appear-animate"
		data-animation-name="fadeIn"
		data-animation-delay="200"
		v-animate
	>
		<div class="container">
			<h2 class="section-title ls-n-10 pb-3 m-b-4">Best Sellers on Electronics</h2>

			<isotope
				class="grid grid1"
				:options="isotopeOptions"
				:list="bestProducts"
			>
				<div
					class="grid-item col-md-8 col-lg-9 col-xl-5col-2 height-x2"
					key="best-0"
				>
					<pv-product-four :product="bestProducts[8]"></pv-product-four>
				</div>

				<div
					class="grid-item col-6 col-md-4 col-lg-3 col-xl-5col height-x1"
					v-for="(product,index) in bestProducts.slice(1,7)"
					:key="'best' + index"
				>
					<pv-product-four :product="product"></pv-product-four>
				</div>

				<div
					class="grid-col-sizer col-1 col-xl-5col"
					key="best-sizer"
				></div>
			</isotope>
		</div>
	</section>
</template>

<script>
import isotope from 'vueisotope';
import PvProductFour from '../../features/product/PvProductFour';
import { getTopSellingProducts } from '../../../utils/service';

export default {
	components: {
		PvProductFour,
		isotope
	},
	props: {
		products: Array
	},
	data: function () {
		return {
			bestProducts: [],
			isotopeOptions: {
				itemSelector: 'grid-item',
				layoutMode: 'masonry',
				percentPosition: false,
				masonry: {
					columnWidth: '.grid-col-sizer'
				}
			}
		}
	},
	created: function () {
		this.bestProducts = getTopSellingProducts( this.products );
	}
}
</script>