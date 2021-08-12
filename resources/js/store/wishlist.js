// Wishlist store
const ADD_TO_WISHLIST = "ADD_TO_WISHLIST";
const REMOVE_FROM_WISHLIST = "REMOVE_FROM_WISHLIST";
const wish = JSON.parse(window.localStorage.getItem("SYNECWISH"));

const state = () => ({
    data: wish ? wish.data || [] : []
});

const getters = {
    wishList: state => {
        return state.data;
    }
};

const actions = {
    addToWishlist: function({ commit }, payload) {
        commit(ADD_TO_WISHLIST, payload);
    },
    removeFromWishlist: function({ commit }, payload) {
        commit(REMOVE_FROM_WISHLIST, payload);
    }
};

const mutations = {
    [ADD_TO_WISHLIST](state, payload) {
        let isAdded =
            state.data.findIndex(item => item.name === payload.product.name) >
            -1;
        if (!isAdded) {
            state.data.push(payload.product);
            localStorage.setItem(
                "SYNECWISH",
                JSON.stringify({ data: state.data })
            );
        }
    },
    [REMOVE_FROM_WISHLIST](state, payload) {
        let index = state.data.findIndex(item => item.id === payload.id);
        state.data.splice(index, 1);
        localStorage.setItem("SYNECWISH", JSON.stringify({ data: state.data }));
    }
};

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};
