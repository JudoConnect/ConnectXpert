<?php
#Classe de controller para Frequencia

require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/FrequenciaDAO.php");
require_once(__DIR__ . "/../model/Frequencia.php");
require_once(__DIR__ . "/../model/enum/UsuarioPapel.php");
require_once(__DIR__ . "/../dao/EncontroDAO.php");
require_once(__DIR__ . "/../dao/TurmaDAO.php");
require_once(__DIR__ . "/../dao/AlunoDAO.php");

class FrequenciaController extends Controller {

    private FrequenciaDAO $frequenciaDao;
    private EncontroDAO   $encontroDao;
    private TurmaDAO      $turmaDao;  
    private AlunoDAO      $alunoDao;
     
    public function __construct() {
        if(! $this->usuarioLogado())
            exit;

        if(! $this->usuarioPossuiPapel([UsuarioPapel::PROFESSOR])) {
            echo "Acesso negado";
            exit;
        }

        $this->frequenciaDao = new FrequenciaDAO();
        $this->encontroDao = new EncontroDAO ();
        $this->turmaDao = new TurmaDAO ();
        $this->alunoDao = new AlunoDAO ();

        $this->handleAction();
    }

    protected function list(string $msgErro = "", string $msgSucesso = "") {
        
        $encontro = $this->findEncontroById();
        
        if (!$encontro) {
            echo "Encontro Invalido";
            exit;
        }
        
        $dados["encontro"] = $encontro;
        $dados["turma"] = $this->turmaDao->findById($encontro->getIdTurma());

        $dados["lista"] = $this->alunoDao->listByTurma($encontro->getIdTurma());

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
    private function findEncontroById() {
        $id = 0;
        if(isset($_GET['id']))
            $id = $_GET['id'];

        $encontro = $this->encontroDao->findEncontroById($id);
        return $encontro;
    }

}

#Criar objeto da classe
$frequenciaCont = new FrequenciaController();
