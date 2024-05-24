<?php

if(isset($_POST['submit'])){
    $nome = $_POST["nome"];
    $preco = $_POST["preco"];
    //local que a imagem sera salva
    $diretorio = "uploads/";
    $caminho = $diretorio . basename($_FILES["fl_upload"]["name"]);

    $insertDados = "INSERT INTO produtos(nome, valor) VALUES ('$nome', '$preco', '$diretorio')";
    $connection->query($insertDados);
    if(move_uploaded_file($_FILES["fl_upload"]["tmp_name"], $caminho)){
        echo"<br>O arquivo enviado com sucesso para: " . $caminho;
        echo "Clique aqui para vizualizar o site: <a href='index.php'>Site de Vendas</a>";
    }else{
        echo "<br>Desculpe, ocorreu um erro a enviar o arquivo.";
    }
}
$url = "index.php";

header('Location: '.$url);

$connection->close();
?>
