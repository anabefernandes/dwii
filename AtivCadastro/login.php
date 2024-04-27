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
      
      <label for="email">Email:</label><br>
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocos name="email" value="<?php echo isset($_COOKIE['email']) ? $_COOKIE['email'] : '' ?>" required><br>
        <label for="senha">Senha:</label><br>
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="senha" required><br>
        <div class="checkbox mb-3">
        <input type="checkbox" id="lembre" name="lembre">
        <label for="lembre">Lembre-me</label><br>
        <input type="submit" value="Entrar">
</div>
    
      <p class="mt-5 mb-3 text-muted">© 2024 - todos os direitos reservados.</p>
    </form>
    <?php
   session_start();
   
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       $email = $_POST['email'];
       $senha = $_POST['senha'];
    
     
       if ($email == 'usuario@email.com' && $senha == 'senha123') {
           $_SESSION['email'] = $email;
           $_SESSION['hora'] = time();
   
           if ($_POST['lembre']) {
               setcookie('email', $email, time() + 30, "/"); 
         
           }
        
   
           header('Location: anotacoes.php');
           exit();
       } else {
           echo "Email ou senha incorretos.";
       }
    
   }
   
   ?>
   
  
  </body>
</html>
