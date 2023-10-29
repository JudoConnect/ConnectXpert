<?php
#Nome do arquivo: VideoAula.php
#Objetivo: classe Model para Vídeo Aula
 
class VideoAula {

    private $idVideoAula;
    private $nomeVideoAula;
    private $linkVideoAula;

    /**
     * Get the value of idVideoAula
     */ 
    public function getIdVideoAula()
    {
        return $this->idVideoAula;
    }

    /**
     * Set the value of idVideoAula
     *
     * @return  self
     */ 
    public function setIdVideoAula($idVideoAula)
    {
        $this->idVideoAula = $idVideoAula;

        return $this;
    }

    /**
     * Get the value of nomeVideoAula
     */ 
    public function getNomeVideoAula()
    {
        return $this->nomeVideoAula;
    }

    /**
     * Set the value of nomeVideoAula
     *
     * @return  self
     */ 
    public function setNomeVideoAula($nomeVideoAula)
    {
        $this->nomeVideoAula = $nomeVideoAula;

        return $this;
    }

    /**
     * Get the value of linkVideoAula
     */ 
    public function getLinkVideoAula()
    {
        return $this->linkVideoAula;
    }

    /**
     * Set the value of linkVideoAula
     *
     * @return  self
     */ 
    public function setLinkVideoAula($linkVideoAula)
    {
        $this->linkVideoAula = $linkVideoAula;

        return $this;
    }
}