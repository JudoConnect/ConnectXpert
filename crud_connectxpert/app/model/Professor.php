<?php 
#Nome do arquivo: Professor.php
#Objetivo: classe Model para Professor

require_once(__DIR__ . "/enum/Tipo.php");

class Professor {

    private $idProfessor;
    private $nomeProfessor;
    private $nascimentoProfessor;
    private $telefoneProfessor;
    private $sexoProfessor;
    private $cpfProfessor;
    private $rgProfessor;
    private $emailProfessor;
    private $loginProfessor;
    private $senhaProfessor;
    private $tipo;

    /**
     * Get the value of idProfessor
     */
    public function getIdProfessor()
    {
        return $this->idProfessor;
    }

    /**
     * Set the value of idProfessor
     */
    public function setIdProfessor($idProfessor): self
    {
        $this->idProfessor = $idProfessor;

        return $this;
    }

    /**
     * Get the value of nomeProfessor
     */
    public function getNomeProfessor()
    {
        return $this->nomeProfessor;
    }

    /**
     * Set the value of nomeProfessor
     */
    public function setNomeProfessor($nomeProfessor): self
    {
        $this->nomeProfessor = $nomeProfessor;

        return $this;
    }

    /**
     * Get the value of nascimentoProfessor
     */
    public function getNascimentoProfessor()
    {
        return $this->nascimentoProfessor;
    }

    public function getNascimentoProfessorFormatada()
    {
        if($this->nascimentoProfessor) {
            $data = date_create($this->nascimentoProfessor);
            return date_format($data,"d/m/Y");
        }

        return '';
    }

    /**
     * Set the value of nascimentoProfessor
     */
    public function setNascimentoProfessor($nascimentoProfessor): self
    {
        $this->nascimentoProfessor = $nascimentoProfessor;

        return $this;
    }

    /**
     * Get the value of telefoneProfessor
     */
    public function getTelefoneProfessor()
    {
        return $this->telefoneProfessor;
    }

    /**
     * Set the value of telefoneProfessor
     */
    public function setTelefoneProfessor($telefoneProfessor): self
    {
        $this->telefoneProfessor = $telefoneProfessor;

        return $this;
    }

    /**
     * Get the value of sexoProfessor
     */
    public function getSexoProfessor()
    {
        return $this->sexoProfessor;
    }

    /**
     * Set the value of sexoProfessor
     */
    public function setSexoProfessor($sexoProfessor): self
    {
        $this->sexoProfessor = $sexoProfessor;

        return $this;
    }
    
    public function getSexoProfessorAsArray() {
        if($this->sexoProfessor) 
            return explode(ProfessorSexo::$SEPARADOR, $this->sexoProfessor);
        
        return array();    
    }

    public function setSexoProfessorAsArray($array) {
        if($array)
            $this->sexoProfessor = implode(ProfessorSexo::$SEPARADOR, $array);
        else
            $this->sexoProfessor = NULL;
    }

    public function getSexoProfessorStr() {
        return str_replace(ProfessorSexo::$SEPARADOR, ", ", $this->sexoProfessor);
    }

    /**
     * Get the value of loginProfessor
     */
    public function getLoginProfessor()
    {
        return $this->loginProfessor;
    }

    /**
     * Set the value of loginProfessor
     */
    public function setLoginProfessor($loginProfessor): self
    {
        $this->loginProfessor = $loginProfessor;

        return $this;
    }

    /**
     * Get the value of senhaProfessor
     */
    public function getSenhaProfessor()
    {
        return $this->senhaProfessor;
    }

    /**
     * Set the value of senhaProfessor
     */
    public function setSenhaProfessor($senhaProfessor): self
    {
        $this->senhaProfessor = $senhaProfessor;

        return $this;
    }

    /**
     * Get the value of tipo
     */ 
    public function getTipo()
    {
        return $this->tipo;
    }

    /**
     * Set the value of tipo
     *
     * @return  self
     */ 
    public function setTipo($tipo)
    {
        $this->tipo = $tipo;

        return $this;
    }

    public function getTipoAsArray() {
        if($this->tipo) 
            return explode(Tipo::$SEPARADOR, $this->tipo);
        
        return array();    
    }

    public function setTipoAsArray($array) {
        if($array)
            $this->tipo = implode(PTipo::$SEPARADOR, $array);
        else
            $this->tipo = NULL;
    }


    public function getCpfProfessor()
    {
        return $this->cpfProfessor;
    }

    /**
     * Set the value of cpfProfessor
     *
     * @return  self
     */ 
    public function setCpfProfessor($cpfProfessor)
    {
        $this->cpfProfessor = $cpfProfessor;

        return $this;
    }

    /**
     * Get the value of rgProfessor
     */ 
    public function getRgProfessor()
    {
        return $this->rgProfessor;
    }

    /**
     * Set the value of rgProfessor
     *
     * @return  self
     */ 
    public function setRgProfessor($rgProfessor)
    {
        $this->rgProfessor = $rgProfessor;

        return $this;
    }

    /**
     * Get the value of emailProfessor
     */ 
    public function getEmailProfessor()
    {
        return $this->emailProfessor;
    }

    /**
     * Set the value of emailProfessor
     *
     * @return  self
     */ 
    public function setEmailProfessor($emailProfessor)
    {
        $this->emailProfessor = $emailProfessor;

        return $this;
    }
}
