<?php 
#Nome do arquivo: Professor.php
#Objetivo: classe Model para Professor

require_once(__DIR__ . "/enum/Tipo.php");

class Professor {

    private $id_professor;
    private $nome_professor;
    private $nascimento_professor;
    private $telefone_professor;
    private $sexo_professor;
    private $cpf_professor;
    private $rg_professor;
    private $email_professor;
    private $login_professor;
    private $senha_professor;
    private $tipo;

    /**
     * Get the value of id_professor
     */
    public function getIdProfessor()
    {
        return $this->id_professor;
    }

    /**
     * Set the value of id_professor
     */
    public function setIdProfessor($id_professor): self
    {
        $this->id_professor = $id_professor;

        return $this;
    }

    /**
     * Get the value of nome_professor
     */
    public function getNomeProfessor()
    {
        return $this->nome_professor;
    }

    /**
     * Set the value of nome_professor
     */
    public function setNomeProfessor($nome_professor): self
    {
        $this->nome_professor = $nome_professor;

        return $this;
    }

    /**
     * Get the value of nascimento_professor
     */
    public function getNascimentoProfessor()
    {
        return $this->nascimento_professor;
    }

    /**
     * Set the value of nascimento_professor
     */
    public function setNascimentoProfessor($nascimento_professor): self
    {
        $this->nascimento_professor = $nascimento_professor;

        return $this;
    }

    /**
     * Get the value of telefone_professor
     */
    public function getTelefoneProfessor()
    {
        return $this->telefone_professor;
    }

    /**
     * Set the value of telefone_professor
     */
    public function setTelefoneProfessor($telefone_professor): self
    {
        $this->telefone_professor = $telefone_professor;

        return $this;
    }

    /**
     * Get the value of sexo_professor
     */
    public function getSexoProfessor()
    {
        return $this->sexo_professor;
    }

    /**
     * Set the value of sexo_professor
     */
    public function setSexoProfessor($sexo_professor): self
    {
        $this->sexo_professor = $sexo_professor;

        return $this;
    }
    
    public function getSexoProfessorAsArray() {
        if($this->sexo_professor) 
            return explode(ProfessorSexo::$SEPARADOR, $this->sexo_professor);
        
        return array();    
    }

    public function setSexoProfessorAsArray($array) {
        if($array)
            $this->sexo_professor = implode(ProfessorSexo::$SEPARADOR, $array);
        else
            $this->sexo_professor = NULL;
    }

    public function getSexoProfessorStr() {
        return str_replace(ProfessorSexo::$SEPARADOR, ", ", $this->sexo_professor);
    }

    /**
     * Get the value of login_professor
     */
    public function getLoginProfessor()
    {
        return $this->login_professor;
    }

    /**
     * Set the value of login_professor
     */
    public function setLoginProfessor($login_professor): self
    {
        $this->login_professor = $login_professor;

        return $this;
    }

    /**
     * Get the value of senha_professor
     */
    public function getSenhaProfessor()
    {
        return $this->senha_professor;
    }

    /**
     * Set the value of senha_professor
     */
    public function setSenhaProfessor($senha_professor): self
    {
        $this->senha_professor = $senha_professor;

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

    public function geTipoAsArray() {
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

    public function getPapeisStr() {
        return str_replace(Tipo::$SEPARADOR, ", ", $this->tipo);
    }

    /**
     * Get the value of cpf_professor
     */ 
    public function getCpfProfessor()
    {
        return $this->cpf_professor;
    }

    /**
     * Set the value of cpf_professor
     *
     * @return  self
     */ 
    public function setCpfProfessor($cpf_professor)
    {
        $this->cpf_professor = $cpf_professor;

        return $this;
    }

    /**
     * Get the value of rg_professor
     */ 
    public function getRgProfessor()
    {
        return $this->rg_professor;
    }

    /**
     * Set the value of rg_professor
     *
     * @return  self
     */ 
    public function setRgProfessor($rg_professor)
    {
        $this->rg_professor = $rg_professor;

        return $this;
    }

    /**
     * Get the value of email_professor
     */ 
    public function getEmailProfessor()
    {
        return $this->email_professor;
    }

    /**
     * Set the value of email_professor
     *
     * @return  self
     */ 
    public function setEmailProfessor($email_professor)
    {
        $this->email_professor = $email_professor;

        return $this;
    }
}
