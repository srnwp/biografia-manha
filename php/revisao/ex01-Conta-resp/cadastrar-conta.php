<?php
require_once 'ContaCorrente.class.php';
require_once 'Cliente.class.php';
require_once 'ContaPoupanca.class.php';
require_once 'BancoDB.class.php';

$cliente= new Cliente();
$cliente->setNome($_POST['nome']);
$cliente->setCpf($_POST['cpf']);

$conta= new ContaCorrente();
$conta->setCliente($cliente);
$conta->setAgencia($_POST['agencia']);
$conta->setNumero($_POST['conta']);
$conta->setSaldo($_POST['saldo']);


$banco = new BancoDB();
$banco->salva($conta);


header('location: formulario.php');

?>