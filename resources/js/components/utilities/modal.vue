<template>
<!-- " -->
  <div class="overlay">
        <div class="popup">
            <div class="card">
                <div class="d-flex flex-row-reverse py-1 pe-1">
                <button type="button" class="btn-close" aria-label="Close" @click="closepopup"></button>
                </div>
                <slot /> 
                <div class="pb-2 ps-2">
                    <button type="submit" :class="propertiesConfirmButton.class" @click="actionConfirmButton">{{propertiesConfirmButton.text}}</button>
                    <button class="btn btn-primary" @click="closepopup">Cancel</button>    
                </div> 
            </div>       
        </div>
</div>
  
</template>
<script>
export default {
    name: 'modal',
    data(){
        return{
            show:false,
        }
    },
    props:{
        actionConfirmButton:{
            type:Function,
            
        },
        propertiesConfirmButton:{
            type:Object,
        }
    },
    methods:{ 
        closepopup(e){
        const modal=e.target.parentNode.parentNode.parentNode;
        modal.style.display="none"
        this.$router.go(-1)
        },
        
    },
    
            
}
</script>
<style>
.overlay{
    
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background-color:rgba(0,0,0,0.384);
    display:flex;
    justify-content:center;
    align-items:center;
}
.popup{
    
    position: absolute;
    width:80%;
    max-width: 512px;
    background-color:white;
    padding:1rem;
    border-radius: 0.5rem;
    box-shadow:2px 5px 10px rgba(0,0,0,0.2);
}

</style>