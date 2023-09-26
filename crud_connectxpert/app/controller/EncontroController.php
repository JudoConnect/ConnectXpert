<?php
#Classe controller para Encontro
require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/EncontroDAO.php");
require_once(__DIR__ . "/../service/EncontroService.php");
require_once(__DIR__ . "/../model/Encontro.php");
require_once(__DIR__ . "/../model/enum/UsuarioPapel.php");


class EncontroController extends Controller {

    private EncontroDAO $encontroDao;
    private EncontroService $encontroService;

    public function __construct() {
        if(! $this->usuarioLogado())
            exit;

        if(! $this->usuarioPossuiPapel([UsuarioPapel::PROFESSOR])) {
            echo "Acesso negado";
            exit;
        }

        $this->encontroDao = new EncontroDAO();
        $this->encontroService = new EncontroService();

        $this->handleAction();
    }

    protected function list(string $msgErro = "", string $msgSucesso = "") {
        $encontros = $this->encontroDao->list();

        $dados["lista"] = $encontros;

        $this->loadView("encontro/listEncontro.php", $dados,  $msgErro, $msgSucesso);
    }

    
    protected function create() {
        $dados["id_encontro"] = 0;

        $this->loadView("encontro/formEncontro.php", $dados);
    }


    protected function edit() {
        $encontro = $this->findEncontroById();
        if($encontro) {
            $dados["id_encontro"] = $encontro->getIdEncontro();
            $dados['encontro'] = $encontro;

            $this->loadView("encontro/formEncontro.php", $dados);
        } else
            $this->list("Encontro não encontrado.");
    }
    

    protected function save() {
        
        //Captura os dados do formulário
        $dados["id_encontro"] = isset($_POST['id_encontro']) ? $_POST['id_encontro'] : 0;
        $nomeEncontro = isset($_POST['nomeEncontro']) ? trim($_POST['nomeEncontro']) : NULL;
        $diaEncontro = isset($_POST['diaEncontro']) ? trim($_POST['diaEncontro']) : NULL;
        $idTurma = isset($_POST['id_turma']) ? trim($_POST['id_turma']) : NULL;
 
        //Cria objeto Encontro
        $encontro = new Encontro();
        $encontro->setNomeEncontro($nomeEncontro);
        $encontro->setDiaEncontro($diaEncontro);
        //$encontro->setIdTurma($idTurma);

        //Validar os dados
        $erros = $this->encontroService->validarDados($encontro);
        if(empty($erros)) {
            //Persiste o objeto
            try {
                
                if($dados["id_encontro"] == 0)  //Inserindo
                    $this->encontroDao->insert($encontro);
                else { //Alterando
                    $encontro->setIdEncontro($dados["id_encontro"]);
                    $this->encontroDao->update($encontro);
                }

                //TODO - Enviar mensagem de sucesso
                $msg = "Encontro salvo com sucesso.";
                $this->list("", $msg);
                exit;
            } catch (PDOException $e) {
                $erros = ["Erro ao salvar encontro na base de dados." . $e];                
            }
        }

        //Se há erros, volta para o formulário

        //Carregar os valores recebidos por POST de volta para o formulário
        $dados["encontro"] = $encontro;

        $msgsErro = implode("<br>", $erros);
        $this->loadView("encontro/formEncontro.php", $dados, $msgsErro);
    }

   
    protected function delete() {
        $encontro = $this->findEncontroById();
        if($encontro) {
            $this->encontroDao->deleteById($encontro->getIdEncontro());
            $this->list("", "Encontro excluído com sucesso!");
        } else
            $this->list("Encontro não econtrado!"); 
    }
    
    private function findEncontroById() {
        $id = 0;
        if(isset($_GET['id']))
            $id = $_GET['id'];

        $encontro = $this->encontroDao->findEncontroById($id);
        return $encontro;
    }
}

#Criar objeto da classe
$encCont = new EncontroController();

