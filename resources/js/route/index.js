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
import Product from "../pages/product/_type/_slug";
import Error from "../layouts/error";
import VendorList from "../pages/vendor/list";
import VendorStore from "../pages/vendor/store";
import Blog from "../pages/pages/blog";
import AboutUs from "../pages/pages/about-us";
import ContactUs from "../pages/pages/contact-us";
import NProgress from 'nprogress';

Vue.use(VueRouter);

const routes = [
    {
        path: "/",
        component: Index,
        name: "Index"
    },
    {
        path: "/blog",
        component: Blog,
        name: "Blog"
    },
    {
        path: "/contact-us",
        component: ContactUs,
        name: "Contact Us"
    },
    {
        path: "/about-us",
        component: AboutUs,
        name: "About Us"
    },
    {
        path: "/shop",
        component: Shop,
        name: "Shop"
    },
    {
        path: "/product/:slug",
        component: Product,
        name: "Single Product"
    },
    {
        path: "/account",
        component: Account,
        name: "Account",
        meta: { middleware: "auth" }
    },
    {
        path: "/cart",
        component: Cart,
        name: "Cart"
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
        path: "/vendors",
        component: VendorList,
        name: "Vendors"
    },
    {
        path: "/vendor/:slug",
        component: VendorStore,
        name: "Vendor"
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
    NProgress.configure({ easing: 'ease', speed: 1000 });
    NProgress.start();
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


router.afterEach((to, from) => {
    NProgress.done();
});

export default router;
