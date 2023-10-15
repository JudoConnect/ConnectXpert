<?php
#Nome do arquivo: Frequencia.php
#Objetivo: classe Model para Frequencia de alunos

class Frequencia {

    private $idFrequencia;
    private $condicao;

    /**
     * Get the value of idFrequencia
     */ 
    public function getIdFrequencia()
    {
        return $this->idFrequencia;
    }

    /**
     * Set the value of idFrequencia
     *
     * @return  self
     */ 
    public function setIdFrequencia($idFrequencia)
    {
        $this->idFrequencia = $idFrequencia;

        return $this;
    }

    /**
     * Get the value of condicao
     */ 
    public function getCondicao()
    {
        return $this->condicao;
    }

    /**
     * Set the value of condicao
     *
     * @return  self
     */ 
    public function setCondicao($condicao)
    {
        $this->condicao = $condicao;

        return $this;
    }
}