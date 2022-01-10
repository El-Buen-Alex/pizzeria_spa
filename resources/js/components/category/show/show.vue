
import { template } from "lodash";


<template>
    <div class="w-100" >
        <h1>Todas las Categorias!</h1>
        <div>
            <button @click="sendToCreateCategory" class='btn btn-success'><i class="far fa-plus-square pe-1"></i>NUEVA CATEGORIA</button>
        </div>
        <div  class="row w-100 m-1" >
           <categorytemplate  v-for="categoryt in categories" :key="categoryt.id" :category_object=categoryt  v-on:sendCategory="sendToDelete(categoryt)" v-on:sendToUpdate="sendToUpdate(categoryt)"></categorytemplate>
        </div>
        <!-- <button type="button" class="col-12 btn btn-danger my-1 px-1  w-75" >MOSTRAR</button> -->
         <!-- <modal ref="childComponent"></modal> -->
         
        <router-view v-on:updateCategories="getCategories" :objectA="categoryContext"></router-view>
    </div> 
</template>

<script>
import categorytemplate from './plantilla/categorytemplate.vue';
export default {
    name:'categories',
    
    data(){
        return {
            categories:[],
            categoryContext:{
                name:'',
                url_img:'',
                state:''
            }
        }
    },
    created(){
        this.getCategories();   
    },
    methods: {
       async getCategories(){
            await this.axios.get('/api/category').then(response=>{
                this.categories=response.data            
            }).catch(error=>{
                this.categories=[]
            })
        },     
         setCategoryContex(category){
             this.categoryContext = category
         },
         sendToDelete(category){
            this.setCategoryContex(category)
            console.log(this.categoryContext)
            this.$router.push({name:'deleteCategory'})
         },
         sendToUpdate(category){
              this.setCategoryContex(category)
              this.$router.push({name:'createCategory'})
         },
         sendToCreateCategory(){
             this.categoryContext=null;
             this.$router.push({name:'createCategory'})
         }
    },
    components: {
        categorytemplate 
    },
   
     
   
}
</script>
        