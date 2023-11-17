<?php
#Nome do arquivo: home/index.php
#Objetivo: interface com a página inicial do sistema

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
echo '<link rel="stylesheet" href="' . BASEURL . '/view/home/indexstyle.css">';
?>

<div class="container">
    <div class="row">
        <div class="col-xs-12 col-md-6"> 
            <img class="foto" style=" width: 500px; height: 500px; left: 736px; top: 108px;" 
            src="<?= BASEURL . "/view/img/corpointeiro.lindas.semfundo.png" ?>" />
        </div>
        <h3 class="col-md-6" style=" width: 536px; height: 230px; 
                  top: 100px; color: rgba(255, 127, 50, 1); font-style: normal;
                  font-size: 48px; font-weight: 700; line-height: 1.2;">
                  Connect Xpert: Organize e Acompanhe com Facilidade</h3>
        <div>
    </div>
</div>
<?php  
require_once(__DIR__ . "/../include/footer.php");
?>
