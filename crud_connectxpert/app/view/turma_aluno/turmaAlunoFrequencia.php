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
        <h3 class="col-12">Dados da Turma<a class="btn-inserir" 
        href="<?= BASEURL ?>/controller/TurmaController.php?action=listProfessor"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16"  style="color: rgba(255, 127, 50, 1);" >
  <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
</svg></a></h3>

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
                            <th>Encontros / Faltas</th>
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