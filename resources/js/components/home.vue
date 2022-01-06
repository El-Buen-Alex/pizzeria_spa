import { template } from "lodash";

<template>
    <div class="h-25 w-100 ">
        <div class=" w-100 pb-3">
            <div class="d-flex justify-content-between">
                <div class="row"> 
                    <div class="col-md-3 col-12">
                      
                        <img :src="'./images/logo_pizzeria.jpg'" alt='logo_pizzeira_mellizos' class="img-responsive w-100 h-100"/>
                    </div>
                   <div class="col-md-9 col-12">
                           <h1 class="pt-4  ">PIZZERIA MELLIZOS: BIENVENIDO!</h1>
                   </div>
                </div>
                <div>
                    <button v-show="isLoggedIn"  type="button" class="btn btn-danger" @click.prevent="logout">LOGOUT</button>
                    <router-link v-show="!isLoggedIn" to='/login' class='btn btn-success'><i class="far fa-plus-square pe-1"></i>LOGIN!</router-link>
                 </div>
            </div>       
        </div>
        <router-view v-on:islogin="couldLogIn" >
            
        </router-view>
    </div>
    
</template>

<script>
export default {
    data(){
        return {
            session: localStorage.getItem('session'),
            isLoggedIn: false
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
        }
    },
    created(){
             this.setIsLoggedIn()
        },
}
</script>
<style scoped>

</style>

