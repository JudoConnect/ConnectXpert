<?php
#Classe de controller para Frequencia

require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/FrequenciaDAO.php");
require_once(__DIR__ . "/../model/Frequencia.php");
require_once(__DIR__ . "/../model/enum/Condicao.php");
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

    protected  function createFrequencia() {
        $frequenciasASerCreadas = array();
        
        $frequencias = $this->frequenciaDao->listByEncontro($_GET['id']);
        $alunos = $this->alunoDao->listByTurma($_GET['idTurma']);

        foreach($alunos as $aluno):
            if(! $this->alunoPossuiFrequencia($aluno->getIdTurmaAluno(), $frequencias)) {
                $frequencia = new Frequencia();
                $frequencia->setCondicao("presente");
                $frequencia->setIdEncontro($_GET['id']);
                $frequencia->setIdTurmaAluno($aluno->getIdTurmaAluno());
                array_push($frequenciasASerCreadas, $frequencia);
            }
        endforeach;

        $this->frequenciaDao->insert($frequenciasASerCreadas);
        $this->list();
    }

    private function alunoPossuiFrequencia($idTurmaAluno, $frequencias) {
        if($frequencias) {
            foreach($frequencias as $f) {
                if($f->getIdTurmaAluno() == $idTurmaAluno)
                    return true;
            }
        }

        return false;
    }

    protected function list(string $msgErro = "", string $msgSucesso = "") {
        
        $encontro = $this->findEncontroById();
        
        if (!$encontro) {
            echo "Encontro Invalido";
            exit;
        }
        
        $dados["encontro"] = $encontro;
        $dados["turma"] = $this->turmaDao->findById($encontro->getIdTurma());
        $dados["frequencia"] = $this->frequenciaDao->list($_GET['id']);
        // $dados["listaAlunos"] = $this->alunoDao->listByTurma($encontro->getIdTurma());

        $this->loadView("frequencia/listFrequencia.php", $dados,  $msgErro, $msgSucesso);
    }

    protected function mudarEstado() {
        //Captura os dados do formulário
        $idFrequencia = isset($_POST['idFrequencia']) ? $_POST['idFrequencia'] : NULL;
        $frequenciaAtual = isset($_POST['frequencia']) ? $_POST['frequencia'] : NULL;

        //echo $idEncontro . " - PHP " . $idTurmaAluno;
        //exit;

        if($frequenciaAtual == "ausente") {
            $frequenciaAtual = "presente";
        }
        else {
            $frequenciaAtual = "ausente";
        }
        $this->frequenciaDao->alterarEstadoFalta($frequenciaAtual, $idFrequencia);
        return;

        echo $frequenciaAtual;
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
