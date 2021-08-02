import Vue from "vue";
import Vuex from "vuex";
import {
    state as cartState,
    actions as cartAction,
    mutations as cartMutation,
    getters as cartGetter
} from "./cart";
import {
    state as wishlistState,
    actions as wishlistAction,
    mutations as wishlistMutation,
    getters as wishlistGetter
} from "./wishlist";

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        cart: {
            namespaced: true,
            state: cartState,
            actions: cartAction,
            mutations: cartMutation,
            getters: cartGetter
        },
        wishlist: {
            namespaced: true,
            state: wishlistState,
            actions: wishlistAction,
            mutations: wishlistMutation,
            getters: wishlistGetter
        }
    }
});
