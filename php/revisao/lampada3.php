<?php

class Lampada{
    private $estado;
    private $potencia;
    private $imgLigada;
    private $imgDesligada;

    function __construct(){
        $this->estado = false;
        $this->potencia = 0;
        $this->imgDesligada = 'off.jpg';
        $this->imgLigada = 'on.jpg';
    }

    function setPotencia($potencia){
        $this->potencia = $potencia >= 0 ? $potencia : 0;
    }
    function getPotencia(){
        return $this->potencia;
    }
    function getEstado(){
        return $this->estado;
    }
    function getImagem(){
        return $this->estado ? $this->imgLigada : $this->imgDesligada;
    }
    function liga(){
        $this->estado=true;
    }
    function desliga(){
        $this->estado=false;
    }
    function __toString(){
        return "Lampada{potencia={$this->potencia}, estado={$this->estado}}";
    }
}