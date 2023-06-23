<?php
#Classe controller para Produto
require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/ProdutoDAO.php");
require_once(__DIR__ . "/../service/ProdutoService.php");
require_once(__DIR__ . "/../model/Produto.php");
require_once(__DIR__ . "/../model/enum/UsuarioPapel.php");

class ProdutoController extends Controller {

    private ProdutoDAO $produtoDao;
    private ProdutoService $produtoService;

    public function __construct() {
        if(! $this->usuarioLogado())
            exit;

        if(! $this->usuarioPossuiPapel([UsuarioPapel::ADMINISTRADOR])) {
            echo "Acesso negado";
            exit;
        }

        $this->produtoDao = new ProdutoDAO();
        $this->produtoService = new ProdutoService();

        $this->handleAction();
    }

    protected function list(string $msgErro = "", string $msgSucesso = "") {
        $produtos = $this->produtoDao->list();
        //print_r($produtos);
       
        $dados["lista"] = $produtos;

        $this->loadView("produto/list.php", $dados,  $msgErro, $msgSucesso);
    }

    
    protected function create() {
        $dados["idProduto"] = 0;
        $dados["papeis"] = UsuarioPapel::getAllAsArray();
        $this->loadView("produto/form.php", $dados);
    }


    protected function edit() {
        $produto = $this->findProdutoById();
        if($produto) {
            $dados["idProduto"] = $produto->getIdProduto();
            $dados['produto'] = $produto;

            $this->loadView("produto/form.php", $dados);
        } else
            $this->list("Produto não encontrado.");
    }
    

    protected function save() {
        //Captura os dados do formulário
        $dados["idProduto"] = isset($_POST['idProduto']) ? $_POST['idProduto'] : 0;
        $nome = isset($_POST['nome']) ? trim($_POST['nome']) : NULL;
        $descricao = isset($_POST['descricao']) ? trim($_POST['descricao']) : NULL;
        
        $foto = $_FILES["foto"];
        
        //Cria objeto Produto
        $produto = new Produto();
        $produto->setNome($nome);
        $produto->setDescricao($descricao);
        //$produto->setFoto($foto);
        //$produto->setFoto("foto");
        
        //Validar os dados
        $erros = $this->produtoService->validarDados($produto);
        if(empty($erros)) {
            //Salvar a imagem
            //Captura o nome e a extensão do arquivo
            $arquivoNome = explode('.', $foto['name']);
            $arquivoExtensao = $arquivoNome[1];

            //A partir da extensão, o ideal é gerar um nome único para o arquivo a fim de encontrá-lo depois
            //Exemplo: pode-se concatenar um identificador único do tipo UUID
            $uuid = vsprintf( '%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex(random_bytes(16)), 4) );
            $nomeArquivoFoto = "imagem_" . $uuid . "." . $arquivoExtensao;
            $produto->setFoto($nomeArquivoFoto);

            //Salva o arquivo no diretório defindo em PATH_FOTOS
            if(move_uploaded_file($foto["tmp_name"], PATH_FOTOS. "/" . $nomeArquivoFoto)) { 
                
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
                    $erros = array("[Erro ao salvar o produto na base de dados.]");
                }

            } else 
                //Caso não consega salvar, exibe o erro
                $erros = ["Erro ao salvar o aquivo da foto."]; 
        }
   
    
        //Se há erros, volta para o formulário
        
        //Carregar os valores recebidos por POST de volta para o formulário
        /*
        $dados["nome"] = $nome;
        $dados["descricao"] = $descricao;
        $dados["foto"] = $foto;
        */
        $dados['produto'] = $produto;
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
        $idProduto = 0;
        if(isset($_GET['id']))
            $idProduto = $_GET['id'];

        $produto = $this->produtoDao->findProdutoById($idProduto);
        return $produto;
    }
    

}


#Criar objeto da classe
$prodCont = new ProdutoController();
