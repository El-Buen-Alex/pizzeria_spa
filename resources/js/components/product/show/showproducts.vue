import { template } from "lodash";
<template>
    <div >
       <div class="d-flex justify-content-center">
            <p class="fs-2">TODOS LOS PRODUCTOS</p>
       </div>
       <div class="container">
           <div class="row">

               <productTemplate v-for="product in productList" :key="product.id" :productObject="product"/>
           </div>
       </div>
    </div>
</template>

<script>
import productTemplate from './productTemplate.vue'
export default {
    data(){
        return {
            productList:[],
            paginationObject:[]
        }
    },
    created(){
        this.getListOfProducts()
    },
    methods:{
      async  getListOfProducts(){
           await  this.axios.get('/api/product').then(response=>{
                this.productList=response.data.data
                this.paginationObject=response.data
                console.log(response.data)
                console.log("*----")
                console.log(this.productList)
            })
        }
    },
    components:{
        productTemplate
    },
}
</script>