// Cart
export const UPDATE_SETTING = 'UPDATE_SETTING';
export const UPDATE_CURRENCY = 'UPDATE_CURRENCY';

export function state() {
    return {
        currency: localStorage.getItem('SYNECCUR') != null ? localStorage.getItem('SYNECCUR')  : 'NGN',
        data: []
    }
};

export const getters = {
    getSetting: state => {
        return state.data;
    },
    getCurrency: state => {
        return state.currency;
    },
}

export const actions = {
    updateSetting: function ( { commit }, payload ) {
        commit( UPDATE_SETTING, payload );
    },
    updateCurrency: function ( { commit }, payload ) {
        localStorage.setItem('SYNECCUR', payload);
        commit( UPDATE_CURRENCY, payload );
    }
}

export const mutations = {
    [ UPDATE_SETTING ]( state, payload ) {
        state.data = payload;
    },
    [ UPDATE_CURRENCY ]( state, payload ) {
        state.currency = payload;
    }
}