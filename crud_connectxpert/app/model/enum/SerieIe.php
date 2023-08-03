<?php
#Nome do arquivo: SerieIe.php
#Objetivo: classe Enum para serie do model de Ie

class SerieIe {

    public static string $SEPARADOR = "|";

    const ENSINO_FUNDAMENTAL = "Ensino Fundamental (1º ao 5º)";
    const ENSINO_FUNDAMENTAL_II = "Ensino Fundamental II (6º ao 9º)";
    const ENSINO_MEDIO = "Ensino Médio (1º ao 3º)";
    const GRADUACAO = "Graduação";

    public static function getAllAsArray() {
        return [SerieIe::ENSINO_FUNDAMENTAL, SerieIe::ENSINO_FUNDAMENTAL_II, SerieIe::ENSINO_MEDIO, SerieIe::GRADUACAO];
    }

}

