<template>
    <div id="subheader">
       
        <section class="container grid grid-template-columns-3">
            <div id="msgBoasVindas"> <div id="msg1"> {{msg1}} <div id="msg2">{{msg2}} </div> </div></div>
            <div ></div>
            <button id="btCadastrar" @click="cadastro()" v-if="!cadastrar">Novo cadastro</button>
        </section>
         <section v-if="!cadastrar">
             <Table  @cliente="cliente=$event" @msg2="msg2=$event" @cadastrar="cadastrar=$event"/>
         </section>  
         <section v-else>
             <FormCadastro @cancelar="cadastrar=$event"  @msgSnack="msgSnack=$event" @col="color=$event"  @msg1="msg1=$event" @msg2="msg2=$event"  @snackBar="snack=$event" :cliente="cliente" />
         </section>
         
        <snackBar :snackBar="snack" :msg="msgSnack" @snackBar="snack=$event" :color="color" />
    </div>
</template>

<script>

import Table from './Table';
import FormCadastro from './FormCadastro';
import snackBar from './snackbar';
export default {
    data:function(){
       return {
           cadastrar:false,
           msg1: 'Bem vindo (a) ao ',
           msg2: 'Sistema TI',
           snack:false,
           cliente:null,
           msgSnack:" ",
           color: null
       } 
    },
    components: {
    Table,FormCadastro,snackBar
  },
    methods:{
       
         cadastro(){
            this.cliente = null;
            this.cadastrar = true;
            this.msg1 = 'Sistema TI';
            this.msg2 = 'Novo Cadastro';
        }      
    },
name: "subheader"
}
</script>

<style scoped>

#subheader{
  margin-top: 3%;
}

/* Grid Container */
.grid {
	display: grid;
}

.grid-template-columns {
	grid-template-columns: 200px 200px;
}

.grid-template-columns-3 {
	grid-template-columns: 1fr 2fr 1fr;
}
.subgrid > div {
	background: rgba(0,0,0,.3);
}


#msgBoasVindas{
    text-align: left;
    margin: 5px;
    font-family: 'Arial ';
    margin-left: 34%;

}
#msg1{
color: #4A4A4A;
text-align: left;


}
#msg2{
    font-size: 30px;
    font-family: 'Arial';
    font-weight: bold;
    text-align: left;
}

#btCadastrar{
    margin-top: 2%;
    height: 35px;
    width: 182px;
    border: solid 1px #1D334B;
    border-radius: 8px;
    padding: 0%;
    background: white;
    
}

#btCadastrar:hover {
     background: #1D334B;
     color : white;
}

</style>
