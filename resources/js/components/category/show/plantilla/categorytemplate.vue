import { template } from "lodash";
<template>
                <div class="col-md-3 col-12 px-2">
                        <div>{{ category_object.id}}</div>
                        <img :src="category_object.url_img" :alt="category_object.name" class=" w-75"/>
                        <p>{{category_object.name}}</p>
                        <div class="row">
                                <button type="button" class="col-12 btn btn-success my-1 px-1 w-75">EDITAR</button>
                                <router-link type="button" class="col-12 btn btn-danger my-1 px-1  w-75">ELIMINAR</router-link>
                        </div>
                        <div>
                                <router-view>
                                        
                                </router-view>
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