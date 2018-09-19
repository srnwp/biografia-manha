<?php
require_once(__DIR__ . "/./classes/modelo/Produto.class.php");
require_once(__DIR__ . "/./classes/dao/ProdutoDAO.class.php");

$produtoDao = new ProdutoDAO();

if (isset($_GET['pesquisar']) && $_GET['pesquisar'] == 'pesquisar') {
    $produtos = $produtoDao->findByName($_GET['pesquisar']);
}else{
}
$produtos = $produtoDao->findAll();
$active = "home";
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Loja</title>
    <link rel="stylesheet" href="./assets/css/bootstrap.css">
    <link rel="stylesheet" href="./assets/css/fontawesome.css">
     <style>
    #foto{
       width:200px;
       height:200px;
       margin: 5px 15px 5px 5px;
        }
    #img{
       width:200px;
       height:200px;
       border: 1px solid black;
    }
    #nome{
        text-align: left;
        color: blue;
        }
    #preco{
        text-align: right;
        color: red;
        margin-right: 5px;
        }
    #pesquisar{
        width:90%;
        height:35px;
        border-radius:5px;
        }
    #contatos{
        text-align: right;
        margin-bottom: 5px;
        }
    #produto{
        border: 2px solid #87CEEB;  
        border-radius:10px;
        margin:10px;
    }
    table{
        margin:5px;
        padding:5px;
         }         
    td{
         text-align: left;
        }
    body{
        background-color: #87CEEB;
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
  <a class="navbar-brand" href="#">VENDE E TROCA</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarNavDropdown" aria-controls="navbarNavDropdown" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="collapse navbar-collapse" id="navbarNavDropdown" >
   
    <ul class="navbar-nav" >
      <li class="nav-item">
        <a class="nav-link" href="./cadastrar/">Cadastrar</a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="./login/">Login</a>
      </li>
     </ul>
    
  </div>
</nav>
    <div class="container">
        <br/>
        <div class="row">
            <div class="col-6" style="text-align:right; padding:5px;">
          
            </div>
            <div class="col-6">
        
            <fieldset>
               
                <form method="GET" id="form_salvar">
                        <div class="form-group"><!-- input pesquisa -->
                            <input type="text" name="pesquisar" id="pesquisar" placeholder="Faça sua Pesquisa...">
                             <button type="submit" class="btn btn-sm btn-success" name="pesquisar" value="pesquisar"><i class="fas fa-search"></i></button>
                        </div>
                
             </fieldset>
                 </div>
        </div>
        <div class="row">
            <div class="col-12">
              
                     
                <fieldset>
                    <legend><b>Últimos Adicionados</b></legend>
                        <?php foreach($produtos as $produto): ?>
                            <div class="col-5" id="produto">
                                <table>
                                    <thead>
                                        
                                        <tr>
                                           <th colspan="3"><div id="nome"><h3><?=$produto->getNomeProduto();?></h3></div></th>                        
                                        </tr>
                                    </thead>
                                    <tbody>
                                        <tr>
                                            <td><div id="foto"><img src="<?=$produto->getFoto();?>" id="img"/></div></td>
                                            <td colspan="2"><div><?=$produto->getDescricao();?><br/></div>
                                            <div id="preco"><h4><b><?=$produto->getPrecoFormatado();?></h4></b></div>
                                            <div id="contatos"><b><?=$produto->getUser()->getNome();?></b><br/>
                                                Telefone: <?=$produto->getTelefone();?><br/>
                                                Whatsapp: <?=$produto->getWhatsapp();?></div></td>
                                            
                                        </tr>
                                    </tbody>
                                </table>
                               
                            </div>
                        <?php endforeach; ?>
                          <br/>                 
                </fieldset>

            </div>
        </div>
    </div>
</body>
</html>

