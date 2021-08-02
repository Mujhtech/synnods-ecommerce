<template>
	<footer>
		<div class="footer">
			<div class="footer-top">
				<div class="container">
					<div class="row align-items-center">
						<div class="col-md-6 col-lg-3">
							<h4 class="widget-newsletter-title font1 font-weight-bold text-white">Sign
								Up to Newsletter</h4>
						</div>
						<div class="col-md-6 col-lg-4">
							<p class="widget-newsletter-content ls-10 text-white mb-0">Get all the latest
								information on Events, Sales and Offers.</p>
							<span class="widget-newsletter-content d-block font-weight-bold ls-10 text-white">Receive
								$10 coupon for first shopping.</span>
						</div>
						<div class="col-md-10 col-lg-5">
							<form
								action="#"
								class="mb-0"
							>
								<div class="footer-submit-wrapper d-flex">
									<input
										type="email"
										class="form-control mb-0"
										placeholder="Enter your Email address..."
										required
									>
									<button
										type="submit"
										class="btn btn-md btn-dark"
									>Subscribe</button>
								</div>
							</form>
						</div>
					</div>
				</div>
			</div>

			<div class="container">
				<div class="footer-middle">
					<div class="row">
						<div class="col-lg-4">
							<img
								class="logo"
								:src="'assets/images/logo-black.png'"
								alt="Porto Logo"
								width="220"
								height="80"
							>

							<div class="row">
								<div class="col-sm-6 pr-sm-0">
									<div class="contact-widget">
										<h4 class="widget-title">ADDRESS:</h4>
										<a href="javascript:;">123 Street Name, City, England</a>
									</div>
								</div>
								<div class="col-sm-6 pl-sm-0">
									<div class="contact-widget">
										<h4 class="widget-title">PHONE:</h4>
										<a href="javascript:;">Toll Free (123) 456-7890</a>
									</div>
								</div>
								<div class="col-sm-6 pr-sm-0">
									<div class="contact-widget">
										<h4 class="widget-title">EMAIL:</h4>
										<a href="mailto:mail@example.com">mail@example.com</a>
									</div>
								</div>
								<div class="col-sm-6 pl-sm-0">
									<div class="contact-widget">
										<h4 class="widget-title">
											WORKING DAYS/HOURS:
										</h4>
										<a href="javascript:;">Mon - Sun / 9:00AM - 8:00PM</a>
									</div>
								</div>
							</div>
							<div class="social-icons mb-3 mb-lg-0">
								<a
									href="javascript:;"
									class="social-icon social-facebook"
									
								><i class="fab fa-facebook-f"></i></a>
								<a
									href="javascript:;"
									class="social-icon social-twitter"
									
								><i class="fab fa-twitter"></i></a>
								<a
									href="javascript:;"
									class="social-icon social-linkedin"
									
								><i class="fab fa-linkedin-in"></i></a>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="widget">
								<h4 class="widget-title">Account</h4>
								<div class="row links link-lg link-parts">
									<div class="col-sm-6 link-part">
										<ul class="mb-0">
											<li>
												<router-link to="/account">My Account</router-link>
											</li>
											<li><a href="javascript:;">Track Your Order</a></li>
											<li><a href="javascript:;">Payment Methods</a></li>
											<li><a href="javascript:;">Shipping Guide</a></li>
											<li><a href="javascript:;">FAQs</a></li>
											<li><a href="javascript:;">Product Support</a></li>
											<li><a href="javascript:;">Privacy</a></li>
										</ul>
									</div>
									<div class="col-sm-6 link-part">
										<ul class="mb-0">
											<li>
												<a href="javascript:;">Orders History</a>
											</li>
											<li><a href="javascript:;">Advanced Search</a></li>
											<li><a href="javascript:;">Affiliate Program</a></li>
										</ul>
									</div>
								</div>
							</div>
						</div>
						<div class="col-lg-3">
							<div class="widget widget-sm">
								<h4 class="widget-title">About</h4>
								<ul class="links">
									<li>
										<router-link to="/pages/about-us">About Porto</router-link>
									</li>
									<li><a href="javascript:;">Our Guarantees</a></li>
									<li><a href="javascript:;">Terms And Conditions</a></li>
									<li><a href="javascript:;">Privacy policy</a></li>
									<li><a href="javascript:;">Return Policy</a></li>
									<li>
										<a href="javascript:;">Intellectual Property Claims</a>
									</li>
									<li><a href="javascript:;">Site Map</a></li>
								</ul>
							</div>
						</div>
						<div class="col-lg-2">
							<div class="widget widget-sm">
								<h4 class="widget-title">Features</h4>
								<ul class="links">
									<li>
										<a href="javascript:;">Super Fast Vue Template</a>
									</li>
									<li>
										<a href="javascript:;">Mobile & Retina Optimized</a>
									</li>
									<li><a href="javascript:;">Powerful Admin Panel</a></li>
									<li>
										<a href="javascript:;">1st Fully working Ajax Theme</a>
									</li>
									<li>
										<a href="javascript:;">42 Unique Shop Layouts</a>
									</li>
								</ul>
							</div>
						</div>
					</div>
				</div>

				<div class="footer-bottom d-sm-flex align-items-center">
					<div class="footer-left">
						<span class="footer-copyright">© Porto eCommerce. 2021. All Rights Reserved</span>
					</div>

					<div class="footer-right ml-auto mt-1 mt-sm-0">
						<img
							:src="'/assets/images/home/payment-icon.png'"
							alt="payment"
							width="200"
							height="27"
						>
					</div>
				</div>
			</div>
		</div>
	</footer>
</template>