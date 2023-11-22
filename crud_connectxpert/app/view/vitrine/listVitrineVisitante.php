<?php
#Nome do arquivo: vitrine/list.php
#Objetivo: interface para listagem dos produtos para os visitantes do sistema

require_once(__DIR__ . "/../include/header.php");

echo '<link rel="stylesheet" href="' . BASEURL . '/view/produto/produtostyle.css">';
?>

<div class="col-xs-12" id="nav-container">
    <div id="itensmenu">
        <nav class="navbar navbar-expand-lg " id="menu">
            <button class="navbar-toggler" type="button" data-toggle="collapse" data-target="#navbarTogglerDemo03" aria-controls="navbarTogglerDemo03" aria-expanded="false" aria-label="Toggle navigation">
    <span class="navbar-toggler-icon"></span>
  </button>
  <div class="row justify-content-md-left">
                <a class="navbar-brand" href="<?= HOME_VISITANTE ?>"><img class="img-responsive" style="  width: 40px; height: 40px; " src="<?= BASEURL . "/view/img/logocx.png" ?>" /></a>
            </div>
            <div class="collapse navbar-collapse" id="navbarTogglerDemo02">
                <ul class="navbar-nav mr-auto mt-2 mt-lg-0">
                    <li class="nav-item active">
                        <div class="navbar-nav">
                            <a class="nav-item nav-link" href="<?= HOME_PAGE ?>" 
                            style="color: #ff7f32;font-style: normal; font-size: 18px; font-weight: regular;">Login</a>

                            <a class="nav-link" href="<?= BASEURL . '/controller/VitrineController.php?action=listV' ?>"
                                style="color: #ff7f32;font-style: normal; font-size: 18px; font-weight: regular;"> Vitrine </a>
                        </div>
                    </li>
                </ul>
            </div>
        </nav>
    </div>
</div>


<div class="container">
    <h3 class="col-4">Vitrine </h3> <br> 
    <div class="row" style="margin-top: 10px;">
                    <?php foreach($dados['lista'] as $prod): ?>
                        <div class="card my-2 mx-2 Card" style="width: 18rem;">
                        <div class="card-body">
                            <img src="<?= BASEURL_FOTOS . $prod->getFoto(); ?>" style="width: 100%; height: 120px;" />
                            <h5 class="vitrine" style="font-weight: bold; color:rgba(10, 174, 148, 1);"><?php echo $prod->getNome();?></h5>
                            <p class="card-text">
                            <?php echo $prod->getDescricao();?></p>   
                            <p class="card-text">
                            <?php echo $prod->getSituacao();?></p>          
                    </div> 
                </div>                           
            <?php endforeach; ?>                                       
        </div>
    </div>
</div>

<?php  
require_once(__DIR__ . "/../include/footer.php");
?>
