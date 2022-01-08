import axios from 'axios';
import { before } from 'lodash';

const home=()=>import ('./components/home.vue');
const app=()=>import ('./components/app.vue');
const login=()=>import('./components/login.vue');


//componentes para categoria
const showCategory=()=>import('./components/category/show/show.vue')
const createCategory=()=>import('./components/category/create/create.vue')
const editCategory=()=>import('./components/category/edit/edit.vue')
const deleteCategory=()=>import('./components/category/delete/delete.vue')

const categorytemplate=()=>import('./components/category/show/plantilla/categorytemplate.vue')

//componentes para productos
const showProducts=()=>import('./components/product/show/showproducts.vue')

export const routes = [
    {
        path: '*',
        redirect:'/login'
    },
    {
        name:'login',
        path:'/login',
        component:login
    },
    {
        name:'home',
        path:'/',
        component:home
    },
    {
        name:'app',
        path:'/dashboard',
        component: app,
        children:[
            {
                name:'showCategories',
                path:'/category/categories',
                component:showCategory,
                meta:{
                           authenticated:true
                },
                children:[
                    {
                        name:'createCategory',
                        path:'/category/createCategory',
                        component:createCategory
<<<<<<< HEAD
                    },
                    {
                        name:'deleteCategory',
                        path:'/category/deleteCategory',
                        component:deleteCategory
                    },
                    
=======
                    }
>>>>>>> parent of 91f11b7 (create casi terminado, falta validar)
                ]
            }
        ]
    },
    // {
    //     name:'showCategories',
    //     path:'/category/categories',
    //     component:showCategory,
    //     meta:{
    //         authenticated:true
    //     }
    // },
    // {
    //     name:'createCategory',
    //     path:'/category/createCategory',
    //     component:createCategory
    // },
    {
        name:'editCategory',
        path:'/category/editCategory',
        component:editCategory
    },
    {
        name:'deleteCategory',
        path:'/category/deleteCategory',
        component:deleteCategory
    },
    {
        name:'showproducts',
        path:'/products/showproducts',
        component:showProducts
    },
    
]

