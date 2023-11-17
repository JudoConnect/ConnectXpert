<?php
#Classe controller para Professor
require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/TurmaDAO.php");
require_once(__DIR__ . "/../dao/TurmaProfessorDAO.php");
require_once(__DIR__ . "/../dao/ProfessorDAO.php");
require_once(__DIR__ . "/../service/TurmaProfessorService.php");
require_once(__DIR__ . "/../model/Turma.php");
 
class TurmaProfessorController extends Controller {
 
    private TurmaDAO $turmaDao;
    private ProfessorDAO $professorDao;
    private TurmaProfessorService $turmaProfService;
    private TurmaProfessorDAO $turmaProfDao;
    

    public function __construct() {
        if(! $this->administradorLogado())
            exit;

        if(! $this->administradorPossuiPapel([administradorPapel::ADMINISTRADOR, administradorPapel::PROFESSOR])) {
            echo "Acesso negado";
            exit;
        }

        $this->turmaDao = new TurmaDAO();
        $this->turmaProfService = new TurmaProfessorService();
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

            //Recupera as mensages que vieram por meio de parâmetro GET
            $msgErro = '';
            if(isset($_GET['msgErro']))
                $msgErro = $_GET['msgErro'];
            $msgSucesso = '';
            if(isset($_GET['msgSucesso']))
                $msgSucesso = $_GET['msgSucesso'];
           
            $this->loadView("turma_professor/turmaProfessor.php", $dados, $msgErro, $msgSucesso);
        } else
            echo "Turma não encontrada.";
    }

    public function add(){
        $idProf = isset($_POST['idProfessor']) && is_numeric($_POST['idProfessor']) ? $_POST['idProfessor'] : 0;
        $idTurma = isset($_POST['idTurma']) ? $_POST['idTurma'] : 0;

        //Validar se o professor foi selecionado
        $erros = $this->turmaProfService->validarDados($idProf);    

        if(!$erros && $this->turmaProfService->professorExisteTurma($idTurma, $idProf))
            array_push($erros, 'Este professor já foi adicionado na turma.');
        
        $msgErro = '';
        $msgSucesso = '';
        if(!$erros) {
            $this->turmaProfDao->insert($idTurma, $idProf);
            $msgSucesso = 'Professor inserido na turma com sucesso.';
        } else {
            $msgErro = implode('<br>', $erros);    
        }

        $parMsg = '';
        if($msgErro)
            $parMsg = '&msgErro=' . $msgErro;
        else if($msgSucesso)
            $parMsg = '&msgSucesso=' . $msgSucesso;

        header("location: TurmaProfessorController.php?action=list&id=" . $idTurma . $parMsg);
    }

    public function delete(){
        $idTurmaProf = 0;
        if(isset($_GET['idTurmaProf']))
            $idTurmaProf = $_GET['idTurmaProf'];

        $idTurma = 0;
        if(isset($_GET['idTurma']))
            $idTurma = $_GET['idTurma'];

        if($idTurmaProf && $idTurma) {    
            $this->turmaProfDao->deleteById($idTurmaProf);

            $parMsg = '&msgSucesso=' . "Professor excluido com sucesso.";
            header("location: TurmaProfessorController.php?action=list&id=" . $idTurma . $parMsg);
        } else
            echo "IDs não encontrados!";
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