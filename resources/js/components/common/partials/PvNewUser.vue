<template lang="html">
	<notifications
		group="newUser"
		:duration="2000"
		:width="300"
		:max="4"
		animation-name="fade-left"
		position="bottom right"
	>
		<template slot="body" slot-scope="props">
			<div class="minipopup-box">
				<div class="product">
					<figure class="product-media">
							<img 
                                v-if="props.item.data.image"
								:src="`${baseUrl}${props.item.data.avatar}`" 
								alt="user" 
								:width="props.item.data.avatar.width"
								:height="props.item.data.avatar.height"
							>
                            <img 
                                v-else
								:src="`${props.item.data.avatar}`" 
								alt="user" 
								:width="props.item.data.avatar.width"
								:height="props.item.data.avatar.height"
							>
					</figure>

					<div class="product-detail">
						{{ props.item.data.full_name }}
						<p>{{ props.item.text }}</p>
					</div>
				</div>
				<button class="mfp-close" @click="props.close"></button>
			</div>
		</template>
	</notifications>
</template>

<script>
import { baseUrl } from '../../../api';

export default {
	name: 'PvNewOrder',
	data: function () {
		return {
			baseUrl: baseUrl
		};
	}
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
