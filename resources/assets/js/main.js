window.Vue = require('vue');


import VueRouter from 'vue-router';
import VModal from 'vue-js-modal';
import App from './components/App.vue';
import Header from './components/globals/Header.vue';
import Footer from './components/globals/Footer.vue';
import BackToTop from './components/globals/sub-components/BackToTop.vue';
import PopUp from './components/globals/sub-components/PopUp.vue';
import { routes } from './routes';
import jQuery from 'jquery';

Vue.use(VueRouter);
Vue.use(VModal);

const router = new VueRouter({
    routes: routes,
    mode: 'history',
    base: '/'
});

Vue.component('app-header', Header);
Vue.component('app-footer', Footer);
Vue.component('app-popup', PopUp );
Vue.component('app-back-to-top', BackToTop);

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
  if(menuItems.length > 0) {
          menuItems[1].innerText = 'Categories';
          console.log('this has loaded');
  }

// const articleEl = document.querySelectorAll('article');
// console.log(articleEl[0].childNodes[2].childNodes);

(function($){
   
})(jQuery);
