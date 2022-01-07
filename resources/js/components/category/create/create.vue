<template>
    <modal class="container" >
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
                                    <img v-show="imagen!==''" :src="imagen" class="" style="width:200px"  :alt="imagen"> 
                                    <img  :src="'../../../../storage/images/navidad/59VtVkckh8AeoZP4FS5orMmV6Yp5J1LxNKRg3J8Y.jpg'" class="" style="width:200px"  alt="ola"> 
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
                                        <input type="text" class="form-control" v-model="newCategory.name" placeholder="Name Category" aria-label="name-category" aria-describedby="basic-addon1">
                                    </div>
                               </div>
                                <div class="col-12">
                                    <div class="input-group mb-3">
                                        <span class="input-group-text" id="basic-addon1"><i class="fas fa-align-left"></i> Description:</span>
                                        <input type="text" class="form-control" v-model="newCategory.description" placeholder="Description" aria-label="description-category" aria-describedby="basic-addon1">
                                    </div>
                               </div>
                                <div class="col-12">
                                    <button type="submit" class="btn btn-success" >SAVE</button>
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
        }
    },
    methods:{
        getImage(e){
             let file = e.target.files[0];
             this.newCategory.image=file;
            this.showPreviewImage(file)
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
            axios.post('/api/category', formData).then(response=>{
                console.log(response.data)
            })
        }
    },
    computed:{
        imagen(){
            return this.previewImage;
        }
    },
    components:{
        modal
    }
}
</script>