<?php
include('verficandosenha.php');

if ($_SERVER["REQUEST_METHOD"] == "POST") {
    $nome = $_POST["nome"];
    $cpf = $_POST["cpf"];
    $endereco = $_POST["endereco"];
    $telefone = $_POST["telefone"];
    $email = $_POST["email"];
    $devendo = $_POST["devendo"];

    $connect = mysqli_connect("localhost", "root", "", "gestao");

    $stmt = mysqli_prepare($connect, "INSERT INTO clientes (nome, cpf, endereco, telefone, email, devendo) VALUES (?, ?, ?, ?, ?, ?)");
    mysqli_stmt_bind_param($stmt, "sssss", $nome, $cpf, $endereco, $telefone, $email);
    mysqli_stmt_execute($stmt);

    mysqli_close($connect);

    echo "Cadastro realizado com sucesso!";
} else {
    echo "Erro ao processar cadastro.";
}

?>