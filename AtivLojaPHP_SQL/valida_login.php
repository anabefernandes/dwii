<?php
session_start();
require_once "conexao.php";

$email = $_POST['email'];
$senha = $_POST['senha'];

$sql = "SELECT * FROM usuario
        WHERE email = :email";

$stmt = $conexao->prepare($sql);
$stmt->bindParam(':email', $email);
$stmt->execute();
$usuario = $stmt->fetch(PDO::FETCH_ASSOC);

if ($usuario && password_verify($senha, $usuario['senha'])) {
   $_SESSION['usuario'] = $usuario['email'];

   $tempo_expira = 30 * 60;

   session_set_cookie_params($tempo_expira);

   header("Location: dashboard.php");
}else{
    echo "Login ou senha inválidos.";
}
?>