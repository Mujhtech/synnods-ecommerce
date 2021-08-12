<template>
	<div class="product-single-qty">
		<div class="input-group bootstrap-touchspin bootstrap-touchspin-injected">
			<span class="input-group-btn input-group-prepend">
				<button
					class="btn btn-outline btn-down-icon bootstrap-touchspin-down"
					type="button"
					@click="minusQty"
				></button>
			</span>
			<input
				class="horizontal-quantity form-control bg-transparent"
				type="number"
				:min="1"
				:max="product.quantity_in_stock"
				v-model.number="currentQty"
			/>
			<span class="input-group-btn input-group-append">
				<button
					class="btn btn-outline btn-up-icon bootstrap-touchspin-up"
					type="button"
					@click="plusQty"
				></button>
			</span>
		</div>
	</div>
</template>

<script>
export default {
	props: {
		qty: Number,
		product: Object
	},
	data: function () {
		return {
			currentQty: this.qty
		}
	},
	watch: {
		qty: function () {
			this.currentQty = this.qty;
		},
		currentQty: function () {
			if ( this.currentQty > this.product.quantity_in_stock ) this.currentQty = this.product.quantity_in_stock;
			if ( this.currentQty < 1 ) this.currentQty = 1;
			this.$emit( 'changeCurrentQty', this.currentQty );
		}
	},
	methods: {
		plusQty: function () {
			if ( this.currentQty < this.product.quantity_in_stock ) this.currentQty++;
			this.$emit( 'changeQty', this.currentQty, this.product );
		},
		minusQty: function () {
			if ( this.currentQty > 1 ) this.currentQty--;
			this.$emit( 'changeQty', this.currentQty, this.product );
		},
	}
}
</script>