<?php
#Nome do arquivo: Condicao.php
#Objetivo: classe Enum para definir condicao do Aluno

class Condicao {

    public static string $SEPARADOR = "|";

    const PRESENTE = "presente";
    const AUSENTE = "ausente";

    public static function getAllAsArray() {
        return [Condicao::PRESENTE, Condicao::AUSENTE];
    }

}