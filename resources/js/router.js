import  Vue from 'vue'
import  VueRouter from 'vue-router'

import  MainContent  from './components/MainContent.vue'
import  AddNew  from './components/AddNew.vue'
import  Edit  from './components/Edit.vue'


Vue.use(VueRouter)
 const routes = [
     {
         path: '/',
         name: 'MainContent',
         component: MainContent
     },
     {
         path: '/add',
         name: 'addNew',
         component: AddNew
     },
     {
         path: '/edit/:id',
         name: 'edit',
         component: Edit
     },

 ];

 const router = new VueRouter({
     routes: routes,
     mode: 'history',
 });
 export default router;
