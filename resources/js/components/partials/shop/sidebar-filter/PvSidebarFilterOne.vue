<template>
	<div class="sidebar-wrapper">
		<div
			class="sidebar-content skeleton-body"
			v-if="categoryList.length === 0"
		>
			<aside class="widget"></aside>
		</div>

		<div
			class="widget widget-product-categories"
			v-else
		>
			<h3 class="widget-title">
				<a
					data-toggle="collapse"
					href="javascript:;"
					@click="catOpened = !catOpened"
					:class="{'collapsed': !catOpened}"
				>Categories</a>
			</h3>

			<vue-slide-toggle :open="catOpened">
				<div class="widget-body">
					<vue-tree-list
						:model="categoryTree"
						:default-expanded="false"
					>
						<template v-slot:leafNameDisplay="slotProps">
							<router-link
								:to="{path: $route.path, query: {category: slotProps.model.slug, page: 1}}"
								:class="{active: slotProps.model.slug === currentCategory}"
							>
								{{ slotProps.model.name }}
								<span class="products-count">({{ slotProps.model.sub_categories.length }})</span>
							</router-link>
						</template>
						<template v-slot:treeNodeIcon>
							<span></span>
						</template>
					</vue-tree-list>
				</div>
			</vue-slide-toggle>
		</div>

		<div class="widget">
			<h3 class="widget-title">
				<a
					data-toggle="collapse"
					href="javascript:;"
					@click="priceOpenened = !priceOpenened"
					:class="{'collapsed': !priceOpenened}"
				>Price</a>
			</h3>

			<vue-slide-toggle :open="priceOpenened">
				<div class="widget-body pb-0">
					<form action="#">
						<div class="price-slider-wrapper">
							<vue-nouislider
								:config="priceSettings"
								:values="prices"
								v-if="priceReset"
								id="price-slider"
							></vue-nouislider>
						</div>

						<div class="filter-price-action d-flex align-items-center justify-content-between flex-wrap">
							<div class="filter-price-text">Price: ${{ prices[0] }} - ${{ prices[1] }}</div>

							<router-link
								:to="priceFilterRoute"
								class="btn btn-primary"
							>Filter</router-link>
						</div>
					</form>
				</div>
			</vue-slide-toggle>
		</div>

		<!--<div class="widget widget-color">
			<h3 class="widget-title">
				<a
					data-toggle="collapse"
					href="javascript:;"
					@click="colorOpened = !colorOpened"
					:class="{'collapsed': !colorOpened}"
				>Color</a>
			</h3>

			<vue-slide-toggle :open="colorOpened">
				<div class="widget-body">
					<ul class="config-swatch-list flex-column">
						<li
							v-for="(item,index) in shopColors"
							:key="'color-filter' + index"
							:class="{active: isActivedColor(item)}"
						>
							<router-link
								:to="colorFilterRoute(item)"
								:style="{backgroundColor: item.color}"
							><span>{{ item.name | capitalize }}</span></router-link>
						</li>
					</ul>
				</div>
			</vue-slide-toggle>
		</div>

		<div class="widget widget-size">
			<h3 class="widget-title">
				<a
					href="javascript:;"
					@click="sizeOpened = !sizeOpened"
					:class="{'collapsed': !sizeOpened}"
				>Sizes</a>
			</h3>

			<vue-slide-toggle :open="sizeOpened">
				<div
					class="widget-body"
					style="padding-top: 2rem"
				>
					<ul class="cat-list">
						<li
							v-for="(item,index) in shopSizes"
							:key="'size-filter' + index"
							:class="{active: isActivedSize(item)}"
						>
							<router-link :to="sizeFilterRoute(item)">{{ item.name }}</router-link>
						</li>
					</ul>
				</div>
			</vue-slide-toggle>
		</div>-->

		<vue-slide-toggle :open="!isEmptyQuery">
			<div class="widget">
				<router-link
					:to="{path: $router.path}"
					class="btn btn-primary reset-filter-btn router-link-active"
				>Reset All Filters</router-link>
			</div>
		</vue-slide-toggle>

		<div
			class="widget widget-featured border-bottom-0"
			v-if="isFeatured"
		>
			<h3 class="widget-title">Featured</h3>

			<div class="widget-body">
				<div class="featured-col">
					<pv-small-product
						:product="product"
						v-for="(product,index) in featuredProducts.slice(0,2)"
						:key="'featured' + index"
						:is-lazy="false"
					></pv-small-product>
				</div>
			</div>
		</div>
	</div>
</template>

<script>
import { VueSlideToggle } from 'vue-slide-toggle';
import { VueTreeList, Tree } from 'vue-tree-list';
import PvSmallProduct from '../../../features/product/PvSmallProduct';
import { shopColors, shopSizes } from '../../../../utils/data/shop';

export default {
	components: {
		VueSlideToggle,
		VueTreeList,
		PvSmallProduct
	},
	props: {
		categoryList: Array,
		featuredProducts: Array
	},
	data: function () {
		return {
			catOpened: true,
			priceOpenened: true,
			sizeOpened: true,
			colorOpened: true,
			prices: [ 0, 1000 ],
			priceSettings: {
				connect: true,
				step: 50,
				margin: 100,
				range: {
					min: 0,
					max: 1000
				},
				format: {
					'from': Number,
					'to': Number
				}
			},
			shopColors: shopColors,
			shopSizes: shopSizes,
			emptyObject: {},
			isFeatured: true,
			priceReset: true,
			currentCategory: ''
		};
	},
	watch: {
		$route: function () {
			this.getFlag();

			if ( this.$route.query.min_price ) {
				this.prices = [
					this.$route.query.min_price,
					this.$route.query.max_price
				];
			} else {
				this.prices = [ 0, 1000 ];
			}

			this.priceReset = false;

			this.currentCategory = this.$route.query.category;

			this.$nextTick( function () {
				this.priceReset = true;
			} );
		}
	},
	created: function () {
		this.getFlag();

		if ( this.$route.query.min_price ) {
			this.prices = [
				this.$route.query.min_price,
				this.$route.query.max_price
			];
		} else {
			this.prices = [ 0, 1000 ];
		}
	},
	computed: {
		categoryTree: function () {
			console.log(this.categoryList);
			return new Tree( this.categoryList );
		},
		priceFilterRoute: function () {
			return {
				path: this.$route.path,
				query: {
					...this.$route.query,
					page: 1,
					max_price: this.prices[ 1 ],
					min_price: this.prices[ 0 ]
				}
			};
		},
		isEmptyQuery: function () {
			for ( let key in this.$route.query ) {
				if ( key !== 'page' && key !== 'per_page' && this.$route.query[ key ] ) {
					return false;
				}
			}

			return true;
		}
	},
	methods: {
		colorFilterRoute: function ( item ) {
			let selectedColors = this.$route.query.color
				? this.$route.query.color.split( ',' )
				: [];
			let index = selectedColors.indexOf( item.name );
			if ( index > -1 ) {
				selectedColors.splice( index, 1 );
			} else {
				selectedColors.push( item.name );
			}

			return {
				path: this.$route.path,
				query: {
					...this.$route.query,
					page: 1,
					color: selectedColors.toString()
				}
			};
		},
		sizeFilterRoute: function ( item ) {
			let selectedSizes = this.$route.query.size
				? this.$route.query.size.split( ',' )
				: [];
			let index = selectedSizes.indexOf( item.size );
			if ( index > -1 ) {
				selectedSizes.splice( index, 1 );
			} else {
				selectedSizes.push( item.size );
			}

			return {
				path: this.$route.path,
				query: {
					...this.$route.query,
					size: selectedSizes.toString(),
					page: 1
				}
			};
		},
		isActivedColor: function ( item ) {
			return (
				this.$route.query.color &&
				this.$route.query.color.split( ',' ).includes( item.name )
			);
		},
		isActivedSize: function ( item ) {
			return (
				this.$route.query.size &&
				this.$route.query.size.split( ',' ).includes( item.size )
			);
		},
		getFlag: function () {
			if ( this.$route.path.includes( 'horizontal-filter-1' ) )
				this.isFeatured = false;
		}
	}
};
</script>