<?php
session_start();
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Mostrar Cadastro - LuxTime</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/mostrar_cadastro.css">
</head>
<body>

<header>
  <h1>LuxTime</h1>
  <nav>
    <a href="index.php">Início</a>
    <a href="homecad.php">Nova Pesquisa</a>
    <a href="fechar_sessao.php">Logout</a>
    <?php if (isset($_SESSION['nome'])) echo "<a href='#'>" . $_SESSION['nome'] . "</a>"; ?>
  </nav>
</header>

<main class="main">
<?php
if ($_SESSION['log'] == "ativo") {
  $pnome = $_POST['fnome'];
  $ptipo = $_POST['ftipo'];
  $ppreco = $_POST['fpreco'];
  $pdescricao = $_POST['fdescricao'];
  $pquant = $_POST['fquant'];
  $pidcad = $_SESSION['id'];

  if (empty($pnome) || empty($ptipo) || empty($pdescricao)) {
    echo "<script>alert('Tem campo em branco'); window.location.href='cadastro.php';</script>";
  } else {
    echo "<h2>Mostrando os valores digitados no cadastro:</h2>";
    echo "<p><strong>Nome:</strong> $pnome</p>";
    echo "<p><strong>Nome:</strong> $ppreco</p>";
    echo "<p><strong>Tipo:</strong> $ptipo</p>";
    echo "<p><strong>Descrição:</strong> $pdescricao</p>";
    echo "<p><strong>Quantidade:</strong> $pquant</p>";    
    echo "<p><strong>Cadastrado por:</strong> {$_SESSION['nome']}</p>";

    require_once('conexao/conexao.php');
    $mysql = new BancodeDados();
    $mysql->conecta();

    $sqlstring = "INSERT INTO tbproduto(nome, preco, quantidade, tipo, descricao, id_cadastrou, status, fotoproduto)
                  VALUES ('$pnome', '$ppreco', '$pquant', '$ptipo', '$pdescricao', '$pidcad', 'verificar', 'semimagens.png')";
    $query = @mysqli_query($mysql->con, $sqlstring);

    if ($query) {
      echo "<p class='sucesso'>Cadastro efetuado com sucesso!</p>";
    } else {
      echo "<script>alert('Não foi possível cadastrar'); window.location.href='cadastro.php';</script>";
    }

    $mysql->fechar();

    echo "<div class='botoes'>";
    echo "<form action='pesquisa.php' method='POST'><input type='submit' value='Nova Pesquisa'></form>";
    echo "<form action='Uploadphp.php' method='POST'><input type='submit' value='Perfil'></form>";
    echo "<form action='fechar_sessao.php' method='POST'><input type='submit' value='Logout'></form>";
    echo "</div>";
  }
} else {
  echo "<script>alert('Você não estava logado, faça o login primeiro'); window.location.href='index.php';</script>";
}
?>
</main>

<footer>
  &copy; 2025 LuxTime. Todos os direitos reservados.
</footer>

</body>
</html>
