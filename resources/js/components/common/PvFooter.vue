<template>
	<footer>
		<div class="footer-top">
			<div class="container-fluid">
				<div class="instagram-section mb-2">
					<h2 class="section-title ls-n-10 text-center text-uppercase m-b-1">From Our Instagram</h2>
					<h6 class="text-body text-center font-weight-normal m-b-4">@portoecommerce</h6>

					<pv-carousel
						class="instagram-feed-carousel"
						:options="instaSlider"
					>
						<div class="instagram swiper-slide">
							<img
								v-lazy="'./images/home/instagrams/instagram-1.jpg'"
								alt="instagram"
								width="190"
								height="190"
							/>
						</div>
						<div class="instagram swiper-slide">
							<img
								v-lazy="'./images/home/instagrams/instagram-2.jpg'"
								alt="instagram"
								width="190"
								height="190"
							/>
						</div>
						<div class="instagram swiper-slide">
							<img
								v-lazy="'./images/home/instagrams/instagram-3.jpg'"
								alt="instagram"
								width="190"
								height="190"
							/>
						</div>
						<div class="instagram swiper-slide">
							<img
								v-lazy="'./images/home/instagrams/instagram-4.jpg'"
								alt="instagram"
								width="190"
								height="190"
							/>
						</div>
						<div class="instagram swiper-slide">
							<img
								v-lazy="'./images/home/instagrams/instagram-5.jpg'"
								alt="instagram"
								width="190"
								height="190"
							/>
						</div>
						<div class="instagram swiper-slide">
							<img
								v-lazy="'./images/home/instagrams/instagram-6.jpg'"
								alt="instagram"
								width="190"
								height="190"
							/>
						</div>
						<div class="instagram swiper-slide">
							<img
								v-lazy="'./images/home/instagrams/instagram-7.jpg'"
								alt="instagram"
								width="190"
								height="190"
							/>
						</div>
						<div class="instagram swiper-slide">
							<img
								v-lazy="'./images/home/instagrams/instagram-8.jpg'"
								alt="instagram"
								width="190"
								height="190"
							/>
						</div>
						<div class="instagram swiper-slide">
							<img
								v-lazy="'./images/home/instagrams/instagram-9.jpg'"
								alt="instagram"
								width="190"
								height="190"
							/>
						</div>
					</pv-carousel>
				</div>
			</div>
		</div>

		<div class="footer font2">
			<div class="container">
				<div class="footer-middle">
					<div class="row">
						<div class="col-lg-2 d-flex align-items-center">
							<img
								src="../../static/images/logo-footer.png"
								alt="Logo"
								class="logo mb-3"
							/>
						</div>
						<div class="col-lg-5 col-xl-6 d-flex align-items-center">
							<ul class="links mb-3">
								<li>
									<router-link to="/pages/about-us">About Us</router-link>
								</li>
								<li>
									<router-link to="/pages/blog">Blog</router-link>
								</li>
								<li>
									<a href="javascript:;">Order Tracking</a>
								</li>
								<li>
									<router-link to="/pages/contact-us">Contact Us</router-link>
								</li>
							</ul>
						</div>
						<div class="col-lg-5 col-xl-4 d-flex justify-content-lg-end align-items-end">
							<div class="footer-question mb-3">
								<h6 class="text-white m-b-1">QUESTIONS?</h6>
								<h3 class="text-white m-b-1">1-888-123-456</h3>
							</div>

							<div class="social-icons mb-3">
								<a
									href="javascript:;"
									class="social-icon social-facebook icon-facebook"
									
								></a>
								<a
									href="javascript:;"
									class="social-icon social-twitter icon-twitter"
									
								></a>
								<a
									href="javascript:;"
									class="social-icon social-instagram icon-instagram"
									
								></a>
							</div>
						</div>
					</div>
				</div>

				<div class="footer-bottom d-sm-flex align-items-center">
					<div class="footer-left">
						<span class="footer-copyright">Porto eCommerce. © 2021. All Rights Reserved</span>
					</div>

					<div class="footer-right ml-auto mt-1 mt-sm-0">
						<div class="payment-icons mr-0">
							<span
								class="payment-icon visa"
								v-lazy:background-image="'./images/payments/payment-visa.svg'"
							></span>
							<span
								class="payment-icon paypal"
								v-lazy:background-image="'./images/payments/payment-paypal.svg'"
							></span>
							<span
								class="payment-icon stripe"
								v-lazy:background-image="'./images/payments/payment-stripe.png'"
							></span>
							<span
								class="payment-icon verisign"
								v-lazy:background-image="'./images/payments/payment-verisign.svg'"
							></span>
						</div>
					</div>
				</div>
			</div>
		</div>
	</footer>
</template>

<script>
import PvCarousel from '../features/PvCarousel.vue';
import { instaSlider } from '../../utils/data/carousel';

export default {
	components: {
		PvCarousel
	},
	data: function () {
		return {
			instaSlider: instaSlider
		}
	}
};
</script>