<template>
   <div class="d-flex justify-content-center align-items-center p-2  mt-5 pt-5 position">
        <div class="d-flex flex-column bd-highlight mb-3 card px-2 background-transparent w-25 login">
        <header>
            <h2 class="text-light">SIGN IN</h2>
        </header>
        <div>
            <span class="form-label text-light">Email:</span>
                <div class="row">
                    <div class="col-1 bg-warning bg-gradient rounded-start ms-2">
                        <i class="fas fa-user-tie"></i>
                    </div>
                    <div class="col-10 ms-0">
                        <input type="email" class="form-control " v-model.trim="user.email"/>
                    </div>
                </div>
               
            </div>
            <div class="mb-2">
                <span class="form-label text-light">Password:</span>
                <div class="row">
                    <div class="col-1 bg-warning bg-gradient rounded-start ms-2">
                        <i class="fas fa-key "></i>
                    </div>
                    <div class="col-10 rounded-end">
                        <input class="form-control" type="password" v-model.trim="user.password"/>
                    </div>
                </div>
            </div>
            <div class="d-grid gap-2 my-3">
                <button class="btn btn-success" type="submit" @click="signIn" >LOGIN</button>
            </div>
        </div>
   </div>
    
</template>

<script>
export default {
    data(){
        return {
            user:{
                email:'',
                password:''
            },
            errors:[]
        }
    },methods:{
        signIn(){
            axios.post('/api/login', this.user).then((response)=>{
                this.$emit('islogin');
                localStorage.setItem('session',true);
                localStorage.setItem('userLogged',JSON.stringify(response.data))
                this.$router.push({name:'infopage'})
            }).catch(error=>{
                this.errors=error.response.data.errors;
            })

            }
        }
    }

</script>
<style scoped>
 .background-transparent{
     background-color: rgba(0,0,0,0.5)
 }
 .login{
     min-width: 400px;
 }
 @media (min-width:768px) {
        .position{
     position: absolute;
     top: 25%;
     left: 35%;
 } 
 }
 
</style>