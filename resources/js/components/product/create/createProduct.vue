<template>
    <modal :actionConfirmButton="saveProduct" :propertiesConfirmButton="confirmButton" :canPressButton="canPressButton">
        <formProduct :formSettings="formSettings" v-on:setCanPressButton="setCanPressButton"/>

    </modal>
</template>

<script>
 import modal from '../../utilities/modal.vue'
import formProduct from '../form/formProduct.vue'
export default {

    data(){
        return{
            confirmButton:{
                class : 'btn btn-success',
                text : 'Create Category'
            },
            canPressButton:false,
            formSettings:{
                tittle:'CREATE PRODUCT',
                productObject:{
                    name:'',
                    price:'',
                    image  :'',
                    categoryId:'0',
                }
            }
        }
    },
    methods: {
        async saveProduct(){
            const formData=new FormData();
            const newProduct=this.formSettings.productObject

            formData.append('name',newProduct.name)
            formData.append('price', newProduct.price)
            formData.append('image',newProduct.image)
            formData.append('id_prcategory',newProduct.categoryId)
            formData.append('method', 'post')

            await this.axios.post('/api/product',formData).then(response=>{
                this.$emit('refreshCategories')
                this.$router.push({name:'showproducts'})
            })

        },
        setCanPressButton(state){
            this.canPressButton=state
        }
    },
    components: {
        modal ,
        formProduct   
    }
}
</script>