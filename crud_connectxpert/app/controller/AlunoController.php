<?php
#Classe controller para Aluno
require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/AlunoDAO.php");
require_once(__DIR__ . "/../dao/IeDAO.php");
require_once(__DIR__ . "/../service/AlunoService.php");
require_once(__DIR__ . "/../model/Aluno.php");
require_once(__DIR__ . "/../model/enum/Sexo.php");
require_once(__DIR__ . "/../model/enum/UsuarioPapel.php");


class AlunoController extends Controller {

    private AlunoDAO $alunoDao;
    private IeDAO $iesDao;
    private AlunoService $alunoService;

    public function __construct() {
        if(! $this->usuarioLogado())
        exit;

        if(! $this->usuarioPossuiPapel([UsuarioPapel::ADMINISTRADOR])) {
            echo "Acesso negado";
            exit;
        }

        $this->alunoDao = new AlunoDAO();
        $this->iesDao = new IeDAO();
        $this->alunoService = new AlunoService();

        $this->handleAction();
    }

    protected function list(string $msgErro = "", string $msgSucesso = "") {
        $alunos = $this->alunoDao->list();
        //print_r($alunos);
        $dados["lista"] = $alunos;

        $this->loadView("aluno/listAluno.php", $dados,  $msgErro, $msgSucesso);
    }

    protected function create() {
        $dados["id_aluno"] = 0;
        $dados["sexo"] = Sexo::getAllAsArray();
        $dados['listaIes'] = $this->iesDao->list();

        $this->loadView("aluno/formAluno.php", $dados);
    }
    
    protected function edit() {
        $aluno = $this->findAlunoById();
        if($aluno) {
            $dados["id_aluno"] = $aluno->getIdAluno();
            $dados["sexo"] = Sexo::getAllAsArray();
            $dados['listaIes'] = $this->iesDao->list();
            
            $aluno->setSenhaAluno("");
            $dados["aluno"] = $aluno;
            //$dados["confSenhaAluno"] = $aluno->getSenhaAluno();

            $this->loadView("aluno/formAluno.php", $dados);
        } else
            $this->list("Aluno não encontrado.");
    }

    protected function save() {
        //Captura os dados do formulário
        $dados["id_aluno"] = isset($_POST['id_aluno']) ? $_POST['id_aluno'] : 0;
        $nome_aluno = isset($_POST['nomeAluno']) ? trim($_POST['nomeAluno']) : NULL;
        $nascimento_aluno = isset($_POST['nascimentoAluno']) ? trim($_POST['nascimentoAluno']) : NULL;
        $telefone = isset($_POST['telefoneAluno']) ? trim($_POST['telefoneAluno']) : NULL;
        $nome_responsavel = isset($_POST['nomeResponsavel']) ? trim($_POST['nomeResponsavel']) : NULL;
        $sexo_aluno = isset($_POST['sexo']) ? trim($_POST['sexo']) : NULL;
        $cpf_aluno = isset($_POST['cpfAluno']) ? trim($_POST['cpfAluno']) : NULL;
        $rg_aluno = isset($_POST['rgAluno']) ? trim($_POST['rgAluno']) : NULL;
        $email_aluno = isset($_POST['emailAluno']) ? trim($_POST['emailAluno']) : NULL;
        $login_aluno = isset($_POST['loginAluno']) ? trim($_POST['loginAluno']) : NULL;
        $senha_aluno = isset($_POST['senhaAluno']) ? trim($_POST['senhaAluno']) : NULL;
        $confSenhaAluno = isset($_POST['confSenhaAluno']) ? trim($_POST['confSenhaAluno']) : "";
        $historico = isset($_POST['historico']) ? trim($_POST['historico']) : "";
        $end_rua = isset($_POST['endRua']) ? trim($_POST['endRua']) : NULL;
        $end_bairro = isset($_POST['endBairro']) ? trim($_POST['endBairro']) : NULL;
        $end_cidade = isset($_POST['endCidade']) ? trim($_POST['endCidade']) : NULL;
        $end_estado = isset($_POST['endEstado']) ? trim($_POST['endEstado']) : NULL;
        $end_numero = isset($_POST['endNumero']) ? trim($_POST['endNumero']) : NULL;
        $end_complemento = isset($_POST['endComplemento']) ? trim($_POST['endComplemento']) : NULL;
        $idIe = isset($_POST['idIes']) ? trim($_POST['idIes']) : NULL;

        //Cria objeto Aluno
        $aluno = new Aluno();
        $aluno->setNomeAluno($nome_aluno);
        $aluno->setNascimentoAluno($nascimento_aluno);
        $aluno->setTelefone($telefone);
        $aluno->setNomeResponsavel($nome_responsavel);
        $aluno->setSexoAluno($sexo_aluno);
        $aluno->setCpfAluno($cpf_aluno);
        $aluno->setRgAluno($rg_aluno);
        $aluno->setEmailAluno($email_aluno);
        $aluno->setLoginAluno($login_aluno);
        $aluno->setSenhaAluno($senha_aluno);
        $aluno->setHistorico($historico);
        $aluno->setEndRua($end_rua);
        $aluno->setEndBairro($end_bairro);
        $aluno->setEndCidade($end_cidade);
        $aluno->setEndEstado($end_estado);
        $aluno->setEndNumero($end_numero);
        $aluno->setEndComplemento($end_complemento);
        $aluno->setIdIe($idIe);


        //Validar os dados
        $erros = $this->alunoService->validarDados($aluno, $confSenhaAluno);

        if(empty($erros)) {
            //Persiste o objeto
            try {
                
                if($dados["id_aluno"] == 0)  //Inserindo
                    $this->alunoDao->insert($aluno);
                else { //Alterando
                    $aluno->setIdAluno($dados["id_aluno"]);
                    $this->alunoDao->update($aluno);
                }

                //TODO - Enviar mensagem de sucesso
                $msg = "Aluno salvo com sucesso.";
                $this->list("", $msg);
                exit;
            } catch (PDOException $e) {
                $erros = ["Erro ao salvar o aluno na base de dados." . $e]; 

            }
        }

        //Se há erros, volta para o formulário
        
        //Carregar os valores recebidos por POST de volta para o formulário
        $dados["aluno"] = $aluno;
        $dados["confSenhaAluno"] = $confSenhaAluno;
        $dados["sexo"] = Sexo::getAllAsArray();
        $dados['listaIes'] = $this->iesDao->list();

        $msgsErro = implode("<br>", $erros);
        $this->loadView("aluno/formAluno.php", $dados, $msgsErro);
    }
    

    protected function delete() {
        $aluno = $this->findAlunoById();
        if($aluno) {
            $this->alunoDao->deleteById($aluno->getIdAluno());
            $this->list("", "Aluno excluído com sucesso!");
        } else
            $this->list("Aluno não econtrado!");
    }

    private function findAlunoById() {
        $id = 0;
        if(isset($_GET['id']))
            $id = $_GET['id'];

        $aluno = $this->alunoDao->findById($id);
        return $aluno;
    }
}


#Criar objeto da classe
$alnCont = new AlunoController();
