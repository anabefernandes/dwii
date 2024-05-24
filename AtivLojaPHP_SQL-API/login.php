<?php
require "conexao.php";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link href="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/css/bootstrap.min.css" rel="stylesheet">
    <title>LOGIN</title>
    <style>
    body {
      background-color: #f8f9fa; /* Cor de fundo mais clara */
    }

    .form-login {
      margin-top: 100px; /* Distância do topo */
      max-width: 400px; /* Largura máxima do formulário */
      background-color: #fff; /* Cor de fundo do formulário */
      padding: 20px;
      border-radius: 10px; /* Bordas arredondadas */
      box-shadow: 0px 0px 10px rgba(0, 0, 0, 0.1); /* Sombra */
    }

    .btn-login {
      background-color: #007bff; /* Cor de fundo do botão */
      border-color: #007bff; /* Cor da borda do botão */
    }

    .btn-login:hover {
      background-color: #0056b3; /* Cor de fundo do botão ao passar o mouse */
      border-color: #0056b3; /* Cor da borda do botão ao passar o mouse */
    }
  </style>
</head>
<body>
<div class="container">
  <div class="row justify-content-center">
    <div class="col-md-6">
      <div class="card form-login">
        <div class="card-header">
          <h3 class="text-center">Faça Login</h3>
        </div>
        <div class="card-body">
          <form method="post" action="valida_login.php">
            <div class="form-group">
              <label for="email">Login:</label>
              <input type="email" class="form-control" id="email" name="email" required>
            </div>
            <div class="form-group">
              <label for="senha">Senha:</label>
              <input type="password" class="form-control" id="senha" name="senha" required>
            </div>
            <button type="submit" class="btn btn-primary btn-block btn-login">Entrar</button>
          </form>
        </div>
      </div>
    </div>
  </div>
</div>

<script src="https://ajax.googleapis.com/ajax/libs/jquery/3.5.1/jquery.min.js"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/popper.js/1.16.0/umd/popper.min.js"></script>
<script src="https://maxcdn.bootstrapcdn.com/bootstrap/4.5.2/js/bootstrap.min.js"></script>
</body>
</html>