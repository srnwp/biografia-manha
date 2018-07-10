<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta http-equiv="X-UA-Compatible" content="ie=edge">
    <title>Document</title>
</head>
<body>
    <form action="tabuada.php" method="post">
        <label for="tabuada">Tabuada:</label>
        <input type="number" name="tabuada" id="tabuada">
        <button type="submit">Calcular</button>
    </form>
<?php

$tabuada = 0;

if (!empty($_REQUEST['tabuada'])) {
    $tabuada = $_REQUEST['tabuada'];
}
if($tabuada > 0 && $tabuada<10){
for($i = 1; $i <= 9; $i++){
    $resultado = $tabuada * $i;
    echo "$tabuada x $i = $resultado";
    echo "<br>";
}
}
?>
</body>
</html>