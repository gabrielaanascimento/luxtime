<body>
<h3><center><font color="red" size=5> Altera��o do Status</h3> </center>  </font>

<form name="status" action="" method="POST">
         <p><b> tipo: </b>
         <select name="fstatus">
         <option value="ativo"> Ativo </option>
         <option value="inativo"> Inativo </option>

         </select>
	<br><p>		<input type="submit" name="bstatus" value="alterar">
</form>



</body>
</html>


<?php
if(isset($_POST["bstatus"])) {
	if(isset($_GET['id']) && is_numeric(base64_decode($_GET['id']))){
			$id = base64_decode($_GET['id']);
	} else {
		header('Location: cadastro.php');
	}
        require_once('conexao/conexao.php');

    	$mysql = new BancodeDados();
	   $mysql->conecta();
	   $pstatus = $_POST['fstatus'];


			$sqlstring = "update tbproduto  set status='$pstatus' where id=$id ";

               		$query = @mysqli_query($mysql->con, $sqlstring);
          		if($query){

				echo"<script language='javascript' type='text/javascript'>alert('Alterou com sucesso !');window.location.href='cadastro.php'</script>";
      			  }else{
         			 echo"<script language='javascript' type='text/javascript'>alert('N�o foi poss�vel alterar o Status');window.location.href='cadastro.php'</script>";

		}



$mysql->fechar();
}
?>
