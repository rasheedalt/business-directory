
import axios from 'axios'
import VueRouter from 'vue-router'

import './bootstrap'

window.Vue = require('vue');

Vue.use(VueRouter);
Vue.use(axios);


axios.defaults.baseURL = 'http://localhost:8000/api';
axios.defaults.headers.common['Authorization'] = '';


import App from './App.vue';
import Dashboard from './pages/dashboard.vue';
import Layout from './pages/layout.vue';
import Login from './pages/login.vue';
import Home from './pages/home.vue';
import Business from './pages/business.vue'; 
import Categories from './pages/categories.vue'; 

Vue.component('Layout', Layout);


const router = new VueRouter({
    mode: 'history',
    routes: [ 
        { path: '/',           component: Home },
        { path: '/login',      component: Login },
        { path: '/dashboard',  component: Dashboard, name: 'dashboard'},
        { path: '/business/:id',component: Business},
        { path: '/categories', component: Categories},
        //{ path: '*',          component: ErrorPage},
        ]
});


//Vue.router = router


const app = new Vue({
    el: '#app',
    components:{
        App
    },
    router
});
