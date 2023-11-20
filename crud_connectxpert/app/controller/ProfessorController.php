<?php
#Classe controller para Professor
require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/ProfessorDAO.php");
require_once(__DIR__ . "/../service/ProfessorService.php");
require_once(__DIR__ . "/../model/Professor.php");
require_once(__DIR__ . "/../model/enum/Tipo.php");
require_once(__DIR__ . "/../model/enum/Sexo.php");
require_once(__DIR__ . "/../model/enum/administradorPapel.php");
require_once(__DIR__ . "/../service/ImagemService.php");

class ProfessorController extends Controller {

    private ProfessorDAO $professorDao;
    private ProfessorService $professorService;
    private ImagemService $imagemService;

    public function __construct() {
        if(! $this->administradorLogado())
            exit;

    if(! $this->administradorPossuiPapel([administradorPapel::ADMINISTRADOR])) {
        echo "Acesso negado";
        exit;
    }

        $this->professorDao = new ProfessorDAO();
        $this->professorService = new ProfessorService();
        $this->imagemService = new ImagemService();

        $this->handleAction();
    }

    protected function list(string $msgErro = "", string $msgSucesso = "") {
        $professores = $this->professorDao->list();
        //print_r($professores);
        $dados["lista"] = $professores;

        $this->loadView("professor/listProfessor.php", $dados,  $msgErro, $msgSucesso);
    }

    protected function create() {
        $dados["id_professor"] = 0;
        $dados["sexo"] = Sexo::getAllAsArray();
        $dados["tipo"] = Tipo::getAllAsArray();

        $this->loadView("professor/formProfessor.php", $dados);
    }

    protected function edit() {
        $professor = $this->findProfessorById();
        if($professor) {
            $dados["id_professor"] = $professor->getIdProfessor();
            //$professor->setSenhaProfessor("");
            $dados["professor"] = $professor;
            $dados["confSenhaProfessor"] = $professor->getSenhaProfessor();
            $dados["sexo"] = Sexo::getAllAsArray();
            $dados["tipo"] = Tipo::getAllAsArray();
    

            $this->loadView("professor/formProfessor.php", $dados);
        } else
            $this->list("Professor não encontrado.");
    }

    protected function save() {
        //Captura os dados do formulário
        $dados["id_professor"] = isset($_POST['id_professor']) ? $_POST['id_professor'] : 0;
        $nome_professor = isset($_POST['nomeProfessor']) ? trim($_POST['nomeProfessor']) : NULL;
        $nascimento_professor = isset($_POST['nascimentoProfessor']) ? trim($_POST['nascimentoProfessor']) : NULL;
        $telefone_professor = isset($_POST['telefoneProfessor']) ? trim($_POST['telefoneProfessor']) : NULL;
        $sexo_professor = isset($_POST['sexo']) ? trim($_POST['sexo']) : NULL;
        $cpf_professor = isset($_POST['cpfProfessor']) ? trim($_POST['cpfProfessor']) : NULL;
        $rg_professor = isset($_POST['rgProfessor']) ? trim($_POST['rgProfessor']) : NULL;
        $email_professor = isset($_POST['emailProfessor']) ? trim($_POST['emailProfessor']) : NULL;
        $login_professor = isset($_POST['loginProfessor']) ? trim($_POST['loginProfessor']) : NULL;
        $senha_professor = isset($_POST['senhaProfessor']) ? trim($_POST['senhaProfessor']) : NULL;
        $confSenhaProfessor = isset($_POST['confSenhaProfessor']) ? trim($_POST['confSenhaProfessor']) : "";
        $tipo = isset($_POST['tipo']) ? trim($_POST['tipo']) : NULL;
        $arqFotoAntiga = isset($_POST['arquivoFoto']) ? trim($_POST['arquivoFoto']) : NULL;
        $foto = $_FILES["foto"];

        //Cria objeto administrador
        $professor = new Professor();
        $professor->setNomeProfessor($nome_professor);
        $professor->setNascimentoProfessor($nascimento_professor);
        $professor->setTelefoneProfessor($telefone_professor);
        $professor->setSexoProfessor($sexo_professor);
        $professor->setCpfProfessor($cpf_professor);
        $professor->setRgProfessor($rg_professor);
        $professor->setEmailProfessor($email_professor);
        $professor->setLoginProfessor($login_professor);
        $professor->setSenhaProfessor($senha_professor);
        $professor->setTipo($tipo);
        $professor->setFotoProfessor($arqFotoAntiga);

        //Validar os dados
        $erros = $this->professorService->validarDados($professor, $confSenhaProfessor, $foto);
        
        if(empty($erros)) {
            $nomeArquivoFoto = "verdadeiro";
            if($foto['size'] > 0)
                $nomeArquivoFoto = $this->imagemService->upload($foto); //Salvar o arquivo da foto
                
            if($nomeArquivoFoto) {

                if($nomeArquivoFoto != "verdadeiro")
                    $professor->setFotoProfessor($nomeArquivoFoto);

            //Persiste o objeto
            try {
                //echo $nomeArquivoFoto;
                //print_r($professor);
               // print_r($foto);
               //                                                    exit;
                
                if($dados["id_professor"] == 0)  //Inserindo
                    $this->professorDao->insert($professor);

                else { //Alterando
                    $professor->setIdProfessor($dados["id_professor"]);
                    $this->professorDao->update($professor);
                }

                //TODO - Enviar mensagem de sucesso
                $msg = "Professor salvo com sucesso.";
                $this->list("", $msg);
                exit;
            } catch (PDOException $e) {
                $erros = ["Erro ao salvar o professor na base de dados." . $e];                
            }

        } else
                //Caso não consega salvar, exibe o erro
                $erros = ["Erro ao salvar o aquivo da foto."];     
    }

        //Se há erros, volta para o formulário

        //Carregar os valores recebidos por POST de volta para o formulário
        $dados["professor"] = $professor;
        $dados["confSenhaProfessor"] = $confSenhaProfessor;
        $dados["tipo"] = Tipo::getAllAsArray();
        $dados["sexo"] = Sexo::getAllAsArray();
        $_FILES["foto"] = $foto;

        $msgsErro = implode("<br>", $erros);
        $this->loadView("professor/formProfessor.php", $dados, $msgsErro);
    }
     
    
    protected function delete() {
        $professor = $this->findProfessorById();
        if($professor) {
            try{
            $this->professorDao->deleteById($professor->getIdProfessor());
            $this->list("", "Professor excluído com sucesso!");
            } catch(PDOException $e) {
                $this->list("Erro ao excluir o professor!"); 
            }
        } else
            $this->list("Professor não econtrado!");
    }

    private function findProfessorById() {
        $id = 0;
        if(isset($_GET['id']))
            $id = $_GET['id'];

        $professor = $this->professorDao->findById($id);
        return $professor;
    }

}

#Criar objeto da classe
$profCont = new ProfessorController();
