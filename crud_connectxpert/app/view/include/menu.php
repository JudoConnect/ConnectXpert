<?php
#Nome do arquivo: view/include/menu.php
#Objetivo: menu da aplicação para ser incluído em outras páginas

require_once(__DIR__ . "/../../controller/AcessoController.php");
require_once(__DIR__ . "/../../model/enum/administradorPapel.php");

$nome = "(Sessão expirada)";
if (isset($_SESSION[SESSAO_administrador_NOME]))
    $nome = $_SESSION[SESSAO_administrador_NOME];

//Variável para validar o acesso
$acessoCont = new AcessoController();
$isAdministrador = $acessoCont->administradorPossuiPapel([administradorPapel::ADMINISTRADOR]);
$isAluno = $acessoCont->administradorPossuiPapel([administradorPapel::ALUNO]);
$isProf = $acessoCont->administradorPossuiPapel([administradorPapel::PROFESSOR]);

?>

<div class="col-xs-12" id="nav-container">
    <div id="itensmenu">
        <nav class="navbar navbar-expand-lg " id="menu">
            <div class="row justify-content-md-left">
                <a class="navbar-brand" href="<?= HOME_PAGE ?>"><img class="img-responsive" style="  width: 40px; height: 40px; " src="<?= BASEURL . "/view/img/logocx.png" ?>" /></a>
            </div>

            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navSite">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-caret-down-square-fill" viewBox="0 0 16 16 " style="color: rgba(255, 127, 50, 1);">
                    <path d="M0 2a2 2 0 0 1 2-2h12a2 2 0 0 1 2 2v12a2 2 0 0 1-2 2H2a2 2 0 0 1-2-2V2zm4 4a.5.5 0 0 0-.374.832l4 4.5a.5.5 0 0 0 .748 0l4-4.5A.5.5 0 0 0 12 6H4z" />
                </svg>
            </button>

            <div class="collapse navbar-collapse" id="navSite">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <!--Se o tipo de usuario for administrador isso aparece-->
                    <?php if ($isAdministrador) : ?>
                        <a class="nav-link" href="<?= BASEURL . '/controller/ProdutoController.php?action=list' ?>" style="color: #ff7f32;font-style: normal; font-size: 18px; font-weight: regular;">Produto</a>

                        <a class="nav-link" href="<?= BASEURL . '/controller/ProfessorController.php?action=list' ?>" style="color: #ff7f32;font-style: normal; font-size: 18px; font-weight: regular;">Professor</a>

                        <a class="nav-link" href="<?= BASEURL . '/controller/AlunoController.php?action=list' ?>" style="color: #ff7f32;font-style: normal; font-size: 18px; font-weight: regular;">Aluno</a>

                        <a class="nav-link" href="<?= BASEURL . '/controller/TurmaController.php?action=list' ?>" style="color: #ff7f32;font-style: normal; font-size: 18px; font-weight: regular;">Turma</a>

                        <a class="nav-link" href="<?= BASEURL . '/controller/IeController.php?action=list' ?>" style="color: #ff7f32;font-style: normal; font-size: 18px; font-weight: regular;">Ie</a>

                        <a class="nav-link" href="<?= BASEURL . '/controller/VitrineController.php?action=list' ?>" style="color: #ff7f32;font-style: normal; font-size: 18px; font-weight: regular;"> Vitrine </a>
                    <?php endif; ?>

                    <?php if ($isProf) : ?>
                        <a class="nav-link" href="<?= BASEURL . '/controller/TurmaController.php?action=listProfessor' ?>" style="color: #ff7f32;font-style: normal; font-size: 18px; font-weight: regular;">Turma</a>

                        <a class="nav-link" href="<?= BASEURL . '/controller/VideoAulaController.php?action=list' ?>" style="color: #ff7f32;font-style: normal; font-size: 18px; font-weight: regular;"> Vídeo Aula</a>
                    <?php endif; ?>

                    <?php if ($isAluno) : ?>
                        <a class="nav-link" href="<?= BASEURL . '/controller/FrequenciaController.php?action=listFrequenciaAluno' ?>" style="color: #ff7f32;font-style: normal; font-size: 18px; font-weight: regular;"> Frequência </a>

                        <a class="nav-link" href="<?= BASEURL . '/controller/VitrineController.php?action=list' ?>" style="color: #ff7f32;font-style: normal; font-size: 18px; font-weight: regular;"> Vitrine </a>

                        <a class="nav-link" href="<?= BASEURL . '/controller/VideoAulaController.php?action=listAluno' ?>" style="color: #ff7f32;font-style: normal; font-size: 18px; font-weight: regular;"> Vídeo Aula </a>
                    <?php endif; ?>

                    <?php if ($isAluno || $isProf || $isAdministrador) : ?>
                        <a class="nav-link" href="<?= LOGOUT_PAGE ?>" style="color: #ff7f32;font-style: normal; font-size: 18px; font-weight: regular;">Sair</a>
                    <?php endif; ?>


                </ul>
            </div>
        </nav>
    </div>
</div>