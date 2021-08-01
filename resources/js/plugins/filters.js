import Vue from 'vue';

Vue.filter( 'priceFormat', function ( value, size = 2 ) {
    if ( value === undefined ) return '';

    return value.toLocaleString( undefined, { minimumFractionDigits: size, maximumFractionDigits: size } );
} )

Vue.filter( 'capitalize', function ( value ) {
    if ( !value ) return '';
    value = value.toString();
    return value.charAt( 0 ).toUpperCase() + value.slice( 1 );
} )