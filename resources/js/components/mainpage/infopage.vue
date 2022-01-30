<template>
    
             <div class="container h-100 pt-5" v-show="user">
                <h1 class="d-flex justify-content-center pt-2 my-2">BIENVENIDO {{user.name}}!</h1>
                <div class="container h-auto">
                    <div class="d-flex justify-content-center my-5">
                        <p>AQUÍ ENCONTRARÁ INFORMACIÓN ACERCA DE SUS FUNCIONES Y ACTIVIDADES QUE PUEDE LLEVAR A CABO EN ESTA HERRAMIENTA</p>
                    </div>
                    <div class="row h-100">
                        <div class="col-12 col-md-4 ">
                            <div class="card py-2 boxInfo">
                                <div class="d-flex justify-content-center">
                                    <i class="fas fa-user fa-7x"></i>
                                </div>
                                <p class="text-center">En la sección denominada "Mi Perfil" podrá encontrar funcionalidades relacionadas a cerrar sesión y 
                                    podrá visibilizar su nombre.
                                </p>
                            </div>
                            
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="card py-2 boxInfo">
                                <div class="d-flex justify-content-center">
                                    <i class="fas fa-list fa-7x" ></i>
                                </div>
                                <p class="text-center mt-2">En la seccion de Categorias podrás Crear, Editar, Ver y Eliminar Categorias.</p>
                            </div>
                        </div>
                        <div class="col-12 col-md-4">
                            <div class="card py-2 boxInfo">
                                <div class="d-flex justify-content-center">
                                    <i class="fal fa-burger-soda fa-7x"></i>
                                </div>
                             <p class="text-center mt-2">En la seccion de Productos podrás Crear, Editar, Ver y Eliminar productos.</p>
                        </div>
                     </div>
                        
                 </div>
             </div>
         </div>
</template>

<script>
export default {
    data(){
        return{
            user:null,
        }
    },
    created() {
        this.getUserLoggedIn()
    },
    methods: {
        getUserLoggedIn(){
            this.user=JSON.parse(localStorage.getItem('userLogged'))
        }
    },
}
</script>
<style>
.boxInfo{
    height: 250px;
    margin:2% 0%;
}
@media (min-width: 768px) {
    .boxInfo{
    height: 225px;
    margin:0%;
}  
}


</style>