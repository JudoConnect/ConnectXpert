<?php
#Nome do arquivo: turma/formTurma.php
#Objetivo: interface para listagem das turmas do sistema

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
echo '<link rel="stylesheet" href="' . BASEURL . '/view/professor/profstyle.css">';
?>

  <div class="container">
    <div class="row">
<h3 class="col-4">
    <?php if($dados['id_turma'] == 0) echo "Inserir"; else echo "Alterar"; ?> 
    Turma <a class="btn-inserir" 
                href="<?= BASEURL ?>/controller/TurmaController.php?action=list"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16"  style="color: rgba(255, 127, 50, 1);" >
  <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
</svg></a>
</h3></div></div>

<div class="container">
    
    <div class="row" style="margin-top: 10px;">
        <div class="col-6">
            <form id="frmTurma" method="POST" 
                action="<?= BASEURL ?>/controller/TurmaController.php?action=save" >
                <div class="form-group">
                    <label for="txtNomeTurma">Nome da Turma:</label>
                    <input class="form-control" type="text" id="txtNomeTurma" name="nomeTurma" 
                        maxlength="70" placeholder="Informe o nome da turma"
                        value="<?php echo (isset($dados["turma"]) ? $dados["turma"]->getNomeTurma() : ''); ?>" />
                </div>

                <div class="form-group">
                    <label for="txtNumAlunos">Número de Alunos:</label>
                    <input class="form-control" type="text" id="txtNumAlunos" name="numAlunos" 
                        maxlength="3" placeholder="Informe número de alunos da turma"
                        value="<?php echo (isset($dados["turma"]) ? $dados["turma"]->getNumAlunos() : ''); ?>" />
                </div>

                <div class="form-group">
                    <label for="txtHorario">Horário:</label>
                    <input class="form-control" type="text" id="txtHorario" name="horario" 
                        maxlength="20" placeholder="Informe o horário"
                        value="<?php echo (isset($dados["turma"]) ? $dados["turma"]->getHorario() : ''); ?>"/>
                </div>

                <div class="form-group">
                    <label for="txtDiaSemana">Dia da Semana:</label>
                    <input class="form-control" type="text" id="txtDiaSemana" name="diaSemana" 
                        maxlength="60" placeholder="Informe o dia da semana"
                        value="<?php echo (isset($dados["turma"]) ? $dados["turma"]->getDiaSemana() : ''); ?>"/>
                        <fieldset>
                </div>

                <input type="hidden" id="hddId" name="id_turma" 
                    value="<?= $dados['id_turma']; ?>" /><br>

                <button type="submit" class="btn btn-success">Gravar</button>
                <button type="reset" class="btn btn-danger">Limpar</button>
            </form>            
        </div>

        <div class="col-6">
            <?php require_once(__DIR__ . "/../include/msg.php"); ?>
        </div>
    </div>
</div>

<?php  
require_once(__DIR__ . "/../include/footer.php");
?>