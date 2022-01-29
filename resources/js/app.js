require('./bootstrap');
import vue from 'vue'
window.Vue=vue;


import App from './components/app.vue'


import VueAxios from 'vue-axios';
import axios from 'axios';

import VueRouter from 'vue-router';
import {routes} from './routes';
import Vue from 'vue';
Vue.use(VueRouter);
Vue.use(VueAxios, axios);
const router = new VueRouter({
    mode:'history',
    routes:routes
});

 router.beforeEach((to,from,next)=>{
        const requiredAuthentificated=to.matched.some(record=>record.meta.authenticated)
        if(requiredAuthentificated && localStorage.getItem('session')===null){
            next({name :'login'})
        }else if(!requiredAuthentificated && localStorage.getItem('session')===true){
            next({name :'infopage'})
        }else{
            next()
        }
        
    
 } )


const app = new Vue({
    el:'#app',
    router:router,
    render: h=>h(App)
})