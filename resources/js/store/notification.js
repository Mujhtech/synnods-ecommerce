// Notification store
const ADD_NOTIFICATION = 'ADD_NOTIFICATION';

function state() {
    return {
        message: "",
    }
};

const getters = {
    getMessage: state => {
        return state.message;
    }
}

const actions = {
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

const mutations = {
    [ ADD_NOTIFICATION ]( state, payload ) {
        state.message = payload.message;
    }
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};