<?php
#Nome do arquivo: administradorPapel.php
#Objetivo: classe Enum para os papeis de permissões do model de administrador

class administradorPapel {

    public static string $SEPARADOR = "|";

    const ADMINISTRADOR = "ADMINISTRADOR";
    const ALUNO = "ALUNO";
    const PROFESSOR = "PROFESSOR";

    public static function getAllAsArray() {
        return [administradorPapel::ADMINISTRADOR, administradorPapel::ALUNO, administradorPapel::PROFESSOR];
    }

}

