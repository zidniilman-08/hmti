
/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue');

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

import NotifUser from './components/NotifUser.vue'
import Favorite  from './components/Favorite.vue'
import Forums    from './components/Forums.vue'

Vue.component('notifuser', NotifUser);
Vue.component('favorite', Favorite);
Vue.component('forums', Forums);

const app = new Vue({
    el: '#app'
});
