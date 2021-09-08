import Vue from "vue";
import VueRouter from "vue-router";
import Index from "../new/pages/index";
import Authentication from "../new/pages/auth/index";
import Contact from "../new/pages/contact/index";
import About from "../new/pages/about/index";
import Account from "../new/pages/account";
import Wishlist from "../new/pages/wishlist";
import Cart from "../new/pages/cart";
import Checkout from "../new/pages/checkout";
import NProgress from 'nprogress';

Vue.use(VueRouter);

const routes = [
    {
        path: "/",
        component: Index,
        name: "Index",
        meta: { middleware: "web" }
    },
    {
        path: "/about",
        component: About,
        name: "About",
        meta: { middleware: "web" }
    },
    {
        path: "/contact",
        component: Contact,
        name: "Contact",
        meta: { middleware: "web" }
    },
    {
        path: "/authentication",
        component: Authentication,
        name: "Authentication",
        meta: { middleware: "guest" }
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
        name: "Cart",
        meta: { middleware: "web" }
    },
    {
        path: "/checkout",
        component: Checkout,
        name: "Checkout",
        meta: { middleware: "auth" }
    },
    {
        path: "/wishlist",
        component: Wishlist,
        name: "Wishlist",
        meta: { middleware: "auth" }
    },
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
            next("/authentication");
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
