<?php
#Nome do arquivo: EncontroDAO.php
#Objetivo: classe DAO para o model de Encontro

include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../model/Encontro.php");

class EncontroDAO {

    //Método para listar os encontros a partir da base de dados
    public function list($id) {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM encontro e where id_turma = ".$id." ORDER BY e.nome_encontro";
        $stm = $conn->prepare($sql);    
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->mapEncontro($result);
    }

    //Método para buscar um encontro por seu ID
    public function findEncontroById(int $idEncontro) {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM encontro e" .
               " WHERE e.id_encontro = ?";
        $stm = $conn->prepare($sql);    
        $stm->execute([$idEncontro]);
        $result = $stm->fetchAll();

        $encontro = $this->mapEncontro($result);

        if(count($encontro) == 1)
            return $encontro[0];
        elseif(count($encontro) == 0)
            return null;

        die("EncontroDAO.findEncontroById()" . 
            " - Erro: mais de um encontro encontrado.");
    }

    //Método para inserir um Encontro
    public function insert(Encontro $encontro) {
        $conn = Connection::getConn();

        $sql = "INSERT INTO encontro (id_encontro,id_turma, nome_encontro, dia_encontro)" .
               " VALUES (:id_encontro, :id_turma, :nome_encontro, :dia_encontro)";
              $stm = $conn->prepare($sql);
        $stm->bindValue("id_encontro", $encontro->getIdEncontro());
        $stm->bindValue("id_turma", $encontro->getIdTurma());
        $stm->bindValue("nome_encontro", $encontro->getNomeEncontro());
        $stm->bindValue("dia_encontro", $encontro->getDiaEncontro());
        
        $stm->execute();
     
    }


    //Método para atualizar um Encontro
    public function update(Encontro $encontro) {
        $conn = Connection::getConn();

        $sql = "UPDATE encontro SET id_encontro = :id_encontro, nome_encontro = :nome_encontro, dia_encontro = :dia_encontro, id_turma = :id_turma" .  
               " WHERE id_encontro = :id_encontro";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("id_encontro", $encontro->getIdEncontro());
        $stm->bindValue("id_turma", $encontro->getIdTurma());
        $stm->bindValue("nome_encontro", $encontro->getNomeEncontro());
        $stm->bindValue("dia_encontro", $encontro->getDiaEncontro());
        $stm->execute();
    }
    
    //Método para deletar um Encontro pelo seu ID
    public function deleteById(int $idEncontro) {
        $conn = Connection::getConn();
        $sql = "DELETE FROM encontro WHERE id_encontro = :id";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("id", $idEncontro);
        $stm->execute();
    }
   
    //Método para converter um registro da base de dados em um objeto Encontro
    private function mapEncontro($result) {
        $encontros = array();
        foreach ($result as $reg) {
            $encontro = new Encontro();
            $encontro->setIdEncontro($reg['id_encontro']);
            $encontro->setNomeEncontro($reg['nome_encontro']);
            $encontro->setDiaEncontro($reg['dia_encontro']);
            $encontro->setIdTurma($reg['id_turma']);


            array_push($encontros, $encontro);
        }

        return $encontros;
    }

}
