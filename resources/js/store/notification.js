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
        this._vm.$swal({
            icon: payload.type,
            title: payload.message,
            showConfirmButton: false,
            timer: 2000,
        });
    },
}

export const mutations = {
    [ ADD_NOTIFICATION ]( state, payload ) {
        state.message = payload.message;
    }
}