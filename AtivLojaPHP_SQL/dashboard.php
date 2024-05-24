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
    
    if(empty($nome) || empty($preco)){
        echo "Nome e preço são campos obrigatórios.";
        exit;
    } 

    if(isset($_FILES['foto'])){
        $diretorio = 'uploads/';
        $tempName = $_FILES['foto']['tmp_name'];
        $caminho = $diretorio . basename($tempName);
        
        if(move_uploaded_file($tempName, $caminho)){
            echo "Imagem salva em: uploads/" . $caminho;

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
            echo "<br>Novo registro inserido com sucesso!";
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
    <title>Cadastro Produtos</title>
</head>
<body>
    <h1>Bem vindo, <?php echo $nomeUsuario; ?>!</h1>

    <form method="post" action="dashboard.php" enctype="multipart/form-data">
        <label>Nome do produto:</label>
        <input type="text" name="nome" required>
        <label>Preço:</label>
        <input type="number" name="preco">
        <label>Foto:</label>
        <input type="file" name="foto" required>
        <input type="submit" value="Cadastrar">
    </form>
    <a href="logout.php">Sair</a>
</body>
</html>