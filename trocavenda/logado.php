<?php

session_start();
$home = "index.php";
if (!isset($_SESSION['isLogado']) || !$_SESSION['isLogado']) {
    header("location: $home");
}
