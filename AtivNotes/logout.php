<?php
session_start(); 

if (isset($_SESSION['hora']) && time() - $_SESSION['hora'] > 30) {

    session_unset();
    session_destroy();
} else {

    $_SESSION['hora'] = time();
}  

header('Location: index.php');
exit();
?>
