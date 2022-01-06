
import { template } from "lodash";


<template>
    <div class="w-100" >
        <h1>ajam categories</h1>
        <div>
            <!-- <router-link :to='{name:createCategory}' class='btn btn-success'><i class="far fa-plus-square pe-1"></i>NUEVA CATEGORIA</router-link> -->
        </div>
        <div  class="row w-100 " >
            <!-- <div>{{categoryt.id}}</div>
            <div>{{categoryt.name}}</div>   
            <div>{{categoryt.url_img}}</div>
            <img :src="categoryt.url_img" alt="mmm"> -->
            <span>------------------------------</span>
           <categorytemplate v-for="categoryt in categories" :key="categoryt.id" :category_object=categoryt  ></categorytemplate>

        </div>
        <button type="button" class="col-12 btn btn-danger my-1 px-1  w-75" @click="showModal">MOSTRAR</button>
         <modal ref="childComponent"></modal>
    </div>
   
</template>

<script>
import categorytemplate from './plantilla/categorytemplate.vue';
import modal from '../../utilities/modal.vue';
export default {
    
    name:"categories",
    data(){
        return {
            categories:[]
        }
    },
    created(){
        this.getCategories()
    },
    methods: {
       async getCategories(){
            await this.axios.get('/api/category').then(response=>{
                this.categories=response.data
                
            }).catch(error=>{
                this.categories=[]
            })
        },
        showModal(){
            this.$refs.childComponent.showpopup();
        },
        hideModal(){
            this.$refs.childComponent.hidepopup();
        }
    },
    components: {
        categorytemplate ,
        modal 
    }
   
}
</script>
        