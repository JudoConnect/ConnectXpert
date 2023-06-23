<?php
#Nome do arquivo: Sexo.php
#Objetivo: classe Enum para definir sexo do Aluno

class Sexo {

    public static string $SEPARADOR = "|";

    const FEMININO = "FEMININO";
    const MASCULINO = "MASCULINO";
    const OUTROS = "OUTROS";

    public static function getAllAsArray() {
        return [Sexo::FEMININO, Sexo::MASCULINO, Sexo::OUTROS];
    }

}