<template lang="html">
	<notifications
		group="notify"
		:duration="2000"
		:width="300"
		:max="4"
		animation-name="fade-left"
		position="top center"
	>
		<template slot="body" slot-scope="props">
			<div class="minipopup-box">
				<div class="product">

					<div class="product-detail">
						<p v-bind:style="{ fontSize: '14px', color: props.item.color }">{{ props.item.text }}</p>
					</div>
				</div>

				<button class="mfp-close" @click="props.close"></button>
			</div>
		</template>
	</notifications>
</template>

<script>

export default {
	name: 'Success',
};
</script>

<style lang="scss">
.vue-notification-wrapper {
	overflow: unset !important;
}

.fade-left-enter-active,
.fade-left-leave-active,
.fade-left-move {
	transition: all 0.5s;
}

.fade-left-enter,
.fade-left-leave-to {
	opacity: 0;
	transform: translateX(100%);
}
</style>
