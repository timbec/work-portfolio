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


/**REGULAR JS**/

/**
 * Simple Bug Fix to change 'Work_Categories' to 'Category' in the Portfolio filter nav until I can find a proper fix. Could this go in computed? IMPORTANT - currently being called on all pages, creating an error.
 */
 const menuItems = document.querySelectorAll('.nav__label');
 console.log(menuItems.length);
if(menuItems.length > 0) {
       menuItems[1].innerText = 'Categories';
}
