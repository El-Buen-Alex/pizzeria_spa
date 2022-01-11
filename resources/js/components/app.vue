import { template } from "lodash";

<template>
    <main class="h-100">
        <div class="container-fluid">
                 <div class="row">
                    <div class="col-12 col-md-2">
                        <div class=" bg-dark text-white h-100 ps-3">
                            <h3>PIZZERIA MELLIZOS!</h3>
                            <ul class="border-top border-warning nav nav-pills flex-column">
                                <li class="nav-item  h-25 w-25">
                                    <router-link  to="/infopage" aria-current="page" exact-active-class="active">INICIO</router-link>
                                </li>
                                <li class="nav-item h-25">
                                    <router-link  to="/category/categories" exact-active-class="active">CATEGORIAS</router-link>
                                </li>
                                <li class="nav-item h-25"> 
                                    <router-link to="/products/showproducts" exact-active-class="active">PRODUCTOS</router-link>
                                </li>
                            </ul>
                        </div>
                    </div>
                <div class="col-12 col-md-9">
                        <router-view>

                        </router-view>
                 </div>
             </div>
        </div>
    </main>
</template>

<script>
export default {
    
}
</script>