<?php

abstract class Pessoa { // abstract porque não é uma classe que pode ser criada, serve apenas de modelo

    private $nome;
    private $sexo;
    private $idade;

    function __construct($nome='', $sexo='M', $idade=0){
        $this->setNome($nome);
        $this->setSexo($sexo);
        $this->setIdade($idade);
    }
    function setNome($nome){
        $qtd = strlen($nome);
        if($qtd >1){
            $this->nome = strtoupper($nome);
        }else{
            $this->nome = '';
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
    function setIdade($idade){
        if (is_numeric($idade) && $idade>=0 && $idade<=150){
            $this->idade=$idade;
        }else{
            $this->idade = 0;
        }
    }
    function getIdade(){
        return $this->idade;
    }
}