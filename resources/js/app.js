require('./bootstrap');
import Vue from 'vue';
import axios from 'axios';
import App from './App.vue';
import  router from './router';
import VueSweetalert2 from 'vue-sweetalert2';
import { Form, HasError, AlertError } from 'vform'

Vue.component(HasError.name, HasError)
Vue.component(AlertError.name, AlertError)

// If you don't need the styles, do not connect
import 'sweetalert2/dist/sweetalert2.min.css';
const options = {
    confirmButtonColor: '#41b882',
    cancelButtonColor: '#ff7674',
};

Vue.use(VueSweetalert2,options);
Vue.component('pagination', require('laravel-vue-pagination'));
Vue.prototype.axios = axios;
const app = new Vue({
    el: '#app',
    router,
    render: h => h(App)
});
