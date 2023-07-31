<?php
#Nome do arquivo: view/include/menu.php
#Objetivo: menu da aplicação para ser incluído em outras páginas

require_once(__DIR__ . "/../../controller/AcessoController.php");
require_once(__DIR__ . "/../../model/enum/UsuarioPapel.php");
echo '<link rel="stylesheet" href="' . BASEURL . '/view/include/menustyle.css">';

$nome = "(Sessão expirada)";
if(isset($_SESSION[SESSAO_USUARIO_NOME]))
    $nome = $_SESSION[SESSAO_USUARIO_NOME];

//Variável para validar o acesso
$acessoCont = new AcessoController();
$isAdministrador = $acessoCont->usuarioPossuiPapel([UsuarioPapel::ADMINISTRADOR]);

?>
<nav class="navbar navbar-expand-lg navbar-light"  style="background-color: #fffde7;">
    <div class="collapse navbar-collapse" id="conteudoNavbarSuportado">
        <ul class="navbar-nav mr-auto">
            <li class="nav-item active">
                <a class="nav-link" href="<?= HOME_PAGE ?>" 
                style="color: #ff7f32;font-style: normal; font-size: 18px; font-weight: regular;">Home</a>
            </li>

            <li class="nav-item dropdown show">
                <a class="nav-link dropdown-toggle" href="#" id="navbarDropdown"
                role="button" data-toggle="dropdown" aria-haspopup="true" 
                aria-expanded="false" style="color:#ff7f32; font-style: normal; font-size: 18px; font-weight: regular;"> Cadastros </a>
                <div class="dropdown-menu" aria-labelledby="navbarDropdown">
                    <?php if($isAdministrador): ?>
                    <a class="dropdown-item" href="<?= BASEURL . '/controller/UsuarioController.php?action=list' ?>" >Usuários</a>
                    <?php endif; ?>
                    <a class="dropdown-item" href="<?= BASEURL . '/controller/ProdutoController.php?action=list' ?>">Produto</a>
                    <a class="dropdown-item" href="<?= BASEURL . '/controller/ProfessorController.php?action=list' ?>">Professor</a>
                    <a class="dropdown-item" href="<?= BASEURL . '/controller/AlunoController.php?action=list' ?>">Aluno</a>
                    <a class="dropdown-item" href="#">Outro cadastro</a>
                </div>
            </li>

            <li class="nav-item active">
                <a class="nav-link" href="<?= LOGOUT_PAGE ?>" 
                style="color: #ff7f32;font-style: normal; font-size: 18px; font-weight: regular;">Sair</a>
            </li>
        </ul>

        <ul class="navbar-nav mr-left">
            <li class="nav-item active"><?= $nome?>
            <img class="foto" style="  width: 40px; height: 40px; " 
            src="<?= BASEURL . "/view/img/logocx.png" ?>" /></li>
        </div>
        </ul>
    </div>
</nav>
