import Vue from "vue";
import VueRouter from "vue-router";
import Index from "../pages/index";
import Auth from "../pages/Auth";
import Login from "../pages/auth/login";
import Register from "../pages/auth/register";
import ForgotPassword from "../pages/auth/forgot-password";
import TrackOrder from "../pages/order/track";

Vue.use(VueRouter);

const routes = [
    {
        path: "/",
        component: Index,
        name: "Index"
    },
    {
        path: "/shop",
        component: Index,
        name: "Shop"
    },
    {
        path: "/carts",
        component: Index,
        name: "Carts"
    },
    {
        path: "/wishlist",
        component: Index,
        name: "Wishlist"
    },
    {
        path: "/checkout",
        component: Index,
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
