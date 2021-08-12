// Cart store
const ADD_TO_CART = 'ADD_TO_CART';
const REMOVE_FROM_CART = 'REMOVE_FROM_CART';
const UPDATE_CART = 'UPDATE_CART';
const cart = JSON.parse(window.localStorage.getItem('SYNECCART'));

function state() {
    return {
        data: cart ? cart.data || [] : [],
    }
};

const getters = {
    cartList: state => {
        return state.data;
    },
    totalPrice: state => {
        return state.data.reduce( ( acc, cur ) => {
            return acc + cur.price * cur.qty;
        }, 0 )
    },
    totalCount: state => {
        return state.data.reduce( ( acc, cur ) => {
            return acc + parseInt( cur.qty, 10 );
        }, 0 );
    }
}

const actions = {
    addToCart: function ( { commit }, payload ) {
        commit( ADD_TO_CART, payload );

        this._vm.$notify( {
            group: 'addCartSuccess',
            text: `has been added to your cart!`,
            data: payload.product
        } );
    },
    removeFromCart: function ( { commit }, payload ) {
        commit( REMOVE_FROM_CART, payload );
    },
    updateCart: function ( { commit }, payload ) {
        commit( UPDATE_CART, payload );
    }
}

const mutations = {
    [ ADD_TO_CART ]( state, payload ) {
        let isAdded = state.data.findIndex( item => item.name === payload.product.name ) > -1;
        let qty = payload.product.qty ? payload.product.qty : 1;
        payload.product.qty = qty;

        if ( isAdded ) {
            state.data = state.data.reduce( ( acc, cur ) => {
                if ( cur.name === payload.product.name ) {
                    acc.push( {
                        ...cur,
                        qty: parseInt( cur.qty ) + parseInt( qty )
                    } );
                } else {
                    acc.push( cur );
                }

                return acc;
            }, [] )
        } else {
            state.data.push( payload.product );
            localStorage.setItem('SYNECCART', JSON.stringify({data: state.data}));
        }
    },
    [ REMOVE_FROM_CART ]( state, payload ) {
        let index = state.data.findIndex( item => item.name === payload.name );
        state.data.splice( index, 1 );
        localStorage.setItem('SYNECCART', JSON.stringify({data: state.data}));
    },
    [ UPDATE_CART ]( state, payload ) {
        state.data = payload.cartItems;
        localStorage.setItem('SYNECCART', JSON.stringify({data: state.data}));
    }
}

export default {
    namespaced: true,
    state,
    getters,
    actions,
    mutations
};