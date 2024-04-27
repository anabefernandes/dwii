<!-- logout.php -->
<?php
session_start(); // Inicia a sessão

if (isset($_SESSION['hora']) && time() - $_SESSION['hora'] > 30) {
    // Última atividade foi há mais de 60 segundos
    session_unset();
    session_destroy();
} else {
    // Atualiza o tempo da última atividade
    $_SESSION['hora'] = time();
}  

header('Location: login.php');
exit();
?>

