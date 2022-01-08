<template>
<!-- " -->
  <div class="overlay" @click="hidepopup">
        <div class="popup">
<<<<<<< HEAD
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
       
=======
            <slot />
>>>>>>> parent of 91f11b7 (create casi terminado, falta validar)
        </div>

</div>
  
</template>
<script>
export default {
    name: 'modal',
    data(){
        return{
            show:false
        }
        },
        methods:{
            showpopup(){
                this.show = true;
            },
            hidepopup(e){
                if(e.target.className!="popup"){
                     this.show=false;
                }
            }
            },
            
}
</script>
<style scoped>
.overlay{
    position:fixed;
    top:0;
    left:0;
    width:100%;
    height:100%;
    background-color:rgba(0,0,0,0.1);
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
    box-shadow:2px 5px 10px rgba(0,0,0,0.1);
}

</style>