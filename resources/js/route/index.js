import Vue from "vue";
import VueRouter from "vue-router";
import Index from "../new/pages/index";
import Authentication from "../new/pages/auth/index";
import Contact from "../new/pages/contact/index";
import About from "../new/pages/about/index";
import NProgress from 'nprogress';

Vue.use(VueRouter);

const routes = [
    {
        path: "/",
        component: Index,
        name: "Index"
    },
    {
        path: "/about",
        component: About,
        name: "About"
    },
    {
        path: "/contact",
        component: Contact,
        name: "Contact"
    },
    {
        path: "/authentication",
        component: Authentication,
        name: "Authentication"
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
