<?php
require_once 'Classes/Pessoa.class.php';
require_once 'Classes/Cliente.class.php';

$cliente = new Cliente();

$cliente->setNome('Luan');
$cliente->setCpf('123.123.123-12');
$cliente->setIdade(23);

echo $cliente->getNome();
echo $cliente->getCpf();
echo $cliente->getSexo();