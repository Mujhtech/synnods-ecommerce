<template>
	<section class="category-section mb-3">
		<div
			class="container"
			v-images-loaded.on="updateIsotope"
		>
			<h2 class="section-title ls-n-10 text-center text-uppercase">Featured Categories</h2>

			<isotope
				class="grid row"
				ref="catIso"
				:options="isotopeOptions"
				:list="[]"
			>
				<div
					class="grid-item col-sm-4 col-md-3"
					key="category-1"
				>
					<div
						class="product-category appear-animate"
						data-animation-name="fadeIn"
						data-animation-delay="200"
						v-animate
					>
						<router-link :to="{path: '/shop', query: {category: 'fashion'}}">
							<figure>
								<img
									src="../../../static/images/home/products/categories/cat-1.jpg"
									style="background: #eee"
									alt="category"
									width="280"
									height="240"
								/>
							</figure>
							<div class="category-content">
								<h3>Fashion</h3>
							</div>
						</router-link>
					</div>
				</div>
				<div
					class="grid-item col-sm-8 col-md-6"
					key="category-2"
				>
					<div
						class="product-category appear-animate"
						data-animation-name="fadeIn"
						data-animation-delay="200"
						v-animate
					>
						<router-link :to="{path: '/shop', query: {category: 'furniture'}}">
							<figure>
								<img
									src="../../../static/images/home/products/categories/cat-2.jpg"
									style="background: #eee"
									alt="category"
									width="580"
									height="240"
								/>
							</figure>
							<div class="category-content">
								<h3>Furniture</h3>
							</div>
						</router-link>
					</div>
				</div>
				<div
					class="grid-item col-sm-5 col-md-3"
					key="category-3"
				>
					<div
						class="product-category appear-animate"
						data-animation-name="fadeIn"
						data-animation-delay="200"
						v-animate
					>
						<router-link :to="{path: '/shop', query: {category: 'decore'}}">
							<figure>
								<img
									src="../../../static/images/home/products/categories/cat-3.jpg"
									style="background: #eee"
									alt="category"
									width="280"
									height="240"
								/>
							</figure>
							<div class="category-content">
								<h3>Decore</h3>
							</div>
						</router-link>
					</div>
				</div>
				<div
					class="grid-item col-sm-7 col-md-4"
					key="category-4"
				>
					<div
						class="product-category appear-animate"
						data-animation-name="fadeIn"
						data-animation-delay="200"
						v-animate
					>
						<router-link :to="{path: '/shop', query: {category: 'accessories'}}">
							<figure>
								<img
									src="../../../static/images/home/products/categories/cat-4.jpg"
									style="background: #eee"
									alt="category"
									width="380"
									height="240"
								/>
							</figure>
							<div class="category-content">
								<h3>Accessories</h3>
							</div>
						</router-link>
					</div>
				</div>
				<div
					class="grid-item col-sm-4 col-md-3"
					key="category-5"
				>
					<div
						class="product-category appear-animate"
						data-animation-name="fadeIn"
						data-animation-delay="200"
						v-animate
					>
						<router-link :to="{path: '/shop', query: {category: 'mobile'}}">
							<figure>
								<img
									src="../../../static/images/home/products/categories/cat-5.jpg"
									style="background: #eee"
									alt="category"
									width="280"
									height="240"
								/>
							</figure>
							<div class="category-content">
								<h3>Mobile</h3>
							</div>
						</router-link>
					</div>
				</div>
				<div
					class="grid-item col-sm-8 col-md-5"
					key="category-6"
				>
					<div
						class="product-category appear-animate"
						data-animation-name="fadeIn"
						data-animation-delay="200"
						v-animate
					>
						<router-link :to="{path: '/shop', query: {category: 'footwear'}}">
							<figure>
								<img
									src="../../../static/images/home/products/categories/cat-6.jpg"
									style="background: #eee"
									alt="category"
									width="480"
									height="240"
								/>
							</figure>
							<div class="category-content">
								<h3>Footwear</h3>
							</div>
						</router-link>
					</div>
				</div>
				<div
					class="grid-col-sizer col-1"
					key="category-size"
				></div>
			</isotope>
		</div>
	</section>
</template>

<script>
import isotope from 'vueisotope';
import imagesLoaded from 'vue-images-loaded';

export default {
	components: {
		isotope
	},
	directives: {
		imagesLoaded
	},
	data: function () {
		return {
			isotopeOptions: {
				itemSelector: 'grid-item',
				layoutMode: 'masonry',
				percentPosition: false,
				masonry: {
					columnWidth: '.grid-col-sizer'
				}
			}
		}
	},
	methods: {
		updateIsotope: function () {
			if ( this.$refs.catIso ) {
				this.$refs.catIso.layout( 'masonry' );
			}
		}
	}
}
</script>