<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
    <style>
    div{
        text-align: center
        }
    button{
        width:90px;
    }
    </style>
</head>
<body>
    <?php 
    require_once 'lampada2.php';
        $lampada = new Lampada ('off.jpg','on.jpg');
        if (isset($_POST['desligar'])){
            $lampada->desliga();
        }else{
            $lampada->liga();
        }
    ?>
    <img src="<?=$lampada->getImagem()?>">
    <form method="post">
        <button type="submit" name="ligar">Ligar</button>
        <button type="submit" name="desligar">Desligar</button>
    </form>
</div>
