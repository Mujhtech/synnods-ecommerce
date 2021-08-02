<template>
    <div class="sticky-navbar">
        <div class="sticky-info">
            <router-link to="/">
                <i class="icon-home"></i>Home
            </router-link>
        </div>
        <div class="sticky-info">
            <router-link to="/shop">
                <i class="icon-bars"></i>Categories
            </router-link>
        </div>
        <div class="sticky-info">
            <router-link to="/wishlist">
                <i class="icon-wishlist-2"></i>Wishlist
            </router-link>
        </div>
        <div class="sticky-info">
            <router-link to="/login">
                <i class="icon-user-2"></i>Account
            </router-link>
        </div>
        <div class="sticky-info">
            <router-link to="/cart">
                <i class="icon-shopping-cart position-relative">
                    <span class="cart-count badge-circle">{{ totalCount }}</span>
                </i>Cart
            </router-link>
        </div>
    </div>
</template>

<script>
import { mapGetters } from 'vuex';

export default {
	computed: {
		...mapGetters( 'cart', [ 'totalCount' ] )
	}
}
</script>