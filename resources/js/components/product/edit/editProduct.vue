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
        editProduct(){
            console.log("hola")
        },
        setProductContext(){
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