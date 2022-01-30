<template>
    <div class="bg-light boxPerfil p-1 border border-secondary">
        <button  v-show="isLoggedIn"  type="button" class="btn btn-danger w-auto" @click.prevent="logout">LOGOUT</button>
    </div>
   

</template>

<script>
export default {
    methods:{
        logout(){
             axios.post('/api/logout').then(()=>{
                localStorage.removeItem('session');
                this.$router.push({
                    name:'login'})
            })
            this.$emit("logout")
        }
    },
    props: {
        isLoggedIn:{
            type:String
        }
    }
}
</script>

<style>

.boxPerfil{
   position: absolute;
    right: 20px;
   top:255px;
    height:auto;
    z-index: 1;
}

@media (min-width: 768px) {
    .boxPerfil{
    position: absolute;
        right: 20px;
        top:80px;
        height:auto;
        z-index: 1;
}
}
</style>