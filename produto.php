<html>
<head>
	<title> Produto </title>
	<meta http-equiv="Content-Type" content="text/html; charset=iso-8859-1">
	<meta http-equiv="Content-Type" content="text/html; charset=utf-8">
	<meta http-equiv="refresh" content="10"> 
</head>
<body bgcolor="grey">

<?php
session_start();
if ($_SESSION['log'] != "ativo"){


echo"<script language='javascript' type='text/javascript'>alert('Precisa esta logado para acessar o conte�do');window.location.href='index.php';</script>";
}
?>

 <?php

       require_once('conexao/conexao.php');
	//criando o objeto mysql e conectando ao banco de dados
	$mysql = new BancodeDados();
	$mysql->conecta();
    $pid = $_GET['id'];
    $sqlstring = 'select * from tbproduto  where id='.$pid;
    $query = @mysqli_query($mysql->con, $sqlstring);


	while($dados=mysqli_fetch_array($query)) {
	
		$pstatus = $dados['status'];
		if($pstatus == 'ativo') {

		echo "<tr>";
		echo "<b>". $dados['id']."</b><br>";
		echo "<b>". $dados['nome']."</b><br>";
		echo "<b>". $dados['tipo']."</b><br>";
		echo "<b>". $dados['descricao']."</b><br>";

        $pfoto = $dados['fotoproduto'];
        echo "<img src='./imgproduto/$pfoto' height=100 weigth=50 >";
  	
		}
	}

	$mysql->fechar();

?>

<a href="principal.php">Voltar</a>

</body>
</html>
