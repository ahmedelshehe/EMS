/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

require('./bootstrap');

window.Vue = require('vue').default;
import Vue from 'vue';
import VueRouter from 'vue-router';
import {routes} from './routes';
import Toasted from 'vue-toasted';
Vue.use(VueRouter);
Vue.use(Toasted);
const router= new VueRouter({
    mode:"history",
    routes:routes
})

Vue.component('employee-index', require('./components/employees/Index.vue').default);
Vue.component('employee-create',require('./components/employees/Create.vue').default);
const app = new Vue({
    el: '#app',
    router:router,
});

 