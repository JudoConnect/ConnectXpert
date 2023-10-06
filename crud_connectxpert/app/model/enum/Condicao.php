<?php
#Nome do arquivo: Condicao.php
#Objetivo: classe Enum para definir condicao do Aluno

class Condicao {

    public static string $SEPARADOR = "|";

    const PRESENTE = "PRESENTE";
    const AUSENTE = "AUSENTE";

    public static function getAllAsArray() {
        return [Condicao::PRESENTE, Condicao::AUSENTE];
    }

}