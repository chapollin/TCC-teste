<?php
include('verficandosenha.php');
?>

<!DOCTYPE html>
<html>
<head>
  <meta charset="UTF-8">
  <title>Tabela de Clientes</title>
  <link rel="stylesheet" href="estilo.css">
</head>
<body>
<div class="table-wrapper">
  <h1>Lista de Clientes</h1>
<?php

// Informações de conexão com o banco de dados
$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestao";

// Criando uma conexão com o banco de dados
$conn = new mysqli($servername, $username, $password, $dbname);

// Verificando se a conexão foi estabelecida com sucesso
if ($conn->connect_error) {
  die("Falha na conexão: " . $conn->connect_error);
}

// Verificando se foi enviado um ID de cliente para exclusão
if (isset($_GET['id'])) {
  $id = $_GET['id'];
  // Query SQL para excluir o cliente correspondente ao ID informado
  $sql = "DELETE FROM `clientes` WHERE `id` = '$id'";
  if ($conn->query($sql) === TRUE) {
    echo "Cliente excluído com sucesso.";
  } else {
    echo "Erro ao excluir o cliente: " . $conn->error;
  }
}

// Query SQL para buscar as informações dos usuários
$sql = "SELECT `id`, `nome`, `cpf`, `endereco`, `email`, `telefone` FROM `clientes`";
$result = $conn->query($sql);

// Verificando se foram encontrados registros
if ($result->num_rows > 0) {
  // Exibindo as informações em uma tabela HTML
  echo "<table class='clientes-table'>";
  echo "<thead><tr><th>Nome</th><th>CPF</th><th>Endereço</th><th>Email</th><th>Telefone</th><th></th></tr></thead>";
  echo "<tbody>";
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["nome"] . "</td><td>" . $row["cpf"] . "</td><td>" . $row["endereco"] . "</td><td>" . $row["email"] . "</td><td>" . $row["telefone"] . "</td>" ;
    echo "<td><a href='listagem_clientes.php?id=" . $row["id"] . "' onclick=\"return confirm('Tem certeza que deseja excluir este cliente?');\">Excluir</a></td></tr>";
  }
  echo "</tbody>";
  echo "</table>";
} else {
  echo "Não há clientes cadastrados.";
}
echo "<br><form action='paginainicio.php'>
        <input class='inicio' type='submit' value=''>
      </form>";

// Fechando a conexão com o banco de dados
$conn->close();

?>
<div>