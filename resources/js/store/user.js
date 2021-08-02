// Cart
export const USER_LOGIN = 'USER_LOGIN';
export const USER_LOGOUT = 'USER_LOGOUT';

export function state() {
    return {
        isLoggedIn: false,
        user: {}
    }
};

export const getters = {
    user: state => {
        return state.user;
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
    },
    [ USER_LOGOUT ]( state, payload ) {
        state.isLoggedIn = false;
        state.user = payload;
    }
}