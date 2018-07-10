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
        $lampada = 'off.jpg';
        if (!empty($_GET['ligar']) && $_GET['ligar']=='ligada'){
            $lampada = 'on.jpg';}
    ?>
    <img src="<?php echo $lampada; ?>">
    <form method="get">
        <button type="submit" name="ligar" value="ligada">Ligar</button>
        <button type="submit" name="desligar" value="desligada">Desligar</button>
    </form>
</div>
