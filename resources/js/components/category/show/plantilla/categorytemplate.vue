import { template } from "lodash";
<template>
                <div class="col-md-3 col-12 mb-2 card box pt-2  me-3">
                        <div class="d-flex justify-content-center mt-2">
                                 <img :src="category_object.url_img" :alt="category_object.name" class="img-template  "/>
                        </div>
                        <p class="py-0 my-0 d-flex justify-content-center ">{{category_object.name}}</p>
                        <div class="row flex justify-content-center">
                                <button @click="$emit('sendToUpdate')"  type="button" class="col-12 btn btn-success my-1 px-1 w-75">EDITAR</button>
                                <button @click="$emit('sendCategory')" id="delete"  to='/category/deleteCategory' type="button" class="col-12 btn btn-danger my-1 px-1  w-75">ELIMINAR</button>
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
<style scoped>
.img-template{
        
        height: 100%;
        max-height: 155px; 
}
.box{
        height: 300px;
}
</style>