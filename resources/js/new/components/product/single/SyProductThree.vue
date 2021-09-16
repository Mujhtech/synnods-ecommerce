<template>
    <div class="best-selling-bundle">
        <div class="best-selling-pro-wrapper mb-20">
            <div class="product-img">
                <a href="product-details.html">
                    <img alt="" src="assets/img/product/best-selling-5.jpg" />
                </a>
                <span>-10%</span>
            </div>
            <div class="product-content best-pro-content">
                <span>Tab, Accessories</span>
                <h4>
                    <a href="product-details.html"
                        >Featured Demoniss Tab Ver 2018</a
                    >
                </h4>
                <div class="product-price-wrapper">
                    <span>₦260.00</span>
                    <span class="product-price-old">₦162.00 </span>
                </div>
                <div class="product-action best-pro-action">
                    <a class="same-action" title="Wishlist" href="#">
                        <i class="fa fa-heart-o"></i>
                    </a>
                    <a class="action-cart" title="Add To Cart" href="#">
                        Add to Cart
                    </a>
                </div>
            </div>
        </div>
        <div class="best-selling-pro-wrapper mb-20">
            <div class="product-img">
                <a href="product-details.html">
                    <img alt="" src="assets/img/product/best-selling-6.jpg" />
                </a>
            </div>
            <div class="product-content best-pro-content">
                <span>Phone, Accessories</span>
                <h4>
                    <a href="product-details.html"
                        >Awesome Smart Phone Ver 2018</a
                    >
                </h4>
                <div class="product-price-wrapper">
                    <span>₦200.00</span>
                </div>
                <div class="product-action best-pro-action">
                    <a class="same-action" title="Wishlist" href="#">
                        <i class="fa fa-heart-o"></i>
                    </a>
                    <a class="action-cart" title="Add To Cart" href="#">
                        Add to Cart
                    </a>
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
        ...mapGetters("wishlist", ["wishList"]),
        isWishlisted: function() {
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
