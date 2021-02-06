import Vue from 'vue'
import VueRouter from 'vue-router'
import  MainContent  from './components/MainContent.vue'
import  Category  from './components/Category.vue'
Vue.use(VueRouter)
 const routes = [
     {
         path: '/',
         name: 'MainContent',
         component: MainContent
     },
     {
        path: '/category',
        name: 'Category',
        component: Category
    }
 ];

 const router = new VueRouter({
     routes: routes
 });
 export default router;