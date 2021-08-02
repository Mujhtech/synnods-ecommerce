import Vue from 'vue';
import VueRouter from 'vue-router';
import Index from '../pages/index';

Vue.use(VueRouter);

const routes = [
    {
        path: '/',
        component: Index,
        name: 'Index'
    },
];

// Set the routes in vue-router
const router = new VueRouter({
    routes,
    linkActiveClass: "active",
    mode: "history"
});

export default router;