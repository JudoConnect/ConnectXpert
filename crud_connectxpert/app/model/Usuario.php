<?php 
#Nome do arquivo: Usuario.php
#Objetivo: classe Model para Usuario

require_once(__DIR__ . "/enum/UsuarioPapel.php");

class Usuario {

    private $id;
    private $nome;
    private $login;
    private $senha;
    private $papeis;
    private $tipo;

    /**
     * Get the value of id
     */ 
    public function getId()
    {
        return $this->id;
    }

    /**
     * Set the value of id
     *
     * @return  self
     */ 
    public function setId($id)
    {
        $this->id = $id;

        return $this;
    }

    /**
     * Get the value of login
     */ 
    public function getLogin()
    {
        return $this->login;
    }

    /**
     * Set the value of login
     *
     * @return  self
     */ 
    public function setLogin($login)
    {
        $this->login = $login;

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
     * Get the value of senha
     */ 
    public function getSenha()
    {
        return $this->senha;
    }

    /**
     * Set the value of senha
     *
     * @return  self
     */ 
    public function setSenha($senha)
    {
        $this->senha = $senha;

        return $this;
    }
    
    /**
     * Get the value of papeis
     */ 
    public function getPapeis()
    {
        return $this->papeis;
    }

    /**
     * Set the value of papeis
     *
     * @return  self
     */ 
    public function setPapeis($papeis)
    {
        $this->papeis = $papeis;

        return $this;
    }
    
    public function getPapeisAsArray() {
        if($this->papeis) 
            return explode(UsuarioPapel::$SEPARADOR, $this->papeis);
        
        return array();    
    }

    public function setPapeisAsArray($array) {
        if($array)
            $this->papeis = implode(UsuarioPapel::$SEPARADOR, $array);
        else
            $this->papeis = NULL;
    }

    public function getPapeisStr() {
        return str_replace(UsuarioPapel::$SEPARADOR, ", ", $this->papeis);
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
     */
    public function setTipo($tipo): self
    {
        $this->tipo = $tipo;

        return $this;
    }
}