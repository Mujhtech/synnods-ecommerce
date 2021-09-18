import Vue from "vue";
import Vuex from "vuex";

import cart from "./cart";
import wishlist from "./wishlist";
import user from "./user";
import setting from "./setting";
import notification  from "./notification";
import checkout  from "./checkout";

Vue.use(Vuex);

export default new Vuex.Store({
    modules: {
        user: user,
        cart: cart,
        wishlist: wishlist,
        notification: notification,
        setting: setting,
        checkout: checkout
    }
});
