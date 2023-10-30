<?php
#Nome do arquivo: FrequenciaDAO.php
#Objetivo: classe DAO para o model de Frequencia

include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../model/Frequencia.php");
include_once(__DIR__ . "/../model/Aluno.php");

class FrequenciaDAO {
    //Método para listar a Frequencia a partir da base de dados
    public function list($id) {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM frequencia f" .
        " INNER JOIN turma_aluno ta ON f.id_turma_aluno = ta.id_turma_aluno" .
        " INNER JOIN aluno a ON ta.id_aluno = a.id_aluno WHERE f.id_encontro = ?";

        $stm = $conn->prepare($sql);    
        $stm->execute([$id]);
        $result = $stm->fetchAll();
        return $this->mapFrequenciasAndTurma($result);

    }

    public function listByEncontro($id) {
            $conn = Connection::getConn();
    
            $sql = "SELECT * FROM frequencia f WHERE id_encontro = ?";
    
            $stm = $conn->prepare($sql);    
            $stm->execute([$id]);
            $result = $stm->fetchAll();
            return $this->mapFrequencias($result);
    }

    //Método para atualizar uma Frequencia
    public function insert(Array $frequencia) {
        $conn = Connection::getConn();

        foreach($frequencia as $freq):
        $sql = "INSERT INTO frequencia (id_encontro, id_turma_aluno, condicao)" . 
               " VALUES (:id_encontro, :id_turma_aluno, :condicao)";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("id_encontro", $freq->getIdEncontro());
        $stm->bindValue("id_turma_aluno", $freq->getIdTurmaAluno());
        $stm->bindValue("condicao", $freq->getCondicao());
        $stm->execute();
        endforeach;
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
           
    private function mapFrequenciasAndTurma($result) {
        $frequencias = array();
        foreach ($result as $reg) {
            $frequencia = new Frequencia();
            $frequencia->setIdFrequencia($reg['id_frequencia']);
            $frequencia->setCondicao($reg['condicao']);

            $aluno =  new Aluno();
            $aluno->setIdAluno($reg['id_aluno']);
            $aluno->setIdTurmaAluno($reg['id_turma_aluno']);
            $aluno->setNomeAluno($reg['nome_aluno']);
            $aluno->setFoto($reg['foto']);

            $frequencia->setAluno($aluno);
            array_push($frequencias, $frequencia);
            
        }

        return $frequencias;
    }

    public function alterarEstadoFalta($condicao, $idFrequencia) {
        $conn = Connection::getConn();


        $sql = "UPDATE frequencia f SET f.condicao = :condicao WHERE f.id_frequencia = :idFrequencia";

        $stm = $conn->prepare($sql);
        $stm->bindValue("idFrequencia", $idFrequencia);
        $stm->bindValue("condicao", $condicao);
        $stm->execute();
  
        return;
    }
}
    
