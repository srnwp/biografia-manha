<?php

require_once(__DIR__ . "/./User.class.php");

class Produto {

    private $idproduto;
    private $nomeproduto;
    private $telefone;
    private $whatsapp;
    private $descricao;
    private $foto;
    private $quant;
    private $preco;
    private $vendido;
    private $dataprod;
    private $user;

    public function __construct() {
        $this->user = new User();
        
    }

    public function getId() {
        return $this->user->id;
    }
     public function getNome() {
        return $this->user->getNome();
    }
    public function getIdProduto() {
        return $this->idproduto;
    }
    public function getNomeProduto() {
        return $this->nomeproduto;
    }
    public function getTelefone() {
        return $this->telefone;
    }
    public function getWhatsapp() {
        return $this->whatsapp;
    }
    public function getDescricao() {
        return $this->descricao;
    }
    public function getFoto() {
        return $this->foto;
    }
    public function getQuant() {
        return $this->quant;
    }
    public function getPreco() {
        return $this->preco;
    }
    public function getVendido() {
        return $this->vendido;
    }
    public function getDataProduto() {
        return $this->dataprod;
    }
   
    public function getPrecoFormatado() {
        return 'R$ ' . number_format($this->preco, 2, ',', '.');
    }
    public function setIdProduto($idproduto) {
        $this->idproduto = $idproduto;
    }
    public function setNomeProduto($nomeproduto) {
        $this->nomeproduto = strtoupper($nomeproduto);
    }
    public function setTelefone($telefone) {
        $this->telefone = $telefone;
    }
    public function setWhatsapp($whatsapp) {
        $this->whatsapp = $whatsapp;
    }
    public function setDescricao($descricao) {
        $this->descricao = $descricao;
    }
    public function setFoto($foto) {
    
        $this->foto = $foto;
    }
    public function setQuant($quant) {
        $this->quant = $quant;
    }
    public function setPreco($preco) {
        $this->preco = $preco;
        
    }
    public function setPrecoFormatado() {
        $this->precoFormatado = $precoFormatado;
    }
    public function setVendido($vendido) {
        $this->vendido = $vendido;
    }
    public function setDataProduto($dataprod) {
        $this->dataprod = $dataprod;
    }
    public function setUser($user) {
        $this->user = $user;
    }
    public function getUser() {
        return $this->user;
    }

}
