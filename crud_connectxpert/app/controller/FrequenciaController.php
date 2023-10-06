<?php
#Classe de controller para Frequencia

require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/FrequenciaDAO.php");
require_once(__DIR__ . "/../model/Frequencia.php");
require_once(__DIR__ . "/../model/enum/UsuarioPapel.php");

class FrequenciaController extends Controller {

    private FrequenciaDAO $frequenciaDAO;

    public function __construct() {
        if(! $this->usuarioLogado())
            exit;

        if(! $this->usuarioPossuiPapel([UsuarioPapel::ADMINISTRADOR, UsuarioPapel::PROFESSOR])) {
            echo "Acesso negado";
            exit;
        }

        $this->frequenciaDAO = new FrequenciaDAO();

        $this->handleAction();
    }

    protected function list(string $msgErro = "", string $msgSucesso = "") {
        $frequencias = $this->frequenciaDAO->list();
        $dados["lista"] = $frequencias;

        $this->loadView("frequencia/listFrequencia.php", $dados,  $msgErro, $msgSucesso);
    }

    protected function create() {
        $dados["id_frequencia"] = 0;
        $dados["condicao"] = Condicao::getAllAsArray();

        $this->loadView("frequencia/listFrequencia.php", $dados);
    }

    protected function edit() {
        $frequencia = $this->findFrequenciaById();
        if($frequencia) {
            $dados["id_frequencia"] = $frequencia->getIdFrequencia();
            $dados["frequencia"] = $frequencia;
    

            $this->loadView("frequencia/listFrequencia.php", $dados);
        } else
            $this->list("Frequencia não encontrada.");
    }

    protected function save() {
        //Captura os dados do formulário
        $dados["id_frequencia"] = isset($_POST['id_frequencia']) ? $_POST['id_frequencia'] : 0;
        $condicao = isset($_POST['condicao']) ? trim($_POST['condicao']) : NULL;

        //Cria objeto Usuario
        $frequencia = new Frequencia();
        $frequencia->setCondicao($condicao);
    }
    private function findFrequenciaById() {
        $id = 0;
        if(isset($_GET['id']))
            $id = $_GET['id'];

        $frequencia = $this->frequenciaDAO->findById($id);
        return $frequencia;
    }

}

#Criar objeto da classe
$frequenciaCont = new FrequenciaController();
