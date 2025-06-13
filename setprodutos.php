<?php
session_start();
if ($_SESSION['log'] != "ativo") {
    echo "<script>alert('Precisa estar logado para acessar o conteúdo'); window.location.href='login.php';</script>";
    exit;
}
?>

<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Visualizar Produtos - LuxTime</title>
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <meta http-equiv="refresh" content="10"> 
  <link rel="stylesheet" href="css/pesquisa.css">
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Roboto&display=swap" rel="stylesheet">

</head>
<body>

<header>
  <h1>LuxTime</h1>
   <form method="POST">
      <input type="text" name="textobusca" placeholder="Buscar por tipo" class="busca"> 
      <input type="submit" name="buscar" value="Buscar">
    </form>
  <nav>
    <a href="index.php">Início</a>
    <a href="fechar_sessao.php">Sair</a>
    <a href="#"><?php echo $_SESSION['nome']; ?></a>
  </nav>
</header>

<div class="main">

  <form action="homecad.php" method="POST">
    <input class="cadastrar" type="submit" name="Cadastrar" value="Cadastrar novo produto">
  </form>

  <?php
    require_once('conexao/conexao.php');
    $mysql = new BancodeDados();
    $mysql->conecta();

    if (isset($_POST['buscar']) && !empty($_POST['textobusca'])) {
      $pbusca = $_POST['textobusca'];
      $sqlstring = "SELECT * FROM tbproduto WHERE tipo='$pbusca'";
    } else {
      $sqlstring = "SELECT * FROM tbproduto ORDER BY nome";
    }

    $query = @mysqli_query($mysql->con, $sqlstring);

    echo "<table class='table_adm'>";
    echo "<tr>
            <th>Id</th>
            <th>Nome</th>
            <th>Status</th>
            <th>Tipo</th>
            <th>Descrição</th>
            <th>Alterar Tipo</th>
            <th>Foto</th>
          </tr>";

    while ($dados = mysqli_fetch_array($query)) {
      if($dados['status'] == 'ativo') {
      $id = base64_encode($dados['id']);
      echo "<tr>
              <td>{$dados['id']}</td>
              <td><b>{$dados['nome']}</b></td>
              <td><b>{$dados['status']}</b></td>
              <td><b>{$dados['tipo']}</b></td>
              <td><b>{$dados['descricao']}</b></td>
              <td><a href='alteratipo.php?id=$id'><img src='alterar.jpg' width='30' height='30'></a></td>
              <td><a href='alteraFoto.php?id=$id'><img src='alteraImgProduto.jpg' width='30' height='30'></a></td>
            </tr>";
      }
    }

    echo "</table>";
    $mysql->fechar();
  ?>
</div>

<footer>
  &copy; 2025 LuxTime. Todos os direitos reservados.
</footer>

</body>
</html>
