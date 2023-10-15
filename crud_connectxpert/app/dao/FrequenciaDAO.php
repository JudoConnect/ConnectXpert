<?php
#Nome do arquivo: FrequenciaDAO.php
#Objetivo: classe DAO para o model de Frequencia

include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../model/Frequencia.php");

class FrequenciaDAO {
    //Método para listar a Frequencia a partir da base de dados
    public function list() {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM frequencia AS f ORDER BY id_turma_aluno";
        $stm = $conn->prepare($sql);    
        $stm->execute();
        $result = $stm->fetchAll();
        
        return $this->mapFrequencias($result);
    }

    //Método para buscar uma frequencia por seu ID
    public function findFrequenciaById(int $idFrequencia) {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM frequencia f" .
               " WHERE f.id_frequencia = ?";
        $stm = $conn->prepare($sql);    
        $stm->execute([$idFrequencia]);
        $result = $stm->fetchAll();

        $frequencias = $this->mapFrequencias($result);

        if(count($frequencias) == 1)
            return $frequencias[0];
        elseif(count($frequencias) == 0)
            return null;

        die("FrequenciaDAO.findById()" . 
            " - Erro: mais de uma frequencia encontrado.");
    }

    //Método para atualizar uma Frequencia
    public function update(Frequencia $frequencia) {
        $conn = Connection::getConn();

        $sql = "UPDATE frequencia SET condicao = :condicao" . 
               " WHERE id_frequencia = :id_frequencia";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("id_frequencia", $frequencia->getIdFrequencia());
        $stm->bindValue("condicao", $frequencia->getCondicao());
        $stm->execute();
    }

    //Método para converter um registro da base de dados em um objeto Ie
    private function mapFrequencias($result) {
        $frequencias = array();
        foreach ($result as $reg) {
            $frequencia = new Frequencia();
            $frequencia->setIdFrequencia($reg['id_frequencia']);
            $frequencia->setCondicao($reg['condicao']);
            array_push($frequencias, $frequencia);
        }

        return $frequencias;
    }

}

