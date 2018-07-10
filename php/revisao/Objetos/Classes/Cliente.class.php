<?php

class Cliente extends Pessoa {
    private $cpf;
    private $cartao;

    function __construct($nome='', $cpf='', $idade='', $sexo='', $cartao=''){//definir os valores aqui faz com que nao seja obrigatorio alimentar os dados em outro lugar
        parent::__construct($nome, $sexo, $idade);
        $this->setCpf($cpf);
        $this->setCartao($cartao);
    }
    function setCpf($cpf){
        $this->cpf = $cpf;
    }
    function getCpf(){
        return $this->cpf;
    }
    function setCartao($cartao){
        $this->cartao = $cartao;
    }
    function getCartao(){
        return $this->cartao;
    }
}