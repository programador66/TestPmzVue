<template>
    <div class="tabForm">
        <div class="container grid ">
         <div></div>
           <div class="form container grid grid-template-columns-3">
                <div id="FormNome">
                    <div id="nomeCompleto"> Nome Completo </div>
                    <div><input type="text" id="nome" :value="(cliente) ? cliente.nome : '' "/></div>
                </div>
                <div id="FormRegistro">
                    <div id="registro"> Registro </div>
                    <div id="checkRegistro"><input type="checkbox" id="reg" :value="(cliente) ? cliente.registro : 'inativo'" /></div>
                </div>
                <div id="FormSalvar">
                    <span><button id="bt" @click="cancelar()">Cancelar</button></span>
                    <span style="margin-left:3.5%;"><button id="btSalvar" @click="salvar">Salvar Cadastro</button></span>
                </div>
           </div>
            <div></div>
        </div>
    </div>
</template>  

<script>
export default {
name: "FormCadastro",
data(){
    return {

    }
},
props:[
    'cliente'
],
methods:{
    cancelar() {
        this.$emit('cancelar',false);
        this.$emit('msg1','Bem vindo (a) ao');
        this.$emit('msg2','Sistema TI');
    },
    salvar() {
         this.$emit('snackBar',true);
    }
}
}
</script>

<style>

   .form{
       /* border: solid  1px #4A4A4A; */
       padding-top: 4.5%;
       padding-left: 2.5%;
    }
   
   
   .tabForm{
       margin-top: 3%;
       border: solid  1px #4A4A4A;
       margin-left: 8.5%;
       margin-right: 15%;
       height: 180px;
       border-top: solid 6px #1D334B;
   }

   #nomeCompleto{
       margin-bottom: 2%;
   }
   #FormNome #nomeCompleto{
       font-family: 'Arial';
       font-weight: bold;
       color: #4A4A4A;
   }

    #FormRegistro{
        margin-left: 15%;
        margin-right: 8%;
    }

    #registro{
        font-family: 'Arial';
       font-weight: bold;
       color: #4A4A4A; 
    }
 

    input[type=checkbox] :before{
      
        border: 0.1em solid #000;
        border-radius: 0.2em;
        width: 1em;
        height: 1em;
        color: transparent;
    }
    input[type=checkbox] :active:before{
        
       transform: scale(0);
        }
     input[type=checkbox]:checked :before{
       background-color:mediumseagreen;
       border-color: mediumseagreen;
       color: #fff;
       transition: .2s;
    }

   #nome{
       width: 600px;
       height: 38px;
       font-size: 20px;
   } 

   .ativo{
       border-radius: 50%;
       border: solid 1px #4CC371;
       background-color: #4CC371;
       color: #4CC371; 
   }

   .inativo{
       border-radius: 50%;
       border: solid 1px #F03C3C;
       background-color: #F03C3C;
       color: #F03C3C; 
   } 

    #FormSalvar{
        padding-right: 0%;
        margin-left: 10%;
     
    }

/* Grid Container */
.grid {
	display: grid;
}

.grid-template-columns {
	grid-template-columns: 200px 200px;
}

.grid-template-columns-3 {
	grid-template-columns: 1fr 2fr 2fr;
}
.subgrid > div {
	background: rgba(0,0,0,.3);
}

#bt{
    margin-top: 2%;
    height: 35px;
    width: 102px;
    border: solid 1px #1D334B;
    border-radius: 8px;
    padding: 0%;
    background: white;
    
}


#btSalvar{
    margin-top: 2%;
    height: 35px;
    width: 150px;
    border: solid 1px #1D334B;
    border-radius: 8px;
    padding: 0%;
    background: white;
    font-weight: bold;
    
}

#bt:hover {
     background: #1D334B;
     color : white;
}

#btSalvar:hover {
     background: #1D334B;
     color : white;
      font-weight: bold;
}

</style>
