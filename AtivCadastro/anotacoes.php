<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Anotações Online</title>

    <!-- Bootstrap core CSS -->
    <link href="bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" method="post" action = "login.php">
      <img class="mb-4" src="escrita.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Cadastro Online</h1>

        <form action="anotacoes.php" method="post">
        <label for="titulo">Título:</label><br>
        <input class="form-control" type="text" id="titulo" name="titulo" required><br>
        <label for="anotacao">Anotação:</label><br>
        <textarea class="form-control" id="anotacao" name="anotacao" required></textarea><br>
        <input type="submit" value="Criar Anotação"><br><br>
        <a href="logout.php">Sair</a>
    </form>


</div>
    
    </form>
    <?php
    session_start();

    if (!isset($_SESSION['email'])) {
        header('Location: login.php');
        exit();
    }

    echo "Email: " . $_SESSION['email'] . "<br>";

    if (isset($_SESSION['hora']) && time() - $_SESSION['hora'] > 30) {
        session_unset();
        session_destroy();
        header('Location: login.php');
        exit();
    }

    if ($_SERVER['REQUEST_METHOD'] == 'POST') {
        $titulo = $_POST['titulo'];
        $anotacao = $_POST['anotacao'];
        if (!file_exists('anotacoes')) {
            mkdir('anotacoes', 0777, true);
        }
        
        file_put_contents("anotacoes/$titulo.txt", $anotacao);
    }

    $anotacoes = glob('anotacoes/*.txt');

    foreach ($anotacoes as $anotacao) {
        echo "<h2>" . basename($anotacao, '.txt') . "</h2>";
        echo "<p>" . file_get_contents($anotacao) . "</p>";
        echo "<a href='?delete=" . basename($anotacao, '.txt') . "'>Excluir</a>";
    }

    if (isset($_GET['delete'])) {
        unlink('anotacoes/' . $_GET['delete'] . '.txt');
        header('Location: anotacoes.php');
        exit();
    }
    ?>
</body>
</html>