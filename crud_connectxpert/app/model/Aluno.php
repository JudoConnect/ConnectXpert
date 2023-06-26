<?php 
#Nome do arquivo: Aluno.php
#Objetivo: classe Model para Aluno

require_once(__DIR__ . "/enum/Sexo.php");

class Aluno {

    private $idAluno;
    private $nomeAluno;
    private $nascimentoAluno;
    private $telefone;
    private $nome_responsavel;
    private $sexoAluno;
    private $cpfAluno;
    private $rgAluno;
    private $emailAluno;
    private $loginAluno;
    private $senhaAluno;
    private $historico;
    private $end_rua;
    private $end_bairro;
    private $end_cidade;
    private $end_estado;
    private $end_numero;
    private $end_complemento;

    private $ies; //Objeto do tipo Ie (modelo)

    /**
     * Get the value of idAluno
     */
    public function getIdAluno()
    {
        return $this->idAluno;
    }

    /**
     * Set the value of idAluno
     */
    public function setIdAluno($idAluno): self
    {
        $this->idAluno = $idAluno;

        return $this;
    }

    /**
     * Get the value of nomeAluno
     */
    public function getNomeAluno()
    {
        return $this->nomeAluno;
    }

    /**
     * Set the value of nomeAluno
     */
    public function setNomeAluno($nomeAluno): self
    {
        $this->nomeAluno = $nomeAluno;

        return $this;
    }

    /**
     * Get the value of nascimentoAluno
     */
    public function getNascimentoAluno()
    {
        return $this->nascimentoAluno;
    }

    public function getNascimentoAlunoFormatada()
    {
        if($this->nascimentoAluno) {
            $data = date_create($this->nascimentoAluno);
            return date_format($data,"d/m/Y");
        }

        return '';
    }

    /**
     * Set the value of nascimentoAluno
     */
    public function setNascimentoAluno($nascimentoAluno): self
    {
        $this->nascimentoAluno = $nascimentoAluno;

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
     * Get the value of sexoAluno
     */
    public function getSexoAluno()
    {
        return $this->sexoAluno;
    }

    /**
     * Set the value of sexoAluno
     */
    public function setSexoAluno($sexoAluno): self
    {
        $this->sexoAluno = $sexoAluno;

        return $this;
    }

    public function getSexoAlunoAsArray() {
        if($this->sexoAluno) 
            return explode(Sexo::$SEPARADOR, $this->sexoAluno);
        
        return array();    
    }

    public function setSexoAlunoAsArray($array) {
        if($array)
            $this->sexoAluno = implode(Sexo::$SEPARADOR, $array);
        else
            $this->sexoAluno = NULL;
    }

    public function getSexoAlunoStr() {
        //if($this->sexoAluno == exo::FEMININO)
        //    return "Feminino";

        //return "";
        return str_replace(Sexo::$SEPARADOR, ", ", $this->sexoAluno);
    }

    /**
     * Get the value of loginAluno
     */
    public function getLoginAluno()
    {
        return $this->loginAluno;
    }

    /**
     * Set the value of loginAluno
     */
    public function setLoginAluno($loginAluno): self
    {
        $this->loginAluno = $loginAluno;

        return $this;
    }

    /**
     * Get the value of senhaAluno
     */
    public function getSenhaAluno()
    {
        return $this->senhaAluno;
    }

    /**
     * Set the value of senhaAluno
     */
    public function setSenhaAluno($senhaAluno): self
    {
        $this->senhaAluno = $senhaAluno;

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
     * Get the value of cpfAluno
     */ 
    public function getCpfAluno()
    {
        return $this->cpfAluno;
    }

    /**
     * Set the value of cpfAluno
     *
     * @return  self
     */ 
    public function setCpfAluno($cpfAluno)
    {
        $this->cpfAluno = $cpfAluno;

        return $this;
    }

    /**
     * Get the value of rgAluno
     */ 
    public function getRgAluno()
    {
        return $this->rgAluno;
    }

    /**
     * Set the value of rgAluno
     *
     * @return  self
     */ 
    public function setRgAluno($rgAluno)
    {
        $this->rgAluno = $rgAluno;

        return $this;
    }

    /**
     * Get the value of emailAluno
     */ 
    public function getEmailAluno()
    {
        return $this->emailAluno;
    }

    /**
     * Set the value of emailAluno
     *
     * @return  self
     */ 
    public function setEmailAluno($emailAluno)
    {
        $this->emailAluno = $emailAluno;

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
    
