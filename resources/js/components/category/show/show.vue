
import { template } from "lodash";


<template>
    <div class="" >
        <div class="d-flex  justify-content-center ">
        <p class="fs-3 fw-bold">Todas las Categorias!</p>
            
            <!-- <button @click="sendToCreateCategory" class='btn btn-success'><i class="far fa-plus-square pe-1"></i>NUEVA CATEGORIA</button> -->
        </div>
        <div class="container">
              <div  class="row my-4" >
                    <button class="btn col-md-3 col-12  box  p-1 " @click="sendToCreateCategory">
                        <div class="card h-100">
                             <div class="d-flex justify-content-center  align-items-center h-75 w-100">
                                <div class="addSize bg-success rounded-circle d-flex justify-content-center  align-items-center">
                                    <i class="fas fa-plus fa-7x" style="color:white"></i>
                                </div>  
                            </div>
                            <p class=" d-flex  justify-content-center fw-bold w-100">ADD CATEGORIA</p>
                        </div>
                    </button>
                <categorytemplate  v-for="categoryt in categories" :key="categoryt.id" :category_object=categoryt  v-on:sendCategory="sendToDelete(categoryt)" v-on:sendToUpdate="sendToUpdate(categoryt)"></categorytemplate>
            </div>
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
 <style scoped>
    .addSize{
        width:150px;
        height:150px;
     }

    
 </style>