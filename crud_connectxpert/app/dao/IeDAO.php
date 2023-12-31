<?php
#Nome do arquivo: IeDAO.php
#Objetivo: classe DAO para o model de Instituição de Ensino

include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../model/Ie.php");

class IeDAO {
    //Método para listar as instituição de ensino a partir da base de dados
    public function list() {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM ie  AS i ORDER BY nome_ie";
        $stm = $conn->prepare($sql);    
        $stm->execute();
        $result = $stm->fetchAll();
        
        return $this->mapIe($result);
    }

    //Método para buscar uma instituição de ensino por seu ID
    public function findById(int $idIe) {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM ie i" .
               " WHERE i.id_ie = ?";
        $stm = $conn->prepare($sql);    
        $stm->execute([$idIe]);
        $result = $stm->fetchAll();

        $ies = $this->mapIe($result);

        if(count($ies) == 1)
            return $ies[0];
        elseif(count($ies) == 0)
            return null;

        die("IeDAO.findById()" . 
            " - Erro: mais de uma IES encontrado.");
    }

    //Método para inserir uma instituição de ensino
    public function insert(Ie $ie) {
        $conn = Connection::getConn();

        $sql = "INSERT INTO ie (nome_ie)" .
        " VALUES (:nome_ie)";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("nome_ie", $ie->getNomeIe());

        $stm->execute();
    }

    //Método para atualizar uma instituição de ensino
    public function update(Ie $ie) {
        $conn = Connection::getConn();

        $sql = "UPDATE ie SET nome_ie = :nome_ie" . 
               " WHERE id_ie = :id_ie";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("id_ie", $ie->getIdIe());
        $stm->bindValue("nome_ie", $ie->getNomeIe());
        $stm->execute();
    }

    //Método para excluir uma instituição de ensino pelo seu ID
    public function deleteById(int $id) {
        $conn = Connection::getConn();

        $sql = "DELETE FROM ie WHERE id_ie = :id_ie";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("id_ie", $id);
        $stm->execute();
    }

    //Método para converter um registro da base de dados em um objeto instituição de ensino
    private function mapIe($result) {
        $ies = array();
        foreach ($result as $reg) {
            $ie = new Ie();
            $ie->setIdIe($reg['id_ie']);
            $ie->setNomeIe($reg['nome_ie']);
            array_push($ies, $ie);
        }

        return $ies;
    }

}

