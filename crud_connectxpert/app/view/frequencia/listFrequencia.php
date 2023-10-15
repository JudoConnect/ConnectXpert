<?php
#Nome do arquivo: frequencia/listFrequencia.php
#Objetivo: interface para listagem de frequencia do sistema

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
echo '<link rel="stylesheet" href="' . BASEURL . '/view/turma/turmastyle.css">';

?>
<div class="container">
    <div class="row" style="margin-top: 10px;">
        <h3 class="col-4">Dados da Turma</h3>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-12">
            <span style="font-weight: bold;">Nome: </span> <?= $dados["turma"]->getNomeTurma() ?>
        </div>
        <div class="col-12">
            <span style="font-weight: bold;">Horário: </span> <?= $dados["turma"]->getHorario() ?>
        </div>  
    </div>

    <div class="row" style="margin-top: 10px;">
        <h3 class="col-4">Dados do Encontro</h3>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-12">
            <span style="font-weight: bold;">Nome: </span> <?= $dados["encontro"]->getNomeEncontro() ?>
        </div>
        <div class="col-12">
            <span style="font-weight: bold;">Data: </span> <?= $dados["encontro"]->getDiaEncontroFormatada() ?>
        </div>
    </div>  
 

        <div class="row">
        <h3 class="col-4">
        Frequência
        <?php print_r($dados["lista"]);?> 
    
        </h3></div></div>    </div>


<?php  
require_once(__DIR__ . "/../include/footer.php");
?>