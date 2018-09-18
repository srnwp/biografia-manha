<?php

include(__DIR__ . "/../deslogado.php");

$mensagem = "";
if (isset($_SESSION['mensagem'])) {
    $mensagem = $_SESSION['mensagem'];
    session_destroy();
}
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>VENDE E TROCA</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/fontawesome.css">
     <style>
   
    .container{
        background-color: white; 
        border: 1px solid #00CED1; 
        border-radius: 20px; 
        margin-top:50px; 
        width:40%;
        }
    </style>
</head>
 
<body style="background-color: #E6E6FA;">

  <nav class="navbar navbar-expand-lg navbar-dark bg-dark">
  <a class="navbar-brand" href="../index.php">VENDE E TROCA</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown" >
   
    <ul class="navbar-nav" >
      <li class="nav-item">
        <a class="nav-link" href="../cadastrar/">Cadastrar</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="#">Login</a>
      </li>
     </ul>
    
  </div>
</nav>

    <div class="container" >
        <div class="row">
            <?=$mensagem;?>
        </div>
        <div class="row">
            <div class="col-12">
                <fieldset>
                    <br/>
                    <form action="../login.php" method="post">
                        <div class="form-group">
                            <label for="login">Login</label>
                            <input type="text" class="form-control" name="login" id="login">
                        </div>
                        <div class="form-group">
                            <label for="senha">Senha</label>
                            <input type="password" class="form-control" name="senha" id="senha">
                        </div>
                        <div class="form-group">
                            <button type="submit" class="btn btn-primary btn-block" style="background-color: #00CED1;" name="entrar" value="entrar">
                                <i class="fas fa-save"></i> Entrar
                            </button>
                        </div>
                    </form>
                </fieldset>
            </div>
        </div>
    </div>
</body>
</html>

