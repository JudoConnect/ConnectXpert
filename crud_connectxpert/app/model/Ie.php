<?php
#Nome do arquivo: Ie.php
#Objetivo: classe Model para Instituicao de Ensino

class Ie {

    private $idIe;
    private $nomeIe;
    private $serieIe;

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

    /**
     * Get the value of serieIe
     */ 
    public function getSerieIe()
    {
        return $this->serieIe;
    }

    /**
     * Set the value of serieIe
     *
     * @return  self
     */ 
    public function setSerieIe($serieIe)
    {
        $this->serieIe = $serieIe;

        return $this;
    }

    public function getSerieIeAsArray() {
        if($this->serieIe) 
            return explode(serieIe::$SEPARADOR, $this->serieIe);
        
        return array();    
    }

    public function setSerieIeAsArray($array) {
        if($array)
            $this->serieIe = implode(serieIe::$SEPARADOR, $array);
        else
            $this->serieIe = NULL;
    }
}  






