<?php
#Nome do arquivo: Situacao.php
#Objetivo: classe Enum para definir situacao do Produto

class Situacao {

    public static string $SEPARADOR = "|";

    const DISPONIVEL = "DISPONIVEL";
    const INDISPONIVEL = "INDISPONIVEL";

    public static function getAllAsArray() {
        return [Situacao::DISPONIVEL, Situacao::INDISPONIVEL];
    }

}