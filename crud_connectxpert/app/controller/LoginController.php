<?php 
#Classe controller para a Logar do sistema
require_once(__DIR__ . "/Controller.php");
require_once(__DIR__ . "/../dao/UsuarioDAO.php");
require_once(__DIR__ . "/../dao/AlunoDAO.php");
require_once(__DIR__ . "/../dao/ProfessorDAO.php");
require_once(__DIR__ . "/../service/LoginService.php");
require_once(__DIR__ . "/../model/Usuario.php");
require_once(__DIR__ . "/../model/Aluno.php");
require_once(__DIR__ . "/../model/Professor.php");
require_once(__DIR__ . "/../model/enum/UsuarioPapel.php");

class LoginController extends Controller {

    private LoginService $loginService;
    private UsuarioDAO $usuarioDao;
    private AlunoDAO $alunoDao;
    private ProfessorDAO $professorDao;


    public function __construct() {
        $this->loginService = new LoginService();
        $this->usuarioDao = new UsuarioDAO();
        $this->alunoDao = new AlunoDAO();
        $this->professorDao = new ProfessorDAO();
        $this->handleAction();
    }

    protected function login() {
        $dados['papeis'] = UsuarioPapel::getAllAsArray();

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
            $usuario = null;
            $aluno = null;
            $professor = null;
            
            if($papel == UsuarioPapel::ADMINISTRADOR)
                $usuario = $this->usuarioDao->findByLoginSenha($login, $senha);
            else if($papel == UsuarioPapel::ALUNO)
                $aluno = $this->alunoDao->findByLoginSenha($login, $senha); 
            else if($papel == UsuarioPapel::PROFESSOR)
                $professor = $this->professorDao->findByLoginSenha($login, $senha);     
                          
            if($usuario || $aluno || $professor) {
                //Se encontrou o usuário, salva a sessão e redireciona para a HOME do sistema
                $this->salvarUsuarioSessao($usuario, $aluno, $professor);

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

        $dados['papeis'] = UsuarioPapel::getAllAsArray();
        $this->loadView("login/login.php", $dados, $msg);
    }

     /* Método para logar um usuário a partir dos dados informados no formulário */
    protected function logout() {
        $this->removerUsuarioSessao();

        $dados['papeis'] = UsuarioPapel::getAllAsArray();
        $this->loadView("login/login.php", $dados, "", "Usuário deslogado com suscesso!");
    }

    private function salvarUsuarioSessao(?Usuario $usuario, ?Aluno $aluno, ?Professor $professor) {
        //Habilitar o recurso de sessão no PHP nesta página
        session_start();

        //Setar usuário na sessão do PHP
        if($usuario) {
            $_SESSION[SESSAO_USUARIO_ID]   = $usuario->getId();
            $_SESSION[SESSAO_USUARIO_NOME] = $usuario->getNome();
            $_SESSION[SESSAO_USUARIO_PAPEL] = UsuarioPapel::ADMINISTRADOR;
        } elseif($aluno) {
            $_SESSION[SESSAO_USUARIO_ID]   = $aluno->getIdAluno();
            $_SESSION[SESSAO_USUARIO_NOME] = $aluno->getNomeAluno();
            $_SESSION[SESSAO_USUARIO_PAPEL] = UsuarioPapel::ALUNO;
        } elseif($professor) {
            $_SESSION[SESSAO_USUARIO_ID]   = $professor->getIdProfessor();
            $_SESSION[SESSAO_USUARIO_NOME] = $professor->getNomeProfessor();
            $_SESSION[SESSAO_USUARIO_PAPEL] = UsuarioPapel::PROFESSOR;
        }
    }

    private function removerUsuarioSessao() {
        //Habilitar o recurso de sessão no PHP nesta página
        session_start();

        //Destroi a sessão 
        session_destroy();
    }
}


#Criar objeto da classe
$loginCont = new LoginController();
