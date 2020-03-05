/**
 * First we will load all of this project's JavaScript dependencies which
 * includes Vue and other libraries. It is a great starting point when
 * building robust, powerful web applications using Vue and Laravel.
 */

import './bootstrap';
import Vue from 'vue'
import MainComponent from './components/MainComponent';
import VueRouter from 'vue-router';
import LoginComponent from './components/Login';
import RegisterComponent from './components/Register';
import WelcomeComponent from './components/Welcome'
import AppComponent from "./components/App";
import vModal from 'vue-js-modal';
import VueMaterial from "vue-material";
import 'vue-material/dist/vue-material.min.css';
import 'vue-material/dist/theme/default.css';
import VeeValidate from 'vee-validate';
import 'vue-material-design-icons/styles.css';

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
    // mode: 'history'
});

/**
 * The following block of code may be used to automatically register your
 * Vue components. It will recursively scan this directory for the Vue
 * components and automatically register them with their "basename".
 *
 * Eg. ./components/ExampleComponent.vue -> <example-component></example-component>
 */

// const files = require.context('./', true, /\.vue$/i)
// files.keys().map(key => Vue.component(key.split('/').pop().split('.')[0], files(key).default))



/**
 * Next, we will create a fresh Vue application instance and attach it to
 * the page. Then, you may begin adding components to this application
 * or customize the JavaScript scaffolding to fit your unique needs.
 */

Vue.use(VueRouter);
Vue.use(vModal);
Vue.use(VueMaterial);
Vue.use(VeeValidate);

Vue.component('app-main', MainComponent);

const app = new Vue({
    el: '#app',
    router
});
