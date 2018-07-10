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
        $lampada = isset($_POST['ligar']) ? 'on.jpg' : 'off.jpg';
        ?>
    <img src="<?=$lampada?>">
    <form method="post">
        <button type="submit" name="ligar">Ligar</button>
        <button type="submit" name="desligar">Desligar</button>
    </form>
</div>
