import { template } from "lodash";

<template>
    <div class="h-100 w-100 ">
        <div class=" w-100 pb-3 fondoHeader">
            <div class="row h-100 w-100">
                <div class="col-12 col-md-3">
                        <img :src="'../images/logo_pizzeria.jpg'" alt='logo_pizzeira_mellizos' class="img-responsive w-100 h-100 py-1"/>
                </div>
                <div class="col-12 col-md-9">
                    <div class="row w-100"> 
                        <div class="col-md-11 col-12">
                                <h1 class="pt-4  ">PIZZERIA MELLIZOS: BIENVENIDO!</h1>
                        </div>
                     <div class="col-md-1 col-12">
                         <div class="pt-md-5">
                              <div class=" bg-light rounded-circle tamanioSVG d-flex align-items-center  justify-content-center" v-show="isLoggedIn">
                                    <button class="btn" @click="showPerfilOptions">
                                         <i class="fas fa-user fa-2x"></i>
                                    </button>
                                </div>
                                
                         <!-- <button v-show="isLoggedIn"  type="button" class="btn btn-danger" @click.prevent="logout">LOGOUT</button> -->
                         <router-link v-show="!isLoggedIn" to='/login' class='btn btn-success'><i class="far fa-plus-square pe-1"></i>LOGIN!</router-link>
                    
                         </div>
                    </div>
                </div>
                </div>
            </div>       
        </div>
        <div class="row w-100 mx-0 ">
            <div class="col-12 col-md-3 pb-3 " v-show="isLoggedIn">
                    <div class=" bg-dark text-white px-3 sticky tamanio">
                               <div class="py-2">
                                    <div class="d-flex justify-content-center mb-2 pt-2 border-bottom border-warning">
                                        <h2 class="text-center py-1">PIZZERIA MELLIZOS!</h2>
                                    </div>
                                    <ul class="list-unstyled my-3  d-flex  flex-md-column justify-content-center ">
                                        <li class="nav-item  w-100 bg-secondary py-1 my-1 d-flex justify-content-center">
                                            <router-link class="text-light fw-bold text-decoration-none py-md-2"  to="/infopage" aria-current="page" exact-active-class="active">INICIO</router-link>
                                        </li>
                                        <li class="nav-item w-100 bg-secondary py-1 my-1 d-flex justify-content-center mx-1 mx-md-0">
                                            <router-link  class="text-light fw-bold text-decoration-none py-md-2" to="/category/categories" exact-active-class="active">CATEGORIAS</router-link>
                                        </li>
                                        <li class="nav-item w-100 bg-secondary py-1 my-1 d-flex justify-content-center"> 
                                            <router-link class="text-light fw-bold text-decoration-none py-md-2" to="/products/showproducts" exact-active-class="active">PRODUCTOS</router-link>
                                        </li>
                                    </ul>
                               </div>
                </div>                  
            </div>
            <div class="col-12 col-md-9">
                 <router-view  v-on:islogin="couldLogIn" >
                  </router-view>  
            </div>
        </div>
       
    </div>
    
</template>

<script>
export default {
    data(){
        return {
            session: localStorage.getItem('session'),
            isLoggedIn: false,
            canSeePerfilOptions:false
        }
        },
    methods:{
        logout(){
            axios.post('/api/logout').then(()=>{
                localStorage.removeItem('session');
                this.isLoggedIn= false
                this.$router.push({
                    name:'login'})
            })
        },
        couldLogIn(){
            this.isLoggedIn=true;
        },
        setIsLoggedIn(){
            this.isLoggedIn=localStorage.getItem('session');
            console.log(this.isLoggedIn)
        },
        showPerfilOptions(){
            if(this.canSeePerfilOptions){
                this.canSeePerfilOptions=false;
            }else{
                this.canSeePerfilOptions=true;
            }  
        }
    },
    created(){
             this.setIsLoggedIn()
    },
    mounted(){
            this.setMainPage()
    }
}
</script>
<style scoped>
.sticky{
    position: -webkit-sticky;
    position: sticky;
    top:0;
}
.tamanio{
    height:100%;   
}

@media (min-width: 768px) {
    .tamanio{
        height: 100vh;
    }  
}
.fondoHeader{
    background-color:#2f4e6f;
}

.tamanioSVG{
    height:55px;
    width:55px;
}
</style>

