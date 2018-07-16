<?php

abstract class Secao{
    private $categoria;
    private $subcategoria;
    private $promocao;
   
    public function getCategoria(){
        return $this->categoria;
    }
    public function setCategoria($categoria){
        $this->categoria = $categoria;
    }
    public function getSubcategoria(){
        return $this->subcategoria;
    }
    public function setSubcategoria($subcategoria){
        $this->subcategoria = $subcategoria;
    }
    public function getPromocao(){
        return $this->promocao;
    }
    public function setPromocao($promocao){
        $this->promocao = $promocao;
    }
}