<?php
    
require_once(__DIR__ . "/../model/Ie.php");

class IeService {

    /* Método para validar os dados do ie que vem do formulário */
    public function validarDados(Ie $ie) {
        $erros = array();

        //Validar campos vazios
        if(! $ie->getNomeIe())
            array_push($erros, "O campo Nome é obrigatório.");

        return $erros;              
    }
}
