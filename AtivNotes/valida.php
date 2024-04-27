<?php
  $login = $_POST['login'];
  $senha = $_POST['senha'];

  if ($login == "usuario@email.com" && $senha == "senha123") {
    header("Location: dashboard.php");
  } else {
    echo "Email ou senha incorretos.";
  }
?>