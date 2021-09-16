<template>
    <div class="devita-product-2">
        <div class="product-img">
            <a href="product-details.html">
                <img src="assets/img/product/headphone-1.jpg" alt="" />
            </a>
        </div>
        <div class="list-col">
            <div class="gridview">
                <div class="product-content text-center">
                    <span>Headphone, Accessories</span>
                    <h4>
                        <a href="product-details.html"
                            >Matrior white Headphone Ver 2018
                        </a>
                    </h4>
                    <div class="product-price-wrapper">
                        <span>₦260.00</span>
                    </div>
                </div>
                <div class="product-action-wrapper-2 text-center">
                    <div class="product-rating">
                        <i class="ion-android-star-outline theme-star"></i>
                        <i class="ion-android-star-outline theme-star"></i>
                        <i class="ion-android-star-outline theme-star"></i>
                        <i class="ion-android-star-outline theme-star"></i>
                        <i class="ion-android-star-outline"></i>
                    </div>
                    <p>
                        Quam elit phasellus nibh sed eget, sed nunc in ultricies
                        sodales sapien, non velit scelerisque...
                    </p>
                    <div class="product-action">
                        <a class="same-action" title="Wishlist" href="#">
                            <i class="fa fa-heart-o"></i>
                        </a>
                        <a class="action-cart" title="Add To Cart" href="#">
                            Add to Cart
                        </a>
                        <a
                            class="same-action compare-mrg"
                            data-target="#exampleCompare"
                            data-toggle="modal"
                            title="Compare"
                            href="#"
                        >
                            <i class="fa fa-sliders fa-rotate-90"></i>
                        </a>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>


<script>
import baseUrl from "../../../../api/index";
import { mapActions, mapGetters } from "vuex";
export default {
    name: "Product",
    props: {
        product: Object
    },
    data: function() {
        return {
            baseUrl: baseUrl,
            discount: 0
        };
    },
    computed: {
		...mapGetters( 'wishlist', [ 'wishList' ] ),
		isWishlisted: function () {
			if (
				this.wishList.findIndex(
					item => item.name === this.product.name
				) > -1
			)
				return true;
			return false;
		}
	},
    mounted: function() {
        if (this.product.is_sale && this.product.price) {
            this.discount =
                ((this.product.price - this.product.sale_price) /
                    this.product.price) *
                100;
            this.discount = parseInt(this.discount);
        }
    },
    methods: {
        ...mapActions("wishlist", ["addToWishlist"]),
        ...mapActions("cart", ["addToCart"]),
        addWishlist: function() {
            setTimeout(() => {
                this.addToWishlist({ product: this.product });
                /*document
                    .querySelector(".wishlist-popup")
                    .classList.add("active");

                setTimeout(() => {
                    document
                        .querySelector(".wishlist-popup")
                        .classList.remove("active");
                }, 1000);*/
            }, 1000);
        },
        addCart: function() {
            if (this.product.quantity_in_stock > 0) {
                let saledProduct = { ...this.product };
                if (this.product.is_sale) {
                    saledProduct.price = this.product.sale_price;
                }

                this.addToCart({ product: saledProduct });
            }
        }
    }
};
</script>
