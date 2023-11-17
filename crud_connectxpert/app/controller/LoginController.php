<?php 
#Classe controller para o login do sistema
require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/administradorDAO.php");
require_once(__DIR__ . "/../dao/AlunoDAO.php");
require_once(__DIR__ . "/../dao/ProfessorDAO.php");
require_once(__DIR__ . "/../service/LoginService.php");
require_once(__DIR__ . "/../model/administrador.php");
require_once(__DIR__ . "/../model/Aluno.php");
require_once(__DIR__ . "/../model/Professor.php");
require_once(__DIR__ . "/../model/enum/administradorPapel.php");

class LoginController extends Controller {

    private LoginService $loginService;
    private administradorDAO $administradorDao;
    private AlunoDAO $alunoDao;
    private ProfessorDAO $professorDao;


    public function __construct() {
        $this->loginService = new LoginService();
        $this->administradorDao = new administradorDAO();
        $this->alunoDao = new AlunoDAO();
        $this->professorDao = new ProfessorDAO();
        $this->handleAction();
    }

    protected function login() {
        $dados['papeis'] = administradorPapel::getAllAsArray();

        $this->loadView("login/login.php", $dados);
    }

    /* Método para logar um usuário a partir dos dados informados no formulário */
    protected function logon() {
        $login = isset($_POST['login']) ? trim($_POST['login']) : null;
        $senha = isset($_POST['senha']) ? trim($_POST['senha']) : null;
        $papel = isset($_POST['papel']) ? trim($_POST['papel']) : null;
        
        //Validar os campos
        $erros = $this->loginService->validarCampos($login, $senha, $papel);
        if(empty($erros)) {
            //Valida o login a partir do banco de dados
            $administrador = null;
            $aluno = null;
            $professor = null;
            
            if($papel == administradorPapel::ADMINISTRADOR)
                $administrador = $this->administradorDao->findByLoginSenha($login, $senha);
            else if($papel == administradorPapel::ALUNO)
                $aluno = $this->alunoDao->findByLoginSenha($login, $senha); 
            else if($papel == administradorPapel::PROFESSOR)
                $professor = $this->professorDao->findByLoginSenha($login, $senha);     
                          
            if($administrador || $aluno || $professor) {
                //Se encontrou o usuário, salva a sessão e redireciona para a HOME do sistema
                $this->salvaradministradorSessao($administrador, $aluno, $professor);

                header("location: " . HOME_PAGE);
                exit;
            } else {
                $erros = ["Login ou senha informados são inválidos!"];
            }
        }

        //Se há erros, volta para o formulário            
        $msg = implode("<br>", $erros);
        $dados["login"] = $login;
        $dados["senha"] = $senha;
        $dados["papel"] = $papel;

        $dados['papeis'] = administradorPapel::getAllAsArray();
        $this->loadView("login/login.php", $dados, $msg);
    }

     /* Método para logar um usuário a partir dos dados informados no formulário */
    protected function logout() {
        $this->removeradministradorSessao();

        $dados['papeis'] = administradorPapel::getAllAsArray();
        $this->loadView("login/login.php", $dados, "", "Usuário deslogado com suscesso!");
    }

    private function salvaradministradorSessao(?administrador $administrador, ?Aluno $aluno, ?Professor $professor) {
        //Habilitar o recurso de sessão no PHP nesta página
        session_start();

        //Setar usuário na sessão do PHP
        if($administrador) {
            $_SESSION[SESSAO_administrador_ID]   = $administrador->getId();
            $_SESSION[SESSAO_administrador_NOME] = $administrador->getNome();
            $_SESSION[SESSAO_administrador_PAPEL] = administradorPapel::ADMINISTRADOR;
        } elseif($aluno) {
            $_SESSION[SESSAO_administrador_ID]   = $aluno->getIdAluno();
            $_SESSION[SESSAO_administrador_NOME] = $aluno->getNomeAluno();
            $_SESSION[SESSAO_administrador_PAPEL] = administradorPapel::ALUNO;
        } elseif($professor) {
            $_SESSION[SESSAO_administrador_ID]   = $professor->getIdProfessor();
            $_SESSION[SESSAO_administrador_NOME] = $professor->getNomeProfessor();
            $_SESSION[SESSAO_administrador_PAPEL] = administradorPapel::PROFESSOR;
        }
    }

    private function removeradministradorSessao() {
        //Habilitar o recurso de sessão no PHP nesta página
        session_start();

        //Destroi a sessão 
        session_destroy();
    }
}


#Criar objeto da classe
$loginCont = new LoginController();
