

<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Product example for Bootstrap</title>

    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="product.css" rel="stylesheet">
    <link href="sticky-footer-navbar.css" rel="stylesheet">
  </head>

  <body>
  <nav class="site-header sticky-top py-1">
      <div class="container d-flex flex-column flex-md-row justify-content-between">
      <p class="py-2 d-none d-md-inline-block" style="color: white">Ana Beatriz Fernandes e Bruna Martins | DSM2
         <p class="py-2 d-none d-md-inline-block" style="color: white"><?php  session_start();
    if (!isset($_SESSION['email'])) {
        header('Location: index.php');
        exit();
    }

    echo "Email: " . $_SESSION['email'];
    ?></p>
        <a  class="py-2 d-none d-md-inline-block" style="color: white" href="logout.php">Sair</a>
      </div>
    </nav>
  
  <body>
  <div class="d-md-flex flex-md-equal w-100 my-md-3 pl-md-3">
      <div class="bg-dark mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center text-white overflow-hidden">
        <div class="my-3 py-3">
          <h2 class="display-5">Criando anotações.txt</h2>
        </div>
        <div class="bg-light shadow-sm mx-auto"></div>
        <form class="form-signin" action="dashboard.php" method="post">
        <label for="titulo">Título:</label><br>
        <input class="form-control" type="text" id="titulo" name="titulo" required><br>
        <label for="anotacao">Anotação:</label><br>
        <textarea class="form-control" id="anotacao" name="texto" required></textarea><br>
        <input type="submit" value="Criar arquivo"><br><br>

        <?php
  
  if (isset($_SESSION['hora']) && time() - $_SESSION['hora'] > 30) {
    session_unset();
    session_destroy();
    header('Location: index.php');
    exit();
}


  if ($_SERVER['REQUEST_METHOD'] == 'POST') {
      $titulo = $_POST['titulo'];
      $anotacao = $_POST['texto'];
      if (!file_exists('texto')) {
          mkdir('texto', 0777, true);
      }
      
      file_put_contents("anotacoes/$titulo.txt", $anotacao);
  }


  ?>
    </form>
  </form>  
    </div>
      <div class="bg-light mr-md-3 pt-3 px-3 pt-md-5 px-md-5 text-center overflow-hidden">

        <div class="bg-dark shadow-sm mx-auto">
  <?php
  $anotacoes = glob('anotacoes/*.txt');

  foreach ($anotacoes as $anotacao) {
      echo "<h2>" . basename($anotacao, '.txt') . "</h2>";
      echo "<p>" . file_get_contents($anotacao) . "</p>";
      echo "<a href='?delete=" . basename($anotacao, '.txt') . "'>Excluir anotação</a>";
  }

  if (isset($_GET['delete'])) {
      unlink('anotacoes/' . $_GET['delete'] . '.txt');
      header('Location: dashboard.php');
      exit();
  }
  ?>
        </div>
      </div>
    </div>
   
  


    
<!-- Não armazena o texto, toda vez que alterado ele muda o texto dentdo do .txt, mesmo que alterado dentdo do txt e não no php

par não alterar o dado no lugar de usar o "w" utiliza o "a", que muda a permissão e não substitui o texto, ele acrescenta-->




    <!-- Bootstrap core JavaScript
    ================================================== -->
    <!-- Placed at the end of the document so the pages load faster -->
    <script src="https://code.jquery.com/jquery-3.3.1.slim.min.js" integrity="sha384-q8i/X+965DzO0rT7abK41JStQIAqVgRVzpbzo5smXKp4YfRvH+8abtTE1Pi6jizo" crossorigin="anonymous"></script>
    <script>window.jQuery || document.write('<script src="../../assets/js/vendor/jquery-slim.min.js"><\/script>')</script>
    <script src="../../assets/js/vendor/popper.min.js"></script>
    <script src="../../dist/js/bootstrap.min.js"></script>
  </body>
</html>
