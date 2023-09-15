<?php
#Nome do arquivo: Encontro.php
#Objetivo: classe Model para Instituicao de Ensino


class Encontro {

    private $idEncontro;
    private $nomeEncontro;
    private $diaEncontro;
    private $idTurma;
    private $qtdPeriodos;


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

    /**
     * Get the value of idTurma
     */ 
    public function getIdTurma()
    {
        return $this->idTurma;
    }

    /**
     * Set the value of idTurma
     *
     * @return  self
     */ 
    public function setIdTurma($idTurma)
    {
        $this->idTurma = $idTurma;

        return $this;
    }

    /**
     * Get the value of qtdPeriodos
     */ 
    public function getQtdPeriodos()
    {
        return $this->qtdPeriodos;
    }

    /**
     * Set the value of qtdPeriodos
     *
     * @return  self
     */ 
    public function setQtdPeriodos($qtdPeriodos)
    {
        $this->qtdPeriodos = $qtdPeriodos;

        return $this;
    }
} 