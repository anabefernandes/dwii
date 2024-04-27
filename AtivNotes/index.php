<!doctype html>
<html lang="pt-br">
  <head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
    <meta name="description" content="">
    <meta name="author" content="">

    <title>Anotações Online</title>

 
    <link href="bootstrap.min.css" rel="stylesheet">
    <link href="signin.css" rel="stylesheet">
  </head>

  <body class="text-center">
    <form class="form-signin" method="post" id="formlogin" name="formlogin">
      <img class="mb-4" src="https://cdn-icons-png.flaticon.com/512/4632/4632596.png" alt="" width="72" height="72">
      <label for="inputEmail" class="sr-only">E-mail</label>
      <input type="email" name="email" id="inputEmail" class="form-control" placeholder="E-mail" required autofocus>
      <label for="inputPassword" class="sr-only">Senha</label>
      <input type="password" name="senha" id="inputPassword" class="form-control" placeholder="Senha" required>
      <div class="checkbox mb-3">
        <label>
          <input type="checkbox" name="lembre-me" value="lembre-me"> Lembre-me
        </label>
      </div>
      <button class="btn btn-lg btn-primary btn-block" value="logar" type="submit">Sign in</button>
      <p class="mt-5 mb-3 text-muted">&copy; 2017-2018</p>
    </form>
   
    <?php
session_start();

if (isset($_POST['email']) && isset($_POST['senha'])) {
  $email = $_POST['email'];
  $senha = $_POST['senha'];

  if ($email == 'usuario@email.com' && $senha == 'senha123') {
    $_SESSION['email'] = $email;
    header('Location: dashboard.php');
  } else {
    echo 'E-mail ou senha incorretos.';
  }
}

if (isset($_POST['lembre-me'])) {
    setcookie('email', $email, time() + 30, "/");
}
?>
  </body>
</html>
