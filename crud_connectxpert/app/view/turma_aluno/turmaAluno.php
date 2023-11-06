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
        <h3 class="col-4">Dados da Turma <a class="btn btn-inserir" 
                href="<?= BASEURL ?>/controller/TurmaController.php?action=list"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16" style="color: rgba(255, 127, 50, 1);">
                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
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
    
    <div class="row" style="margin-top: 10px;">
        <h3 class="col-4">Alunos disponíveis:</h3>
    </div>

    <div class="row" style="margin-top: 10px;">


        <div class="col-12">
            <form id="frmTurma" method="POST" 
                action="<?= BASEURL ?>/controller/TurmaAlunoController.php?action=add" >
 
                <div class="form-group">
                    <select class="form-control" id="somAluno" name="idAluno">
                        <option value="">Selecione</option>
                        <?php foreach($dados['listaAlunos'] as $aln): ?>
                            <option value="<?= $aln->getIdAluno() ?>" ><?= $aln->getNomeAluno() ?></option>
                        <?php endforeach; ?>
                    </select>
                   
                </div>

                <input type="hidden" name="idTurma" value="<?= $dados["turma"]->getIdTurma() ?>" />

                <button type="submit" class="btn" style="background-color: #ff7f32; border-radius: 16px;"><a style="color:#fdfbeb;">Adicionar</button>
            </form>            
        </div>

        <div class="col-6">
            <?php require_once(__DIR__ . "/../include/msg.php"); ?>
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
                            <th> </th>
                        </tr>    
                    </thead> 
                    <?php foreach($dados['listaAlunosturma'] as $aln): ?>
                        <tr class="listagem">
                            <td><img src="<?= BASEURL_FOTOS . $aln->getFoto(); ?>" style="width: 100px; height: auto;" /></td>
                            <td><?= $aln->getNomeAluno(); ?></td>
                            
                            <td><a class="btn-excluir" 
                                onclick="return confirm('Confirma a exclusão do aluno?');"
                                href="<?= BASEURL ?>/controller/TurmaAlunoController.php?action=delete&idTurmaAluno=<?= $aln->getIdTurmaAluno() ?>&idTurma=<?= $dados["turma"]->getIdTurma() ?>">
                                <svg xmlns="http://www.w3.org/2000/svg" width="20" height="20" fill="currentColor" class="bi bi-trash" viewBox="0 0 16 16">
  <path d="M5.5 5.5A.5.5 0 0 1 6 6v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm2.5 0a.5.5 0 0 1 .5.5v6a.5.5 0 0 1-1 0V6a.5.5 0 0 1 .5-.5Zm3 .5a.5.5 0 0 0-1 0v6a.5.5 0 0 0 1 0V6Z"/>
  <path d="M14.5 3a1 1 0 0 1-1 1H13v9a2 2 0 0 1-2 2H5a2 2 0 0 1-2-2V4h-.5a1 1 0 0 1-1-1V2a1 1 0 0 1 1-1H6a1 1 0 0 1 1-1h2a1 1 0 0 1 1 1h3.5a1 1 0 0 1 1 1v1ZM4.118 4 4 4.059V13a1 1 0 0 0 1 1h6a1 1 0 0 0 1-1V4.059L11.882 4H4.118ZM2.5 3h11V2h-11v1Z"/>
</svg> Excluir</a> 
                            </td>
                        </tr>
                    <?php endforeach; ?>       
            </table>
        </div>
    </div>

</div>


<?php  
require_once(__DIR__ . "/../include/footer.php");
?>