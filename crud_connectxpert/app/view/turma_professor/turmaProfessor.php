<?php
#Nome do arquivo: turma/formTurma.php
#Objetivo: interface para listagem das turmas do sistema

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
echo '<link rel="stylesheet" href="' . BASEURL . '/view/professor/profstyle.css">';
?>

<div class="container">

    <div class="row" style="margin-top: 10px;">
        <h3 class="col-4">Dados da Turma</h3>

    </div>
    
    <div class="row" style="margin-top: 10px;">
        <span style="font-weight: bold;">Nome: </span> <?= $dados["turma"]->getNomeTurma() ?>
    </div>
    
    <div class="row" style="margin-top: 10px;">
        <h3 class="col-4">Professores disponíveis</h3>
    </div>

    <div class="row" style="margin-top: 10px;">


        <div class="col-6">
            <form id="frmTurma" method="POST" 
                action="<?= BASEURL ?>/controller/TurmaProfessorController.php?action=add" >
 
                <div class="form-group">
                    <label for="somProfessor">Professores:</label>
                    <select class="form-control" id="somProfessor" name="idProfessor">
                        <option value="">----Selecione----</option>
                        <?php foreach($dados['listaProfessores'] as $prof): ?>
                            <option value="<?= $prof->getIdProfessor() ?>" ><?= $prof->getNomeProfessor() ?></option>
                        <?php endforeach; ?>
                    </select>
                   
                </div>

                <input type="hidden" name="idTurma" value="<?= $dados["turma"]->getIdTurma() ?>" />

                <button type="submit" class="btn btn-success">Adicionar</button>
            </form>            
        </div>

        <div class="col-6">
            <?php require_once(__DIR__ . "/../include/msg.php"); ?>
        </div>
    </div>


    <!-- Tabela com os professores já adicionados na turma -->
    <div class="row" style="margin-top: 10px;">
        <h3 class="col-4">Professores já adicionados na turma</h3>
    </div>

    <div class="row" style="margin-top: 30px;">
        <div class="col-12">
        <a class="btn btn-secondary" 
                href="<?= BASEURL ?>/controller/TurmaController.php?action=list">Voltar</a>
        </div>
    </div>
</div>

<?php  
require_once(__DIR__ . "/../include/footer.php");
?>