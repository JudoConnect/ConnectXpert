<?php
#Nome do arquivo: Frequencia.php
#Objetivo: classe Model para Frequencia de alunos

class Frequencia {

    private $idFrequencia;
    private $idEncontro;
    private $idTurmaAluno;
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
     * Get the value of idTurmaAluno
     */ 
    public function getIdTurmaAluno()
    {
        return $this->idTurmaAluno;
    }

    /**
     * Set the value of idTurmaAluno
     *
     * @return  self
     */ 
    public function setIdTurmaAluno($idTurmaAluno)
    {
        $this->idTurmaAluno = $idTurmaAluno;

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