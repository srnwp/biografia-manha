<?php

require_once(__DIR__ . "/./classes/modelo/User.class.php");
require_once(__DIR__ . "/./classes/dao/UserDAO.class.php");
session_start();

$userDAO = new UserDAO();

$login = $_POST['login'];
$senha = $_POST['senha'];
$user = $userDAO->logar($login, $senha);

if ($user != null) {
    $_SESSION['isLogado'] = true;
    $_SESSION['usuario_logado'] = serialize($user);
    header('location: membros/');
} else {
    $_SESSION['isLogado'] = false;
    $_SESSION['mensagem'] = "Login ou Senha inválidos!!!";
    header('location: index.php');
}
