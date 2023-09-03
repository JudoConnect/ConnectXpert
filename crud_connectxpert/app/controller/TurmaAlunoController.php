<?php
#Classe controller para TurmaAluno
require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/TurmaDAO.php");
require_once(__DIR__ . "/../dao/TurmaAlunoDAO.php");
require_once(__DIR__ . "/../dao/AlunoDAO.php");
require_once(__DIR__ . "/../service/TurmaAlunoService.php");
require_once(__DIR__ . "/../model/Turma.php");

class TurmaAlunoController extends Controller {

    private TurmaDAO $turmaDao;
    private AlunoDAO $alunoDao;
    private TurmaAlunoService $turmaAlunoService;
    private TurmaAlunoDAO $turmaAlunoDao;
    

    public function __construct() {
        if(! $this->usuarioLogado())
            exit;

        if(! $this->usuarioPossuiPapel([UsuarioPapel::ADMINISTRADOR, UsuarioPapel::PROFESSOR])) {
            echo "Acesso negado";
            exit;
        }

        $this->turmaDao = new TurmaDAO();
        $this->turmaAlunoService = new TurmaAlunoService();
        $this->alunoDao = new AlunoDAO();
        $this->turmaAlunoDao = new TurmaAlunoDAO();
       

        $this->handleAction();
    }

    public function list() {
        $turma = $this->findTurmaById();
        if($turma) {
            $dados["id_turma"] = $turma->getIdTurma();
            $dados["turma"] = $turma;

            $dados['listaAlunos'] = $this->alunoDao->list();

            $dados['listaAlunosturma'] = $this->alunoDao->listByTurma($turma->getIdTurma());

            //Recupera as mensages que vieram por meio de parâmetro GET
            $msgErro = '';
            if(isset($_GET['msgErro']))
                $msgErro = $_GET['msgErro'];
            $msgSucesso = '';
            if(isset($_GET['msgSucesso']))
                $msgSucesso = $_GET['msgSucesso'];
           
            $this->loadView("turma_aluno/turmaAluno.php", $dados, $msgErro, $msgSucesso);
        } else
            echo "Turma não encontrada.";
    }

    public function add(){
        $idAluno = isset($_POST['idAluno']) && is_numeric($_POST['idAluno']) ? $_POST['idAluno'] : 0;
        $idTurma = isset($_POST['idTurma']) ? $_POST['idTurma'] : 0;

        //Validar se o aluno foi selecionado
        $erros = $this->turmaAlunoService->validarDados($idAluno);    

        if(!$erros && $this->turmaAlunoService->alunoExisteTurma($idTurma, $idAluno))
            array_push($erros, 'Este aluno já foi adicionado na turma.');
        
        $msgErro = '';
        $msgSucesso = '';
        if(!$erros) {
            $this->turmaAlunoDao->insert($idTurma, $idAluno);
            $msgSucesso = 'Aluno inserido na turma com sucesso.';
        } else {
            $msgErro = implode('<br>', $erros);    
        }

        $parMsg = '';
        if($msgErro)
            $parMsg = '&msgErro=' . $msgErro;
        else if($msgSucesso)
            $parMsg = '&msgSucesso=' . $msgSucesso;

        header("location: TurmaAlunoController.php?action=list&id=" . $idTurma . $parMsg);
    }

    public function delete(){
        $idTurmaAluno = 0;
        if(isset($_GET['idTurmaAluno']))
            $idTurmaAluno = $_GET['idTurmaAluno'];

        $idTurma = 0;
        if(isset($_GET['idTurma']))
            $idTurma = $_GET['idTurma'];

        if($idTurmaAluno && $idTurma) {    
            $this->turmaAlunoDao->deleteById($idTurmaAluno);

            $parMsg = '&msgSucesso=' . "Aluno excluido com sucesso.";
            header("location: TurmaAlunoController.php?action=list&id=" . $idTurma . $parMsg);
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

new TurmaAlunoController();