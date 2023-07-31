<?php
#Nome do arquivo: turma/listTurma.php
#Objetivo: interface para listagem das turmas do sistema

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
?>

<h3 class="text-center">Turmas</h3>

<div class="container">
    <div class="row">
        <div class="col-3">
            <a class="btn btn-success" 
                href="<?= BASEURL ?>/controller/TurmaController.php?action=create">
                Inserir</a>
        </div>

        <div class="col-9">
            <?php require_once(__DIR__ . "/../include/msg.php"); ?>
        </div>
    </div>
    <div class="row" style="margin-top: 10px;">
        <div class="col-12">
            <table id="tabTurmas" class='table table-striped table-bordered'>
                <thead>
                    <tr>
                        <th>Nome Turma</th>
                        <th>Número de Alunos</th>
                        <th>Horário</th>
                        <th>Dia da Semana</th>
                        <th>Alterar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($dados['lista'] as $tur): ?>
                        <tr>
                            <td><?= $tur->getNomeTurma(); ?></td>
                            <td><?= $tur->getNumAlunos(); ?></td>
                            <td><?= $tur->getHorario(); ?></td>
                            <td><?= $tur->getDiaSemana(); ?></td>
                            <td><a class="btn btn-primary" 
                                href="<?= BASEURL ?>/controller/TurmaController.php?action=edit&id=<?= $tur->getIdTurma() ?>">
                                Alterar</a> 
                            </td>
                            <td><a class="btn btn-danger" 
                                onclick="return confirm('Confirma a exclusão da turma?');"
                                href="<?= BASEURL ?>/controller/TurmaController.php?action=delete&id=<?= $tur->getIdTurma() ?>">
                                Excluir</a> 
                            </td>
                        </tr>
                    <?php endforeach; ?>
                </tbody>
            </table>
        </div>
    </div>
</div>

<?php  
require_once(__DIR__ . "/../include/footer.php");
?>
