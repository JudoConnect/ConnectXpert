<?php
    
require_once(__DIR__ . "/../model/Ie.php");

class IeService {

    /* Método para validar os dados do ie que vem do formulário */
    public function validarDados(Ie $ie) {
        $erros = array();

        //Validar campos vazios
        if(! $ie->getNomeIe())
            array_push($erros, "O campo Nome é obrigatório.");
        
        if(! $ie->getSerieIe()) 
            array_push($erros, "Selecione ao menos uma serie no campo.");   
        return $erros;
    }
}
