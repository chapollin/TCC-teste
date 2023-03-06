<?php
include('verficandosenha.php');
?>
<!DOCTYPE html>
<html lang="pt-br">
  <head>
    <link rel="stylesheet" type="text/css" href="estilo.css">
    <title>Página Inicial</title>
    <meta charset="utf-8">
  </head>
  <body>
    <header class="header">
      <h1 class="title">Bem-vindo, <?php echo $_COOKIE["login"]; ?></h1>
      <nav class="menu">
        <ul class="menu-list">
          <li class="menu-item"><a href="cadastro1.php">Cadastro de Usuários</a></li>
          <li class="menu-item"><a href="cadastro_de_cliente1.php">Cadastro de Clientes</a></li>
          <li class="menu-item"><a href="listagem_de_usuario.php">Listagem de Usuários</a></li>
          <li class="menu-item"><a href="listagem_clientes.php">Listagem de Clientes</a></li>
          <li class="menu-item"><<a href="logout.php">Sair</a></li>
        </ul>
      </nav>
    </header>
  </body>
</html>