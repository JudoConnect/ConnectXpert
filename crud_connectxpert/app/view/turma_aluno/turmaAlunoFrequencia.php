<?php
#Nome do arquivo: turma/formTurma.php
#Objetivo: interface para listagem das turmas do sistema

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
echo '<link rel="stylesheet" href="' . BASEURL . '/view/professor/profstyle.css">';
echo '<link rel="stylesheet" href="' . BASEURL . '/view/utils/busca_select/buscaSelect.css">';
?>

<div class="container">

    <div class="row" style="margin-top: 10px;">
        <h3 class="col-4">Dados da Turma</h3>

    </div>
    
    <div class="row" style="margin-top: 10px;">
        <div class="col-12">
            <span style="font-weight: bold; color: rgba(255, 127, 50, 1);" > Nome: </span> <?= $dados["turma"]->getNomeTurma() ?>
        </div>
        <div class="col-12">
            <span style="font-weight: bold; color: rgba(255, 127, 50, 1);" > Horário: </span> <?= $dados["turma"]->getHorario() ?>
        </div>
    </div>

    <!-- Tabela com os alunos já adicionados na turma -->
    <div class="row" style="margin-top: 10px;">
        <h3 class="col-12">Alunos da turma:</h3>
    </div>

    <div class="row" style="margin-top: 10px;">
        <div class="col-12">
            <table id="tabAlunos" class='table table-striped'>
                    <thead>
                        <tr class="topicos">
                            <th>Foto</th>
                            <th>Nome</th>
                            <th>Aulas / Faltas</th>
                            <th>Frequência</th>
                        </tr>    
                    </thead> 
                    <?php foreach($dados['listaAlunosturma'] as $aln): ?>
                        <tr class="listagem">
                            <td><img src="<?= BASEURL_FOTOS . $aln->getFoto(); ?>" style="width: 100px; height: auto;" /></td>
                            <td><?= $aln->getNomeAluno(); ?></td>
                            <td><?= $aln->getFrequenciaAluno()->getTotalEncontros() . " / " . $aln->getFrequenciaAluno()->getTotalFaltas(); ?></td>
                            <td><?= $aln->getFrequenciaAluno()->getFrequencia() . "%"; ?></td>

                        </tr>
                    <?php endforeach; ?>       
            </table>
        </div>
    </div>

</div>


<?php  
require_once(__DIR__ . "/../include/footer.php");
?>