<?php
include('verficandosenha.php');

$servername = "localhost";
$username = "root";
$password = "";
$dbname = "gestao";

$conn = new mysqli($servername, $username, $password, $dbname);

if ($conn->connect_error) {
  die("Falha na conexão: " . $conn->connect_error);
}

if (isset($_POST['id'])) {
  $id = $_POST['id'];
  $stmt = $conn->prepare("DELETE FROM usuarios WHERE id = ?");
  $stmt->bind_param("i", $id);
  $stmt->execute();
}

$sql = "SELECT id, login FROM usuarios";
$result = $conn->query($sql);

if ($result->num_rows > 0) {
  echo "<table class='clientes-table'>";
  echo "<thead><tr><th>ID</th><th>Login</th><th>Ação</th></tr></thead>";
  echo "<tbody>";
  while($row = $result->fetch_assoc()) {
    echo "<tr><td>" . $row["id"] . "</td><td>" . $row["login"] . "</td>";
    echo "<td><form method='POST' action='listagem_de_usuario.php'>";
    echo "<input type='hidden' name='id' value='" . $row["id"] . "'>";
    echo "<button type='submit'>Excluir</button>";
    echo "</form></td></tr>";
  }
  echo "</tbody></table>";
} else {
  echo "Não há usuários cadastrados.";
}
echo "<br><form action='paginainicio.php'>
<input class='inicio' type='submit' value=''>
</form>";

$conn->close();
?>