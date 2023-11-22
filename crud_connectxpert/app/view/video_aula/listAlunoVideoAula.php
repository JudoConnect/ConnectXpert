<?php
#Nome do arquivo: video_aula/listAlunoVideoAula.php
#Objetivo: interface para listagem das videos aulas para os alunos do sistema

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
echo '<link rel="stylesheet" href="' . BASEURL . '/view/produto/produtostyle.css">';
?>

<div class="container">
    <h3 class="col-4">Vídeo Aula </h3> <br> 
    <div class="row" style="margin-top: 10px;">
                    <?php foreach($dados['lista'] as $vd): ?>
                        <div class="card my-2 mx-2 Card" style="width: 20rem;">
                        <div class="card-body">
                            <h5 class="videoAula"><?php echo $vd->getNomeVideoAula();?></h5>
                            <p class="card-text">
                            <iframe width="100%" height="auto" src="<?php echo $vd->getLinkVideoAula();?>"
                             title="YouTube video player" frameborder="0" allow="accelerometer; autoplay; clipboard-write; encrypted-media; 
                             gyroscope; picture-in-picture; web-share" allowfullscreen></iframe>   
                    </div> 
                </div>                           
            <?php endforeach; ?>                                       
        </div>
    </div>
</div>

<?php  
require_once(__DIR__ . "/../include/footer.php");
?>
