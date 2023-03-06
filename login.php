<?php
$login = $_POST["login"];
$senha = $_POST['senha'];
$entrar = $_POST["entrar"];

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestao";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Falha na conexao: " . $conn->connect_error);
}

if (isset($entrar)) {
  $stmt = $conn->prepare("SELECT senha FROM usuarios WHERE login = ?");
  $stmt->bind_param("s", $login);
  $stmt->execute();
  $result = $stmt->get_result();

  if ($result->num_rows == 1) {
    $row = $result->fetch_assoc();
    if (password_verify($senha, $row['senha'])) {
      setcookie("login", $login);
      header("Location: paginainicio.php");
    } else {
      echo "<script>alert(\"Login e/ou senha incorretos\");window.location.href=\"index.html\";</script>";
    }
  } else {
    echo "<script>alert('Usuário não encontrado');window.location.href='index.html';</script>";
  }
}

$stmt->close();
$conn->close();
?>