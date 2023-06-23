<?php
#Nome do arquivo: Tipo.php
#Objetivo: classe Enum para o tipo de permissões do model de Professor

class Tipo {

    public static string $SEPARADOR = "|";

    const PROFESSOR = "PROFESSOR";
    const ESTAGIARIO = "ESTAGIARIO";
    const SECRETARIO = "SECRETARIO";
    const SOCIO = "SOCIO";
    const PROPRIETARIO = "PROPRIETARIO";

    public static function getAllAsArray() {
        return [Tipo::PROFESSOR, Tipo::ESTAGIARIO, Tipo::SECRETARIO, Tipo::SOCIO, Tipo::PROPRIETARIO];
    }

}
