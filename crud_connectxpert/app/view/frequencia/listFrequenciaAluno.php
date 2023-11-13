<?php
#Nome do arquivo: frequencia/listFrequencia.php
#Objetivo: interface para listagem de frequencia do sistema
 
require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
echo '<link rel="stylesheet" href="' . BASEURL . '/view/turma/turmastyle.css">';

?>
    <div class="container">
    <div class="row" style="margin-top: 10px;">
        <h3 class="col-4">Dados do Aluno</h3>
        </div>
        <div class="row" style="margin-top: 10px;">
        <div class="col-12">
            <span style="font-weight: bold;">Nome: </span> <?= $dados["aluno"]->getNomeAluno(); ?>
        </div>
        <div class="col-12">
            <span style="font-weight: bold;">CPF: </span> <?= $dados["aluno"]->getCpfAluno(); ?>
        </div>  
    </div>

    <div class="row">
        <h3 class="col-4"> Frequências nas Turmas </h3>
    </div>
    <div class="row" style="margin-top: 10px;" >
        <div class="col-12">
            <table id="tabFrequencia" class='table table-striped'>
                <thead>
                    <tr class="topicos">
                        <th>Turma</th>
                        <th>Dia Semana</th>
                        <th>Horário</th>
                        <th>Aulas / Faltas</th>
                        <th>Frequência</th>
                    </tr>
                    </tbody>
                </thead>
                <tbody>
                    <?php foreach($dados["frequencias"] as $freq): ?>
                        <tr>
                            <td><?= $freq->getNomeTurma(); ?></td>
                            <td><?= $freq->getDiaSemana(); ?></td>
                            <td><?= $freq->getHorario(); ?></td>
                            <td><?= $freq->getTotalEncontros() . " / " . $freq->getTotalFaltas(); ?></td>
                            <td><?= $freq->getFrequencia() . "%"; ?></td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
<?php  
require_once(__DIR__ . "/../include/footer.php")
?>