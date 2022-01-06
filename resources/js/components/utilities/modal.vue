<template>

  <div class="overlay" v-if="show" @click="hidepopup">
        <div class="popup">
            <h1>content</h1>
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
            }
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