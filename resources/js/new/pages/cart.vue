<template>
    <div>
        <!-- shopping-cart-area start -->
        <div class="cart-main-area pt-60 pb-65">
            <div class="container">
                <h3 class="page-title">Your cart items</h3>
                <div class="row">
                    <div class="col-lg-12 col-md-12 col-sm-12 col-12">
                        <form action="#">
                            <div class="table-content table-responsive">
                                <table>
                                    <thead>
                                        <tr>
                                            <th></th>
                                            <th>Product Name</th>
                                            <th>Until Price</th>
                                            <th>Qty</th>
                                            <th>Subtotal</th>
                                            <th></th>
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr
                                            v-for="(product,
                                            index) in cartItems"
                                            :key="index"
                                        >
                                            <td class="product-thumbnail">
                                                <router-link
                                                    :to="
                                                        '/product/' +
                                                            product.slug
                                                    "
                                                    class="product-image"
                                                >
                                                    <img
                                                        :src="
                                                            `${product.featured_image}`
                                                        "
                                                        width="150"
                                                        height="150"
                                                        :alt="product.name"
                                                    />
                                                </router-link>
                                            </td>
                                            <td class="product-name">
                                                <router-link
                                                    :to="
                                                        '/product/' +
                                                            product.slug
                                                    "
                                                    >{{
                                                        product.name
                                                    }}</router-link
                                                >
                                            </td>
                                            <td class="product-price-cart">
                                                <span class="amount"
                                                    >₦{{ product.price }}</span
                                                >
                                            </td>
                                            <td class="product-quantity">
                                                <div class="pro-dec-cart">
                                                    <input
                                                        class="cart-plus-minus-box"
                                                        type="number"
                                                        :value="product.qty"
                                                        name="qtybutton"
                                                        :min="1"
                                                        :max="
                                                            product.quantity_in_stock
                                                        "
                                                    />
                                                </div>
                                            </td>
                                            <td class="product-subtotal">
                                                ₦{{
                                                    product.price * product.qty
                                                }}
                                            </td>
                                            <td class="product-remove">
                                                <a href="javascript:;"
                                                    ><i class="fa fa-pencil"></i
                                                ></a>
                                                <a
                                                    href="javascript:;"
                                                    @click="
                                                        removeCart(product.name)
                                                    "
                                                    ><i class="fa fa-times"></i
                                                ></a>
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                            </div>
                            <div class="row">
                                <div class="col-lg-12">
                                    <div class="cart-shiping-update-wrapper">
                                        <div class="cart-shiping-update">
                                            <router-link to="/shop">Continue Shopping</router-link>
                                        </div>
                                        <div class="cart-clear">
                                            <button>
                                                Update Shopping Cart
                                            </button>
                                            <a href="javascript:;" @click="clearMyCart">Clear Shopping Cart</a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </form>
                        <div class="row">
                            <div class="col-lg-4 col-md-6">
                                <div class="cart-tax">
                                    <div class="title-wrap">
                                        <h4
                                            class="cart-bottom-title section-bg-white"
                                        >
                                            Estimate Shipping And Tax
                                        </h4>
                                    </div>
                                    <div class="tax-wrapper">
                                        <p>
                                            Enter your destination to get a
                                            shipping estimate.
                                        </p>
                                        <div class="tax-select-wrapper">
                                            <div class="tax-select">
                                                <label> * Country </label>
                                                <select
                                                    class="email s-email s-wid"
                                                >
                                                    <option>Nigeria</option>
                                                </select>
                                            </div>
                                            <div class="tax-select">
                                                <label>
                                                    * State
                                                </label>
                                                <input type="text" />
                                            </div>
                                            <div class="tax-select">
                                                <label>
                                                    * Zip/Postal Code
                                                </label>
                                                <input type="text" />
                                            </div>
                                            <button
                                                class="cart-btn-2"
                                                type="submit"
                                            >
                                                Get A Quote
                                            </button>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-6">
                                <div class="discount-code-wrapper">
                                    <div class="title-wrap">
                                        <h4
                                            class="cart-bottom-title section-bg-white"
                                        >
                                            Use Coupon Code
                                        </h4>
                                    </div>
                                    <div class="discount-code">
                                        <p>
                                            Enter your coupon code if you have
                                            one.
                                        </p>
                                        <form>
                                            <input
                                                type="text"
                                                required=""
                                                name="name"
                                            />
                                            <button
                                                class="cart-btn-2"
                                                type="submit"
                                            >
                                                Apply Coupon
                                            </button>
                                        </form>
                                    </div>
                                </div>
                            </div>
                            <div class="col-lg-4 col-md-12">
                                <div class="grand-totall">
                                    <div class="title-wrap">
                                        <h4
                                            class="cart-bottom-title section-bg-gary-cart"
                                        >
                                            Cart Total
                                        </h4>
                                    </div>
                                    <h5>Total products <span>₦{{totalPrice}}</span></h5>
                                    <div class="total-shipping">
                                        <h5>Total shipping</h5>
                                        <ul>
                                            <li>
                                                <input type="checkbox" />
                                                Standard <span>₦20.00</span>
                                            </li>
                                            <li>
                                                <input type="checkbox" />
                                                Express <span>₦30.00</span>
                                            </li>
                                        </ul>
                                    </div>
                                    <h4 class="grand-totall-title">
                                        Grand Total <span>₦{{totalPrice}}</span>
                                    </h4>
                                    <router-link to="/checkout">Proceed to Checkout</router-link>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
import { mapGetters, mapActions } from "vuex";
export default {
    name: "Cart",
    metaInfo: {
        title: "Cart",
        titleTemplate: "%s - Faadaakaa Ecommerce"
    },
    data: function() {
        return {
            cartItems: []
        };
    },
    computed: {
        ...mapGetters("cart", ["cartList", "totalPrice"])
    },
    created: function() {
        this.cartItems = [...this.cartList];
    },
    watch: {
        cartList: function() {
            this.cartItems = [...this.cartList];
        }
    },
    methods: {
        ...mapActions("cart", ["updateCart", "removeFromCart", "clearCart"]),
        clearMyCart: function(){
            this.clearCart({});
        },
        changeQty: function(value, product) {
            this.cartItems = this.cartItems.reduce((acc, cur) => {
                if (cur.name === product.name) {
                    return [
                        ...acc,
                        {
                            ...cur,
                            qty: value
                        }
                    ];
                } else {
                    return [...acc, cur];
                }
            }, []);
        },
        removeCart: function(name) {
            this.removeFromCart({ name: name });
            this.cartItems = this.cartItems.reduce((acc, cur) => {
                if (cur.name !== name) {
                    return [...acc, cur];
                } else {
                    return acc;
                }
            }, []);
        }
    }
};
</script>
