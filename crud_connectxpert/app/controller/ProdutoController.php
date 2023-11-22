<?php
#Classe controller para Produto
require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/ProdutoDAO.php");
require_once(__DIR__ . "/../service/ProdutoService.php");
require_once(__DIR__ . "/../model/Produto.php");
require_once(__DIR__ . "/../model/enum/administradorPapel.php");
require_once(__DIR__ . "/../model/enum/Situacao.php");
require_once(__DIR__ . "/../service/ImagemService.php");


class ProdutoController extends Controller {

    private ProdutoDAO $produtoDao;
    private ProdutoService $produtoService;
    private ImagemService $imagemService;

    public function __construct() {
        if(! $this->administradorLogado())
            exit;

        if(! $this->administradorPossuiPapel([administradorPapel::ADMINISTRADOR])) {
            echo "Acesso negado";
            exit;
        }

        $this->produtoDao = new ProdutoDAO();
        $this->produtoService = new ProdutoService();
        $this->imagemService = new ImagemService();

        $this->handleAction();
    }

    protected function list(string $msgErro = "", string $msgSucesso = "") {
        $produtos = $this->produtoDao->list();
       
        $dados["lista"] = $produtos;

        $this->loadView("produto/list.php", $dados,  $msgErro, $msgSucesso);
    }

    
    protected function create() {
        $dados["papeis"] = administradorPapel::getAllAsArray();
        $dados["estadosProduto"] = Situacao::getAllAsArray();

        $this->loadView("produto/form.php", $dados);
    }


    protected function edit() {
        $produto = $this->findProdutoById();
        if($produto) {
            $dados["idProduto"] = $produto->getIdProduto();
            $dados['produto'] = $produto;
            $dados["estadosProduto"] = Situacao::getAllAsArray();


            $this->loadView("produto/form.php", $dados);
        } else
            $this->list("Produto não encontrado.");
    }
    

    protected function save() {
        
        //Captura os dados do formulário
        $dados["idProduto"] = isset($_POST['idProduto']) ? $_POST['idProduto'] : 0;
        $nome = isset($_POST['nome']) ? trim($_POST['nome']) : NULL;
        $descricao = isset($_POST['descricao']) ? trim($_POST['descricao']) : NULL;
        $situacao = isset($_POST['situacao']) ? trim($_POST['situacao']) : NULL;
        $arqFotoAntiga = isset($_POST['arquivoFoto']) ? trim($_POST['arquivoFoto']) : NULL;

        $foto = $_FILES["foto"];
        
        //Cria objeto Produto
        $produto = new Produto();
        $produto->setNome($nome);
        $produto->setDescricao($descricao);
        $produto->setSituacao($situacao); 
        $produto->setFoto($arqFotoAntiga);
        
        //Validar os dados
        $erros = $this->produtoService->validarDados($produto, $foto);
        
        if(empty($erros)) {
            $nomeArquivoFoto = "verdadeiro";
            if($foto['size'] > 0)
                $nomeArquivoFoto = $this->imagemService->upload($foto); //Salvar o arquivo da foto
                
            if($nomeArquivoFoto) {

                if($nomeArquivoFoto != "verdadeiro")
                    $produto->setFoto($nomeArquivoFoto);

                //Persiste o objeto
                try {
                    if($dados["idProduto"] == 0)  //Inserindo
                        $this->produtoDao->insert($produto);
                    else { //Alterando
                        $produto->setIdProduto($dados["idProduto"]);
                        $this->produtoDao->update($produto);
                    }

                    //TODO - Enviar mensagem de sucesso
                    $msg = "Produto salvo com sucesso.";
                    $this->list("", $msg);
                    exit;
                } catch (PDOException $e) {
                    $erros = array("Erro ao salvar o produto na base de dados.");
                }    
               
            } else
                //Caso não consega salvar, exibe o erro
                $erros = ["Erro ao salvar o aquivo da foto."];     
        }
   
    
        //Se há erros, volta para o formulário
        
        //Carregar os valores recebidos por POST de volta para o formulário
        
        $dados['produto'] = $produto;
        $dados["estadosProduto"] = Situacao::getAllAsArray();

        $_FILES["foto"] = $foto;

        $msgsErro = implode("<br>", $erros);
        $this->loadView("produto/form.php", $dados, $msgsErro);
    }

   
    protected function delete() {
        $produto = $this->findProdutoById();
        if($produto) {
            $this->produtoDao->deleteById($produto->getIdProduto());
            $this->list("", "Produto excluído com sucesso!");
        } else
            $this->list("Produto não econtrado!"); 
    }
    

    private function findProdutoById() {
        $id = 0;
        if(isset($_GET['id']))
            $id = $_GET['id'];

        $produto = $this->produtoDao->findProdutoById($id);
        return $produto;
    }
    

}


#Criar objeto da classe
$prodCont = new ProdutoController();
