// Cart
export const ADD_NOTIFICATION = 'ADD_NOTIFICATION';

export function state() {
    return {
        message: "",
    }
};

export const getters = {
    getMessage: state => {
        return state.message;
    }
}

export const actions = {
    addNotification: function ( { commit }, payload ) {
        commit( ADD_NOTIFICATION, payload );
        this._vm.$notify( {
            group: 'notify',
            text: payload,
            color: 'red'
        } );
    },
}

export const mutations = {
    [ ADD_NOTIFICATION ]( state, payload ) {
        state.message = payload;
    }
}