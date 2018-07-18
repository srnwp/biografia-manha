
<?php
require_once 'ContaCorrente.class.php';
require_once 'Cliente.class.php';
require_once 'ContaPoupanca.class.php';
require_once 'ContaPoupanca.class.php';
require_once 'BancoDB.class.php';

$rafael = new Cliente();
$rafael->setNome('Rafael');
$rafael->setEmail('rafa@email.com');
$rafael->setCpf('123.123.123-22');

$contaRafa = new ContaCorrente();

$contaRafa->setCliente($rafael);
$contaRafa->setAgencia('1234-5');
$contaRafa->setNumero('99999-9');
$contaRafa->setSaldo(1000);
$contaRafa->setLimite(500);



$banco = new BancoDB();
//$banco->salva($contaRafa);
//<?=var_dump($banco->listaTodas());
?>

<pre>
<?=var_dump($banco->obterContaPeloNome('Rafael'));?>
</pre>