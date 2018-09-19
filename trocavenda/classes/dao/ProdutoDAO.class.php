<?php

require_once(__DIR__ . "/./Conexao.class.php");
require_once(__DIR__ . "/../modelo/Produto.class.php");

class ProdutoDAO {

    private $conexao;

    function __construct() {
        $this->conexao = Conexao::get();
    }

    private function insert(Produto $produto) {
        $sql = "INSERT INTO TB_PRODUTOSDOSUSUARIOS (PDU_NOME, PDU_TELEFONE, PDU_WHATSAPP, PDU_DESCRICAO, PDU_FOTO, PDU_QUANT, PDU_VENDIDO, PDU_DATACAD, PDU_PRECO) VALUES (:nome, :telefone, :whatsapp, :descricao, :foto, :quant, :vendido, :datacad, :preco)";
        try {
            $nome = $produto->getNomeProduto();
            $telefone = $produto->getTelefone();
            $whatsapp = $produto->getWhatsapp();
            $descricao = $produto->getDescricao();
            $foto = $produto->getFoto();
            $quant = $produto->getQuant();
            $vendido = $produto->getVendido();
            $datacad = $produto->getDatCad();
            $preco = $produto->getPrecoFormatado();
            $user = $produto->getUser()->getId();
            $id = $produto->getIdProduto();
            $statement = $this->conexao->prepare($sql);
            $statement->bindParam(':nome', $nome);
            $statement->bindParam(':telefone', $telefone);
            $statement->bindParam(':whatsapp', $whatsapp);
            $statement->bindParam(':descricao', $descricao);
            $statement->bindParam(':foto', $foto);
            $statement->bindParam(':quant', $quant);
            $statement->bindParam(':vendido', $vendido);
            $statement->bindParam(':datacad', $datacad);
            $statement->bindParam(':preco', $preco);
            $statement->bindParam(':user', $user);
            $statement->bindParam(':id', $id);
            $statement->execute();
            return $this->conexao->lastInsertId();
        } catch(PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    private function update(Produto $produto) {
        $sql = "UPDATE TB_PRODUTOSDOSUSUARIOS SET PDU_NOME=:nome, PDU_TELEFONE=:telefone, PDU_WHATSAPP=:whatsapp, PDU_DESCRICAO=:descricao, PDU_FOTO=:foto, PDU_QUANT=:quant, PDU_VENDIDO=:vendido, PDU_DATACAD=:datacad, PDU_PRECO=:preco WHERE PDU_ID=:id";
        try {
            $nome = $produto->getNomeProduto();
            $telefone = $produto->getTelefone();
            $whatsapp = $produto->getWhatsapp();
            $descricao = $produto->getDescricao();
            $foto = $produto->getFoto();
            $quant = $produto->getQuant();
            $vendido = $produto->getVendido();
            $preco = $produto->getPrecoFormatado();
            $user = $produto->getUser()->getId();
            $id = $produto->getIdProduto();
            $statement = $this->conexao->prepare($sql);
            $statement->bindParam(':nome', $nome);
            $statement->bindParam(':telefone', $telefone);
            $statement->bindParam(':whatsapp', $whatsapp);
            $statement->bindParam(':descricao', $descricao);
            $statement->bindParam(':foto', $foto);
            $statement->bindParam(':quant', $quant);
            $statement->bindParam(':vendido', $vendido);
            $statement->bindParam(':preco', $preco);
            $statement->bindParam(':user', $user);
            $statement->bindParam(':id', $id);
            $statement->execute();
            return $this->findById($produto->getIdProduto());
        } catch(PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }
    
    public function save(Produto $produto) {
        if (is_null($produto->getIdProduto())) {
            return $this->insert($produto);
        } else {
            return $this->update($produto);
        }
    }

    public function remove($id) {
        $sql = "DELETE FROM TB_PRODUTOSDOSUSUARIOS WHERE PDU_ID=:ID";
        try {
            $statement = $this->conexao->prepare($sql);
            $statement->bindParam(':ID', $id);
            $statement->execute();
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

    public function findAll() {
        $sql = "SELECT * FROM TB_PRODUTOSDOSUSUARIOS LEFT JOIN TB_USUARIOS ON USU_ID=PDU_USU_ID LEFT JOIN TB_ESTADOS ON USU_EST_ID=EST_ID ORDER BY PDU_DATACAD DESC";
        $statement = $this->conexao->prepare($sql);
        $statement->execute();
        $rows = $statement->fetchAll();
        $produtos = array();
        foreach ($rows as $row) {
            $user = new User();
            $user->setId($row['USU_ID']);
            $user->setNome($row['USU_NOME']);
            $user->getEstado()->setUF($row['EST_ESTADO']);
            $user->setCidade($row['USU_CIDADE']);
            $produto = new Produto();
            $produto->setIdProduto($row['PDU_ID']);
            $produto->setNomeProduto($row['PDU_NOME']);
            $produto->setTelefone($row['PDU_TELEFONE']);
            $produto->setWhatsapp($row['PDU_WHATSAPP']);
            $produto->setDescricao($row['PDU_DESCRICAO']);
            $produto->setFoto($row['PDU_FOTO']);
            $produto->setQuant($row['PDU_QUANT']);
            $produto->setVendido($row['PDU_VENDIDO']);
            $produto->setDataProduto($row['PDU_DATACAD']);
            $produto->setPreco($row['PDU_PRECO']);
            $produto->setUser($user);
            array_push($produtos, $produto);
        }
        return $produtos;
    }

    public function findById(int $id) {
        $sql = "SELECT * FROM TB_PRODUTOSDOSUSUARIOS LEFT JOIN TB_USUARIOS ON USU_ID=PDU_USU_ID WHERE PDU_ID=:ID ORDER BY PDU_DATACAD DESC";
        $statement = $this->conexao->prepare($sql);
        $statement->bindParam(':ID', $id);
        $statement->execute();
        $row = $statement->fetch();
            $user = new User();
            $user->setId($row['USU_ID']);
            $user->setNome($row['USU_NOME']);
            $produto = new Produto();
            $produto->setIdProduto($row['PDU_ID']);
            $produto->setNomeProduto($row['PDU_NOME']);
            $produto->setTelefone($row['PDU_TELEFONE']);
            $produto->setWhatsapp($row['PDU_WHATSAPP']);
            $produto->setDescricao($row['PDU_DESCRICAO']);
            $produto->setFoto($row['PDU_FOTO']);
            $produto->setQuant($row['PDU_QUANT']);
            $produto->setVendido($row['PDU_VENDIDO']);
            $produto->setPreco($row['PDU_PRECO']);
            $produto->setUser($user);
        return $produto;
    }
    public function findByUser($id) {
        $sql = "SELECT * FROM TB_PRODUTOSDOSUSUARIOS LEFT JOIN TB_USUARIOS ON USU_ID=PDU_USU_ID WHERE usu_ID=:ID";
        $statement = $this->conexao->prepare($sql); 
        $statement->bindParam(':ID', $id);
        $statement->execute();
        $rows = $statement->fetchAll();
        $produtos = array();
        foreach ($rows as $row) {
            $user = new User();
            $user->setId($row['USU_ID']);
            $user->setNome($row['USU_NOME']);
            $produto = new Produto();
            $produto->setIdProduto($row['PDU_ID']);
            $produto->setNomeProduto($row['PDU_NOME']);
            $produto->setTelefone($row['PDU_TELEFONE']);
            $produto->setWhatsapp($row['PDU_WHATSAPP']);
            $produto->setDescricao($row['PDU_DESCRICAO']);
            $produto->setFoto($row['PDU_FOTO']);
            $produto->setQuant($row['PDU_QUANT']);
            $produto->setVendido($row['PDU_VENDIDO']);
            $produto->setPreco($row['PDU_PRECO']);
            $produto->setUser($user);
            array_push($produtos, $produto);
        }
        return $produtos;
    }
     public function findByName($pesquisa) {
        $sql = "SELECT * FROM TB_PRODUTOSDOSUSUARIOS LEFT JOIN TB_USUARIOS ON USU_ID=PDU_USU_ID WHERE USU_NOME='%$pesquisa%' ORDER BY PDU_DATACAD DESC";
        $statement = $this->conexao->prepare($sql); 
        $statement->execute();
        $rows = $statement->fetchAll();
        $produtos = array();
        foreach ($rows as $row) {
            $user = new User();
            $user->setId($row['USU_ID']);
            $user->setNome($row['USU_NOME']);
            $produto = new Produto();
            $produto->setIdProduto($row['PDU_ID']);
            $produto->setNomeProduto($row['PDU_NOME']);
            $produto->setTelefone($row['PDU_TELEFONE']);
            $produto->setWhatsapp($row['PDU_WHATSAPP']);
            $produto->setDescricao($row['PDU_DESCRICAO']);
            $produto->setFoto($row['PDU_FOTO']);
            $produto->setQuant($row['PDU_QUANT']);
            $produto->setVendido($row['PDU_VENDIDO']);
            $produto->setDataCad($row['PDU_DATACAD']);
            $produto->setPreco($row['PDU_PRECO']);
            $produto->setUser($user);
            array_push($produtos, $produto);
        }
        return $produtos;
    }
}

