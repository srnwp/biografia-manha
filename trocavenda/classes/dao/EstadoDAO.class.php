<?php

require_once(__DIR__ . "/./Conexao.class.php");
require_once(__DIR__ . "/../modelo/Estado.class.php");

class EstadoDAO {

    private $conexao;

    function __construct() {
        $this->conexao = Conexao::get();
    }

    public function findAll() {
        $sql = "SELECT * FROM TB_ESTADOS";
        $statement = $this->conexao->prepare($sql);
        $statement->execute();
        $rows = $statement->fetchAll();
        $estados = array();
        foreach ($rows as $row) {
            $estado = new Estado();
            $estado->setId($row['EST_ID']);
            $estado->setUF($row['EST_ESTADO']);
            array_push($estados, $estado);
        }
        return $estados;
    }

    public function findById($id) {
        $sql = "SELECT * FROM TB_ESTADOS WHERE EST_ID=:id";
        $statement = $this->conexao->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $row = $statement->fetch();
        $estado = new Estado();
        $estado->setId($row['EST_ID']);
        $estado->setUF($row['EST_ESTADO']);
        return $estado;
    }

}
