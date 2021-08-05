<template>
	<div>
		<div
			class="mobile-menu-overlay"
			@click="hideMobileMenu"
		></div>

		<div class="mobile-menu-container">
			<div class="mobile-menu-wrapper">
				<span
					class="mobile-menu-close"
					@click="hideMobileMenu"
				>
					<i class="fa fa-times"></i>
				</span>

				<nav class="mobile-nav">
					<ul class="mobile-menu">
						<li>
							<router-link to="/">Home</router-link>
						</li>

						<li :class="{open: catOpened}">
							<router-link
								to="/shop"
								class="sub-menu-link menu-with-ul"
							>
								Categories
								<span
									class="mmenu-btn"
									@click.prevent="catOpened = !catOpened"
								></span>
							</router-link>

							<vue-slide-toggle :open="catOpened">
								<ul :class="{open: var1Opened}">
									<li
										class="sub-menu-link menu-with-ul"
										@click="var1Opened = !var1Opened"
										:class="{open: var1Opened}"
									>
										<a href="javascript:;">
											Variations1
											<span class="mmenu-btn"></span>
										</a>

										<vue-slide-toggle
											tag="ul"
											:open="var1Opened"
										>
									<li
										v-for="(item,index) in mainMenu.shop.variation1"
										:key="'shop1' + index"
									>
										<router-link :to="item.url">{{ item.title }}</router-link>
									</li>
							</vue-slide-toggle>
						</li>
					</ul>

					<ul :class="{open: var2Opened}">
						<li
							class="sub-menu-link menu-with-ul"
							@click="var2Opened = !var2Opened"
							:class="{open: var2Opened}"
						>
							<a href="javascript:;">
								Variations2
								<span class="mmenu-btn"></span>
							</a>

							<vue-slide-toggle
								tag="ul"
								:open="var2Opened"
							>
						<li
							v-for="(item,index) in mainMenu.shop.variation2"
							:key="'shop2' + index"
						>
							<router-link :to="item.url">{{ item.title }}</router-link>
						</li>
						</vue-slide-toggle>
						</li>
					</ul>
					</vue-slide-toggle>
					</li>
					
					<li>
						<router-link to="/pages/about-us">About Us</router-link>
					</li>
					</ul>

					<ul class="mobile-menu">
						<li>
							<router-link to="/account">My Account</router-link>
						</li>
						<li>
							<router-link to="/contact-us">Contact Us</router-link>
						</li>
						<li>
							<router-link to="/blog">Blog</router-link>
						</li>
						<li>
							<router-link to="/wishlist">My Wishlist</router-link>
						</li>
						<li>
							<router-link to="/cart">Cart</router-link>
						</li>
						<li>
							<router-link
								to="/auth/login"
								class="login-link"
							>Log In</router-link>
						</li>
					</ul>
				</nav>

				<form
					class="search-wrapper mb-2"
					action="#"
					@submit.prevent="submitSearchForm"
				>
					<input
						type="text"
						class="form-control mb-0"
						placeholder="Search..."
						required
						v-model="search_term"
					/>
					<button
						class="btn icon-search text-white bg-transparent p-0"
						type="submit"
					></button>
				</form>

				<div class="social-icons">
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
</template>

<script>
import { VueSlideToggle } from 'vue-slide-toggle';
import { mainMenu } from '../../../utils/data/menu';

export default {
	components: {
		VueSlideToggle
	},
	data: function () {
		return {
			mainMenu: mainMenu,
			catOpened: false,
			var1Opened: false,
			var2Opened: false,
			prodOpened: false,
			prod1Opened: false,
			prod2Opened: false,
			pageOpened: false,
			search_term: ''
		};
	},
	methods: {
		hideMobileMenu: function () {
			document.querySelector( 'body' ).classList.remove( 'mmenu-active' );
		},
		submitSearchForm: function ( e ) {
			this.$router.push( {
				path: '/shop',
				query: {
					search_term: this.search_term
				}
			} );
		},
	}
};
</script>