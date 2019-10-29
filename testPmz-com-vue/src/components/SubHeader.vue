<template>
    <div id="subheader">
       
        <section class="container grid grid-template-columns-3">
            <div id="msgBoasVindas"> <div id="msg1"> {{msg1}} <div id="msg2">{{msg2}} </div> </div></div>
            <div ></div>
            <button id="btCadastrar" @click="cadastro()" v-if="!cadastrar">Novo cadastro</button>
        </section>
         <section v-show="!cadastrar">
             <Table  
                @cliente="clienteEdit = $event" 
                @msg2="msg2=$event" 
                @cadastrar="cadastrar=$event"
                @snackBar="snack=$event" 
                @msgSnack="msgSnack=$event" 
                @col="color=$event" 
                @modal="modal($event)"
                @excluir="cliente=$event"
            />
         </section>  
         <section v-show="cadastrar">
            <FormCadastro 
                @cancelar="cadastrar=$event" 
                @msgSnack="msgSnack=$event" 
                @col="color=$event"  
                @msg1="msg1=$event"
                @msg2="msg2=$event" 
                @snackBar="snack=$event"
                :cliente="cliente" 
                :clienteEditar="clienteEdit"
             />
         </section>
         
         <section>
             <div class="w3-container">
                <div id="id01" class="w3-modal" >
                    <div class="w3-modal-content w3-animate-top w3-card-4" style="width:600px;">
                    <header class="w3-container pmz"> 
                        <span onclick="document.getElementById('id01').style.display='none'" 
                        class="w3-button w3-display-topright" >&times;</span>
                        <h2>Excluir Usuário</h2>
                    </header>
                    <div class="w3-container" style="height:150px;">
                        <p>Tem certeza que deseja excluir o usuário?</p>
                        <button class="decisao" onclick="document.getElementById('id01').style.display='none'">Não</button>
                        <button class="decisao" @click="excluir()">Sim</button>
                    </div>
                   
                    </div>
                </div>
                </div>
         </section>

        <snackBar :snackBar="snack" :msg="msgSnack" @snackBar="snack=$event" :color="color" />
    </div>
</template>

<script>

import Table from './Table';
import FormCadastro from './FormCadastro';
import snackBar from './snackbar';
import axios from 'axios';

export default {
    name: "subheader",
    components: {
    Table,FormCadastro,snackBar
    },
    data:function(){
       return {
           cadastrar:false,
           msg1: 'Bem vindo (a) ao ',
           msg2: 'Sistema TI',
           snack:false,
           clienteEdit:null,
           msgSnack:" ",
           color: null,
           cliente:[]
       } 
    },
    methods:{
        cadastro(){
            this.cliente = null;
            this.cadastrar = true;
            this.msg1 = 'Sistema TI';
            this.msg2 = 'Novo Cadastro';
        },
        modal(modal){
            if (modal) {
                document.getElementById('id01').style.display='block';
            }   
        },
        excluir(){
            document.getElementById('id01').style.display='none';
            axios.post('http://teste.pmz/api/users/delUsers',{id:this.cliente.id})
            .then((response) => {
                this.snack = true;
                this.msgSnack = response.data.message;
                this.color = true;
                setTimeout(() => {
                    window.location.reload();
                },2000);
            })
            .catch((error) => {
                this.snack = true;
                this.msgSnack = error.message;
                this.color = false;
            });  
        }      
    }
}
</script>

<style scoped>
.pmz{
    background: #1D334B;
    color : white;
}

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

.decisao{
   margin-top: 2%;
    height: 35px;
    width: 182px;
    border: solid 1px #1D334B;
    border-radius: 8px;
    padding: 0%;
    background: white; 
}
.decisao:hover{
    background: #1D334B;
    color : white;
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
