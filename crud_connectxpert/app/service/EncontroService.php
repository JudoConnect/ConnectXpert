<?php
    
require_once(__DIR__ . "/../model/Encontro.php");

class EncontroService {

    /* Método para validar os dados de encontro que vem do formulário */
    public function validarDados(Encontro $encontro) {
        $erros = array();

        //Validar campos vazios
        if(! $encontro->getNomeEncontro())
            array_push($erros, "O campo Nome é obrigatório.");

        if(! $encontro->getDiaEncontro())
            array_push($erros, "O campo Dia Encontro é obrigatório.");    
        
    }
}
