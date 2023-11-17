<?php
#Classe controller para Encontro
require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/EncontroDAO.php");
require_once(__DIR__ . "/../dao/TurmaDAO.php");
require_once(__DIR__ . "/../service/EncontroService.php");
require_once(__DIR__ . "/../model/Encontro.php");
require_once(__DIR__ . "/../model/enum/administradorPapel.php");

class EncontroController extends Controller {

    private EncontroDAO $encontroDao;
    private EncontroService $encontroService;
    private TurmaDAO $turmaDao;

    public function __construct() {
        if(! $this->administradorLogado())
            exit;

        if(! $this->administradorPossuiPapel([administradorPapel::PROFESSOR])) {
            echo "Acesso negado";
            exit;
        }

        $this->encontroDao = new EncontroDAO();
        $this->encontroService = new EncontroService();
        $this->turmaDao = new TurmaDAO();

        $this->handleAction();
    }

    protected function list(string $msgErro = "", string $msgSucesso = "", int $idTurmaPar = 0) {
       
        $idTurma = 0;
        if($idTurmaPar)
            $idTurma = $idTurmaPar;
        else
            $idTurma = $this->getIdTurmaParam();

        $encontros = $this->encontroDao->list($idTurma);
        
        $dados["idTurma"] = $idTurma;
        $dados["lista"] = $encontros;
        $dados["turma"] = $this->turmaDao->findById($idTurma);


        $this->loadView("encontro/listEncontro.php", $dados,  $msgErro, $msgSucesso);
    }

    
    protected function create() {
         //verificar se id=0 e mudar o select
        $idTurma = $this->getIdTurmaParam();

        $dados["idTurma"] = $idTurma;
        $dados["id_encontro"] = 0;
        $dados["turma"] = $this->turmaDao->findById($idTurma);
        

        $this->loadView("encontro/formEncontro.php", $dados);
    }

    protected function edit() {
        $encontro = $this->findEncontroById();
        if($encontro) {
            $dados["id_encontro"] = $encontro->getIdEncontro();
            $dados['encontro'] = $encontro;
            $dados["idTurma"] = $encontro->getIdTurma();
            $dados["turma"] = $this->turmaDao->findById($encontro->getIdTurma());


            $this->loadView("encontro/formEncontro.php", $dados);
        } else
            $this->list("Encontro não encontrado.");
    }
    

    protected function save() {
        
        //Captura os dados do formulário
        $idEncontro = isset($_POST['id_encontro']) ? $_POST['id_encontro'] : 0;
        $nomeEncontro = isset($_POST['nomeEncontro']) ? trim($_POST['nomeEncontro']) : NULL;
        $diaEncontro = isset($_POST['diaEncontro']) ? trim($_POST['diaEncontro']) : NULL;
        $idTurma = isset($_POST['id_turma']) ? trim($_POST['id_turma']) : NULL;
 
        //Cria objeto Encontro
        $encontro = new Encontro();
        $encontro->setNomeEncontro($nomeEncontro);
        $encontro->setDiaEncontro($diaEncontro);
        $encontro->setIdTurma($idTurma);

        //Validar os dados
        $erros = $this->encontroService->validarDados($encontro);
        if(empty($erros)) {
            //Persiste o objeto
            try {
                
                if($idEncontro == 0)  //Inserindo
                    $this->encontroDao->insert($encontro);
                else { //Alterando
                    $encontro->setIdEncontro($idEncontro);
                    $this->encontroDao->update($encontro);
                }

                //TODO - Enviar mensagem de sucesso
                $msg = "Encontro salvo com sucesso.";
                $this->list("", $msg, $idTurma);
                exit;
            } catch (PDOException $e) {
                $erros = ["Erro ao salvar encontro na base de dados." . $e];                
            }
        }

        //Se há erros, volta para o formulário

        //Carregar os valores recebidos por POST de volta para o formulário
        $dados["encontro"] = $encontro;
        $dados["idTurma"] = $idTurma;
        $dados["id_encontro"] = $idEncontro;
        $dados["turma"] = $this->turmaDao->findById($idTurma);

        $msgsErro = implode("<br>", $erros);
        $this->loadView("encontro/formEncontro.php", $dados, $msgsErro);
    }

   
    protected function delete() {
        $encontro = $this->findEncontroById();
        if($encontro) {
            $this->encontroDao->deleteById($encontro->getIdEncontro());
            $this->list("", "Encontro excluído com sucesso!", $encontro->getIdTurma());
        } else
            header("location: " . BASEURL . "/controller/TurmaController.php?action=listProfessor");
    }
    
    private function findEncontroById() {
        $id = 0;
        if(isset($_GET['id']))
            $id = $_GET['id'];

        $encontro = $this->encontroDao->findEncontroById($id);
        return $encontro;

        //$this->loadView("encontro/formEncontro.php", $dados, $msgsErro);        
    }

    private function getIdTurmaParam() {
        $idTurma = 0;
        if(isset($_GET['id']))
            $idTurma = $_GET['id'];

        if(! $idTurma) {
            echo "Id da turma inválido!";
            exit;
        }

        return $idTurma;
    }
}

#Criar objeto da classe
$encCont = new EncontroController();

