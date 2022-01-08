
import { template } from "lodash";


<template>
    <div class="w-100" >
        <h1>Todas las Categorias!</h1>
        <div>
            <router-link :to='{name:"createCategory"}' class='btn btn-success'><i class="far fa-plus-square pe-1"></i>NUEVA CATEGORIA</router-link>
        </div>
        <div  class="row w-100 " >
            <!-- <div>{{categoryt.id}}</div>
            <div>{{categoryt.name}}</div>   
            <div>{{categoryt.url_img}}</div>
            <img :src="categoryt.url_img" alt="mmm"> -->
            
           <categorytemplate  v-for="categoryt in categories" :key="categoryt.id" :category_object=categoryt  ></categorytemplate>
        </div>
        <!-- <button type="button" class="col-12 btn btn-danger my-1 px-1  w-75" >MOSTRAR</button> -->
         <!-- <modal ref="childComponent"></modal> -->
         
             <router-view v-on:updateCategories="getCategories"></router-view>
         

    </div>
   
</template>

<script>
import categorytemplate from './plantilla/categorytemplate.vue';
export default {
    name:'categories',
    
    data(){
        return {
            categories:[]
        }
    },
    created(){
        this.getCategories();
        this. printHola();
    },
    methods: {
       async getCategories(){
            await this.axios.get('/api/category').then(response=>{
                this.categories=response.data
                
            }).catch(error=>{
                this.categories=[]
            })
        },
       
        printHola(){
            console.log('beta miente')
        }

    },
    components: {
        categorytemplate 
    },
   
     
   
}
</script>
        