<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Login</title>

    <!-- Bootstrap core CSS -->
    <link href="css/bootstrap.min.css" rel="stylesheet">

    <!-- Custom styles for this template -->
    <link href="css/signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" method="post" action="formCadastro.php">
      <img class="mb-4" src="escrita.png" alt="" width="72" height="72">
      <h1 class="h3 mb-3 font-weight-normal">Login</h1>
      
        Email:
        <input type="email" id="inputEmail" name="email" class="form-control" placeholder="Email address" required autofocos name="email" value="<?php echo isset($_COOKIE['email']) ? $_COOKIE['email'] : '' ?>" required><br>
        Senha:
        <input type="password" id="inputPassword" class="form-control" placeholder="Password" required name="senha" required><br>

        <input type="submit" class="form-control" value="Entrar">
    
      <p class="mt-5 mb-3 text-muted">© 2024 - todos os direitos reservados.</p>
    </form>
      
  
  </body>
</html>

<?php
  
   if ($_SERVER['REQUEST_METHOD'] == 'POST') {
       $email = $_POST['email'];
       $senha = $_POST['senha'];
    
     
       if ($email == 'admin@email.com' && $senha == 'admin123') {
           require "conexão.php";
       } else {
           echo "Email ou senha incorretos.";
       
    
   }
   }
   
?>