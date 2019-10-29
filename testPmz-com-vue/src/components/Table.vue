<template>
    <div class="tab">
        <div class="container grid">
            <div></div>
            <table id="table" >
                <thead>
                    <tr>
                    <th> Código </th>
                    <th> Nome Completo </th>
                    <th style="text-align:left;"> Registro</th>
                    <th></th>
                     <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr @click="selecionaLinha(cliente)" v-for="cliente in clientes" :key="cliente.id" :style="{backgroundColor:cliente.linha? '#F2F0F0':'white'}"> 
                        <td> {{cliente.id}} </td>
                        <td> {{cliente.nome}} </td>
                        <td style="text-align:left;"> <span  :class="cliente.registro=='1' ? 'ativo': 'inativo'"></span> </td>
                        <td v-if="cliente.linha" class="tdEditar"> <button id="btTable" @click="editar(cliente)">Editar</button>  </td>
                        <td v-else class="tdEditar">  </td>
                        <td v-if="cliente.linha"  class="tdExcluir"> <button id="btTable" @click="excluir(cliente)">Excluir</button>  </td>
                        <td v-else  class="tdExcluir">   </td>
                    </tr>    
                </tbody>
            </table>
            <div></div>
        </div>
    </div>
</template>  

<script>
import axios from 'axios'
export default {
name: "Table",
data() {
    return {
        ativo:false,
        clientes : []
    }
},
methods:{
    excluir(cliente){
        this.$emit('modal',true);
        this.$emit('excluir',cliente);
    },
    selecionaLinha(cliente){
        this.desativaTodos();
        cliente.linha = true;
    },
    desativaTodos(){
        this.clientes.forEach(cliente => {
            cliente.linha = false
        });
    },
    editar(cliente){
        this.$emit('cliente',cliente);
        this.$emit('cadastrar',true);
        this.$emit('msg2','Editar Cadastro'); 
    },
    getUsers(){
        axios.get('http://teste.pmz/api/users/getUsers')
        .then((response)=>{
            
            this.clientes = response.data.data.map((cliente) => {
                return {
                    id : cliente.id,
                    nome : cliente.nome,
                    registro : cliente.registro,
                    linha : false
                }

            });
        });
    }
},
mounted(){
    this.getUsers()
}

}
</script>

<style>

   #table{
       border: solid  0.5px #4A4A4A;
       margin-left: 8.5%;
       margin-right: 15%;
       opacity: 100%;
       border-collapse: collapse;
      background: white; 
    }
    thead{
       border-top: solid 1px #1D334B;
       margin-top: 0%;
    } 
   th{
       background: white ;
       border-top: solid 6px #1D334B;
       border-bottom: solid 2px #1D334B;
       font-family: 'Arial';
       font-weight: bold;
       color: #4A4A4A;
       height: 48px;
   }
   td{
      font-family: 'Arial','Regular';
      color: #898888;
      height: 40px;
      border-bottom:solid 1px #4A4A4A;
      text-align: center 
   }
   .tdEditar{
       width: 40px;
        text-align: left; 
        border: 2px solid blac 
   }
   .tdExcluir{
       width: 40px;
       text-align: right; 
   }
   .tab{
       margin-top: 3%;
   }

   .ativo{
    height: 20px;
    width: 20px;
    background-color: #4CC371;
    border-radius: 50%;
    display: inline-block;
   }

   .inativo{
    height: 20px;
    width: 20px;
    background-color: #F03C3C;
    border-radius: 50%;
    display: inline-block;
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

#btTable{
  
    height: 35px;
    width: 140px;
    border: solid 1px #1D334B;
    border-radius: 8px;
    padding: 0%;
    background: white;
    color:  #1D334B;
    font-weight: bold;
}

</style>
