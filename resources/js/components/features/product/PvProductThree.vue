<template>
	<div class="product-default count-down">
		<h3 class="product-name">Flash Deals</h3>
		<figure>
			<router-link :to="`/product/default/${product.slug}`">
				<img
					v-lazy="`${baseUrl}${product.featured_image}`"
					alt="large-picture"
					:width="product.featured_image.width"
					:height="product.featured_image.height"
				/>
			</router-link>

			<div class="label-group">
				<span class="product-label label-sale">-{{ discount }}%</span>
			</div>
			<div class="product-countdown-container">
				<span class="product-countdown-title">offer ends in:</span>
				<pv-count-down
					:until="product.featured_end"
					:compact="true"
				>
				</pv-count-down>
			</div>
		</figure>

		<div class="product-details">
			<h3 class="product-title">
				<router-link :to="'/product/default/' + product.slug">{{ product.name }}</router-link>
			</h3>

			<div class="ratings-container">
				<div class="product-ratings">
					<span
						class="ratings"
						:style="{width: product.ratings * 20 + '%'}"
					></span>
					<span class="tooltiptext tooltip-top">{{ product.ratings | priceFormat }}</span>
				</div>
			</div>

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
					<span class="product-price">₦{{ minPrice | priceFormat }} &ndash; ${{ maxPrice | priceFormat }}</span>
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

		/* if ( !this.product.price ) {
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