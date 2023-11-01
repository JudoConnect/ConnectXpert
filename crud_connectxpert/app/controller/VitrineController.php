<?php
#Classe controller para Produto
require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/ProdutoDAO.php");
require_once(__DIR__ . "/../model/Produto.php");
require_once(__DIR__ . "/../model/enum/UsuarioPapel.php");
require_once(__DIR__ . "/../model/enum/Situacao.php");


class VitrineController extends Controller {

    private ProdutoDAO $produtoDao;

    public function __construct() {
        if(! $this->usuarioLogado())
            exit;

        if(! $this->usuarioPossuiPapel([UsuarioPapel::ADMINISTRADOR,  UsuarioPapel::PROFESSOR,  UsuarioPapel::ALUNO])) {
            echo "Acesso negado";
            exit;
        }

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