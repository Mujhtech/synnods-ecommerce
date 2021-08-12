<template>
	<div class="product-single-container product-single-default product-quick-view mb-0 custom-scrollbar skeleton-body">
		<div
			class="quickview-wrap product"
			v-if="!product"
		>
			<div class="skel-group">
				<div class="col-md-6 summary-before"></div>
				<div class="col-md-6 summary entry-summary"></div>
			</div>
		</div>

		<div
			class="row"
			v-if="product"
		>
			<div class="col-md-6 product-single-gallery mb-md-0">
				<pv-media-one
					:product="product"
					:is-magnify="false"
				></pv-media-one>
			</div>

			<div class="col-md-6 product-single-details mb-0">
				<pv-detail-one
					:product="product"
					:is-product-nav="false"
				></pv-detail-one>
			</div>

			<button
				title="Close (Esc)"
				type="button"
				class="mfp-close"
				@click="$emit('close')"
			>×</button>
		</div>
	</div>
</template>

<script>
import PvMediaOne from '../../partials/product/media/PvMediaOne';
import PvDetailOne from '../../partials/product/detail/PvDetailOne';
import { fetchSingle } from "../../../services/product";

export default {
	components: {
		PvMediaOne,
		PvDetailOne
	},
	props: {
		slug: String
	},
	data: function () {
		return {
			product: null
		}
	},
	mounted: function () {
		this.getProduct();
	},
	methods: {
		getProduct: async function () {
			try {
				const response = await fetchSingle(this.slug);
				console.log(response);
				this.product = response.data.data.data;
			} catch(err){
				console.log(err.response);
			}
		}
	}
}
</script>