<?php
include('verficandosenha.php');
?>

<html lang="pt-br">
        <head>
            <title> Cadastro de Usuario </title>
            <link rel="stylesheet" type="text/css" href="estilo.css">
            <meta charset="utf-8">
</head>
<body>
    <form method="POST" action="cadastro.php">
    <h1>Cadastro de Usuarios</h1>
        <label>Login:</label><input type="text" name="login" id="login"><br>
        <label>Senha:</label><input type="password" name="senha" id="senha"><br>
        <button type="submit" id="cadastrar" name="cadastrar" value="Cadastrar">Cadastrar</button>
        <a href="paginainicio.php"><button type="button">Inicio</button></a>
    </form>
</body>
</html>