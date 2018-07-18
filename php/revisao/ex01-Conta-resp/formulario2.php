<?php
require_once 'ContaCorrente.class.php';
require_once 'Cliente.class.php';
require_once 'ContaPoupanca.class.php';
require_once 'BancoDB.class.php';
?>
<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Banco Senac</title>
    <link rel="stylesheet" href="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/css/bootstrap.min.css" integrity="sha384-Smlep5jCw/wG7hdkwQ/Z5nLIefveQRIY9nfy6xoR1uRYBtpZgI6339F5dgvm/e9B" crossorigin="anonymous">
    </head>
<body>
<div class="container-fluid" style='margin-top:30px;'>
<div class="row">
    <div class="col-1"></div>
    <div class="col-4">
    <form action="cadastrar-conta.php" method="post">
        <fieldset>
            <legend>Dados do Cliente:</legend>
            <div class="form-group">
                <label for="nome">Nome:</label><br/>
                <input type="text" class="form-control" name="nome" id="campo"><br/>
            </div>
            <div class="form-group">
                <label for="cpf">CPF:</label><br/>
                <input type="text" class="form-control" name="cpf" id="campo"><br/></br/>
            </div>
            </fieldset>
        <fieldset>
            <legend>Dados da Conta:</legend>
            <div class="form-group">
                <label for="agencia">Agencia:</label><br/>
                <input type="text" class="form-control" name="agencia" id="campo"><br/>
            </div>
            <div class="form-group">
                <label for="conta">Conta:</label><br/>
                <input type="text" class="form-control" name="conta" id="campo"><br/>
            </div>
            <div class="form-group">
                <label for="saldo">Saldo:</label><br/>
                <input type="text" class="form-control" name="saldo" id="campo"><br/>
            </div>
        </fieldset>
        <button type="button" class="btn btn-success">Cadastrar</button>
    </form>
    </div>
    <div class="col-1"></div>
    <div class="col-5">
        <table class="table table-striped">
            <?php
            $banco=new BancoDB();
            $contas=$banco->listaTodas();
            ?>
        <tr>
            <th>Agencia</th>
            <th>Conta</th>
            <th>Cliente</th>
            <th>CPF</th>
            <th>Saldo</th>
        </tr>
        <?php foreach ($contas as $conta){?>
            <tr>
                <td><?=$conta->getAgencia();?></td>
                <td><?=$conta->getNumero();?></td>
                <td><?=$conta->getCliente()->getNome();?></td>
                <td><?=$conta->getCliente()->getCpf();?></td>
                <td><?=$conta->getSaldo();?></td>
            </tr>
            <?php } ?>
        </table>
        </div>
    </div>
    <div class="col-1"></div>
    </div>
<hr>

</div>
<script src="https://stackpath.bootstrapcdn.com/bootstrap/4.1.2/js/bootstrap.min.js" integrity="sha384-o+RDsa0aLu++PJvFqy8fFScvbHFLtbvScb8AjopnFD+iEQ7wo/CG0xlczd+2O/em" crossorigin="anonymous"></script>
</body>
</html>
