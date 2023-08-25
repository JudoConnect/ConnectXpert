<?php
#Nome do arquivo: TurmaProfessorDAO.php
#Objetivo: classe DAO para o model de TurmaProfessor

include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../model/Turma.php");

class TurmaProfessorDAO {

    //Método para inserir uma TurmaProfessor
    public function insert(int $idTurma, int $idProf) {
        $conn = Connection::getConn();

        $sql = "INSERT INTO turma_professor (id_turma, id_professor)" .
        " VALUES (:id_turma, :id_professor)";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("id_turma", $idTurma);
        $stm->bindValue("id_professor", $idProf);

        $stm->execute();
    }

    //Método para excluir uma TurmaProfessor pelo seu ID
    public function deleteById(int $id) {
        $conn = Connection::getConn();

        $sql = "DELETE FROM turma WHERE id_turma = :id_turma";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("id_turma", $id);
        $stm->execute();
    }

}