window.Vue = require('vue');
require('./jquery');

import VueRouter from 'vue-router';
import App from './components/App.vue';
import Header from './components/globals/Header.vue';
import Footer from './components/globals/Footer.vue';
import { routes } from './routes';

Vue.use(VueRouter);

const router = new VueRouter({
    routes: routes,
    mode: 'history',
    base: '/'
});

Vue.component('app-header', Header);
Vue.component('app-footer', Footer);

new Vue({
    el: '#content',
    router: router,
    render: h => h(App)
});
