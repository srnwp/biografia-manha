<?php
require_once 'Secao.class.php';
class Produto extends Secao{
    private $nome;
    private $preco_unit;
    private $quantidade;
    private $descricao;
    private $data_entrada;
    private $desconto;

    public function __construct($nome, $preco_unit, $quantidade, $descricao, $data_entrada, $desconto, $tipo, $promocao){
        $this->nome = $nome;
        $this->preco_unit = $preco_unit;
        $this->quantidade = $quantidade;
        $this->descricao = $descricao;
        $this->data_entrada = $data_entrada;
        $this->desconto = $desconto;
        parent::__construct($tipo, $promocao);
    }

    public function getNome(){
        return $this->nome;
    }
    public function setNome($nome){
        $this->nome = $nome;
    }
    public function getPreco_unit(){
        return $this->preco_unit;
    }
    public function setPreco_unit($preco_unit){
        $this->preco_unit = $preco_unit;
    }
    public function getQuantidade(){
        return $this->quantidade;
    }
    public function setQuantidade($quantidade){
        $this->quantidade = $quantidade;
    }
    public function getData_entrada(){
        return $this->data_entrada;
    }
    public function setData_entrada($data_entrada){
        $this->data_entrada = $data_entrada;
    }
    public function getDesconto(){
        return $this->desconto;
    }
    public function setDesconto($desconto){
        $this->desconto = $desconto;
    }

}