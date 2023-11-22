<?php
#Nome do arquivo: administradorDAO.php
#Objetivo: classe DAO para o model de administrador

include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../model/administrador.php");

class administradorDAO {

    //Método para listar os administradores a partir da base de dados
    public function list() {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM administrador u ORDER BY u.nome_administrador";
        $stm = $conn->prepare($sql);    
        $stm->execute();
        $result = $stm->fetchAll();
        
        return $this->mapadministradors($result);
    }

    //Método para buscar um administrador por seu ID
    public function findById(int $id) {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM administrador u" .
               " WHERE u.id_administrador = ?";
        $stm = $conn->prepare($sql);    
        $stm->execute([$id]);
        $result = $stm->fetchAll();

        $administradors = $this->mapadministradors($result);

        if(count($administradors) == 1)
            return $administradors[0];
        elseif(count($administradors) == 0)
            return null;

        die("administradorDAO.findById()" . 
            " - Erro: mais de um usuário encontrado.");
    }


    //Método para buscar um administrador por seu login e senha
    public function findByLoginSenha(string $login, string $senha) {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM administrador u" .
               " WHERE u.login = ? AND u.senha = ?";
        $stm = $conn->prepare($sql);    
        $stm->execute([$login, $senha]);
        $result = $stm->fetchAll();

        $administradors = $this->mapadministradors($result);

        if(count($administradors) == 1)
            return $administradors[0];
        elseif(count($administradors) == 0)
            return null;

        die("administradorDAO.findByLoginSenha()" . 
            " - Erro: mais de um usuário encontrado.");
    }

    //Método para inserir um administrador
    public function insert(administrador $administrador) {
        $conn = Connection::getConn();

        $sql = "INSERT INTO administrador (nome_administrador, login, senha, papeis, rg, cpf, idade, telefone, sexo, nascimento)" .
               " VALUES (:nome, :login, :senha, :papeis, :rg, :cpf, :idade, :telefone, :sexo, :nascimento)";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("nome", $administrador->getNome());
        $stm->bindValue("login", $administrador->getLogin());
        $stm->bindValue("senha", $administrador->getSenha());
        $stm->bindValue("papeis", $administrador->getPapeis());
    

        $stm->execute();
    }

    //Método para atualizar um administrador
    public function update(administrador $administrador) {
        $conn = Connection::getConn();

        $sql = "UPDATE administrador SET nome_administrador = :nome, login = :login," . 
               " senha = :senha, papeis = :papeis" .   
               " WHERE id_administrador = :id";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("nome", $administrador->getNome());
        $stm->bindValue("login", $administrador->getLogin());
        $stm->bindValue("senha", $administrador->getSenha());
        $stm->bindValue("papeis", $administrador->getPapeis());
        $stm->bindValue("id", $administrador->getId());
        $stm->execute();
    }
    
    //Método para excluir um administrador pelo seu ID
    public function deleteById(int $id) {
        $conn = Connection::getConn();

        $sql = "DELETE FROM administrador WHERE id_administrador = :id";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("id", $id);
        $stm->execute();
    }

    //Método para converter um registro da base de dados em um objeto administrador
    private function mapadministradors($result) {
        $administradors = array();
        foreach ($result as $reg) {
            $administrador = new administrador();
            $administrador->setId($reg['id_administrador']);
            $administrador->setNome($reg['nome_administrador']);
            $administrador->setLogin($reg['login']);
            $administrador->setSenha($reg['senha']);
            $administrador->setPapeis($reg['papeis']);
            array_push($administradors, $administrador);
        }

        return $administradors;
    }

}