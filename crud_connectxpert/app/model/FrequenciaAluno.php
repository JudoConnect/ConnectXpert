<?php
#Nome do arquivo: FrequenciaAluno.php
#Objetivo: classe Model para Frequencia de alunos

class FrequenciaAluno {

   private $idTurmaAluno;
   private $idTurma;
   private $nomeTurma;
   private $horario;
   private $diaSemana;
   private $totalEncontros;
   private $totalFaltas;
   private $frequencia;

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

   /**
    * Get the value of totalEncontros
    */ 
   public function getTotalEncontros()
   {
      return $this->totalEncontros;
   }

   /**
    * Set the value of totalEncontros
    *
    * @return  self
    */ 
   public function setTotalEncontros($totalEncontros)
   {
      $this->totalEncontros = $totalEncontros;

      return $this;
   }

   /**
    * Get the value of totalFaltas
    */ 
   public function getTotalFaltas()
   {
      return $this->totalFaltas;
   }

   /**
    * Set the value of totalFaltas
    *
    * @return  self
    */ 
   public function setTotalFaltas($totalFaltas)
   {
      $this->totalFaltas = $totalFaltas;

      return $this;
   }

   /**
    * Get the value of frequencia
    */ 
   public function getFrequencia()
   {
      return $this->frequencia = 100 - (($this->totalFaltas / $this->totalEncontros) * 100);
   }
}