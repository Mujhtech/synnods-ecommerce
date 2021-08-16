<template>
	<div class="product-default inner-quickview inner-icon">
		<figure>
			<router-link :to="`/product/${product.slug}`">
				<img
					v-lazy="`${baseUrl}${product.featured_image}`"
					alt="large-picture"
					:width="product.featured_image.width"
					:height="product.featured_image.height"
				/>
			</router-link>

			<div class="label-group">
				<div
					class="product-label label-hot"
					v-if="product.is_hot"
				>HOT</div>
				<div
					class="product-label label-sale"
					v-if="product.is_sale && !product.price"
				>Sale</div>
				<div
					class="product-label label-sale"
					v-if="product.is_sale && product.price"
				>-{{ discount }}%</div>
			</div>

			<div
				class="product-countdown-container"
				v-if="product.until"
			>
				<span class="product-countdown-title">offer ends in:</span>
				<pv-count-down
					:until="product.until"
					:compact="true"
				>
				</pv-count-down>
			</div>
		</figure>

		<div class="product-details">
			<h3 class="product-title">
				<router-link :to="'/product/' + product.slug">{{ product.name }}</router-link>
			</h3>

			<div
				class="price-box"
				v-if="product.price"
				key="singlePrice"
			>
				<template v-if="!product.is_sale">
					<span class="product-price">₦{{ product.price | priceFormat }}</span>
				</template>

				<template v-else>
					<span class="product-price">₦{{ product.sale_price | priceFormat }}</span>
					<span class="old-price">₦{{ product.price | priceFormat }}</span>
				</template>
			</div>

			<div
				class="price-box"
				v-else
			>
				<template v-if="minPrice !== maxPrice">
					<span class="product-price">₦{{ minPrice | priceFormat }} &ndash; ₦{{ maxPrice | priceFormat }}</span>
				</template>

				<template v-else>
					<span class="product-price">₦{{ minPrice | priceFormat }}</span>
				</template>
			</div>
		</div>
	</div>
</template>

<script>
import PvCountDown from '../../features/PvCountDown';
import { baseUrl } from '../../../api';

export default {
	components: {
		PvCountDown
	},
	props: {
		product: Object
	},
	data: function () {
		return {
			baseUrl: baseUrl,
			minPrice: 0,
			maxPrice: 0,
			discount: 0
		};
	},
	mounted: function () {
		if ( this.product.is_sale && this.product.price ) {
			this.discount =
				( ( this.product.price - this.product.sale_price ) /
					this.product.price ) *
				100;
			this.discount = parseInt( this.discount );
		}

		/*if ( !this.product.price ) {
			this.minPrice = this.product.variants[ 0 ].price;
			this.product.variants.forEach( item => {
				let itemPrice = item.is_sale ? item.sale_price : item.price;
				if ( this.minPrice > itemPrice ) this.minPrice = itemPrice;
				if ( this.maxPrice < itemPrice ) this.maxPrice = itemPrice;
			} );
		} */
	}
};
</script>   