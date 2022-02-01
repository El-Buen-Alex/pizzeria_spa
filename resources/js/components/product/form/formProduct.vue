<template>
    <div class="container">
        <div class="row">
            <div class="col-12">
                <div class="card">
                    <div class="card-body">
                        <h5 class="card-title">{{formSettings.tittle}}</h5>
                    </div>   
                </div>
                <div class="card-body">
                    <form enctype="multipart/form-data" >
                            <div class="row ">
                                <div class="col-12 pb-2 d-flex justify-content-center"  v-if="image!==''" >
                                    <div class="d-flex justify-content-center"  style="width:200px; height:200px">
                                        <img :src="image" class="mh-100 mw-100 d-flex justify-content-center"  alt="imagen del producto" > 
                                    </div>
                               </div>
                                <div class="col-12 pt-1">
                                    <div class="input-group mb-3">
                                        <label class="input-group-text" for="inputGroupFile01">Image:</label>
                                        <input type="file" class="form-control" id="image_category" @change="getImage"> 
                                    </div>
                               </div>
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="fab fa-adn"></i> Name:</span>
                                        <input @input="validateInputs"  type="text" class="form-control"  placeholder="Name Category" aria-label="name-category" aria-describedby="basic-addon1" v-model="formSettings.productObject.name">
                                       <!-- <span class="text-danger" v-show="nameError!==''" >{{nameError}}</span> -->
                                    </div>
                               </div>
                               <div class="col-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-align-left"></i> Price:</span>
                                        <input @input="validateInputs" type="number" class="form-control"  placeholder="Price" aria-label="description-category" aria-describedby="basic-addon1" v-model="formSettings.productObject.price">
                                    </div>
                               </div>
                               <div class="col-12">
                                   <div class="input-group mb-3">
                                        <label class="input-group-text" for="inputGroupSelect01">Category</label>
                                        <select class="form-select" id="inputGroupSelect01" v-model="formSettings.productObject.categoryId" @change="validateInputs">
                                            <option selected disabled value="0">Choose...</option>
                                            <option v-for="category in listOfCategories" :key="category.id" :value="category.id">{{category.name}}</option>   
                                        </select>
                                    </div>
                               </div>
                            </div>
                    </form>
                </div>
            </div>
        </div>
    </div>
</template>

<script>
export default {
    name:'formProduct',
    data(){
        return {
            listOfCategories:[],
             previewImage: '',
        }
    },
    created(){
        this.getListOfCategories()
        this.setPropDefault()
    },
    methods: {
        
        async getListOfCategories(){
            await this.axios.get('/api/category').then(response=>{
                this.listOfCategories=response.data
            })
        },
        validateNotEmpty(campo){
            if(campo!==''){
                return true
            }
            return false
        },
        validateInputs(){
            if(this.formSettings.productObject.image==''){
                this.$emit('setCanPressButton',false)
                 return ;
            }
            if(!this.validateNotEmpty(this.formSettings.productObject.name)){
                this.$emit('setCanPressButton',false)
                 return ;
            }
            if(!this.validateNotEmpty(this.formSettings.productObject.price)){
                 this.$emit('setCanPressButton',false)
                 return ;
            }
            if(this.formSettings.productObject.categoryId=='0'){
                this.$emit('setCanPressButton',false)
                 return ;
            }
                this.$emit('setCanPressButton',true)
        },
         getImage(e){
             let file = e.target.files[0];
             this.formSettings.productObject.image=file;
             this.validateInputs()
             this.showPreviewImage(file) 
        },
         showPreviewImage(file){
            let reader= new FileReader();
            reader.onload=(e=>{
                this.previewImage=e.target.result;
            })
            reader.readAsDataURL(file)
        },
        setPropDefault(){
            if(this.formSettings.productObject.image!==''){
                 this.previewImage=this.formSettings.productObject.image
            }
           
        },
    },
    computed:{
        image(){
            return this.previewImage;
        }
    },
    props:{
        imagen:{
            type:String,
        },
        formSettings:{
            type:Object,
            required:true
        }
    }
}
</script>