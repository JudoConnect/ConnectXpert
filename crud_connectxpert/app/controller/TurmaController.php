<?php
#Classe controller para Aluno
require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/TurmaDAO.php");
require_once(__DIR__ . "/../service/TurmaService.php");
require_once(__DIR__ . "/../model/Turma.php");
require_once(__DIR__ . "/../model/enum/UsuarioPapel.php");


class TurmaController extends Controller {

    private TurmaDAO $turmaDao;
    private TurmaService $turmaService;

    public function __construct() {
        if(! $this->usuarioLogado())
        exit;

    if(! $this->usuarioPossuiPapel([UsuarioPapel::ADMINISTRADOR])) {
        echo "Acesso negado";
        exit;
    }

        $this->turmaDao = new TurmaDAO();
        $this->turmaService = new TurmaService();

        $this->handleAction();
    }
        


    protected function list(string $msgErro = "", string $msgSucesso = "") {
        $turmas = $this->turmaDao->list();
        $dados["lista"] = $turmas;

        $this->loadView("turma/listTurma.php", $dados,  $msgErro, $msgSucesso);
    }

    protected function create() {
        $dados["id_turma"] = 0;

        $this->loadView("turma/formTurma.php", $dados);
    }

    protected function edit() {
        $turma = $this->findTurmaById();
        if($turma) {
            $dados["id_turma"] = $turma->getIdTurma();
            $dados["turma"] = $turma;

            $this->loadView("turma/formTurma.php", $dados);
        } else
            $this->list("Turma não encontrada.");
    }
    

    protected function save() {
        //Captura os dados do formulário
        $dados["id_turma"] = isset($_POST['id_turma']) ? $_POST['id_turma'] : 0;
        $nome_turma = isset($_POST['nomeTurma']) ? trim($_POST['nomeTurma']) : NULL;
        $num_alunos = isset($_POST['numAlunos']) ? trim($_POST['numAlunos']) : NULL;
        $horario = isset($_POST['horario']) ? trim($_POST['horario']) : NULL;
        $dia_semana = isset($_POST['diaSemana']) ? trim($_POST['diaSemana']) : NULL;

        //Cria objeto Usuario
        $turma = new Turma();
        $turma->setNomeTurma($nome_turma);
        $turma->setNumAlunos($num_alunos);
        $turma->setHorario($horario);
        $turma->setDiaSemana($dia_semana);

        //Validar os dados
        $erros = $this->turmaService->validarDados($turma);
        if(empty($erros)) {
            //Persiste o objeto
            try {
                
                if($dados["id_turma"] == 0)  //Inserindo
                    $this->turmaDao->insert($turma);
                else { //Alterando
                    $turma->setIdTurma($dados["id_turma"]);
                    $this->turmaDao->update($turma);
                }

                //TODO - Enviar mensagem de sucesso
                $msg = "Turma salva com sucesso.";
                $this->list("", $msg);
                exit;
            } catch (PDOException $e) {
                $erros = ["Erro ao salvar a turma na base de dados." . $e];                
            }
        }

        //Se há erros, volta para o formulário

        //Carregar os valores recebidos por POST de volta para o formulário
        $dados["turma"] = $turma;

        $msgsErro = implode("<br>", $erros);
        $this->loadView("turma/formTurma.php", $dados, $msgsErro);
    }
    
    
    protected function delete() {
        $turma = $this->findTurmaById();
        if($turma) {
            $this->turmaDao->deleteById($turma->getIdTurma());
            $this->list("", "Turma excluída com sucesso!");
        } else
            $this->list("Turma não econtrada!");
    }

    private function findTurmaById() {
        $id = 0;
        if(isset($_GET['id']))
            $id = $_GET['id'];

        $turma = $this->turmaDao->findById($id);
        return $turma;
    }

}

#Criar objeto da classe
$turCont = new TurmaController();
