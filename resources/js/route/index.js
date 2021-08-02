import Vue from "vue";
import VueRouter from "vue-router";
import Index from "../pages/index";
import Auth from "../pages/Auth";
import Login from "../pages/auth/login";
import Register from "../pages/auth/register";
import ForgotPassword from "../pages/auth/forgot-password";
import Verify from "../pages/auth/verify";
import Reset from "../pages/auth/reset";
import TrackOrder from "../pages/order/track";
import Account from "../pages/pages/account";
import Cart from "../pages/pages/cart";
import Checkout from "../pages/pages/checkout";
import Wishlist from "../pages/pages/wishlist";
import Shop from "../pages/shop/index";

Vue.use(VueRouter);

const routes = [
    {
        path: "/",
        component: Index,
        name: "Index"
    },
    {
        path: "/shop",
        component: Shop,
        name: "Shop"
    },
    {
        path: "/account",
        component: Account,
        name: "Account"
    },
    {
        path: "/carts",
        component: Cart,
        name: "Carts"
    },
    {
        path: "/wishlist",
        component: Wishlist,
        name: "Wishlist"
    },
    {
        path: "/checkout",
        component: Checkout,
        name: "Checkout"
    },
    {
        path: "/order-tracking",
        component: TrackOrder,
        name: "Track Order"
    },
    {
        path: "/auth",
        component: Auth,
        redirect: "/auth/login",
        children: [
            {
                path: "login",
                component: Login,
                meta: { middleware: "guest" }
            },
            {
                path: "register",
                component: Register,
                meta: { middleware: ["guest", "register"] }
            },
            {
                path: "forgot-password",
                component: ForgotPassword,
                meta: { middleware: "guest" }
            },
            {
                path: "reset/:token",
                component: Reset,
                meta: { middleware: "guest" }
            },
            {
                path: "verify/:token",
                component: Verify
            }
        ]
    }
];

// Set the routes in vue-router
const router = new VueRouter({
    routes,
    linkActiveClass: "active",
    mode: "history"
});

export default router;
