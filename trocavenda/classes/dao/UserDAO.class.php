<?php

require_once(__DIR__ . "/./Conexao.class.php");
require_once(__DIR__ . "/../modelo/User.class.php");
require_once(__DIR__ . "/../modelo/Estado.class.php");

class UserDAO {

    private $conexao;

    function __construct() {
        $this->conexao = Conexao::get();
    }

    public function logar($login, $senha) {
        $sql = "SELECT * FROM TB_USUARIOS JOIN TB_ESTADOS ON EST_ID=USU_EST_ID WHERE USU_LOGIN=:login_ AND USU_SENHA=:senha LIMIT 1";
        $statement = $this->conexao->prepare($sql);
        $statement->bindParam(':login_', $login);
        $statement->bindParam(':senha', $senha);
        $statement->execute();
        $row = $statement->fetch();
        $estado = new Estado();
        $estado->setUF($row['EST_ESTADO']);
        $user = new User();
        $user->setId($row['USU_ID']);
        $user->setNome($row['USU_NOME']);
        $user->setEmail($row['USU_EMAIL']);
        $user->setLogin($row['USU_LOGIN']);
        $user->setSenha($row['USU_SENHA']);
        $user->setDataCad($row['USU_DATACAD']);
        $user->setCidade($row['USU_CIDADE']);
        $user->setEstado($estado);
        return $user;
    }
     private function insert(User $user) {
        $sql = "INSERT INTO TB_USUARIOS (USU_NOME, USU_EMAIL, USU_LOGIN, USU_SENHA, USU_CIDADE, USU_EST_ID) VALUES (:nome, :email, :login_, :senha, :cidade, :estado)";
        try {
            $nome = $user->getNome();
            $email = $user->getEmail();
            $login = $user->getLogin();
            $senha = $user->getSenha();
            $datacad = $user->getDataCad();
            $cidade = $user->getCidade();
            $estado = $user->getEstado()->getId();
            $statement = $this->conexao->prepare($sql);
            $statement->bindParam(':nome', $nome);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':login_', $login);
            $statement->bindParam(':senha', $senha);
            $statement->bindParam(':cidade', $cidade);
            $statement->bindParam(':estado', $estado);
            $statement->execute();
            return $this->findById($this->conexao->lastInsertId());
        } catch(PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }

    private function update(User $user) {
        $sql = "UPDATE TB_USUARIOS SET USU_NOME=:nome, USU_EMAIL=:email, USU_LOGIN=:login_, USU_SENHA=:senha, USU_DATACAD=:datacad, USU_CIDADE=:cidade, USU_EST_ID=:estado WHERE USU_ID=:id";
        try {
            $nome = $user->getNome();
            $email = $user->getEmail();
            $login = $user->getLogin();
            $senha = $user->getSenha();
            $cidade = $user->getCidade();
            $estado = $user->getEstado()->getId();
            $id = $user->getId();
            $statement = $this->conexao->prepare($sql);
            $statement->bindParam(':nome', $nome);
            $statement->bindParam(':email', $email);
            $statement->bindParam(':login_', $login);
            $statement->bindParam(':senha', $senha);
            $statement->bindParam(':cidade', $cidade);
            $statement->bindParam(':estado', $estado);
            $statement->bindParam(':id', $id);
            $statement->execute();
            return $this->findById($user->getId());
        } catch(PDOException $e) {
            echo $e->getMessage();
            return null;
        }
    }
    
    public function save(User $user) {
        if (is_null($user->getId())) {
            return $this->insert($user);
        } else {
            return $this->update($user);
        }
    }

    public function remove($id) {
        $sql = "DELETE FROM TB_USUARIOS WHERE USU_ID=:ID";
        try {
            $statement = $this->conexao->prepare($sql);
            $statement->bindParam(':ID', $id);
            $statement->execute();
        } catch(PDOException $e) {
            echo $e->getMessage();
        }
    }

     public function findById($id) {
        $sql = "SELECT * FROM TB_USUARIOS JOIN TB_ESTADOS ON EST_ID=USU_EST_ID WHERE USU_ID=:id";
        $statement = $this->conexao->prepare($sql);
        $statement->bindParam(':id', $id);
        $statement->execute();
        $row = $statement->fetch();
        $estado = new Estado();
        $estado->setUF($row['EST_ESTADO']);
        $user = new User();
        $user->setId($row['USU_ID']);
        $user->setNome($row['USU_NOME']);
        $user->setEmail($row['USU_EMAIL']);
        $user->setLogin($row['USU_LOGIN']);
        $user->setSenha($row['USU_SENHA']);
        $user->setDataCad($row['USU_DATACAD']);
        $user->setCidade($row['USU_CIDADE']);
        $user->setEstado($estado);
        return $user;
    }
/*
    public function achaUsuario($login,$senha){
        $sql = "SELECT * FROM TB_USUARIOS WHERE USU_LOGIN=:login AND USU_SENHA=:senha LIMIT 1";
        $statement = $this->conexao->prepare($sql);
        $statement->bindParam(':login', $login);
        $statement->bindParam(':senha', $senha);
        $statement->execute();
        $resultado = $statement->fetch();
        $estado = new Estado();
        $estado->setId($row['EST_ID']);
        $estado->setUF($row['EST_ESTADO']);
        $user = new User();
        $user->setId($row['USU_ID']);
        $user->setNome($row['USU_NOME']);
        $user->setEmail($row['USU_EMAIL']);
        $user->setLogin($row['USU_LOGIN']);
        $user->setDataCad($row['USU_DATACAD']);
        $user->setCidade($row['USU_CIDADE']);
        $user->setEstado($estado);
        }
 */       
}
