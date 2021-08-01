<template>
	<section class="newsletter-section">
		<div class="container">
			<h2 class="section-title ls-n-10 text-center text-uppercase m-b-4">Offers and Deals</h2>

			<div class="row">
				<div class="col-md-6 mb-2">
					<div
						class="banner banner3 appear-animate h-100"
						data-animation-name="fadeIn"
						data-animation-delay="300"
						v-animate
					>
						<figure>
							<img
								v-lazy="'./images/home/banners/banner-3.jpg'"
								alt="banner"
								width="530"
								height="249"
							/>
						</figure>

						<div class="banner-layer banner-layer-middle banner-layer-left">
							<h3 class="m-b-1">Exclusive Shoes</h3>
							<h4 class="text-uppercase mb-4">50% Off</h4>
							<nuxt-link
								to="/shop"
								class="btn"
							>Shop Now</nuxt-link>
						</div>

						<div class="banner-layer banner-layer-right">
							<img
								v-lazy="'./images/home/banners/brand1.png'"
								alt="brand"
								width="105"
								height="45"
							/>
						</div>
					</div>
				</div>
				<div class="col-md-6 mb-2">
					<div
						class="banner banner4 appear-animate"
						data-animation-name="fadeIn"
						data-animation-delay="600"
						v-animate
					>
						<figure>
							<img
								v-lazy="'./images/home/banners/banner-4.jpg'"
								alt="banner"
								width="580"
								height="301"
							/>
						</figure>

						<div class="banner-layer banner-layer-middle banner-layer-right text-center">
							<h6 class="heading-border text-dark text-uppercase m-b-2">Amazing</h6>
							<h3 class="ls-n-10 text-uppercase m-b-3">Collection</h3>
							<h5 class="text-uppercase">Check our discounts</h5>
							<nuxt-link
								to="/shop"
								class="btn"
							>Shop Now</nuxt-link>
						</div>
					</div>
				</div>
				<div class="col-12">
					<div class="banner banner5">
						<figure>
							<img
								v-lazy="'./images/home/banners/banner-5.png'"
								alt="banner"
								width="1180"
								height="300"
							/>
						</figure>

						<div class="banner-layer banner-layer-middle text-center">
							<div
								class="widget-newsletter appear-animate"
								data-animation-name="fadeInUpShorter"
								data-animation-delay="200"
								v-animate
							>
								<h4 class="mt-0 m-b-1">Subscribe To Our Newsletter</h4>
								<p class="font2 text-body m-b-4">
									Get all the latest information on events, sales
									and offers.
								</p>

								<form
									action="#"
									class="d-flex mb-0 mx-auto"
								>
									<input
										type="email"
										class="form-control mb-0"
										placeholder="Email address"
										required
									/>

									<input
										type="submit"
										class="btn btn-dark"
										value="Subscribe"
									/>
								</form>
							</div>
						</div>
					</div>
				</div>
			</div>
		</div>
	</section>
</template>

<script>
export default {

}
</script>