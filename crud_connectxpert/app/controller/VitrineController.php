<?php
#Classe controller para Produto
require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/ProdutoDAO.php");
require_once(__DIR__ . "/../model/Produto.php");
require_once(__DIR__ . "/../model/enum/administradorPapel.php");
require_once(__DIR__ . "/../model/enum/Situacao.php");
 

class VitrineController extends Controller {

    private ProdutoDAO $produtoDao;

    public function __construct() {

        $this->produtoDao = new ProdutoDAO();

        $this->handleAction();
    }

    protected function list() {
        $produtos = $this->produtoDao->listVitrine();
       
        $dados["lista"] = $produtos;

        $this->loadView("vitrine/listVitrine.php", $dados);
    }
}

#Criar objeto da classe
$vitCont = new VitrineController();