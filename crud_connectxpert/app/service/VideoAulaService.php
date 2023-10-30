<?php
    
require_once(__DIR__ . "/../model/VideoAula.php");

class VideoAulaService {

    /* Método para validar os dados da vídeo aula que vem do formulário */
    public function validarDados(VideoAula $video_aula) {
        $erros = array();

        //Validar campos vazios
        if(! $video_aula->getNomeVideoAula())
            array_push($erros, "O campo Nome é obrigatório.");
        
        if(! $video_aula->getLinkVideoAula())
            array_push($erros, "O campo Link é obrigatório.");

        return $erros;      
    }
}
