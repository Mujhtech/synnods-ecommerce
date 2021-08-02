<template>
	<nav class="main-nav d-none d-lg-flex flex-wrap">
		<div
			class="menu-depart"
			:class="{'show-always': isHome}"
		>
			<a
				href="javascript:;"
				class="toggle"
			><i class="fas fa-bars"></i>Shop by Category</a>
			<div class="submenu">
				<router-link :to="{path: '/'}"><i class="icon-category-home"></i>Home</router-link>

				<router-link
					:to="{path: '/shop',query: {category: category.slug}}"
					v-for="(category,index) in headerCats"
					:key="'header-cat-' + index"
					:class="{active: category.slug === currentCategory}"
				><i :class="category.icon"></i>{{ category.name }}</router-link>

				<router-link :to="{path: '/shop'}">VIEW ALL <i class="icon-angle-right"></i></router-link>
			</div>
		</div>

		<ul class="menu main-menu menu-arrow">
			<li>
				<router-link to="/">Home</router-link>
			</li>

			<li>
				<router-link
					to="/vendor"
					class="sub-menu-link"
					:class="{active: $route.path.indexOf('/vendor') > -1}"
				>Vendor</router-link>
				<ul>
					<li>
						<router-link to="/vendor/list">Store List</router-link>
					</li>
					<li>
						<router-link to="/vendor/store">Vendor Store</router-link>
					</li>
				</ul>
			</li>

			<li>
				<router-link
					to="/shop"
					class="sub-menu-link menu-with-ul"
					:class="{active: $route.path.indexOf('/shop') > -1}"
				>Categories</router-link>

				<div class="megamenu megamenu-fixed-width megamenu-3cols">
					<div class="row">
						<div class="col-lg-4">
							<a
								href="javascript:;"
								class="nolink"
							>VARIATION 1</a>

							<ul class="submenu">
								<li
									v-for="item in mainMenu.shop.variation1"
									:key="item.id"
								>
									<router-link :to="item.url">
										{{ item.title }}
										<span
											class="tip tip-hot"
											v-if="item.hot"
										>Hot</span>
									</router-link>
								</li>
							</ul>
						</div>

						<div class="col-lg-4">
							<a
								href="javascript:;"
								class="nolink"
							>VARIATION 2</a>

							<ul class="submenu">
								<li
									v-for="item in mainMenu.shop.variation2"
									:key="item.id"
								>
									<router-link :to="item.url">{{ item.title }}</router-link>
								</li>
							</ul>
						</div>

						<div class="col-lg-4 p-0">
							<div class="menu-banner">
								<figure>
									<img
										:src="'/assets/images/menu-banner.jpg'"
										alt="Menu banner"
										width="300"
										height="300"
									/>
								</figure>
								<div class="banner-content">
									<h4>
										<span class>UP TO</span>
										<br />
										<b class>50%</b>
										<i>OFF</i>
									</h4>
									<router-link
										to="/shop"
										class="btn btn-sm btn-dark"
									>SHOP NOW</router-link>
								</div>
							</div>
						</div>
					</div>
				</div>
			</li>

			<li>
				<router-link
					to="/product/default/highway-detection-system"
					class="sub-menu-link menu-with-ul"
					:class="{active: $route.path.indexOf('/product') > -1}"
				>Products</router-link>

				<div class="megamenu megamenu-fixed-width megamenu-3cols">
					<div class="row">
						<div class="col-lg-4">
							<a
								href="javascript:;"
								class="nolink"
							>PRODUCT PAGES</a>

							<ul class="submenu">
								<li
									v-for="item in mainMenu.product.pages"
									:key="item.title"
								>
									<router-link :to="item.url">
										{{ item.title }}
										<span
											class="tip tip-hot"
											v-if="item.hot"
										>Hot</span>
									</router-link>
								</li>
							</ul>
						</div>

						<div class="col-lg-4">
							<a
								href="javascript:;"
								class="nolink"
							>PRODUCT LAYOUTS</a>

							<ul class="submenu">
								<li
									v-for="item in mainMenu.product.layout"
									:key="item.title"
								>
									<router-link :to="item.url">{{ item.title }}</router-link>
								</li>

								<li>
									<a href="javascript:;">Build your own</a>
								</li>
							</ul>
						</div>

						<div class="col-lg-4 p-0">
							<div class="menu-banner menu-banner-2">
								<figure>
									<img
										:src="'/assets/images/menu-banner-1.jpg'"
										alt="Menu banner"
										class="product-promo"
										width="380"
										height="790"
									/>
								</figure>
								<i>OFF</i>
								<div class="banner-content">
									<h4>
										<span class>UP TO</span>
										<br />
										<b class>50%</b>
									</h4>
								</div>
								<router-link
									to="/shop"
									class="btn btn-sm btn-dark"
								>SHOP NOW</router-link>
							</div>
						</div>
					</div>
				</div>
			</li>

			<li>
				<router-link
					to="/pages/blog"
					:class="{active: $route.path.indexOf('/pages/blog') > -1}"
				>Blog</router-link>
			</li>

			<li class="d-none d-xl-block">
				<a
					href="javascript:;"
					class="sub-menu-link"
					:class="{active: isPageItemActived}"
				>Pages</a>

				<ul>
					<li
						v-for="item in mainMenu.other"
						:key="item.title"
					>
						<router-link
							:to="item.url"
							:class="{'sub-menu-link': item.subPages}"
						>{{ item.title }}</router-link>

						<ul v-if="item.subPages">
							<li
								v-for="subItem in item.subPages"
								:key="subItem.title"
							>
								<router-link :to="subItem.url">{{ subItem.title }}</router-link>
							</li>
						</ul>
					</li>
				</ul>
			</li>
			<!-- <li>
				<router-link to="/pages/about-us">About Us</router-link>
			</li>
			<li>
				<router-link to="/pages/contact-us">Contact Us</router-link>
			</li> -->
			<!-- <li class="float-right">
				<a
					href="https://1.envato.market/DdLk5"
					class="nolink"
					target="_blank"
				>Buy Porto!</a>
			</li>
			<li class="float-right">
				<a
					href="javascript:;"
					class="pl-5"
				>Special Offer!</a>
			</li> -->
		</ul>
	</nav>
</template>

<script>
import { mainMenu } from '../../../utils/data/menu';
import { headerCats } from '../../../utils/data/shop';

export default {
	data: function () {
		return {
			mainMenu: mainMenu,
			headerCats: headerCats
		};
	},
	computed: {
		isPageItemActived: function () {
			let exItems = [ 'blog', 'about-us', 'contact-us' ];

			if (
				this.$route.path.includes( '/pages' ) &&
				exItems.findIndex( item => this.$route.path.includes( item ) ) ===
				-1
			) {
				return true;
			}

			return false;
		},
		isHome: function () {
			if ( this.$route.path === '/' ) return true;
			return false;
		},
		currentCategory: function () {
			if ( this.$route.query && this.$route.query.category ) return this.$route.query.category;
			return '';
		}
	}
};
</script>