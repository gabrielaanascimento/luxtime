<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Alterar Tipo</title>
  <link rel="stylesheet" href="css/alteratipo.css">
</head>
<body>

<div class="container">
  <h3>Alteração do Tipo</h3>

  <form name="tipo" action="" method="POST">
    <label for="ftipo"><b>Tipo:</b></label>
    <select name="ftipo" id="ftipo">
      <option value="alimento">Alimento</option>
      <option value="limpeza">Limpeza</option>
      <option value="bebida">Bebida</option>
      <option value="diversos">Diversos</option>
    </select>
    <input type="submit" name="btipo" value="Alterar">
  </form>

  <a href="setprodutos.php" class="voltar">Voltar</a>
</div>

<?php
if (isset($_POST["btipo"])) {
  if (isset($_GET['id']) && is_numeric(base64_decode($_GET['id']))) {
    $id = base64_decode($_GET['id']);
  } else {
    header('Location: cadastro.php');
    exit;
  }

  require_once('conexao/conexao.php');
  $mysql = new BancodeDados();
  $mysql->conecta();
  $ptipo = $_POST['ftipo'];

  $sqlstring = "UPDATE tbproduto SET tipo='$ptipo' WHERE id=$id";
  $query = @mysqli_query($mysql->con, $sqlstring);

  if ($query) {
    echo "<script>alert('Alterou com sucesso!'); window.location.href='setprodutos.php';</script>";
  } else {
    echo "<script>alert('Não foi possível alterar o tipo'); window.location.href='setprodutos.php';</script>";
  }

  $mysql->fechar();
}
?>
</body>
</html>
