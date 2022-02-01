<template>
    <div class="col-12 col-md-3 boxCategory  py-1 my-1">
        <div class="card h-100">
            <div class=" boxHeader">
                <div class="divCategoryName d-flex justify-content-center bg-warning ">
                     <p class="fw-bold">Category: {{productObject.name_category}}</p>
                </div>
                <div class="divImg d-flex justify-content-center pt-1">
                    <img :src="productObject.url_img" class="mh-100 mw-100" /> 
                </div>
            </div >
            <div class="boxFooter w-100 mt-1">
                <div class="d-flex justify-content-center">
                    <p class=" py-0 my-0 ">${{productObject.price}}</p>
                    <p class="py-0 my-0"> - {{productObject.name}}</p>
                </div>
                 <div class="container my-0 py-0">
                      <div class="row flex justify-content-center ">
                        <button   type="button" class="col-12 btn btn-success my-1 px-1" @click="sendToEdit">EDITAR</button>
                        <button  id="delete"  type="button" class="col-12 btn btn-danger my-1 px-1 " @click="sendToDelete">ELIMINAR</button>
                      </div>
                 </div>
                
            </div>
        </div>
    </div>

</template>
 <script>
 
 export default {
     
     methods:{
         sendToEdit(){
             this.$emit('sendToEdit',this.productObject)
         },
         sendToDelete(){
             this.$emit('sendToDelete', this.productObject)
         }
     },

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
.divCategoryName{
    height:15%;
}
.divImg{
    height: 85%;
}
.boxHeader{
    height: 55%;
}
.boxFooter{
    height:35%;
}
 </style>