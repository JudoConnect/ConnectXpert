<?php
#Classe controller para Aluno
require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/TurmaDAO.php");
require_once(__DIR__ . "/../dao/ProfessorDAO.php");
require_once(__DIR__ . "/../service/TurmaService.php");
require_once(__DIR__ . "/../model/Turma.php");

class TurmaProfessorController extends Controller {

    private TurmaDAO $turmaDao;
    private ProfessorDAO $professorDao;
    private TurmaService $turmaService;

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

        $this->handleAction();
    }

    public function list() {
        $turma = $this->findTurmaById();
        if($turma) {
            $dados["id_turma"] = $turma->getIdTurma();
            $dados["turma"] = $turma;

            $dados['listaProfessores'] = $this->professorDao->list();

            $this->loadView("turma_professor/turmaProfessor.php", $dados);
        } else
            echo "Turma não encontrada.";
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