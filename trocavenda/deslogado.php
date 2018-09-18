<?php

session_start();
$homeMembros = "membros/";
if (isset($_SESSION['isLogado']) && $_SESSION['isLogado']) {
    header("location: $homeMembros");
}
