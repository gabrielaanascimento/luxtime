<body>
<h3><center><font color="red" size=5> Salvar Foto</h3> </center>  </font>

<form name="foto" action="" method="POST">
    <b> Nome Imagem: </b>
	<input type="text" name="fotoprod">
	<br>
	<input type="submit" name="bfoto" value="Salvare">
</form>



</body>
</html>


<?php
if(isset($_POST["bfoto"])) {
	if(isset($_GET['id']) && is_numeric(base64_decode($_GET['id']))){
			$id = base64_decode($_GET['id']);
	} else {
		header('Location: cadastro.php');
	}
        require_once('conexao/conexao.php');

    	$mysql = new BancodeDados();
	   $mysql->conecta();
	   $pfoto = $_POST['fotoprod'];


			$sqlstring = "update tbproduto set fotoproduto='$pfoto' where id=$id ";

               		$query = @mysqli_query($mysql->con, $sqlstring);
          		if($query){

				echo"<script language='javascript' type='text/javascript'>alert('Alterou com sucesso !');window.location.href='cadastro.php'</script>";
      			  }else{
         			 echo"<script language='javascript' type='text/javascript'>alert('N�o foi poss�vel alterar a foto');window.location.href='cadastro.php'</script>";

		}



$mysql->fechar();
}
?>
