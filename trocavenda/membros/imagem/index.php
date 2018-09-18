<?php
include("Classe/Conexao.php");

$msg=false;
if(isset($_FILES['arquivo'])){
    "arquivo.jpg";
    $extensao=strtolower(substr($_FILES['arquivo']['name'], -4));
    $novo_nome=md5(time()).$extensao;
    $diretorio="upload/";
    move_uploaded_file($_FILES['arquivo']['tmp_name'], $diretorio.$novo_nome);
    $sql_code="INSERT INTO arquivo(codigo,arquivo,data) VALUES(null,$novo_nome, NOW())";
    if($mysqli->query($sql_code)){
        $msg="Arquivo enviado com sucesso!";
    }else{
        $msg ="Falha ao enviar arquivo";
        }
}
?>
<!DOCTYPE html>
<html>
<head><meta charset="utf-8">
	<title>PHP Games</title>
	<link rel="stylesheet" href="assets/css/bootstrap.css">
    <style type="text/css">
       body{
            background: url(../img/back.jpg);
            webkit-background-size:cover;
            background-size:cover;
        }
		
		#centro{
			margin:150px 0 0 150px;
			text-align:center;
			border: 1px solid gray;
			border-radius: 20px;
			background-color:white;
			
		}
		#botoes{
			height: 210px;
			text-align:center;
			
		}
		#rodape{
            background-color: darkgreen;
			height: 100px;
			margin-top:20px;
		}
		#button{
            width: 90%; 
            background-color:white; 
            margin:5px;
          
		}
		@media only screen and (max-width: 550px){
			#esquerda{
				display: none;
			}
			#centro{
                margin:50px 0 0 50px;
            }
		}
		label{
            display: block;
            margin: 10px;
		}
		input{
            margin: 10px;
		}
    }
	</style>
</head>
  <body>
   
<nav class="navbar navbar-dark bg-dark">
 <a class="navbar-brand" href="#">PHP Games</a>
  <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarSupportedContent" aria-controls="navbarSupportedContent" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto">
      <li class="nav-item active">
        <a class="nav-link" href="#">Home <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link" href="#">Sobre</a>
      </li>
      <li class="nav-item dropdown">
        <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown" role="button" data-toggle="dropdown" aria-haspopup="true" aria-expanded="false">
          Começar Jogo
        </a>
        <div class="dropdown-menu" aria-labelledby="navbarDropdown">
          <a class="dropdown-item" href="#">Jogar sozinho</a>
          <a class="dropdown-item" href="#">Desafiar alguém</a>
          </li>
      <li class="nav-item">
        <a class="nav-link disabled" href="#">Sair</a>
      </li>
    </ul>
    <form class="form-inline my-2 my-lg-0">
      <input class="form-control mr-sm-2" type="search" placeholder="Search" aria-label="Search">
      <button class="btn btn-outline-success my-2 my-sm-0" type="submit">Pesquisa</button>
    </form>
  </div>
</nav>
<div id="container" class="container">
        <div class="row">
			<div id="esquerda" class="col-sm-3 col-md-4">
			</div>
			<div id="centro" class="col-sm-6 col-md-4">
			<div class="row" id="caixa"></div>
                <div>
                <fieldset>Cadastrar Usuário:
                    <label>Nome:</label>
                    <input type="text" name="nome" required value= "" placeholder="Seu nome aqui"><br/>
                    <label>E-mail:</label>
                    <input type="text" name="email" required value= "" placeholder="Seu e-mail aqui"><br/>
                    <label>Apelido:</label>
                    <input type="text" name="apelido" required value= "" placeholder="Crie um apelido"><br/>
                    <label>Senha:</label>
                    <input type="password" name="senha" required value= "" placeholder="Digite uma senha"><br/>
                    <label>Confirma Senha:</label>
                    <input type="password" name="senhar" required value= "" placeholder="Confirme sua senha"><br/>
                    <div id="button">
                    <input type="button" class="btn btn-outline-success" name="cadastrar" value="cadastrar" style="border-color:green;"><h2>Enviar</h2>
                    </button>
                    </div>
                    <div id="button">
                    <input type="button" class="btn btn-outline-danger" name="limpar" value="limpar" style="border-color:red;"><h3>Limpar</h3>
                    </button>
                </fieldset>
                
                </div>
			<div id="direita" class="col-sm-3 col-md-4">
            </div>
        </div>
        <div class="row">
		<div id="rodape" class="col-sm-12"></div>
</div>
<script src="assets/js/jquery-3.3.1.js"></script>
<script src="assets/js/bootstrap.js"></script>

</body>
</html>
