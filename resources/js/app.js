require('./plugins/index');
require('./plugins/filters');
//require('./plugins/localstorage');
require('./plugins/directives/animate');
require('./plugins/directives/lazyLoad');
require('./plugins/directives/parallax');
require('./plugins/directives/sticky');

import Vue from 'vue';
import App from './App.vue';
import router from './route/index';
import store from './store/index';
import VueMeta from 'vue-meta'
 
Vue.use(VueMeta);


new Vue({
    el: '#app',
    router,
    store,
    render: h => h(App)
});