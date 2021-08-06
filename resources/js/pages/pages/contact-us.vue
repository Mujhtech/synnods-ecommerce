<template>
	<main class="main contact-two">
		<div class="container">
			<nav
				aria-label="breadcrumb"
				class="breadcrumb-nav"
			>
				<div class="container">
					<ol class="breadcrumb">
						<li class="breadcrumb-item">
							<router-link to="/">
								Home
							</router-link>
						</li>
						<li
							class="breadcrumb-item active"
							aria-current="page"
						>Contact Us</li>
					</ol>
				</div>
			</nav>
		</div>

		        <div id="map">
                <gmap-map
                :center="{lat:10, lng:10}"
                :zoom="7"
                map-type-id="terrain"
                style="width: 500px; height: 300px"
                ></gmap-map>
            </div>

		<div class="container mb-0">
			<div class="row ">
				<div class="col-md-6">
					<h2 class="font1 mb-1 pb-2">Contact Us</h2>

					<form action="#">
						<div class="row">
							<div class="col-md-6">
								<div class="form-group required-field">
									<label for="contact-name">Your name</label>
									<input
										type="text"
										class="form-control"
										id="contact-name"
										name="contact-name"
										required
									>
								</div>
							</div>

							<div class="col-md-6">
								<div class="form-group required-field">
									<label for="contact-email">Your email address</label>
									<input
										type="email"
										class="form-control"
										id="contact-email"
										name="contact-email"
										required
									>
								</div>
							</div>
						</div>

						<div class="form-group">
							<label for="contact-subject">Subject</label>
							<input
								type="text"
								class="form-control"
								id="contact-subject"
								name="contact-subject"
							>
						</div>

						<div class="form-group mb-0">
							<label for="contact-message">Your Message</label>
							<textarea
								cols="30"
								rows="1"
								id="contact-message"
								class="form-control"
								name="contact-message"
								required
							></textarea>
						</div>

						<div class="form-footer mb-0">
							<button
								type="submit"
								class="btn btn-primary font-weight-bold"
							>Send Message</button>
						</div>
					</form>
				</div>

				<div class="col-md-6">
					<h2 class="contact-title font2 text-primary"><strong>Get in touch</strong></h2>
					<p>Lorem ipsum dolor sit amet, consectetur adipiscing elit. Curabitur eget leo at velit
						imperdiet varius. In eu ipsum vitae velit congue iaculis vitae at risus. Lorem ipsum dolor
						sit amet, consectetur adipiscing elit.</p>

					<hr class="mt-3 mb-0" />

					<div class="contact-info mb-2">
						<h2 class="contact-title font2 text-primary"><strong>The Office</strong></h2>

						<div class="porto-sicon-box d-flex align-items-center">
							<div class="porto-icon">
								<i class="fas fa-map-marker-alt"></i>
							</div>
							<h3 class="porto-sicon-title">
								<strong>Address:</strong> 1234 Street Name, City Name, United States
							</h3>
						</div>
						<div class="porto-sicon-box  d-flex align-items-center">
							<div class="porto-icon">
								<i class="fa fa-phone"></i>
							</div>
							<h3 class="porto-sicon-title">
								<strong>Phone:</strong> (123) 456-7890</h3>
						</div>
						<div class="porto-sicon-box  d-flex align-items-center">
							<div class="porto-icon">
								<i class="fa fa-envelope"></i></div>
							<h3 class="porto-sicon-title">
								<strong>Email:</strong> mail@example.com</h3>
						</div>
					</div>

					<hr class="mt-1 mb-0" />

					<div class="contact-time">
						<h2 class="contact-title font2 text-primary"><strong>Business Hours</strong></h2>

						<div class="porto-sicon-box d-flex align-items-center">
							<div class="porto-icon">
								<i class="far fa-clock"></i>
							</div>
							<h3 class="porto-sicon-title">Monday - Friday
								9am to 5pm</h3>
						</div>

						<div class="porto-sicon-box  d-flex align-items-center">
							<div class="porto-icon">
								<i class="far fa-clock"></i>
							</div>

							<h3 class="porto-sicon-title">Saturday - 9am
								to 2pm</h3>
						</div>

						<div class="porto-sicon-box d-flex align-items-center">
							<div class="porto-icon"><i class="far fa-clock"></i></div>
							<h3 class="porto-sicon-title">Sunday - Closed
							</h3>
						</div>
					</div>
				</div>
			</div>
		</div>

		<div class="mb-4"></div>
	</main>
</template>

<script>
import Vue from 'vue';
import { VueSlideToggle } from 'vue-slide-toggle';

import * as VueGoogleMaps from 'vue2-google-maps'
Vue.use(VueGoogleMaps, {
  load: {
    key: 'AIzaSyBzlLYISGjL_ovJwAehh6ydhB56fCCpPQw',
    libraries: 'places'
  }
})

export default {
	components: {
		VueSlideToggle
	},
	data: function () {
		return {
			toggleState: [ true, false, false, false, false ]
		};
	},
	methods: {
		changeToggle: function ( index ) {
			let tmp = this.toggleState[ index ];
			this.toggleState.fill( false );
			this.toggleState[ index ] = !tmp;
			this.toggleState = [ ...this.toggleState ];
		}
	}
};
</script>