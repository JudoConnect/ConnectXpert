<?php
#Nome do arquivo: TurmaAlunoDAO.php
#Objetivo: classe DAO para o model de TurmaAluno

include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../model/Turma.php");

class TurmaAlunoDAO {
 
    //Método para inserir uma TurmaAluno
    public function insert(int $idTurma, int $idAluno) {
        $conn = Connection::getConn();

        $sql = "INSERT INTO turma_aluno (id_turma, id_aluno)" .
        " VALUES (:id_turma, :id_aluno)";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("id_turma", $idTurma);
        $stm->bindValue("id_aluno", $idAluno);

        $stm->execute();
    }

    //Método para excluir uma TurmaAluno pelo seu ID
    public function deleteById(int $id) {
        $conn = Connection::getConn();

        $sql = "DELETE FROM turma_aluno WHERE id_turma_aluno = :id_turma_aluno";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("id_turma_aluno", $id);
        $stm->execute();
    }

    public function findAlunoTurma(int $idTurma, int $idAluno) {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM turma_aluno WHERE id_turma = :id_turma AND id_aluno = :id_aluno";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("id_turma", $idTurma);
        $stm->bindValue("id_aluno", $idAluno);
        $stm->execute();
        $result = $stm->fetchAll();

        if(count($result) > 0)
            return true;

        return false;
    }



}