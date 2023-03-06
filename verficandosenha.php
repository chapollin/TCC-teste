<?php
// Verifica se o usuário está logado
if (!isset($_COOKIE["login"])) {
  echo "<script>alert('Você precisa estar logado para acessar esta página.'); window.location.href = 'index.html';</script>";
  exit();
}
?>