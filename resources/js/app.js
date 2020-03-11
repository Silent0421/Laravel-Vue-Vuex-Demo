/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import Vue from 'vue';
import Vuex from 'vuex';
import MainComponent from './components/MainComponent';
import VueRouter from 'vue-router';
import LoginComponent from './components/Login';
import RegisterComponent from './components/Register';
import WelcomeComponent from './components/Welcome';
import AppComponent from "./components/App";
import vModal from 'vue-js-modal';
import VueMaterial from "vue-material";
import 'vue-material/dist/vue-material.min.css';
import 'vue-material/dist/theme/default.css';
import VeeValidate from 'vee-validate';
import 'vue-material-design-icons/styles.css';
import vuexStore from "./vuexStore";

window.Vue = Vue;

let routes = [];

LoginComponent.registerRoutes(routes);
RegisterComponent.registerRoutes(routes);
AppComponent.registerRoutes(routes);
WelcomeComponent.registerRoutes(routes);

routes.push({ path: '/', redirect: '/welcome' });
routes.push({ path: '/*', redirect: '/' });

/**
 * creating vue-router instance
 * @type {VueRouter}
 */
const router = new VueRouter({
    routes,
});

/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */
Vue.use(Vuex);
Vue.use(VueRouter);
Vue.use(vModal);
Vue.use(VueMaterial);
Vue.use(VeeValidate);

/**
 *
 * @type {Store<{count: number}>}
 */
const store = new Vuex.Store(vuexStore);

Vue.component('app-main', MainComponent);

const app = new Vue({
    el: '#app',
    router,
    store
});
