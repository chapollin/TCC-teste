<?php
setcookie("login", "", time() - 3600); // remove o cookie
header("Location: index.html"); // redireciona para a página de login
exit();
?>