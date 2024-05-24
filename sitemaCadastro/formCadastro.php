<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">
    <title>Cadastro de Produtos</title>
    
    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">

</head>
    <body class="text-center">
        <form action="" method="post" enctype="multipart/form-data">
        <h1 class="h3 mb-3 font-weight-normal">Cadastro de protutos:</h1>
        
        <input type="text" name="nome" id="nomeProd" class="form-control" placeholder="Nome Produto"><br>
        <input type="text" name="preco" id="valorProd" class="form-control" placeholder="Valor Produto"><br>
        <input type="file" name="fl_upload" id="fileToUpload"> <br><br>2
        <input type="submit" value="Enviar Imagem" name="submit">
    </form>
</body>
</html>



<?php
$nome = $_POST["nome"];
$preco = $_POST["preco"];
//local que a imagem sera salva
$diretorio = "uploads/";
$caminho = $diretorio . basename($_FILES["fl_upload"]["name"]);

$insertDados = "INSERT INTO produtos(nome, valor) VALUES ('$nome', '$preco', '$diretorio')";
$connection->query($insertDados);

if ($_SERVER['REQUEST_METHOD'] == 'POST') {
    $email = $_POST['email'];
    $senha = $_POST['senha'];
 
  
    if ($email == 'admin@email.com' && $senha == 'admin123') {
        require "conexão.php";
    } else {
        echo "Email ou senha incorretos.";
    
 
}
}
require "cadastroProd.php";
?>

