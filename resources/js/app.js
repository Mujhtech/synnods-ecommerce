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
import VueMeta from 'vue-meta';
import loader from "vue-ui-preloader";
import VueSweetalert2 from 'vue-sweetalert2';
import Vuelidate from 'vuelidate';

import 'sweetalert2/dist/sweetalert2.min.css';
import 'nprogress/nprogress.css';

Vue.config.productionTip = false;

Vue.use(Vuelidate);
Vue.use(VueSweetalert2);
Vue.use(loader);
Vue.use(VueMeta);


new Vue({
    el: '#app',
    router,
    store,
    render: h => h(App)
});