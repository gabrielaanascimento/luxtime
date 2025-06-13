<?php
session_start();
if ($_SESSION['log'] != "ativo"){


echo"<script language='javascript' type='text/javascript'>alert('Precisa esta logado para acessar o conte�do');window.location.href='index.php';</script>";
}
?>
<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <link rel="stylesheet" href="css/produto.css">
  <title>Produto - LuxTime</title>
</head>
<body>

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

  const produtos = []

  const carrinho = (nome, valor) => {
      console.log(nome);
      
  }



</script>

<header>
  <h1>LuxTime</h1>
  <nav>
    <a href="index.php">Início</a>
    <a href="index.php">carrinho</a>
    <a href="fechar_sessao.php">Logout</a>
    <a href='#'>Gabriel Augusto</a>
  </nav>
</header>

  <div class="container">

  <?php 
  require_once('conexao/conexao.php');
  $mysql = new BancodeDados();
	$mysql->conecta();
  $pid = $_GET['id'];
  $sqlstring = 'select * from tbproduto  where id='.$pid;
  $query = @mysqli_query($mysql->con, $sqlstring);
  while($dados=mysqli_fetch_array($query)) {
	
		$pstatus = $dados['status'];
    $pfoto = $dados['fotoproduto'];
    $ppreco = $dados['preco'];
    $pquant = $dados['quantidade'];
    $pnome = $dados['nome'];
    $pdesc = $dados['descricao'];
		if($pstatus == 'ativo') {
      echo "<div class='principal produto'>";
      echo "<img src='imgproduto/$pfoto' alt='Produto'>";
      echo "<p class='price'>R$ $ppreco</p>";
      echo "<p class='quant'><b>Quantidade:</b> $pquant</p>";
      echo "</div>";

      echo "<div class='principal descricao'>";
      echo "<p class='nome'>$pnome</p>";
      echo "<p class='text_desc'>$pdesc</p>";
		}
	}

	$mysql->fechar();
  ?>
      <div class="botoes">
      <?php 
      echo "<button onclick='carrinho($pnome,$ppreco)' class='carrinho'>Adicionar ao carrinho</button>"
      ?>      
        <a href="#" class="comprar">Comprar agora</a>
        <button id="abrirPopupProd" class="btn-painel">Cadastrar Produto</button>

      </div>
    </div>
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

<footer>
    &copy; 2025 LuxTime. Todos os direitos reservados.
</footer>


</body>
</html>
