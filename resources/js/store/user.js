// User store
const USER_LOGIN = 'USER_LOGIN';
const USER_LOGOUT = 'USER_LOGOUT';

function state() {
    return {
        isLoggedIn: false,
        user: {},
        shipping_addresses: [],
        orders: []
    }
};

const getters = {
    user: state => {
        return state.user;
    },
    getOrders: state => {
        return state.orders;
    },
    getShippingAddesses: state => {
        return state.shipping_addresses;
    },
    isLoggedIn: state => {
        return state.isLoggedIn;
    }
}

const actions = {
    userLogin: function ( { commit }, payload ) {
        commit( USER_LOGIN, payload );
    },
    userLogout: function ( { commit }, payload ) {
        commit( USER_LOGOUT, payload );
    }
}

const mutations = {
    [ USER_LOGIN ]( state, payload ) {
        state.isLoggedIn = true;
        state.user = payload;
        state.orders = payload.orders;
        state.shipping_addresses = payload.shipping_addresses;
    },
    [ USER_LOGOUT ]( state, payload ) {
        state.isLoggedIn = false;
        state.user = payload;
    }
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};