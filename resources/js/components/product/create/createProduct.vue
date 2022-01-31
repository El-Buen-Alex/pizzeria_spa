<template>
    <modal :actionConfirmButton="saveProduct" :propertiesConfirmButton="confirmButton" :canPressButton="canPressButton">
        <p>hola</p>

    </modal>
</template>

<script>
import modal from '../../utilities/modal.vue'
export default {

    data(){
        return{
            confirmButton:{
                class : 'btn btn-success',
                text : 'Create Category'
            },
            canPressButton:false,
        }
    },
    methods: {
        saveProduct(){
            console.log("hola")
        }
    },
    
    components: {
        modal    
    }
}
</script>