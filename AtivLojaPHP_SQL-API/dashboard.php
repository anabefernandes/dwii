<?php
session_start();

if (!isset($_SESSION['usuario'])) {
    header("Location: login.php");
    exit;
}
$nomeUsuario = $_SESSION['usuario'];

if($_SERVER['REQUEST_METHOD'] === 'POST') {
    $nome = $_POST['nome'];
    $preco = $_POST['preco'];
    
    if(empty($nome) || empty($preco) || $preco <= 0){
        echo "Nome e preço são campos obrigatórios.";
        exit;
    } 

    if(isset($_FILES['foto'])){
        $diretorio = 'uploads/';
        $tempName = $_FILES['foto']['tmp_name'];
        $caminho = $diretorio . basename($tempName);
        
        if(move_uploaded_file($tempName, $caminho)){
            echo '<script>alert("Imagem salva em: uploads/' . $caminho . '");</script>';

            $foto = $caminho;
            require_once 'conexao.php';
            try{
                $sql = "INSERT INTO produto(nome, preco, foto)
                        VALUES (:nome, :preco, :foto)";
            $stmt = $conexao->prepare($sql);
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':preco', $preco);
            $stmt->bindParam(':foto', $foto);
            $stmt->execute();
            } catch (PDOException $e) {
            echo "Erro ao inserir registro: " . $e->getMessage();
            }   
        }else{
            echo "<br>Desculpe, ocorreu um erro a enviar o arquivo.";
        }
    }

}
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>Cadastro Produtos</title>
    <style>
    body {
      font-family: Arial, sans-serif;
      background-color: #f8f9fa;
      padding: 20px;
    }

    h1 {
      text-align: center;
      margin-bottom: 30px;
    }

    #form-container {
      display: flex;
      justify-content: center;
    }

    form {
      width: 400px; 
      background-color: #fff; 
      padding: 20px;
      border-radius: 10px;
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); 
    }

    label {
      font-weight: bold;
    }

    input[type="text"],
    input[type="number"],
    input[type="file"] {
      width: 100%;
      padding: 10px;
      margin-bottom: 20px;
      border: 1px solid #ccc;
      border-radius: 5px;
      box-sizing: border-box;
    }

    input[type="submit"] {
      width: 100%;
      padding: 10px;
      background-color: #007bff;
      color: #fff;
      border: none;
      border-radius: 5px;
      cursor: pointer;
    }

    input[type="submit"]:hover {
      background-color: #0056b3; 
    }

    a {
      display: block;
      text-align: center;
      margin-top: 20px;
      color: #007bff;
      text-decoration: none;
    }

    a:hover {
      text-decoration: underline; 
    }
  </style>
</head>
<body>

<h1>Bem-vindo, <?php echo $nomeUsuario; ?>!</h1>

<div id="form-container">
  <form method="post" action="dashboard.php" enctype="multipart/form-data">
    <div class="form-group">
      <label for="nome">Nome do produto:</label>
      <input type="text" id="nome" name="nome" class="form-control" required>
    </div>
    <div class="form-group">
      <label for="preco">Preço:</label>
      <input type="number" id="preco" name="preco" class="form-control">
    </div>
    <div class="form-group">
      <label for="foto">Foto:</label>
      <input type="file" id="foto" name="foto" class="form-control" required>
    </div>
    <input type="submit" value="Cadastrar" class="btn btn-primary">
  </form>
</div>

<a href="login.php">Sair</a>
<a href="index.php">Produtos</a>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>