import { template } from "lodash";
<template>
                <div class="col-md-3 col-12 px-2 ">
                        <div>{{ category_object.id}}</div>
                        <img :src="category_object.url_img" :alt="category_object.name" class=" w-75"/>
                        <p>{{category_object.name}}</p>
                        <div class="row">
<<<<<<< HEAD
                                <button @click="$emit('sendToUpdate')"  type="button" class="col-12 btn btn-success my-1 px-1 w-75">EDITAR</button>
                                <button @click="$emit('sendCategory')" id="delete"  to='/category/deleteCategory' type="button" class="col-12 btn btn-danger my-1 px-1  w-75">ELIMINAR</button>
                        </div>
                
=======
                                <button type="button" class="col-12 btn btn-success my-1 px-1 w-75">EDITAR</button>
<<<<<<< HEAD
                                <router-link  to='/category/deleteCategory' type="button" class="col-12 btn btn-danger my-1 px-1  w-75">ELIMINAR</router-link>
                        </div>
                        <router-view></router-view>
=======
                                <!-- <router-link type="button" class="col-12 btn btn-danger my-1 px-1  w-75">ELIMINAR</router-link> -->
                        </div>
                     
>>>>>>> parent of 91f11b7 (create casi terminado, falta validar)
>>>>>>> f5f34cfa8c8540444f9a699bd4a12e3c2ab179d4
                </div>
        
</template>

<script>


export default {
        name:"categorytemplate",
        props:{
               category_object: {
                       type: Object,
                       required: true
               }
         },
         
       
}
</script>