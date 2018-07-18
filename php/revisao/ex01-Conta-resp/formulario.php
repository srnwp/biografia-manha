<?php
require_once 'ContaCorrente.class.php';
require_once 'Cliente.class.php';
require_once 'ContaPoupanca.class.php';
require_once 'BancoDB.class.php';
?>
<!DOCTYPE html>
<html lang="pt-Br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
        #formulario{
        width:500px;
        }
        #campo{
        width: 250px;
        }
        button{
        width: 90px;
        }
    </style>
    </head>
<body>
<div id=formulario>
    <form action="cadastrar-conta.php" method="post">
        <fieldset>
        <legend>Dados do Cliente:</legend>
            <label for="nome">Nome:</label><br/>
            <input type="text" name="nome" id="campo"><br/>
            <label for="cpf">CPF:</label><br/>
            <input type="text" name="cpf" id="campo"><br/></br/>
        </fieldset>
        <fieldset>
            <legend>Dados da Conta:</legend>
            <label for="agencia">Agencia:</label><br/>
            <input type="text" name="agencia" id="campo"><br/>
            <label for="conta">Conta:</label><br/>
            <input type="text" name="conta" id="campo"><br/>
            <label for="saldo">Saldo:</label><br/>
            <input type="text" name="saldo" id="campo"><br/>
        </fieldset>
        <button type="submit">Cadastrar</button>
    </form>
    </div>
<hr>
<table>
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
</body>
</html>
