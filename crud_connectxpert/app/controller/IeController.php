<?php
#Classe de controller para Instituição de Ensino

include_once("dao/IeDAO.php");

class IeController{

    public function listar(){
        $ieDAO = new ieDAO();
        return $ieDAO->list();

    }

    public function salvar($ie){
        $ieDAO = new ieDAO();
        $ieDAO->save($ie);
    }

    public function buscarPorId($idIe){
        $ieDAO = new ieDAO();
        return $ieDAO->findById($idIe);
    }


    public function atualizar($ie){
        $ieDAO = new ieDAO();
        $ieDAO->update($ie);
    }
    
    public function excluir($ie){
        $ieDAO = new ieDAO();
        $ieDAO->delete($ie);
    }

}

?>