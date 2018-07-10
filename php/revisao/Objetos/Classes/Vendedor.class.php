<?php
class Vendedor extends Pessoa{
    private $matricula;
    private $cpf;
    private $cartao;

        function __construct($matricula='',$nome='', $idade='', $sexo='', $salario='', $admissao='' ){
            parent::__construct($nome, $sexo, $idade);
            $this->setMatricula($matricula);
            $this->setSalario($salario);
            $this->setAdmissao($admissao);
        }
        function setMatricula($matricula){
            $this->matricula = $matricula;
        }
        function getMatricula(){
            return $this->matricula;
        }
        function setSalario($salario){
            $this->salario = $salario;
        }
        function getSalario(){
            return $this->salario;
        }
        function setAdmissao($admissao){
            $this->admissao = $admissao;
        }
        function getAdmissao(){
            return $this->admissao;
        }
    }
    