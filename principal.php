<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <title>Loja de Relógios</title>
    <meta http-equiv="refresh" content="15">
    <link rel="stylesheet" href="css/principal.css">
</head>
<body>

<?php
session_start();
if ($_SESSION['log'] != "ativo") {
    echo "<script>alert('Você precisa estar logado para acessar a loja.');window.location.href='login.php';</script>";
    exit;
}
?>

<nav>
    <div class="logo">LuxTime</div>
    <form action="" method="POST" class="form-busca">
        <input type="text" name="textobusca" placeholder="Buscar por tipo (ex: esportivo)">
        <input type="submit" name="buscar" value="Buscar">
    </form>
    <form action="fechar_sessao.php" method="POST" class="form-logout">
        <input type="submit" name="sair" value="Sair">
    </form>
</nav>

<main>
    <h2>Catálogo de Relógios</h2>
    <hr>

    <?php
    require_once('conexao/conexao.php');

    $mysql = new BancodeDados();
    $mysql->conecta();

    if (isset($_POST['buscar']) && !empty($_POST['textobusca'])) {
        $pbusca = mysqli_real_escape_string($mysql->con, $_POST['textobusca']);
        $sqlstring = "SELECT * FROM tbproduto WHERE tipo LIKE '%$pbusca%'";
    } else {
        $sqlstring = 'SELECT * FROM tbproduto ORDER BY nome';
    }

    $query = mysqli_query($mysql->con, $sqlstring);

    if (mysqli_num_rows($query) > 0) {
        echo "<div class='grid-produtos'>";
        while ($dados = mysqli_fetch_assoc($query)) {
            if ($dados['status'] === 'ativo') {
                $id = $dados['id'];
                $pfoto =$dados['fotoproduto'];
                echo "<div class='produto'>";
                echo "<img src='imgproduto/$pfoto' height=100 weigth=50 alt='Relógio' class='produto-img'>";
                echo "<h3>" . htmlspecialchars($dados['nome']) . "</h3>";
                echo "<p><strong>Tipo:</strong> " . htmlspecialchars($dados['tipo']) . "</p>";
                echo "<p>" . htmlspecialchars($dados['descricao']) . "</p>";
                echo "<a href='mostra.php?id=$id' class='botao'>Ver detalhes</a>";
                echo "</div>";
            }
        }
        echo "</div>";
    } else {
        echo "<p>Nenhum relógio encontrado.</p>";
    }

    $mysql->fechar();
    ?>
</main>

</body>
</html>
