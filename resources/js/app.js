require('./bootstrap');

import Vue from 'vue';
import axios from 'axios';
import App from './App.vue';
import  router from './router'

Vue.prototype.axios = axios;
const app = new Vue({
    el: '#app',
    router,
    render: h => h(App)
});
