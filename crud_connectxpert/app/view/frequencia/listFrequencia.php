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
                        <th>Frequência</th>
                        <th></th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($dados['frequencia'] as $aluno): ?>

                        <tr class="listagem">
                        <td><img src="<?= BASEURL_FOTOS . $aluno->getAluno()->getFoto(); ?>" style="width: 100px; height: auto;" /></td>
                            <td><?= $aluno->getAluno()->getNomeAluno(); ?></td>
                            <td>Presente</td>
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
                                
                                <!-- <button type="button" class="btn btn-outline-success" 
                                    onclick="registrarPresenca(1)">Lançar presença</button> -->
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