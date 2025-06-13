<?php 
session_start();
if($_SESSION['log'] != 'ativo' || $_SESSION['nivel'] != 'func') {
  echo "<script language='javascript' type='text/javascript'>
         window.location.href='login.php';
          </script>";
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8" />
  <meta name="viewport" content="width=device-width, initial-scale=1.0"/>
  <title>Painel de Controle - LuxTime</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./css/painel.css">
</head>
<body>

  <header>
    <h1>LuxTime</h1>
    <nav>
      <a href="index.php">Início</a>
      <a href="fechar_sessao.php">Sair</a>
      <?php 
      $nome = $_SESSION['nome'];
      echo "<p>$nome</p>";
      ?>
    </nav>
  </header>

  <main class="painel-container">
  <h2>Painel de Controle</h2>
<div class="botoes-acoes">
  <button id="abrirPopupProd" class="btn-painel">Cadastrar Produto</button>
  <a href="setprodutos.php" class="btn-painel">Visualizar Produtos</a>
</div>

<div class="popup-overlay" id="popupProd">
  <div class="popup-content">
    <span class="fechar" id="fecharPopupProd">&times;</span>
    <h2>Cadastro de Produto</h2>
    <form name="cadastro" action="mostrar_cadastro.php" method="POST">
      <p><b>Nome:</b><br><input type="text" name="fnome" required></p>
      <p><b>Tipo:</b><br><input type="text" name="ftipo" required></p>
      <p><b>Descrição:</b><br><input type="text" name="fdescricao" required></p>
      <br>
      <input type="submit" name="cadastrar" value="Cadastrar">
    </form>
  </div>
</div>

</main>

  <footer>
    &copy; 2025 LuxTime. Todos os direitos reservados.
  </footer>


<script>
  const abrirPopupProd = document.getElementById('abrirPopupProd');
  const fecharPopupProd = document.getElementById('fecharPopupProd');
  const popupProd = document.getElementById('popupProd');

  abrirPopupProd.addEventListener('click', () => {
    popupProd.style.display = 'flex';
  });

  fecharPopupProd.addEventListener('click', () => {
    popupProd.style.display = 'none';
  });

  window.addEventListener('click', (e) => {
    if (e.target === popup) {
      popupProd.style.display = 'none';
    }
  });

</script>

</body>
</html>
