<?php

session_start();
session_destroy();

$home = "index.php";
header("location: $home");
