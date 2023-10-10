<?php
#Nome do arquivo: TurmaDAO.php
#Objetivo: classe DAO para o model de Turma

include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../model/Turma.php");

class TurmaDAO {

    //Método para listar as turmas a partir da base de dados
    public function list() {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM turma AS t ORDER BY nome_turma";
        $stm = $conn->prepare($sql);    
        $stm->execute();
        $result = $stm->fetchAll();
        
        return $this->mapTurmas($result);
    }

    //Método para listar as turmas a partir da base de dados
    public function listByProfessor(int $idProfessor) {
        $conn = Connection::getConn();

        $sql = "SELECT t.* FROM turma_professor tp" . 
                " JOIN turma t ON (t.id_turma = tp.id_turma)" . 
                " WHERE tp.id_professor = ?" .
                " ORDER BY t.nome_turma";
        $stm = $conn->prepare($sql);    
        $stm->execute([$idProfessor]);
        $result = $stm->fetchAll();
        
        return $this->mapTurmas($result);
    }

    //Método para buscar uma turma por seu ID
    public function findById(int $id) {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM turma t" .
               " WHERE t.id_turma = ?";
        $stm = $conn->prepare($sql);    
        $stm->execute([$id]);
        $result = $stm->fetchAll();

        $turmas = $this->mapTurmas($result);

        if(count($turmas) == 1)
            return $turmas[0];
        elseif(count($turmas) == 0)
            return null;

        die("TurmaDAO.findById()" . " - Erro: mais de uma turma encontrada.");
    }

    //Método para inserir uma Turma
    public function insert(Turma $turma) {
        $conn = Connection::getConn();

        $sql = "INSERT INTO turma (nome_turma, num_alunos, horario, dia_semana)" .
        " VALUES (:nome_turma, :num_alunos, :horario, :dia_semana)";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("nome_turma", $turma->getNomeTurma());
        $stm->bindValue("num_alunos", $turma->getNumAlunos());
        $stm->bindValue("horario", $turma->getHorario());
        $stm->bindValue("dia_semana", $turma->getDiaSemana());

        $stm->execute();
    }

    //Método para atualizar uma Turma
    public function update(Turma $turma) {
        $conn = Connection::getConn();

        $sql = "UPDATE turma SET nome_turma = :nome_turma, num_alunos = :num_alunos," . 
               " horario = :horario, dia_semana = :dia_semana" .   
               " WHERE id_turma= :id_turma";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("id_turma", $turma->getIdTurma());
        $stm->bindValue("nome_turma", $turma->getNomeTurma());
        $stm->bindValue("num_alunos", $turma->getNumAlunos());
        $stm->bindValue("horario", $turma->getHorario());
        $stm->bindValue("dia_semana", $turma->getDiaSemana());
        $stm->execute();
    }

    //Método para excluir uma Turma pelo seu ID
    public function deleteById(int $id) {
        $conn = Connection::getConn();

        $sql = "DELETE FROM turma WHERE id_turma = :id_turma";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("id_turma", $id);
        $stm->execute();
    }

    //Método para converter um registro da base de dados em um objeto Turma
    private function mapTurmas($result) {
        $turmas = array();
        foreach ($result as $reg) {
            $turma = new Turma();
            $turma->setIdTurma($reg['id_turma']);
            $turma->setNomeTurma($reg['nome_turma']);
            $turma->setNumAlunos($reg['num_alunos']);
            $turma->setHorario($reg['horario']);
            $turma->setDiaSemana($reg['dia_semana']);
            array_push($turmas, $turma);
        }

        return $turmas;
    }

}