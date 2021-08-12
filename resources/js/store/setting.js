// Setting store
const UPDATE_SETTING = 'UPDATE_SETTING';
const UPDATE_CURRENCY = 'UPDATE_CURRENCY';

function state() {
    return {
        currency: localStorage.getItem('SYNECCUR') != null ? localStorage.getItem('SYNECCUR')  : 'NGN',
        data: []
    }
};

const getters = {
    getSetting: state => {
        return state.data;
    },
    getCurrency: state => {
        return state.currency;
    },
}

const actions = {
    updateSetting: function ( { commit }, payload ) {
        commit( UPDATE_SETTING, payload );
    },
    updateCurrency: function ( { commit }, payload ) {
        localStorage.setItem('SYNECCUR', payload);
        commit( UPDATE_CURRENCY, payload );
    }
}

const mutations = {
    [ UPDATE_SETTING ]( state, payload ) {
        state.data = payload;
    },
    [ UPDATE_CURRENCY ]( state, payload ) {
        state.currency = payload;
    }
}


export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};