<?php
#Nome do arquivo: Produto.php
#Objetivo: classe Model para Produto

require_once(__DIR__ . "/enum/Situacao.php");

class Produto {

    private $idProduto;
    private $nome;
    private $descricao;
    private $foto;
    private $situacao;


    /**
     * Get the value of idProduto
     */ 
    public function getIdProduto()
    {
        return $this->idProduto;
    }

    /**
     * Set the value of idProduto
     *
     * @return  self
     */ 
    public function setIdProduto($idProduto)
    {
        $this->idProduto = $idProduto;

        return $this;
    }

    /**
     * Get the value of nome
     */ 
    public function getNome()
    {
        return $this->nome;
    }

    /**
     * Set the value of nome
     *
     * @return  self
     */ 
    public function setNome($nome)
    {
        $this->nome = $nome;

        return $this;
    }

    /**
     * Get the value of descricao
     */ 
    public function getDescricao()
    {
        return $this->descricao;
    }

    /**
     * Set the value of descricao
     *
     * @return  self
     */ 
    public function setDescricao($descricao)
    {
        $this->descricao = $descricao;

        return $this;
    }

    /**
     * Get the value of foto
     */ 
    public function getFoto()
    {
        return $this->foto;
    }

    /**
     * Set the value of foto
     *
     * @return  self
     */ 
    public function setFoto($foto)
    {
        $this->foto = $foto;

        return $this;
    }



    /**
     * Get the value of situacao
     */ 
    public function getSituacao() 
    {
        return $this->situacao;
    }

    /**
     * Set the value of situacao
     */ 
    public function setSituacao($situacao) : self
    {
        $this->situacao = $situacao;

        return $this;
    }

    public function getSituacaoAsArray() {
        if($this->situacao) 
            return explode(Situacao::$SEPARADOR, $this->situacao);
        
        return array();    
    }

    public function setSituacaoAsArray($array) {
        if($array)
            $this->situacao = implode(Situacao::$SEPARADOR, $array);
        else
            $this->situacao = NULL;
    }

    public function getSituacaoStr() {
        return str_replace(Situacao::$SEPARADOR, ", ", $this->situacao);
    }

}