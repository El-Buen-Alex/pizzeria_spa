<template>
    <modal-vue :actionConfirmButton=deleteCategory :propertiesConfirmButton=confirmButton>
        
            <h5 class="card-header">DELETE</h5>
            <div class="card-body">
                <h5 class="card-title">DELETE CATEGORY</h5>
                <p class="card-text">Are you sure you want to remove this category permanently?</p>
               
            </div>
      
    </modal-vue>
</template>

<script>
import modalVue from '../../utilities/modal.vue'

export default {
    data() {
        return{
            confirmButton:{
                class : 'btn btn-danger',
                text : 'Delete Category'
            }
        }
    },
    components: {
        modalVue,
    },
    methods: {
        deleteCategory(e){
            console.log(e)
        }
    }
}
</script>