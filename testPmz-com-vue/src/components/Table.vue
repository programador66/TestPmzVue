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
                    </tr>
                </thead>
                <tbody>
                    <tr> 
                        <td> 022913 </td>
                        <td> Ana Souza Silva </td>
                        <td> <span class="ativo">at</span> Ativo</td>
                    </tr>
                    <tr> 
                        <td> 022913 </td>
                        <td> Ana Souza Silva </td>
                        <td> <span class="inativo">in</span> Ativo</td>
                    </tr>
                </tbody>
            </table>
            <div></div>
        </div>
    </div>
</template>  

<script>
export default {
name: "Table"
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
