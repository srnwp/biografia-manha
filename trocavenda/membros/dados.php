<?php
require_once(__DIR__ . "/../classes/modelo/User.class.php");
require_once(__DIR__ . "/../classes/dao/UserDAO.class.php");
require_once(__DIR__ . "/../classes/modelo/Estado.class.php");
require_once(__DIR__ . "/../classes/dao/EstadoDAO.class.php");


include(__DIR__ . "/../logado.php");

$user = unserialize($_SESSION['usuario_logado']);

$home = "../membros/";

$estado = new Estado();
$estadodao = new EstadoDAO();
$estados = $estadodao->findAll();



if (isset($_POST['editar']) && $_POST['editar'] == 'editar') {
    $user = $userDao->findById($_POST['id']);
}
if (isset($_POST['remover']) && $_POST['remover'] == 'remover') {
    $userDao->remove($_POST['id']);
    header("location: $home");
}
if (isset($_POST['salvar']) && $_POST['salvar'] == 'salvar') {
    $user->setEmail($_POST['email']);
    $user->setNome($_POST['nome']);
    $user->setLogin($_POST['login']);
    $user->setSenha($_POST['senha']);
    $user->setEstado($_POST['estado']);
    $user->setCidade($_POST['cidade']);
    
    
    if ($_POST['id'] != '') {
        $user->setId($_POST['id']);
    }
    $userDao->save($user);
    header("location: $home");
}
$active = "membros";
?>
<!doctype html>
<html lang="pt-br">
<head>
    <meta charset="utf-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Produto</title>
    <link rel="stylesheet" href="../assets/css/bootstrap.css">
    <link rel="stylesheet" href="../assets/css/fontawesome.css">
     <style>
   
    table{
        margin:5px;
        padding:5px;
         }         
    td{
         text-align: left;
        }
    body{
        background-color: lightgray;
        }
    .container{
        background-color: white; 
        border: 1px solid #00CED1; 
        border-radius: 20px; 
        margin-top:20px; 
        width:50%;
        text-align:center;
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
        <a class="nav-link" href="index.php">Meus Produtos</a>
      </li>
      <li class="nav-item active">
        <a class="nav-link" href="dados.php">Meus Dados</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../logout.php">Logout</a>
      </li>
     </ul>
    
  </div>
</nav>

    <div class="container">
       
        <div class="row"">
            <div class="col-12">
                <fieldset>
                    <legend>Editar Seus Dados</legend>
                    <form method="post" id="form_salvar">
                        <input type="hidden" name="id" value="<?=$user->getId();?>">
                        <div class="form-group"><!-- input email -->
                            <label for="email">E-mail</label>
                            <input type="text" class="form-control" name="email" id="email" value="<?=$user->getEmail();?>">
                        </div>
                       <div class="form-group"><!-- input nome -->
                            <label for="nome">Nome Completo</label>
                            <input type="text" class="form-control" name="nome" id="nome" value="<?=$user->getNome();?>">
                        </div>
                        <div class="form-group"><!-- input login -->
                            <label for="login">Login</label>
                            <input type="text" class="form-control" name="login" id="login" value="<?=$user->getLogin();?>">
                        </div>
                        <div class="form-group"><!-- input senha -->
                            <label for="senha">Senha</label>
                            <input type="password" class="form-control" name="senha" id="senha" value="<?=$user->getSenha();?>">
                        </div>
                        <div class="form-group"><!-- input senha -->
                            <label for="estado">Estado</label>
                        <select class="form-control" name="estado" id="estado">
                            <option value="<?=$estado->getId();?>" </option>
                            <?php foreach($estados as $estado): ?>
                                <option value="<?=$estado->getId();?>">
                                    <?=$estado->getUF();?>
                                </option>
                            <?php endforeach; ?>
                        </select>
                        </div>
                        <div class="form-group"><!-- input senha -->
                            <label for="cidade">Cidade</label>
                            <input type="text" class="form-control" name="cidade" id="cidade" value="<?=$user->getCidade();?>">
                        </div>
                        <div class="form-group"><!-- button salvar -->
                            <button type="submit" class="btn btn-primary btn-block" name="salvar" value="salvar" onclick="return confirmaSalvar();">
                                <i class="fas fa-save"></i> Cadastrar
                            </button>
                        </div>
                    </form>
                </fieldset>
            </div>
            <br/>
         
         
            
        </div>
    </div> 
   <script src="../assets/js/produto.js"></script>
</body>
</html>
