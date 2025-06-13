<?php session_start(); ?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <title>Upload de Imagem - LuxTime</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="css/upload.css">
</head>
<body>

<header>
  <h1>LuxTime</h1>
  <nav>
    <a href="cadastro.php">Início</a>
    <a href="cadastro.php">Cadastro</a>
    <a href="fechar_sessao.php">Logout</a>
    <?php if (isset($_SESSION['nome'])) echo "<a href='#'>" . $_SESSION['nome'] . "</a>"; ?>
  </nav>
</header>

<main class="main">
  <div class="upload-box">
    <h2>Subindo uma imagem para o servidor</h2>
    <?php
    echo "<p><strong>Logado como:</strong> " . $_SESSION['nome'] . "</p>";
    if ($_SESSION['log'] == "ativo" && $_SESSION['nivel'] == "adm") {
      echo "<form method='post' enctype='multipart/form-data' action='Upload.php'>";
      echo "<label for='arquivo'>Selecione uma imagem:</label>";
      echo "<input name='arquivo' id='arquivo' type='file' required>";
      echo "<input type='number' id='idProd' class='idProd' name='idProd' placeholder='Digite o id do produto da imagem'><br>";
      echo "<input type='submit' value='Salvar'>";
      echo "</form>";
    } else {
      echo "<script>alert('Você não tem acesso permitido'); window.location.href='cadastro.php';</script>";
    }
    ?>
  </div>
</main>

<footer>
  &copy; 2025 LuxTime. Todos os direitos reservados.
</footer>

</body>
</html>
