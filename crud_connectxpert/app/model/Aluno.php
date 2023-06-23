<?php 
#Nome do arquivo: Aluno.php
#Objetivo: classe Model para Aluno

require_once(__DIR__ . "/enum/Sexo.php");

class Aluno {

    private $id_aluno;
    private $nome_aluno;
    private $nascimento_aluno;
    private $telefone;
    private $nome_responsavel;
    private $sexo_aluno;
    private $cpf_aluno;
    private $rg_aluno;
    private $email_aluno;
    private $login_aluno;
    private $senha_aluno;
    private $historico;
    private $end_rua;
    private $end_bairro;
    private $end_cidade;
    private $end_estado;
    private $end_numero;
    private $end_complemento;

    /**
     * Get the value of id_aluno
     */
    public function getIdAluno()
    {
        return $this->id_aluno;
    }

    /**
     * Set the value of id_aluno
     */
    public function setIdAluno($id_aluno): self
    {
        $this->id_aluno = $id_aluno;

        return $this;
    }

    /**
     * Get the value of nome_aluno
     */
    public function getNomeAluno()
    {
        return $this->nome_aluno;
    }

    /**
     * Set the value of nome_aluno
     */
    public function setNomeAluno($nome_aluno): self
    {
        $this->nome_aluno = $nome_aluno;

        return $this;
    }

    /**
     * Get the value of nascimento_aluno
     */
    public function getNascimentoAluno()
    {
        return $this->nascimento_aluno;
    }

    /**
     * Set the value of nascimento_aluno
     */
    public function setNascimentoAluno($nascimento_aluno): self
    {
        $this->nascimento_aluno = $nascimento_aluno;

        return $this;
    }

    /**
     * Get the value of telefone
     */
    public function getTelefone()
    {
        return $this->telefone;
    }

    /**
     * Set the value of telefone
     */
    public function setTelefone($telefone): self
    {
        $this->telefone = $telefone;

        return $this;
    }

    /**
     * Get the value of nome_responsavel
     */
    public function getNomeResponsavel()
    {
        return $this->nome_responsavel;
    }

    /**
     * Set the value of nome_responsavel
     */
    public function setNomeResponsavel($nome_responsavel): self
    {
        $this->nome_responsavel = $nome_responsavel;

        return $this;
    }

    /**
     * Get the value of sexo_aluno
     */
    public function getSexoAluno()
    {
        return $this->sexo_aluno;
    }

    /**
     * Set the value of sexo_aluno
     */
    public function setSexoAluno($sexo_aluno): self
    {
        $this->sexo_aluno = $sexo_aluno;

        return $this;
    }

    public function getSexoAlunoAsArray() {
        if($this->sexo_aluno) 
            return explode(Sexo::$SEPARADOR, $this->sexo_aluno);
        
        return array();    
    }

    public function setSexoAlunoAsArray($array) {
        if($array)
            $this->sexo_aluno = implode(Sexo::$SEPARADOR, $array);
        else
            $this->sexo_aluno = NULL;
    }

    public function getSexoAlunoStr() {
        //if($this->sexo_aluno == exo::FEMININO)
        //    return "Feminino";

        //return "";
        return str_replace(Sexo::$SEPARADOR, ", ", $this->sexo_aluno);
    }

    /**
     * Get the value of login_aluno
     */
    public function getLoginAluno()
    {
        return $this->login_aluno;
    }

    /**
     * Set the value of login_aluno
     */
    public function setLoginAluno($login_aluno): self
    {
        $this->login_aluno = $login_aluno;

        return $this;
    }

    /**
     * Get the value of senha_aluno
     */
    public function getSenhaAluno()
    {
        return $this->senha_aluno;
    }

    /**
     * Set the value of senha_aluno
     */
    public function setSenhaAluno($senha_aluno): self
    {
        $this->senha_aluno = $senha_aluno;

        return $this;
    }

    /**
     * Get the value of historico
     */
    public function getHistorico()
    {
        return $this->historico;
    }

    /**
     * Set the value of historico
     */
    public function setHistorico($historico): self
    {
        $this->historico = $historico;

        return $this;
    }

    /**
     * Get the value of cpf_aluno
     */ 
    public function getCpfAluno()
    {
        return $this->cpf_aluno;
    }

    /**
     * Set the value of cpf_aluno
     *
     * @return  self
     */ 
    public function setCpfAluno($cpf_aluno)
    {
        $this->cpf_aluno = $cpf_aluno;

        return $this;
    }

    /**
     * Get the value of rg_aluno
     */ 
    public function getRgAluno()
    {
        return $this->rg_aluno;
    }

    /**
     * Set the value of rg_aluno
     *
     * @return  self
     */ 
    public function setRgAluno($rg_aluno)
    {
        $this->rg_aluno = $rg_aluno;

        return $this;
    }

    /**
     * Get the value of email_aluno
     */ 
    public function getEmailAluno()
    {
        return $this->email_aluno;
    }

    /**
     * Set the value of email_aluno
     *
     * @return  self
     */ 
    public function setEmailAluno($email_aluno)
    {
        $this->email_aluno = $email_aluno;

        return $this;
    }

    /**
     * Get the value of end_rua
     */ 
    public function getEndRua()
    {
        return $this->end_rua;
    }

    /**
     * Set the value of end_rua
     *
     * @return  self
     */ 
    public function setEndRua($end_rua)
    {
        $this->end_rua = $end_rua;

        return $this;
    }

    /**
     * Get the value of end_bairro
     */ 
    public function getEndBairro()
    {
        return $this->end_bairro;
    }

    /**
     * Set the value of end_bairro
     *
     * @return  self
     */ 
    public function setEndBairro($end_bairro)
    {
        $this->end_bairro = $end_bairro;

        return $this;
    }

    /**
     * Get the value of end_cidade
     */ 
    public function getEndCidade()
    {
        return $this->end_cidade;
    }

    /**
     * Set the value of end_cidade
     *
     * @return  self
     */ 
    public function setEndCidade($end_cidade)
    {
        $this->end_cidade = $end_cidade;

        return $this;
    }

    /**
     * Get the value of end_estado
     */ 
    public function getEndEstado()
    {
        return $this->end_estado;
    }

    /**
     * Set the value of end_estado
     *
     * @return  self
     */ 
    public function setEndEstado($end_estado)
    {
        $this->end_estado = $end_estado;

        return $this;
    }

    /**
     * Get the value of end_numero
     */ 
    public function getEndNumero()
    {
        return $this->end_numero;
    }

    /**
     * Set the value of end_numero
     *
     * @return  self
     */ 
    public function setEndNumero($end_numero)
    {
        $this->end_numero = $end_numero;

        return $this;
    }

    /**
     * Get the value of end_complemento
     */ 
    public function getEndComplemento()
    {
        return $this->end_complemento;
    }

    /**
     * Set the value of end_complemento
     *
     * @return  self
     */ 
    public function setEndComplemento($end_complemento)
    {
        $this->end_complemento = $end_complemento;

        return $this;
    }
}    
    
