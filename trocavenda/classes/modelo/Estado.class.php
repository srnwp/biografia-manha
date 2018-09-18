<?php

class Estado{

    private $id;
    private $uf;

    public function getId() {
        return $this->id;
    }

    public function getUF() {
        return $this->uf;
    }

    public function setId($id) {
        $this->id = $id;
    }

    public function setUF($uf) {
        $this->uf = strtoupper($uf);
    }

}
