<template>
	<div class="category-banner-container">
		<div class="container">
			<div class="banner banner1">
				<figure>
					<img
						:src="'./images/home/banners/shop-banner.jpg'"
						alt="banner"
						width="1180"
						height="300"
						style="background-color: #efefef"
					>
				</figure>

				<div class="banner-layer banner-layer-middle banner-layer-left">
					<h3 class="text-body m-b-1 ml-0">Save Big Sale</h3>
					<h4 class="d-flex align-items-center text-uppercase m-b-2">50%<small class="d-inline-block">Off</small></h4>
					<h5 class="mb-1">
						<span class="d-inline-block align-top ls-n-20 text-uppercase">Starting At</span>
						<b class="coupon-sale-text d-inline-block ls-n-20 text-primary mb-0"><sup>$</sup>199<sup>99</sup></b>
					</h5>
					<nuxt-link
						to="/shop"
						class="btn btn-sm text-uppercase ls-10"
					>Shop Now</nuxt-link>
				</div>
			</div>
		</div>
	</div>
</template>