<?php
#Classe controller para Administrador
require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/administradorDAO.php");
require_once(__DIR__ . "/../service/administradorService.php");
require_once(__DIR__ . "/../model/administrador.php");
require_once(__DIR__ . "/../model/enum/administradorPapel.php");

class administradorController extends Controller {

    private administradorDAO $administradorDao;
    private administradorService $administradorService;

    public function __construct() {
        if(! $this->administradorLogado())
            exit;

        if(! $this->administradorPossuiPapel([administradorPapel::ADMINISTRADOR])) {
            echo "Acesso negado";
            exit;
        }

        $this->administradorDao = new administradorDAO();
        $this->administradorService = new administradorService();

        $this->handleAction();
    }

    protected function list(string $msgErro = "", string $msgSucesso = "") {
        $administradors = $this->administradorDao->list();
        $dados["lista"] = $administradors;

        $this->loadView("administrador/list.php", $dados,  $msgErro, $msgSucesso);
    }

    protected function create() {
        $dados["id"] = 0;
        $dados["papeis"] = administradorPapel::getAllAsArray();
        $dados["sexo"] = Sexo::getAllAsArray();

        $this->loadView("administrador/form.php", $dados);
    }

    protected function edit() {
        $administrador = $this->findadministradorById();
        if($administrador) {
            $dados["id"] = $administrador->getId();
            $administrador->setSenha("");
            $dados["administrador"] = $administrador;
            $dados["papeis"] = administradorPapel::getAllAsArray();

            $this->loadView("administrador/form.php", $dados);
        } else
            $this->list("Usuário não encontrado.");
    }

    protected function save() {
        //Captura os dados do formulário
        $dados["id"] = isset($_POST['id']) ? $_POST['id'] : 0;
        $nome = isset($_POST['nome']) ? trim($_POST['nome']) : NULL;
        $login = isset($_POST['login']) ? trim($_POST['login']) : NULL;
        $senha = isset($_POST['senha']) ? trim($_POST['senha']) : NULL;
        $confSenha = isset($_POST['conf_senha']) ? trim($_POST['conf_senha']) : NULL;

        //Captura os papeis do formulario
        $papeis = array();
        foreach(administradorPapel::getAllAsArray() as $papel) {
            if(isset($_POST[$papel]))
                array_push($papeis, $papel);
        }

        //Cria objeto administrador
        $administrador = new administrador();
        $administrador->setNome($nome);
        $administrador->setLogin($login);
        $administrador->setSenha($senha);
        $administrador->setPapeisAsArray($papeis);

        //Validar os dados
        $erros = $this->administradorService->validarDados($administrador, $confSenha);
        if(empty($erros)) {
            //Persiste o objeto
            try {
                
                if($dados["id"] == 0)  //Inserindo
                    $this->administradorDao->insert($administrador);
                else { //Alterando
                    $administrador->setId($dados["id"]);
                    $this->administradorDao->update($administrador);
                }

                //TODO - Enviar mensagem de sucesso
                $msg = "Usuário salvo com sucesso.";
                $this->list("", $msg);
                exit;
            } catch (PDOException $e) {
                $erros = "[Erro ao salvar o usuário na base de dados.]";                
            }
        }

        //Se há erros, volta para o formulário
        
        //Carregar os valores recebidos por POST de volta para o formulário
        $dados["administrador"] = $administrador;
        $dados["confSenha"] = $confSenha;
        $dados["papeis"] = administradorPapel::getAllAsArray();
        $dados["sexo"] = Sexo::getAllAsArray();

        $msgsErro = implode("<br>", $erros);
        $this->loadView("administrador/form.php", $dados, $msgsErro);
    }

    protected function delete() {
        $administrador = $this->findadministradorById();
        if($administrador) {
            $this->administradorDao->deleteById($administrador->getId());
            $this->list("", "Usuário excluído com sucesso!");
        } else
            $this->list("administrador não econtrado!");
    }

    private function findadministradorById() {
        $id = 0;
        if(isset($_GET['id']))
            $id = $_GET['id'];

        $administrador = $this->administradorDao->findById($id);
        return $administrador;
    }

}


#Criar objeto da classe
$usuCont = new administradorController();
