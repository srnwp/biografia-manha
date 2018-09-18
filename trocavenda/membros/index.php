<?php
require_once(__DIR__ . "/../classes/modelo/User.class.php");
require_once(__DIR__ . "/../classes/modelo/Produto.class.php");
require_once(__DIR__ . "/../classes/dao/ProdutoDAO.class.php");
require_once(__DIR__ . "/../classes/dao/UserDAO.class.php");


include(__DIR__ . "/../logado.php");

$user = unserialize($_SESSION['usuario_logado']);

$home = "membros/";


$produto = new Produto();
$produtoDao = new ProdutoDAO();
if (isset($_POST['editar']) && $_POST['editar'] == 'editar') {
    $produto = $produtoDao->findById($_POST['id']);
}
if (isset($_POST['remover']) && $_POST['remover'] == 'remover') {
    $produtoDao->remove($_POST['id']);
    header("location: $home");
}
if (isset($_POST['salvar']) && $_POST['salvar'] == 'salvar') {
    $produto->setNome($_POST['produto']);
    $produto->setFoto($_POST['foto']);
    $produto->setDescricao($_POST['descricao']);
    $produto->setQuant($_POST['quant']);
    $produto->setPreco($_POST['preco']);
    $produto->setTelefone($_POST['telefone']);
    $produto->setWhatsapp($_POST['whatsapp']);
    
    
    if ($_POST['id'] != '') {
        $produto->setId($_POST['id']);
    }
    $produtoDao->save($produto);
    header("location: $home");
}


$produtos = $produtoDao->findByUser(3);

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
        margin-top:20px; 
        width:90%;
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
      <li class="nav-item active">
        <a class="nav-link" href="index.php">Meus Produtos</a>
      </li>
        <li class="nav-item">
        <a class="nav-link" href="dados.php">Meus Dados</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="../logout.php">Logout</a>
      </li>
     </ul>
    
  </div>
</nav>

    <div class="container">
        
        <div class="row" style="margin-top: 50px; border: 1px solid blue">
           
            <h2>Olá, <?=$user->getNome();?>!</h2>
            <br/>
            
            <div class="col-12"><!-- Tabela -->
                <fieldset>
                    <legend>Seus Produtos</legend>
                    
                    <table class="table table-striped table-hover">
                        <thead>
                            <tr>
                                <th>Produto</th>
                                <th>Imagem</th>
                                <th>Descricao</th>
                                <th>Qtd.</th>
                                <th>Preço</th>
                                <th>Telefone</th>
                                <th>Whatsapp</th>
                                <th colspan="2">Ações</th>                        
                            </tr>
                        </thead>
                        <tbody>
                            <?php foreach($produtos as $produto): ?>
                                <tr>
                                    <td><?=$produto->getNomeProduto();?></td>
                                    <td><?=$produto->getFoto();?></td>
                                    <td><?=$produto->getDescricao();?></td>
                                    <td><?=$produto->getQuant();?></td>
                                    <td><?=$produto->getPrecoFormatado();?></td>
                                    <td><?=$produto->getTelefone();?></td>
                                    <td><?=$produto->getWhatsapp();?></td>
                                    <td>
                                        <form method="post" id="form_editar">
                                            <input type="hidden" name="id" value="<?=$produto->getIdProduto();?>">
                                            <button type="submit" class="btn btn-sm btn-success" name="editar" value="editar"><i class="fas fa-edit"></i></button>
                                        </form>
                                    </td>
                                    <td>
                                        <form method="post" id="form_remover">
                                            <input type="hidden" name="id" value="<?=$produto->getIdProduto();?>">
                                            <button type="submit" class="btn btn-sm btn-danger" name="remover" value="remover" onclick="return confirmaRemover();"><i class="fas fa-trash-alt"></i></button>
                                        </form>
                                    </td>
                                </tr>
                            <?php endforeach; ?>
                        </tbody>
                    </table>
                </fieldset>
            </div>  
    
    <br/>
    
    <div class="col-12">
                <fieldset>
                <form method="post" id="form_salvar">
                        <input type="hidden" name="id" value="<?=$produto->getId();?>">
                        <div class="form-group"><!-- input produto -->
                            <label for="produto">Nome do Produto</label>
                            <input type="text" class="form-control" name="produto" id="produto" value="<?=$produto->getNome();?>">
                        </div>
                        <div class="form-group"><!-- input descricao -->
                            <label for="descricao">Descrição</label>
                            <input type="text" class="form-control" name="descricao" id="descricao" value="<?=$produto->getDescricao();?>">
                        </div>
                         <div class="form-group"><!-- input quantidade -->
                            <label for="quant">Quantidade</label>
                            <input type="text" class="form-control" name="quant" id="quant" value="<?=$produto->getQuant();?>">
                        </div>
                        <div class="form-group"><!-- input preco -->
                            <label for="preco">Preço</label>
                            <input type="text" class="form-control" name="preco" id="preco" value="<?=$produto->getPreco();?>">
                        </div>
                          <div class="form-group"><!-- input telefone -->
                            <label for="telefone">Telefone</label>
                            <input type="text" class="form-control" name="telefone" id="telefone" value="<?=$produto->getTelefone();?>">
                        </div>
                          <div class="form-group"><!-- input whatsapp -->
                            <label for="whatsapp">Whatsapp</label>
                            <input type="text" class="form-control" name="whatsapp" id="whatsapp" value="<?=$produto->getWhatsapp();?>">
                        </div>
                        <div class="form-group"><!-- button salvar -->
                            <button type="submit" class="btn btn-primary btn-block" name="salvar" value="salvar" onclick="return confirmaSalvar();">
                                <i class="fas fa-save"></i> Cadastrar
                            </button>
                        </div>
                                            
                    </form>
                </fieldset>
            </div>
          </div> 
        </div>
    
    <script src="../assets/js/produto.js"></script>
</body>
</html>
