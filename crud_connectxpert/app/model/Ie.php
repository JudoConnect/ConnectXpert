<?php
#Nome do arquivo: Ie.php
#Objetivo: classe Model para Instituicao de Ensino

class Ie {

    private $idIe;
    private $nomeIe;



    /**
     * Get the value of idIe
     */
    public function getIdIe()
    {
        return $this->idIe;
    }

    /**
     * Set the value of idIe
     */
    public function setIdIe($idIe): self
    {
        $this->idIe = $idIe;

        return $this;
    }

    /**
     * Get the value of nomeIe
     */
    public function getNomeIe()
    {
        return $this->nomeIe;
    }

    /**
     * Set the value of nomeIe
     */
    public function setNomeIe($nomeIe): self
    {
        $this->nomeIe = $nomeIe;

        return $this;
    }
}  






