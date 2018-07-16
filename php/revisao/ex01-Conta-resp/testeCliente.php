
<?php
require_once 'ContaCorrente.class.php';
require_once 'Cliente.class.php';
require_once 'ContaPoupanca.class.php';

$rafael = new Cliente();
$rafael->setNome('Rafael');
$rafael->setEmail('rafa@email.com');

$contaRafa = new ContaCorrente();

$contaRafa->setAgencia('1234-5');
$contaRafa->setNumero('99999-9');
$contaRafa->setSaldo(1000);
$contaRafa->setLimite(500);

$contaRafa->setCliente($rafael);

$contaRafa->saca(1100);
$contaRafa->deposita(900);

$fabiano= new Cliente();
$fabiano->setNome('Fabiano');
$fabiano->setEmail('fabiano@gmail.com');

$contaFab= new ContaPoupanca();
$contaFab->setCliente($fabiano);
$contaFab->setAgencia('6789-0');
$contaFab->setSaldo(500);

$contaRafa->transfere(100, $contaFab);
$contaFab->rende();

?>
<pre><?php var_dump($contaRafa); //para ver as variaveis da conta?></pre>
<hr>
<pre><?php var_dump($contaFab); //para ver as variaveis da conta?></pre>

<h1><?=ContaCorrente::getQuantidadeContas();?></h1>
<h1><?=ContaCorrente::TAXA?></h1>