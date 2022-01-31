import { template } from "lodash";
<template>
                <div class="col-12 col-md-3 box py-1 ">
                        <div class="card h-100">
                                 <div class="d-flex justify-content-center mt-2 h-50">
                                        <img :src="category_object.url_img" :alt="category_object.name" class="mh-100 mw-100"/>
                                 </div>
                                 <div class="h-50">
                                        <p class=" d-flex justify-content-center ">{{category_object.name}}</p>
                                        <div class="container">
                                                 <div class="row flex justify-content-center">
                                                        <button @click="$emit('sendToUpdate')"  type="button" class="col-12 btn btn-success my-1 px-1 ">EDITAR</button>
                                                        <button @click="$emit('sendCategory')" id="delete"   type="button" class="col-12 btn btn-danger my-1 px-1 ">ELIMINAR</button>
                                                 </div>
                                        </div>
                                       
                                </div>
                       
                        </div>  
                       
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
<style >
.img-template{
        
        height: 100%;
        max-height: 155px; 
}
.box{
        height: 300px;
}
</style>