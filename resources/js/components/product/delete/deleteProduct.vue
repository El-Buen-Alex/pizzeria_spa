<template>
    <modal :actionConfirmButton="deleteProduct" :propertiesConfirmButton="confirmButton" :canPressButton="canPressButton">
            <p class="card-text">Are you sure you want to remove the <span class="text-danger">{{productContext.name}}</span> product permanently?</p>  
        
    </modal>
</template>

<script>
import modal from '../../utilities/modal.vue'
export default {
    data() {
        return{
            confirmButton:{
                class : 'btn btn-danger',
                text : 'Delete Product'
            },
        canPressButton:true,
        }
    },
    methods: {
        async deleteProduct(){
             this.axios.delete(`/api/product/${this.productContext.id}`).then(response=>{
                this.$emit('refreshCategories')
                this.$router.push({name:'showproducts'})
            })
        }
    },
    props: {
        productContext:{
            type:Object,
            required:true
        }
    },
    components: {
        modal ,
        
    }
}
</script>