<?php
//Redirecionar para a página inicial do sistema
//header("location: ./app/controller/HomeController.php?action=home");
require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../../util/config.php");
echo '<link rel="stylesheet" href="' . BASEURL . '/view/home/indexstyle.css">';
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
                            style="color: #ff7f32;font-style: normal; font-size: 18px; font-weight: regular;">Login</a>

                            <a class="nav-link" href="<?= BASEURL . '/controller/VitrineController.php?action=list' ?>"
                                style="color: #ff7f32;font-style: normal; font-size: 18px; font-weight: regular;"> Vitrine </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>


<div class="container">
    <div class="row">
        <div class="col-6"> 
            <img class="foto" style=" width: 500px; height: 500px; left: 736px; top: 108px;" 
            src="<?= BASEURL . "/view/img/corpointeiro.lindas.semfundo.png" ?>" />
        </div>
        <h3 class="col-6" style=" width: 536px; height: 230px; 
                  top: 100px; color: rgba(255, 127, 50, 1); font-style: normal;
                  font-size: 48px; font-weight: 700; line-height: 1.2;">
                  Connect Xpert: Organize e Acompanhe com Facilidade</h3>
        <div>
    </div>
</div>
<?php  
require_once(__DIR__ . "/../include/footer.php");
?>
