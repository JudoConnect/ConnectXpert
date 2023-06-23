<?php
#Nome do arquivo: UsuarioPapel.php
#Objetivo: classe Enum para os papeis de permissões do model de Usuario

class UsuarioPapel {

    public static string $SEPARADOR = "|";

    const ADMINISTRADOR = "ADMINISTRADOR";
    const ALUNO = "ALUNO";
    const PROFESSOR = "PROFESSOR";
    const FUNCIONARIO = "FUNCIONARIO";
    const OUTROS = "OUTROS";

    public static function getAllAsArray() {
        return [UsuarioPapel::ADMINISTRADOR, UsuarioPapel::ALUNO, UsuarioPapel::PROFESSOR, UsuarioPapel::FUNCIONARIO,UsuarioPapel::OUTROS];
    }

}

