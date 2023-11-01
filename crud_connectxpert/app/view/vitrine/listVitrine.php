<?php
#Nome do arquivo: produto/list.php
#Objetivo: interface para listagem dos produtos do sistema

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
echo '<link rel="stylesheet" href="' . BASEURL . '/view/produto/produtostyle.css">';
?>

<div class="container">
    <h3 class="col-4">Vitrine </h3> <br> 
    <div class="row" style="margin-top: 10px;">
                    <?php foreach($dados['lista'] as $prod): ?>
                        <div class="card my-2 mx-2 Card" style="width: 18rem;">
                        <div class="card-body">
                            <img src="<?= BASEURL_FOTOS . $prod->getFoto(); ?>" style="width: auto; height: 100px;" />
                            <h5 class="vitrine"><?php echo $prod->getNome();?></h5>
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
