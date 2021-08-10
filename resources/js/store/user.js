// Cart
export const USER_LOGIN = 'USER_LOGIN';
export const USER_LOGOUT = 'USER_LOGOUT';

export function state() {
    return {
        isLoggedIn: false,
        user: {},
        shipping_addresses: [],
        orders: []
    }
};

export const getters = {
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

export const actions = {
    userLogin: function ( { commit }, payload ) {
        commit( USER_LOGIN, payload );
    },
    userLogout: function ( { commit }, payload ) {
        commit( USER_LOGOUT, payload );
    }
}

export const mutations = {
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