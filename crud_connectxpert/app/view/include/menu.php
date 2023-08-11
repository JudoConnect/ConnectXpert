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
$isAluno = $acessoCont->usuarioPossuiPapel([UsuarioPapel::ALUNO]);

?>
<div class="col-xs-12" id="nav-container">
    <div id="itensmenu">
        <nav class="navbar navbar-expand-lg " id="menu">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="row justify-content-md-left">
  <a class="navbar-brand" href=""><img class="img-responsive" style="  width: 40px; height: 40px; " 
            src="<?= BASEURL . "/view/img/logocx.png" ?>" /></a>
            </div>





            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
            <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
      <li class="nav-item active">
                <div class="navbar-nav">
                <a class="nav-item nav-link" href="<?= HOME_PAGE ?>" 
                style="color: #ff7f32;font-style: normal; font-size: 18px; font-weight: regular;">Home</a>

<!--Se o tipo de usuario for administrador isso aparece-->
                <?php if($isAdministrador): ?>
                        <a class="nav-link" href="<?= BASEURL . '/controller/ProdutoController.php?action=list' ?>"
                        style="color: #ff7f32;font-style: normal; font-size: 18px; font-weight: regular;">Produto</a>

                        <a class="nav-link" href="<?= BASEURL . '/controller/ProfessorController.php?action=list' ?>"
                        style="color: #ff7f32;font-style: normal; font-size: 18px; font-weight: regular;">Professor</a>

                        <a class="nav-link" href="<?= BASEURL . '/controller/AlunoController.php?action=list' ?>"
                        style="color: #ff7f32;font-style: normal; font-size: 18px; font-weight: regular;">Aluno</a>

                        <a class="nav-link" href="<?= BASEURL . '/controller/TurmaController.php?action=list' ?>"
                        style="color: #ff7f32;font-style: normal; font-size: 18px; font-weight: regular;">Turma</a>

                        <a class="nav-link" href="<?= BASEURL . '/controller/IeController.php?action=list' ?>"
                         style="color: #ff7f32;font-style: normal; font-size: 18px; font-weight: regular;">Ie</a>
                <?php endif; ?>

                <a class="nav-link" href="<?= LOGOUT_PAGE ?>" 
                style="color: #ff7f32;font-style: normal; font-size: 18px; font-weight: regular;">Sair</a>

                </div>
            </div>
        </nav>
    </div>
</div>