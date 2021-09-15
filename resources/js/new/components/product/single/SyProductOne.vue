<template>
    <div class="custom-col-5 mb-30">
        <div class="devita-product-2 mrg-inherit">
            <div class="product-img">
                <div class="product-img-slider">
                    <router-link :to="`/product/${product.slug}`"
                        ><img
                            :src="`${product.featured_image}`"
                            alt=""
                    /></router-link>
                </div>
                <span v-if="product.is_sale && product.price"
                    >-{{ discount }}%</span
                >
            </div>
            <div class="list-col">
                <div class="gridview">
                    <div class="product-content text-center">
                        <span>
                            <router-link
                                :to="{
                                    path: '/shop',
                                    query: { category: product.category.slug }
                                }"
                                >{{ product.category.name }}</router-link
                            >
                            ,
                            <router-link
                                :to="{
                                    path: '/shop',
                                    query: {
                                        sub_category: product.sub_category.slug
                                    }
                                }"
                                >{{ product.sub_category.name }}</router-link
                            >
                        </span>
                        <h4>
                            <router-link :to="`/product/${product.slug}`">{{
                                product.name
                            }}</router-link>
                        </h4>
                        <div class="product-price-wrapper">
                            <template v-if="!product.is_sale">
                                <span>₦{{ product.price }}</span>
                            </template>

                            <template v-else>
                                <span>₦{{ product.sale_price }}</span>
                                <span class="product-price-old"
                                    >₦{{ product.price }}</span
                                >
                            </template>
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
                            Quam elit phasellus nibh sed eget, sed nunc in
                            ultricies sodales sapien, non velit scelerisque...
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
    </div>
</template>

<script>
import baseUrl from "../../../../api/index";

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
    mounted: function() {
        if (this.product.is_sale && this.product.price) {
            this.discount =
                ((this.product.price - this.product.sale_price) /
                    this.product.price) *
                100;
            this.discount = parseInt(this.discount);
        }
    }
};
</script>
