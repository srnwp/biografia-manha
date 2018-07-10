<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <?php
    require_once 'classes/Pessoa.class.php';
    $pessoa= new Pessoa('Weskley','M',36);

echo "Nome: {$pessoa->getNome()}, Idade: {$pessoa->getIdade()}, Sexo: {$pessoa->getSexo()}";
?>
</body>
</html>