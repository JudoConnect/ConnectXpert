<?php
#Nome do arquivo: IeDAO.php
#Objetivo: classe DAO para o model de Instituicao de Ensino

include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../model/Ie.php");

class IeDAO {
    //Método para listar as ie a partir da base de dados
    public function list() {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM ie  AS i ORDER BY nome_ie";
        $stm = $conn->prepare($sql);    
        $stm->execute();
        $result = $stm->fetchAll();
        
        return $this->mapIe($result);
    }

    //Método para buscar uma ie por seu ID
    public function findById(int $idIe) {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM ie i" .
               " WHERE i.id_ie = ?";
        $stm = $conn->prepare($sql);    
        $stm->execute([$idIe]);
        $result = $stm->fetchAll();

        $ieS = $this->mapIe($result);

        if(count($ieS) == 1)
            return $ieS[0];
        elseif(count($ieS) == 0)
            return null;

        die("IeDAO.findById()" . 
            " - Erro: mais de uma IES encontrado.");
    }
}
