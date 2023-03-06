<?php
include('verficandosenha.php');

$login = filter_input(INPUT_POST, 'login', FILTER_SANITIZE_STRING);

$senha = password_hash($_POST['senha'], PASSWORD_DEFAULT);

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestao";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Falha na conexão: " . $conn->connect_error);
}

$stmt = $conn->prepare("SELECT login FROM usuarios WHERE login = ?");
$stmt->bind_param("s", $login);
$stmt->execute();
$result = $stmt->get_result();
$row = $result->fetch_assoc();

if (!empty($login)) {
  if ($row['login'] == $login) {
    echo "<script>alert('Esse login já existe');window.location.href='cadastro1.html';</script>";
    die();
  } else {
    $stmt = $conn->prepare("INSERT INTO usuarios (login, senha) VALUES (?, ?)");
    $stmt->bind_param("ss", $login, $senha);
    if ($stmt->execute()) {
      echo "<script>alert('Usuario cadastrado com sucesso!');window.location.href='index.html';</script>";
    } else {
      echo "<script>alert('Não foi possível cadastrar esse usuario');window.location.href='cadastro1.html';</script>";
    }
  }
} else {
  echo "<script>alert('O campo login deve ser preenchido');window.location.href='cadastro1.html';</script>";
}

$stmt->close();
$conn->close();

?>