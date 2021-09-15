//require('./plugins/index');
//require('./plugins/filters');
//require('./plugins/localstorage');
//require('./plugins/directives/animate');
//require('./plugins/directives/lazyLoad');
//require('./plugins/directives/parallax');
//require('./plugins/directives/sticky');


window.jQuery = require('jquery');
require('@popperjs/core');
require('bootstrap');

import Vue from 'vue';
import App from './App.vue';
import router from './route/index';
import store from './store/index';
import VueMeta from 'vue-meta';
import loader from "vue-ui-preloader";
import VueSweetalert2 from 'vue-sweetalert2';
import Vuelidate from 'vuelidate';
import Echo from 'laravel-echo';
import VueClipboard from 'vue-clipboard2'

import 'sweetalert2/dist/sweetalert2.min.css';
import 'nprogress/nprogress.css';

Vue.config.productionTip = false;

Vue.use(Vuelidate);
Vue.use(VueSweetalert2);
Vue.use(loader);
Vue.use(VueMeta);
Vue.use(VueClipboard);

window.Pusher = require('pusher-js');

window.Echo = new Echo({
    broadcaster: 'pusher',
    key: process.env.MIX_PUSHER_APP_KEY,
    cluster: process.env.MIX_PUSHER_APP_CLUSTER,
    encrypted: false
});


new Vue({
    el: '#app',
    router,
    store,
    render: h => h(App)
});