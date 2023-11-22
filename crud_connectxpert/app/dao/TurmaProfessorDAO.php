<?php
#Nome do arquivo: TurmaProfessorDAO.php
#Objetivo: classe DAO para o model de TurmaProfessor

include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../model/Turma.php");

class TurmaProfessorDAO {

    //Método para inserir um professor em uma turma
    public function insert(int $idTurma, int $idProf) {
        $conn = Connection::getConn();

        $sql = "INSERT INTO turma_professor (id_turma, id_professor)" .
        " VALUES (:id_turma, :id_professor)";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("id_turma", $idTurma);
        $stm->bindValue("id_professor", $idProf);

        $stm->execute();
    }

    //Método para excluir um professor de uma turma pelo seu ID
    public function deleteById(int $id) {
        $conn = Connection::getConn();

        $sql = "DELETE FROM turma_professor WHERE id_turma_professor = :id_turma_professor";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("id_turma_professor", $id);
        $stm->execute();
    }

    public function findProfessorTurma(int $idTurma, int $idProfessor) {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM turma_professor WHERE id_turma = :id_turma AND id_professor = :id_prof";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("id_turma", $idTurma);
        $stm->bindValue("id_prof", $idProfessor);
        $stm->execute();
        $result = $stm->fetchAll();

        if(count($result) > 0)
            return true;

        return false;
    }
}