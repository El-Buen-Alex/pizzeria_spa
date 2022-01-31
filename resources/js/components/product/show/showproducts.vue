import { template } from "lodash";
<template>
    <div >
       <div class="d-flex justify-content-center">
            <p class="fs-2">TODOS LOS PRODUCTOS</p>
       </div>
       <div class="container">
           <div class="row my-4">

               <productTemplate v-for="product in productList" :key="product.id" :productObject="product"/>
           </div>
            <pagination :pagination="paginationObject" v-on:getProductsByPaginate="getListOfProductsByPagination"/>
       </div>
    </div>
</template>

<script>
import productTemplate from './productTemplate.vue'
import pagination from './pagination.vue'
export default {
    data(){
        return {
            productList:[],
            paginationObject:[]
        }
    },
    created(){
       // this.getListOfProducts()
    },
    methods:{
    //   async  getListOfProducts(){
    //        await  this.axios.get('/api/product').then(response=>{
    //             this.productList=response.data.data
    //             this.paginationObject=response.data
    //         })
    //     },

        async getListOfProductsByPagination(paginate){
            await this.axios.get('/api/product?page='+paginate).then(response=>{
                 this.productList=response.data.data
                 this.paginationObject=response.data
            })
        }
    },
    components:{
        productTemplate,
        pagination
    },
}
</script>