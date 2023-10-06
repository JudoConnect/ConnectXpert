<?php
#Classe de controller para Frequencia

require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/FrequenciaDAO.php");
require_once(__DIR__ . "/../model/Frequencia.php");
require_once(__DIR__ . "/../model/enum/UsuarioPapel.php");
require_once(__DIR__ . "/../dao/EncontroDAO.php");

class FrequenciaController extends Controller {

    private FrequenciaDAO $frequenciaDao;
    private EncontroDAO   $encontroDao;

    public function __construct() {
        if(! $this->usuarioLogado())
            exit;

        if(! $this->usuarioPossuiPapel([UsuarioPapel::PROFESSOR])) {
            echo "Acesso negado";
            exit;
        }

        $this->frequenciaDao = new FrequenciaDAO();
        $this->encontroDao = new EncontroDAO ();

        $this->handleAction();
    }

    protected function list(string $msgErro = "", string $msgSucesso = "") {
        $idEncontro = $this->getIdEncontro();

        $frequencias = $this->frequenciaDao->list();
        $dados["lista"] = $frequencias;
        $dados["encontro"] = $this->encontroDao->findById($idTurma);

        $this->loadView("frequencia/listFrequencia.php", $dados,  $msgErro, $msgSucesso);
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

        $frequencia = $this->frequenciaDao->findFrequenciaById($id);
        return $frequencia;
    }

}

#Criar objeto da classe
$frequenciaCont = new FrequenciaController();
