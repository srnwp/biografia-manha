<?php
require_once 'Classes/Pessoa.class.php';
require_once 'Classes/Vendedor.class.php';

$vendedor = new Vendedor();

$vendedor->setNome('Hudson');
$vendedor->setMatricula('0001');
$vendedor->setIdade(18);

echo $vendedor->getNome();
echo $vendedor->getMatricula();
echo $vendedor->getSexo();