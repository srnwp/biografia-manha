<?php
Class Cliente{
    private $nome;
    private $sexo;
    private $idade;
    private $cpf;
    private $email;
    private $senha;

    function __construct($nome='', $sexo='M', $idade=0, $cpf='', $email='', $senha=''){
        $this->setNome($nome);
        $this->setSexo($sexo);
        $this->setIdade($idade);
        $this->setCpf($cpf);
        $this->setEmail($email);
        $this->setSenha($senha);
    }
    function setNome($nome){
        $qtd = strlen($nome);
        if($qtd >1){
            $this->nome = strtoupper($nome);
        }else{
            return false;
        }
    }
    function getNome(){
        return $this->nome;
    }
    function setSexo($sexo){
        $sex = strtoupper($sexo);
        if($sexo !='F'){
            $this->sexo = 'M';
        }else{
            $this->sexo = 'F';
        }
    }
    function getSexo(){
        return $this->sexo;
    }
    abstract function setIdade($idade){
        if (is_numeric($idade) && $idade>=0 && $idade<=150){
            $this->idade=$idade;
        }else{
            $this->idade = 0;
        }
    }
    function getIdade(){
        return $this->idade;
    }
    function setCpf($cpf){
        $this->cpf = $cpf;
    }
    function getCpf(){
        return $this->cpf;
    
    function setEmail($email){
        $this->email = $email;
        }
    function getEmail(){
        return $this->email;
    }
    function setSenha($senha){
        $this->senha = $senha;
    }
    function getSenha(){
        return $this->senha;
    }
}