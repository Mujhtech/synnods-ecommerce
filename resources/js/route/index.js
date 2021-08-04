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
import Error from "../layouts/error";
import Vendor from "../pages/vendor/index";
import VendorList from "../pages/vendor/list";
import VendorStore from "../pages/vendor/store";

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
        name: "Account",
        meta: { middleware: "auth" }
    },
    {
        path: "/carts",
        component: Cart,
        name: "Carts"
    },
    {
        path: "/wishlist",
        component: Wishlist,
        name: "Wishlist",
        meta: { middleware: "auth" }
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
        path: "/vendor",
        component: Vendor,
        redirect: "/vendor",
        children: [
            {
                path: "/",
                component: VendorList
            },
            {
                path: "store",
                component: VendorStore
            },

        ]
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
    },
    { path: "/*", component: Error }
];

// Set the routes in vue-router
const router = new VueRouter({
    routes,
    linkActiveClass: "active",
    mode: "history"
});

router.beforeResolve((to, from, next) => {
    if (to.meta.middleware) {
        if (
            !localStorage.getItem("SYNECT") &&
            to.meta.middleware.includes("auth")
        ) {
            next("/auth/login");
        } else if (
            localStorage.getItem("SYNECT") &&
            to.meta.middleware.includes("guest")
        ) {
            next("/account");
        } else {
            next();
        }
    } else {
        next();
    }
});

export default router;
