<?php
require_once(__DIR__ . "/./Estado.class.php");

class User {
    private $id;
    private $nome;
    private $email;
    private $login;
    private $senha;
    private $datacad;
    private $estado;
    private $cidade;
    
    public function __construct($login=null, $senha=null) {
        $this->setLogin($login);
        $this->setSenha($senha);
        $this->estado = new Estado();
    }

    public function setLogin($login) {
        $this->login = strtolower($login);
    }

    public function setSenha($senha) {
        $this->senha = $senha;
    }

    public function getLogin() {
        return $this->login;
    }

    public function getSenha() {
        return $this->senha;
    }

    public function setId($id) {
        $this->id = $id;
    }
    public function setNome($nome) {
        $this->nome = $nome;
    }
    public function setEmail($email) {
        $this->email = $email;
    }
    public function setDataCad($datacad) {
        $this->datacad = $datacad;
    }
    public function setCidade($cidade) {
        $this->cidade = $cidade;
    }
    public function setEstado(Estado $uf) {
        $this->estado = $uf;
    }
    
    public function getId() {
        return $this->id;
    }

    public function getNome() {
        return $this->nome;
    }

    public function getEmail() {
        return $this->email;
    }

    public function getCidade() {
        return $this->cidade;
    }
    public function getEstado() {
        return $this->estado;
    }

    public function getDataCad() {
        return $this->datacad;
    }

}   
