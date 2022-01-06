import { template } from "lodash";

<template>
    <main class="h-100">
        <div class="row h-100">
            <div class="col-12 col-md-2">
                <div class=" bg-dark text-white h-100 ps-3">
                    <h3>PIZZERIA MELLIZOS!</h3>
                    <ul class="border-top border-warning nav nav-pills flex-column">
                        <li class="nav-item  h-25 w-25">
                            <router-link  to="/" aria-current="page">INICIO</router-link>
                        </li>
                        <li class="nav-item h-25">
                            <router-link  to="/category/categories" >CATEGORIAS</router-link>
                        </li>
                        <li class="nav-item h-25"> 
                            <router-link to="/products/showproducts">PRODUCTOS</router-link>
                        </li>
                    </ul>
                </div>
            </div>
            <div class="col-12 col-md-10 border border-1">
                <router-view>

                </router-view>
             </div>
        </div>
        
       
    </main>
</template>

<script>
export default {
    
}
</script>