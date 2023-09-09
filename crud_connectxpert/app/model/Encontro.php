<?php
#Nome do arquivo: Encontro.php
#Objetivo: classe Model para Instituicao de Ensino


class Encontro {

    private $idEncontro;
    private $nomeEncontro;
    private $diaEncontro;


    /**
     * Get the value of idEncontro
     */ 
    public function getIdEncontro()
    {
        return $this->idEncontro;
    }

    /**
     * Set the value of idEncontro
     *
     * @return  self
     */ 
    public function setIdEncontro($idEncontro)
    {
        $this->idEncontro = $idEncontro;

        return $this;
    }

    /**
     * Get the value of nomeEncontro
     */ 
    public function getNomeEncontro()
    {
        return $this->nomeEncontro;
    }

    /**
     * Set the value of nomeEncontro
     *
     * @return  self
     */ 
    public function setNomeEncontro($nomeEncontro)
    {
        $this->nomeEncontro = $nomeEncontro;

        return $this;
    }

    /**
     * Get the value of diaEncontro
     */ 
    public function getDiaEncontro()
    {
        return $this->diaEncontro;
    }

    /**
     * Set the value of diaEncontro
     *
     * @return  self
     */ 
    public function setDiaEncontro($diaEncontro)
    {
        $this->diaEncontro = $diaEncontro;

        return $this;
    }
} 