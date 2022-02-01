import { template } from "lodash";

<template>
    <div class="h-100 w-100 ">
        
                
                    <div class=" w-100 pb-3 fondoHeader ">
                        <div class="row h-100 w-100">
                            <div class="col-12 col-md-3">
                                <div class="d-flex justify-content-center align-items-center">
                                    <img :src="'../images/logo_pizzeria.png'" alt='logo_pizzeira_mellizos' class=" w-25  py-1"/>
                                </div>
                            </div>
                            <div class="col-12 col-md-9">
                                <div class="row w-100"> 
                                    <div class="col-11 ">
                                            <h1 class="pt-4 text-light ">PIZZERIA MELLIZOS: BIENVENIDO!</h1>
                                    </div>
                                <div class="col-1" v-show="isLoggedIn">
                                    <div class="pt-md-4 pt-1">
                                        <div class=" bg-light rounded-circle tamanioSVG d-flex align-items-center  justify-content-center" v-show="isLoggedIn">
                                                <button class="btn" @click="showPerfilOptions">
                                                    <i class="fas fa-user fa-2x"></i>
                                                </button>
                                            </div>
                                        <router-link v-show="!isLoggedIn" to='/login' class='btn btn-success'><i class="far fa-plus-square pe-1"></i>LOGIN!</router-link>
                                
                                    </div>
                                </div>
                            </div>
                            </div>
                        </div>         
                    </div>
                      <div class="row w-100 mx-0">
                        <div class="col-12 col-md-2 pb-0  px-0 bg-dark " v-show="isLoggedIn">
                                <div class=" text-white px-3 sticky tamanio">
                                        <div class="py-2">
                                                <div class="d-flex justify-content-center mb-2 pt-2 border-bottom border-warning">
                                                    <h2 class="text-center py-1">PIZZERIA MELLIZOS!</h2>
                                                </div>
                                                <ul class="list-unstyled my-3  d-flex  flex-md-column justify-content-center ">
                                                    <li class="nav-item  w-100 bg-secondary py-1 my-1 d-flex justify-content-center">
                                                        <router-link class="text-light fw-bold text-decoration-none py-md-2"  to="/" aria-current="page" exact-active-class="active">INICIO</router-link>
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
                        <div class="col-12 col-md-10 ">
                            
                                <router-view  v-on:islogin="couldLogIn" ></router-view>  
                            
                            
                        </div>
                    </div>
             
         <perfilOptions v-show="canSeePerfilOptions" v-on:logout="logout" :isLoggedIn=isLoggedIn />
       
       
    </div>
    
</template>

<script>
import perfilOptions from './user/perfilOptions.vue'
export default {
    data(){
        return {
            session: localStorage.getItem('session'),
            isLoggedIn: false,
            canSeePerfilOptions:false,
            
            }
        },
    methods:{
        logout(){
            this.isLoggedIn= false
            this.showPerfilOptions()

        },
        couldLogIn(){
            this.isLoggedIn=true;
        },
        setIsLoggedIn(){
            this.isLoggedIn=localStorage.getItem('session');
        },
        showPerfilOptions(){
            if(this.canSeePerfilOptions){
                this.canSeePerfilOptions=false;
            }else{
                this.canSeePerfilOptions=true;
            }  
        },
        consoleLog(){
            console.log("eyeye")
        }
    },
    created(){
        this.setIsLoggedIn()
    },
    mounted(){
           
    },
     components:{
         perfilOptions
     }
}
</script>
<style scoped>
.sticky{
    
    position: sticky;
    top:0;
    height: 100%;  
    
}
.tamanio{
    height:100%;   
}

@media (min-width: 768px) {
    .tamanio{
     
        height: 85vh;
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

