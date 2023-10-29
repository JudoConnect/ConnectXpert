<?php
#Classe de controller para Instituição de Ensino

require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/IeDAO.php");
require_once(__DIR__ . "/../service/IeService.php");
require_once(__DIR__ . "/../model/Ie.php");
require_once(__DIR__ . "/../model/enum/UsuarioPapel.php");

class IeController extends Controller {
 
    private IeDAO $ieDao;
    private IeService $ieService;

    public function __construct() {
        if(! $this->usuarioLogado())
            exit;

    if(! $this->usuarioPossuiPapel([UsuarioPapel::ADMINISTRADOR])) {
        echo "Acesso negado";
        exit;
    }

        $this->ieDao = new IeDAO();
        $this->ieService = new IeService();

        $this->handleAction();
    }

    protected function list(string $msgErro = "", string $msgSucesso = "") {
        $ies = $this->ieDao->list();
        //print_r($ies);
        $dados["lista"] = $ies;
 
        $this->loadView("ie/listIe.php", $dados,  $msgErro, $msgSucesso);
    }

    protected function create() {
        $dados["id_ie"] = 0;

        $this->loadView("ie/formIe.php", $dados);
    }

    protected function edit() {
        $ie = $this->findIeById();
        if($ie) {
            $dados["id_ie"] = $ie->getIdIe();
            $dados["ie"] = $ie;
    

            $this->loadView("ie/formIe.php", $dados);
        } else
            $this->list("Instituição de Ensino não encontrada.");
    }

    protected function save() {
        //Captura os dados do formulário
        $dados["id_ie"] = isset($_POST['id_ie']) ? $_POST['id_ie'] : 0;
        $nomeIe = isset($_POST['nomeIe']) ? trim($_POST['nomeIe']) : NULL;

        //Cria objeto Usuario
        $ie = new Ie();
        $ie->setNomeIe($nomeIe);

        //Validar os dados
        $erros = $this->ieService->validarDados($ie);
        if(empty($erros)) {
            //Persiste o objeto
            try {
                
                if($dados["id_ie"] == 0)  //Inserindo
                    $this->ieDao->insert($ie);
                else { //Alterando
                    $ie->setIdIe($dados["id_ie"]);
                    $this->ieDao->update($ie);
                }

                //TODO - Enviar mensagem de sucesso
                $msg = "Instituição de Ensino salvo com sucesso.";
                $this->list("", $msg);
                exit;
            } catch (PDOException $e) {
                $erros = ["Erro ao salvar instuição de ensino na base de dados." . $e];                
            }
        }

        //Se há erros, volta para o formulário

        //Carregar os valores recebidos por POST de volta para o formulário
        $dados["ie"] = $ie;

        $msgsErro = implode("<br>", $erros);
        $this->loadView("ie/formIe.php", $dados, $msgsErro);
    }
    
    
    protected function delete() {
        $ie = $this->findIeById();
        if($ie) {
            $this->ieDao->deleteById($ie->getIdIe());
            $this->list("", "Instituição de Ensino excluída com sucesso!");
        } else
            $this->list("Instituição de Ensino não econtrado!");
    }

    private function findIeById() {
        $id = 0;
        if(isset($_GET['id']))
            $id = $_GET['id'];

        $ie = $this->ieDao->findById($id);
        return $ie;
    }

}

#Criar objeto da classe
$ieCont = new IeController();
