<?php
#Classe controller para Aluno
require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/TurmaDAO.php");
require_once(__DIR__ . "/../dao/TurmaProfessorDAO.php");
require_once(__DIR__ . "/../dao/ProfessorDAO.php");
require_once(__DIR__ . "/../service/TurmaService.php");
require_once(__DIR__ . "/../model/Turma.php");

class TurmaProfessorController extends Controller {

    private TurmaDAO $turmaDao;
    private ProfessorDAO $professorDao;
    private TurmaService $turmaService;
    private TurmaProfessorDAO $turmaProfDao;
    

    public function __construct() {
        if(! $this->usuarioLogado())
            exit;

        if(! $this->usuarioPossuiPapel([UsuarioPapel::ADMINISTRADOR, UsuarioPapel::PROFESSOR])) {
            echo "Acesso negado";
            exit;
        }

        $this->turmaDao = new TurmaDAO();
        $this->turmaService = new TurmaService();
        $this->professorDao = new ProfessorDAO();
        $this->turmaProfDao = new TurmaProfessorDAO();
       

        $this->handleAction();
    }

    public function list() {
        $turma = $this->findTurmaById();
        if($turma) {
            $dados["id_turma"] = $turma->getIdTurma();
            $dados["turma"] = $turma;

            $dados['listaProfessores'] = $this->professorDao->list();

            $dados['listaProfessoresturma'] = $this->professorDao->listByTurma($turma->getIdTurma());
           
            $this->loadView("turma_professor/turmaProfessor.php", $dados);
        } else
            echo "Turma não encontrada.";
    }

    public function add(){
        $idProf = isset($_POST['idProfessor']) ? $_POST['idProfessor'] : 0;
        $idTurma = isset($_POST['idTurma']) ? $_POST['idTurma'] : 0;

        $this->turmaProfDao->insert($idTurma, $idProf);

        header("location: TurmaProfessorController.php?action=list&id=" . $idTurma);
    }

    public function delete(){
        $idTurmaProf = 0;
        if(isset($_GET['id']))
            $idTurmaProf = $_GET['id'];

        if($idTurmaProf)    
            $this->turmaProfDao->deleteById( );
        else
            $msg = "ID não encontrado!";
    }


    private function findTurmaById() {
        $id = 0;
        if(isset($_GET['id']))
            $id = $_GET['id'];

        $turma = $this->turmaDao->findById($id);
        return $turma;
    }


}

new TurmaProfessorController();