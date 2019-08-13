<template>
    <div class="tab">
        <div class="container grid">
            <div></div>
            <table id="table" >
                <thead>
                    <tr>
                    <th> Código </th>
                    <th> Nome Completo </th>
                    <th> Registro</th>
                    <th></th>
                    </tr>
                </thead>
                <tbody>
                    <tr @click="mouse=true"> 
                        <td> 022913 </td>
                        <td> Ana Souza Silva </td>
                        <td> <span class="ativo"></span> Ativo</td>
                        <td >  </td>
                    </tr>
                    <tr> 
                        <td> 022913 </td>
                        <td> Ana Souza Silva </td>
                        <td> <span class="inativo"></span> Ativo</td>
                        <td> </td>
                    </tr>

                    
                </tbody>
            </table>
            <div></div>
        </div>
    </div>
</template>  

<script>
export default {
name: "Table",
data() {
    return {
        mouse:false
    }
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

</style>
