<template>
    <div id="subheader"  v-if="subheader">
       
        <section class="container grid grid-template-columns-3">
            <div id="msgBoasVindas"><div id="msg1"> Bem vindo (a) ao <div id="msg2">Sistema TI </div> </div></div>
            <div ></div>
            <button id="btCadastrar" @click="cadastro()">Novo cadastro</button>
        </section>
            
    </div>
</template>

<script>
export default {
    data:function(){
       return {
           cadastrar:false,
           subheader:true,
       } 
    },
    methods:{
         cadastro(){
             console.log('alou');
            return  this.subheader = false;
        }      
    },
name: "subheader"
}
</script>

<style>

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
.item {
	margin: 5px;
	background: tomato;
	text-align: center;
	font-size: 1.5em;
}

#msgBoasVindas{
    text-align: center;
    margin: 5px;
    font-family: 'Arial ';
}
#msg1{
color: #4A4A4A;
}
#msg2{
    font-size: 30px;
    font-family: 'Arial';
    font-weight: bold;
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
