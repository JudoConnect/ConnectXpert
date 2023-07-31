<?php
#Nome do arquivo: SerieIe.php
#Objetivo: classe Enum para serie do model de Ie

class Tipo {

    public static string $SEPARADOR = "|";

    const Ensino Fundamental  = "Ensino Fundamental ( 1º ao 5º)";
    const Ensino Fundamental II  = "Ensino Fundamental II ( 6º ao 9º)";
    const Ensino Médio     = "Ensino Médio ( 1º ao 3º)";
    const Graduação    = "Graduação";

    public static function getAllAsArray() {
        return [serieIe::Ensino Fundamental, serieIe::Ensino Fundamental II, serieIe::Ensino Médio, serieIe::Graduação];
    }

}
