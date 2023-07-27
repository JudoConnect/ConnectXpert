<?php
#Nome do arquivo: Turma.php
#Objetivo: classe Model para Turma

class Turma {
    private $idTurma;
    private $nomeTurma;
    private $numAlunos;
    private $horario;
    private $diaSemana;

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
     * Get the value of nomeTurma
     */ 
    public function getNomeTurma()
    {
        return $this->nomeTurma;
    }

    /**
     * Set the value of nomeTurma
     *
     * @return  self
     */ 
    public function setNomeTurma($nomeTurma)
    {
        $this->nomeTurma = $nomeTurma;

        return $this;
    }

    /**
     * Get the value of numAlunos
     */ 
    public function getNumAlunos()
    {
        return $this->numAlunos;
    }

    /**
     * Set the value of numAlunos
     *
     * @return  self
     */ 
    public function setNumAlunos($numAlunos)
    {
        $this->numAlunos = $numAlunos;

        return $this;
    }

    /**
     * Get the value of horario
     */ 
    public function getHorario()
    {
        return $this->horario;
    }

    /**
     * Set the value of horario
     *
     * @return  self
     */ 
    public function setHorario($horario)
    {
        $this->horario = $horario;

        return $this;
    }

    /**
     * Get the value of diaSemana
     */ 
    public function getDiaSemana()
    {
        return $this->diaSemana;
    }

    /**
     * Set the value of diaSemana
     *
     * @return  self
     */ 
    public function setDiaSemana($diaSemana)
    {
        $this->diaSemana = $diaSemana;

        return $this;
    }
}