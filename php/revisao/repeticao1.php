<?php

$tabuada = $_REQUEST['tabuada'];
for($i = 1; $i <= 9; $i++){
    $resultado = $tabuada * $i;
    echo "$tabuada x $i = $resultado";
    echo "<br>";
}
header('location: repeticao2.php');