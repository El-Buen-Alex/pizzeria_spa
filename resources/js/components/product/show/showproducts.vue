import { template } from "lodash";
<template>
    <div v-show="productList.length>0">
       <div class="d-flex justify-content-center">
            <p class="fs-2">TODOS LOS PRODUCTOS</p>
       </div>
       <div class="container">
           <div class="row my-4">
                <button class="btn col-lg-3 col-12 boxCategory  py-1 my-1" @click="sendToCreateProduct">
                        <div class="card h-100">
                             <div class="d-flex justify-content-center  align-items-center h-75 w-100">
                                <div class="addSize bg-success rounded-circle d-flex justify-content-center  align-items-center">
                                    <i class="fas fa-plus fa-7x" style="color:white"></i>
                                </div>  
                            </div>
                            <div class="h-25">
                                <p class=" d-flex  justify-content-center fw-bold w-100 ">ADD PRODUCTOS</p>

                            </div>
                        </div>
                    </button>
                <productTemplate v-for="product in productList" :key="product.id" :productObject="product" v-on:sendToEdit="setProductContext" v-on:sendToDelete="deleteProduct"/>
                <router-view v-on:refreshCategories="getListOfProductsByPagination" :productContext="productContext"></router-view>
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
            paginationObject:[],
            productContext:{}
            
        }
    },
    created(){
       
    },
    methods:{
        async getListOfProductsByPagination(paginate=0){
            await this.axios.get('/api/product?page='+paginate).then(response=>{
                 this.productList=response.data.data
                    console.log(this.productList)

                 this.paginationObject=response.data
            }) 
        },
         sendToCreateProduct(){
            this.$router.push({name:'createProduct'})
        },
        setProductContext(product){
            this.productContext=product
            this.$router.push({name:'editProduct'})
        },
        deleteProduct(product){
            this.productContext=product
            console.log(product)
            this.$router.push({name:'deleteProduct'})

        }
    },
    components:{
        productTemplate,
        pagination,
    },
}
</script>

<style scoped>

.addSize{
        width:150px;
        height:150px;
     }
</style>