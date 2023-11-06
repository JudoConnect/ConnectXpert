<?php
#Nome do arquivo: frequencia/listFrequencia.php
#Objetivo: interface para listagem de frequencia do sistema
 
require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
echo '<link rel="stylesheet" href="' . BASEURL . '/view/turma/turmastyle.css">';

?>
<div class="container">
    <div class="row" style="margin-top: 10px;">
        <h3 class="col-4">Dados da Turma<a class="btn-inserir" 
        href="<?= BASEURL ?>/controller/EncontroController.php?action=list"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16"  style="color: rgba(255, 127, 50, 1);" >
  <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
</svg></a></h3>
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
        
    <!--div class="container"-->

    <div class="row">
        <h3 class="col-4"> Frequência  </h3>
    </div>
    <div class="row" style="margin-top: 10px;" >
        <div class="col-12">
            <table id="tabFrequencia" class='table table-striped'>
                <thead>
                    <tr class="topicos">
                        <th>Foto</th>
                        <th>Nome</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($dados['frequencia'] as $aluno): ?>

                        <tr class="listagem">
                        <td><img src="<?= BASEURL_FOTOS . $aluno->getAluno()->getFoto(); ?>" style="width: 100px; height: auto;" /></td>
                            <td><?= $aluno->getAluno()->getNomeAluno(); ?></td>
                            <td>
                                <?php 
                                if($aluno->getCondicao() == "presente") {
                                    echo '
                                    <button type="button" id="frequencia'.$aluno->getIdFrequencia().'" class="btn btn-outline-success" 
                                    onclick="registrarFalta('. $aluno->getIdFrequencia() .') "> presente </button>
                                    ';
                                }
                                else {
                                    echo '
                                    <button type="button" id="frequencia'.$aluno->getIdFrequencia().'" class="btn btn-outline-danger" 
                                    onclick="registrarFalta('. $aluno->getIdFrequencia() .') "> ausente </button>
                                    ';
                                }
                            ?>
                            </td>
                        </tr>
                    <?php endforeach ?>
                </tbody>
            </table>
        </div>
    </div>

    <script src="<?= BASEURL  ?>/view/frequencia/utils/resgistrarFreq.js"></script>
<?php  
require_once(__DIR__ . "/../include/footer.php")
?>