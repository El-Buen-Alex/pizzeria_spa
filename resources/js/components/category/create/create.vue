<template>

    <modal  :propertiesConfirmButton=confirmButton :actionConfirmButton=returnAction :canPressButton=canSave>
        <div class="row ">
            <div class="col-12">
                <div class="card" >
                    <div class="card-body">
                        <h5 class="card-title">CREAR CATEGORIA</h5>
                    </div>   
                    <div class="card-body">
                       <form @submit.prevent="addCategory" enctype="multipart/form-data" >
                           <div class="row">
                               <div class="col-12 d-flex justify-content-center pb-2">
                                    <img v-show="imagen!==''" :src="imagen" class="" style="width:200px"  :alt="imagen" > 
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
                                        <input @input="nameValidator" type="text" class="form-control" v-model="newCategory.name" placeholder="Name Category" aria-label="name-category" aria-describedby="basic-addon1" >
                                       <span class="text-danger" v-show="nameError!==''" >{{nameError}}</span>
                                    </div>
                               </div>
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-align-left"></i> Description:</span>
                                        <input type="text" class="form-control" v-model="newCategory.description" placeholder="Description" aria-label="description-category" aria-describedby="basic-addon1" @input="validateInputs">
                                    </div>
                               </div>
                           </div>
                       </form>
                    </div>
                </div>
            </div>
        </div>
    </modal>
</template>

<script>
import modal from '../../utilities/modal.vue';

export default {
    data(){      
        return{
            newCategory:{
                name: '',
                description: '',
                state:'A',
                image: '',
               
            },
            previewImage: '',
            confirmButton:{
                    class : 'btn btn-success',
                    text : 'Create Category'
            },
            nameError:'',
            canSave:false,
        }
    },
    created(){
        this.setPropDefault();
    },
    methods:{
        getImage(e){
             let file = e.target.files[0];
             this.newCategory.image=file;
            this.showPreviewImage(file)
            this.validateInputs()
        },
        showPreviewImage(file){
            let reader= new FileReader();
            reader.onload=(e=>{
                this.previewImage=e.target.result;
            })
            reader.readAsDataURL(file)
        },
        addCategory(){
            let formData = new FormData();
            formData.append('name', this.newCategory.name)
            formData.append('description', this.newCategory.description)
            formData.append('image', this.newCategory.image)
            formData.append('state', this.newCategory.state)
            formData.append('method', 'post')
            axios.post('/api/category', formData).then(response=>{
                console.log(response.data)
                this.$emit('updateCategories')
                this.$router.push({name:'showCategories'})
            }).catch(e=>{
                console.log(e)
            })
        },
        setPropDefault(){
            if(this.objectA){
                 this.newCategory=this.objectA;  
                 console.log(this.newCategory)
                 this.previewImage=this.objectA.url_img;
                 this.confirmButton={
                    class : 'btn btn-success',
                    text : 'Update Category'
                 }
            }
           
        },
        returnAction(){
            if(this.objectA){
                return this.updateCategory();
            }else{
                return this.addCategory();
            }
        },
        async updateCategory(){
            console.log("olap")
            let formData = new FormData();
            formData.append('id', this.newCategory.id)
            formData.append('name', this.newCategory.name)
            formData.append('description', this.newCategory.description)
            formData.append('image', this.newCategory.image)
            formData.append('state', this.newCategory.state)
            formData.append('method', 'put')    
             await this.axios.post(`/api/category`, formData).then(response=>{
                console.log(response.data)
                 this.$emit('updateCategories')
                 this.$router.push({name:'showCategories'})
             }).catch(e=>{
                console.log(e)
             })
        },  
        nameValidator(e){
            if(e.target.value.trim().length===0){
               this.nameError="Por favor ingrese un nombre valido (NO VACIO)**";
            }else if(e.target.value.trim().length<3){
                 this.nameError="Por favor ingrese un nombre valido (MAS DE 3 LETRAS)**";
            }else{
                this.nameError="";
            }
             this.validateInputs()
            console.log(this.nameError)
        },
        validateInputs(){
            if(this.newCategory.name.trim()=='' || this.newCategory.description=='' || this.newCategory.image==''){
                this.canSave=false
            }else{
                this.canSave=true
            }
        }
    },
    computed:{
        imagen(){
            return this.previewImage;
        }
    },
    components:{
        modal
    },
    props:{
        objectA:{
            type:Object,
        }
    }
}
</script>