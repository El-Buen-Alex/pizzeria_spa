import axios from 'axios';
import { before } from 'lodash';

const app=()=>import ('./components/app.vue');
const login=()=>import('./components/login.vue');

const infopage=()=>import('./components/mainpage/infopage.vue')

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
        name:'login',
        path:'/login',
        component:login
    },
   
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
                        component:createCategory,
                    },
                    {
                        name:'deleteCategory',
                        path:'/category/deleteCategory',
                        component:deleteCategory
                    },
                ]
            },
            {
                name:'showproducts',
                path:'/products/showproducts',
                component:showProducts
            },
            {
                name:'infopage',
                path:'/infopage',
                component:infopage
            },
    {
        name:'editCategory',
        path:'/category/editCategory',
        component:editCategory
    },  
]

