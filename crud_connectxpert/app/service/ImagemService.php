<?php

require_once(__DIR__ . "/../util/config.php");

class ImagemService {

    public function upload($foto) {
        //Salvar a imagem
        //Captura o nome e a extensão do arquivo
        $arquivoNome = explode('.', $foto['name']);
        $arquivoExtensao = $arquivoNome[1];

        //A partir da extensão, o ideal é gerar um nome único para o arquivo a fim de encontrá-lo depois
        //Exemplo: pode-se concatenar um identificador único do tipo UUID
        $uuid = vsprintf( '%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex(random_bytes(16)), 4) );
        $nomeArquivoFoto = "imagem_" . $uuid . "." . $arquivoExtensao;
        

        //Salva o arquivo no diretório defindo em PATH_FOTOS
        if(move_uploaded_file($foto["tmp_name"], PATH_FOTOS. "/" . $nomeArquivoFoto))
            return $nomeArquivoFoto;
        
        return null;
    }

}