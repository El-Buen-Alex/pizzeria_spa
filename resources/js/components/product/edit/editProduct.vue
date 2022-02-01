<template>
    <modal :actionConfirmButton="editProduct" :propertiesConfirmButton="confirmButton" :canPressButton="canPressButton">
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
                text : 'Edit Product'
            },
            canPressButton:false,
            formSettings:{
                tittle:'EDIT PRODUCT',
                productObject:{}
            }
        }
    },
    created(){
        this.setProductContext()
    },
    methods:{
        async editProduct(){
            console.log(this.formSettings.productObject)
            const formData=new FormData();
            const newProduct=this.formSettings.productObject

             formData.append('id',newProduct.id)
            formData.append('name',newProduct.name)
            formData.append('price', newProduct.price)
            formData.append('image',newProduct.image)
            formData.append('id_prCategory',newProduct.categoryId)
            formData.append('method', 'put')
            
             await this.axios.post('/api/product',formData).then(response=>{
                this.$emit('refreshCategories')
                 this.$router.push({name:'showproducts'})
             })

        },
        setProductContext(){
            this.formSettings.productObject.id=this.productContext.id
            this.formSettings.productObject.name=this.productContext.name
            this.formSettings.productObject.price=this.productContext.price
            this.formSettings.productObject.image=this.productContext.url_img
            this.formSettings.productObject.categoryId=this.productContext.id_prCategory
            console.log( this.formSettings.productObject)
        },
        setCanPressButton(state){
            this.canPressButton=state
        }
    },
    props:{
        productContext:{
            type:Object,
            required:true
        }
    },
    components: {
        modal ,
        formProduct   
    }
}
</script>