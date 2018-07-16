<?php
require_once 'Conta.class.php';

class ContaCorrente extends Conta{
    private static $qtdContas = 0;
    public const TAXA = 5;//const faz o valor não poder mais ser mudado, apenas acessado
    private $limite;

    public function __construct(){
        self::$qtdContas++;
    }
    public function getLimite(){
        return $this->limite;
    }
    public function setLimite($limite){
        $this->limite = $limite;
    }
    public function saca($valor){
        $saldovirtual = parent::getSaldo() + $this->limite + self::TAXA;
        if(is_numeric($valor) && $valor > 0 && $valor <= $saldovirtual){
            $novosaldo = parent::getSaldo() - $valor - self::TAXA;
            parent::setSaldo($novosaldo);
            return true;
        }
        return false;
        
    }
    public static function getQuantidadeContas(){
        return self::$qtdContas;
    }
}
