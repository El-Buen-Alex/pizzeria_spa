<template>
    <div class="col-12 col-md-3  my-1 ">
        <div class="card h-100">
             <!-- <p> {{productObject.name}}</p> -->
            <div class="d-flex justify-content-center mt-2 h-50">
                <img :src="productObject.url_img" class="mh-100 mw-100" /> 
            </div >
            <div class="h-50 w-100">
                 <p class="d-flex justify-content-center">${{productObject.price}}</p>
                 <div class="container">
                      <div class="row flex justify-content-center ">
                        <button   type="button" class="col-12 btn btn-success my-1 px-1 ">EDITAR</button>
                        <button  id="delete"  type="button" class="col-12 btn btn-danger my-1 px-1 ">ELIMINAR</button>
                      </div>
                 </div>
                
            </div>
        </div>
    </div>

</template>
 <script>
 export default {
     

     props: {
         productObject:{
             type:Object,
             required:true
         }
     },
 }
 </script>
 <style>
 .boxCategory{
        height: 300px;
}
 </style>