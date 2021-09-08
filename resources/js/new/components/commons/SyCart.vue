<template>
    <div class="header-cart middle-same">
        <button class="icon-cart">
            <i class="pe-7s-shopbag cart-bag"></i>
            <span class="count-amount">₦{{ totalPrice }}</span>
            <i class="ion-chevron-down cart-down"></i>
            <span class="count-style">{{ totalCount }}</span>
        </button>
        <div class="shopping-cart-content">
            <ul v-if="cartList.length > 0">
                <li
                    class="single-shopping-cart"
                    v-for="(product, index) in cartList"
                    :key="'cart-product-' + index"
                >
                    <div class="shopping-cart-img">
                        <router-link :to="'/product/' + product.slug">
                            <img
                                v-lazy="`${baseUrl}${product.featured_image}`"
                                alt="product"
                                :width="product.featured_image.width"
                                :height="product.featured_image.height"
                            />
                        </router-link>
                    </div>
                    <div class="shopping-cart-title">
                        <h4>
                            <router-link :to="'/product/' + product.slug">{{
                                product.name
                            }}</router-link>
                        </h4>
                        <h6>Qty: {{ product.qty }}</h6>
                        <span>₦{{ product.price }}</span>
                    </div>
                    <div class="shopping-cart-delete">
                        <a
                            href="javascript:;"
                            title="Remove Product"
                            @click="removeCart(product.name)"
                            ><i class="ion-android-close"></i
                        ></a>
                    </div>
                </li>
            </ul>
            <p v-else style="text-align:center;">No products in the cart.</p>
            <div class="shopping-cart-total">
                <h4>
                    Total : <span class="shop-total">₦{{ totalPrice }}</span>
                </h4>
            </div>
            <div class="shopping-cart-btn">
                <router-link class="btn-style btn-hover" to="cart"
                    >view cart</router-link
                >
                <router-link class="btn-style btn-hover" to="checkout"
                    >checkout</router-link
                >
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
import { baseUrl } from "../../../api";
export default {
    name: "Cart",
    data: function() {
        return {
            baseUrl: baseUrl
        };
    },
    computed: {
        ...mapGetters("cart", ["cartList", "totalCount", "totalPrice"])
    },
    methods: {
        ...mapActions("cart", ["removeFromCart"]),
        removeCart: function(name) {
            this.removeFromCart({ name: name });
        }
    }
};
</script>
