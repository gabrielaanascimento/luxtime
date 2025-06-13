<!DOCTYPE html>
<html lang="pt-BR">
<head>
  <meta charset="UTF-8">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>Login - LuxTime</title>
  <link href="https://fonts.googleapis.com/css2?family=Playfair+Display:wght@500;700&family=Roboto&display=swap" rel="stylesheet">
  <link rel="stylesheet" href="./css/login.css">
</head>
<body>

<a href="index.php" class="voltar-btn" style="position: absolute; top: 20px; left: 20px; text-decoration: none; color: #fff; display: flex; align-items: center; gap: 8px;">
  <svg xmlns="http://www.w3.org/2000/svg" width="24" height="24" fill="#fff" viewBox="0 0 24 24">
    <path d="M15 18l-6-6 6-6"/>
  </svg>
  Voltar
</a>

<div class="container">
  <form class="login-box" action="entrada.php" method="POST">
    <h2>Bem-vindo de volta</h2>
    <p>Faça login para continuar</p>

    <label for="usuario" style="display: none;">Usuário</label>
    <input type="text" id="usuario" name="usuario" placeholder="Usuário" required>

    <label for="senha" style="display: none;">Senha</label>
    <input type="password" id="senha" name="senha" placeholder="Senha" required>

    <button type="submit">Entrar</button>

    <a href="#">Esqueceu a senha?</a>
  </form>
</div>

</body>
</html>
