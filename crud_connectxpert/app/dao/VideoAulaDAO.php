<?php
#Nome do arquivo: VideoAulaDAO.php
#Objetivo: classe DAO para o model de Vídeo Aula

include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../model/VideoAula.php");

class VideoAulaDAO {
    //Método para listar os videos a partir da base de dados
    public function list() {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM video_aula  AS v ORDER BY nome_video_aula";
        $stm = $conn->prepare($sql);    
        $stm->execute();
        $result = $stm->fetchAll();
        
        return $this->mapVideoAula($result);
    }

    //Método para buscar uma video aula por seu ID
    public function findById(int $idVideoAula) {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM video_aula v" .
               " WHERE v.id_video_aula = ?";
        $stm = $conn->prepare($sql);    
        $stm->execute([$idVideoAula]);
        $result = $stm->fetchAll();

        $video_aulas = $this->mapVideoAula($result);

        if(count($video_aulas) == 1)
            return $video_aulas[0];
        elseif(count($video_aulas) == 0)
            return null;

        die("VideoAulaDAO.findById()" . 
            " - Erro: mais de uma vídeo aula encontrada.");
    }
 
    //Método para inserir uma vídeo aula
    public function insert(VideoAula $video_aula) {
        $conn = Connection::getConn();

        $sql = "INSERT INTO video_aula (nome_video_aula, link_video_aula)" .
        " VALUES (:nome_video_aula, link_video_aula)";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("nome_video_aula", $video_aula->getNomeVideoAula());
        $stm->bindValue("link_video_aula", $video_aula->getLinkVideoAula());
        $stm->execute();
    }

    //Método para atualizar uma vídeo aula
    public function update(VideoAula $video_aula) {
        $conn = Connection::getConn();

        $sql = "UPDATE video_aula SET nome_video_aula = :nome_video_aula, link_video_aula = :link_video_aula" . 
               " WHERE id_video_aula = :id_video_aula";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("id_video_aula", $video_aula->getIdVideoAula());
        $stm->bindValue("nome_video_aula", $video_aula->getNomeVideoAula());
        $stm->bindValue("link_video_aula", $video_aula->getLinkVideoAula());
        $stm->execute();
    }

    //Método para excluir uma vídeo aula pelo seu ID
    public function deleteById(int $id) {
        $conn = Connection::getConn();

        $sql = "DELETE FROM video_aula WHERE id_video_aula = :id_video_aula";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("id_video_aula", $id);
        $stm->execute();
    }

    //Método para converter um registro da base de dados em um objeto vídeo aula
    private function mapVideoAula($result) {
        $video_aulas = array();
        foreach ($result as $reg) {
            $video_aula = new VideoAula();
            $video_aula->setIdVideoAula($reg['id_video_aula']);
            $video_aula->setNomeVideoAula($reg['nome_video_aula']);
            $video_aula->setLinkVideoAula($reg['link_video_aula']);
            
            array_push($video_aulas, $video_aula);
        }

        return $video_aulas;
    }

}

