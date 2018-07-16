<?php

abstract class Pessoa { // abstract porque não é uma classe que pode ser criada, serve apenas de modelo p/ quem herda

    protected $nome;
    protected $sexo; // private, ao contrario do public, nao pode ser visto
    protected $idade; // protected para que possa ser visto apenas pelos herdeiros

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
    abstract function setIdade($idade){ //abstract na função faz com que a função não seja implementada 
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