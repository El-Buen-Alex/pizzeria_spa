<template> 
    <nav aria-label="Page navigation example my-3">
        <ul class="pagination justify-content-center">
            <li :class="'page-item '+statePrev" @click="goPrevPage">
                <a class='page-link' href="#" tabindex="-1" aria-disabled="true">Previous</a>
            </li>
            <li class=" page border border" v-for="(page, index) in pagesActive" :key="index" @click="sendRequest(page)"><button :class="buttonClass" >{{page}}</button></li>
            <li :class="'page-item '+stateNext" @click="goNextPage">
                <a class="page-link" href="#">Next</a>
            </li>
        </ul>
    </nav>
</template>

<script>
export default {
    
    data(){
        return{
            pagesActive:[1,2,3],
            actualPage:'',
            statePrev:'',
            stateNext:'',
            buttonClass:'button ',
        }
    },
    mounted(){
        this.sendRequest(1)
    },
    methods:{
        async sendRequest(page){
            await this.refreshPages(page).then(()=>{
             this.setActive(page)
                
            }) 
             this.$emit('getProductsByPaginate', page)

            this. setActualPage(page)

           
         },
         setActive(page){
             
             this.removeClassActive();
             const listPages=document.querySelectorAll(".page")
             listPages.forEach(e=>{
                 const pageElement=e.children[0].textContent
                if(pageElement==page){
                    e.classList.toggle('activo')
                    e.children[0].classList.toggle('text-light')
                }
             })
         },
         removeClassActive(){
             const elementsActive=document.querySelectorAll(".activo")
             if(elementsActive.length>0){
                 elementsActive.forEach(e=>{
                     e.classList.remove('activo')
                     e.children[0].classList.remove('text-light')
                 })
             }
         },
         setActualPage(page){
            this.actualPage=page
            this.statePrev=this.setDisableState(this.statePrev, 1)
            this.stateNext=this.setDisableState(this.stateNext,this.pagination.last_page)
         },
         setDisableState(stateToChange, limit){
             if(this.actualPage==limit){
                 return 'disabled'
             }else{
                
                  return ''
             }
         },
         goPrevPage(){
             if(this.actualPage>1){
                this.sendRequest(this.actualPage-1)
             }
         },
         goNextPage(){
             if(this.actualPage<5){
                  this. sendRequest(this.actualPage+1)
             }
         },
        async refreshPages(page){
            if(page>1 && page<this.pagination.last_page ){
                this.pagesActive=[page-1, page, page+1]
                console.log("ff")
            } 
         },
    },
    props:{
        pagination:{
            type:Object,
            required:true
        }
    }
}
</script>
<style  scoped>
.activo{
    background-color:#0d6efd;
    
}
.button {
     background-color:transparent;
     height:100%;
     border:none;
     padding: 0 15px;
}
</style>