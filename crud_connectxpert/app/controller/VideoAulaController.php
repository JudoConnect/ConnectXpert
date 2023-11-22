<?php
#Classe de controller para Instituição de Ensino

require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/VideoAulaDAO.php");
require_once(__DIR__ . "/../service/VideoAulaService.php");
require_once(__DIR__ . "/../model/VideoAula.php");
require_once(__DIR__ . "/../model/enum/administradorPapel.php");

class VideoAulaController extends Controller {
 
    private VideoAulaDAO $videoAulaDao;
    private VideoAulaService $videoAulaService;

    public function __construct() {
        if(! $this->administradorLogado())
            exit;

    if(! $this->administradorPossuiPapel([administradorPapel::PROFESSOR, administradorPapel::ALUNO])) {
        echo "Acesso negado";
        exit;
    }

        $this->videoAulaDao = new VideoAulaDAO();
        $this->videoAulaService = new VideoAulaService();

        $this->handleAction();
    }

    protected function list(string $msgErro = "", string $msgSucesso = "") {
        $video_aulas = $this->videoAulaDao->list();
        $dados["lista"] = $video_aulas;
 
        $this->loadView("video_aula/listVideoAula.php", $dados,  $msgErro, $msgSucesso);
    }

    protected function listAluno(string $msgErro = "", string $msgSucesso = "") {
        $video_aulas = $this->videoAulaDao->listAluno();
        $dados["lista"] = $video_aulas;
 
        $this->loadView("video_aula/listAlunoVideoAula.php", $dados,  $msgErro, $msgSucesso);
    }

    protected function create() {
        $dados["id_video_aula"] = 0;

        $this->loadView("video_aula/formVideoAula.php", $dados);
    }

    protected function edit() {
        $video_aula = $this->findById();
        if($video_aula) {
            $dados["id_video_aula"] = $video_aula->getIdVideoAula();
            $dados["video_aula"] = $video_aula;

            $this->loadView("video_aula/formVideoAula.php", $dados);
        } else
            $this->list("Vídeo Aula não encontrada.");
    }

    protected function save() {
        // Exibir os dados recebidos do formulário para fins de depuração
        // Restante do código para processar o salvamento
        
        
        //Captura os dados do formulário
        $dados["id_video_aula"] = isset($_POST['id_video_aula']) ? $_POST['id_video_aula'] : 0;
        $nomeVideoAula = isset($_POST['nome_video_aula']) ? trim($_POST['nome_video_aula']) : NULL;
        $linkVideoAula = isset($_POST['link_video_aula']) ? trim($_POST['link_video_aula']) : NULL;

        //Cria objeto administrador
        $video_aula = new VideoAula();
        $video_aula->setNomeVideoAula($nomeVideoAula);
        $video_aula->setLinkVideoAula($linkVideoAula);

        //Validar os dados
        $erros = $this->videoAulaService->validarDados($video_aula);

        if(empty($erros)) {
            //Persiste o objeto
            try {
                
                if($dados["id_video_aula"] == 0)  //Inserindo
                    $this->videoAulaDao->insert($video_aula);
                else { //Alterando
                    $video_aula->setIdVideoAula($dados["id_video_aula"]);
                    $this->videoAulaDao->update($video_aula);
                }

                //TODO - Enviar mensagem de sucesso
                $msg = "Vídeo Aula salvo com sucesso.";
                $this->list("", $msg);
                exit;
            } catch (PDOException $e) {
                $erros = ["Erro ao salvar Vídeo Aula na base de dados." . $e];                
            }
        }

        //Se há erros, volta para o formulário

        //Carregar os valores recebidos por POST de volta para o formulário
        $dados["video_aula"] = $video_aula;

        $msgsErro = implode("<br>", $erros);
        $this->loadView("video_aula/formVideoAula.php", $dados, $msgsErro);
    }
    
    
    protected function delete() {
        $video_aula = $this->findById();
        if($video_aula) {
            $this->videoAulaDao->deleteById($video_aula->getIdVideoAula());
            $this->list("", "Vídeo Aula excluída com sucesso!");
        } else
            $this->list("Vídeo Aula não econtrado!");
    }

    private function findById() {
        $id = 0;
        if(isset($_GET['id']))
            $id = $_GET['id'];

        $video_aula = $this->videoAulaDao->findById($id);
        return $video_aula;
    }

}

#Criar objeto da classe
$video_aulaCont = new VideoAulaController();
