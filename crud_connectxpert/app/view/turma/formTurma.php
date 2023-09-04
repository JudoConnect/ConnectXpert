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
    Turma
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