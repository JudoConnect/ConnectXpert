<?php
#Nome do arquivo: aluno/list.php
#Objetivo: interface para listagem dos alunos do sistema

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
echo '<link rel="stylesheet" href="' . BASEURL . '/view/professor/profstyle.css">';
?>

<div class="container">
    <div class="row">
    <h3 class="col-4">Alunos <a class="btn-inserir" 
                href="<?= BASEURL ?>/controller/AlunoController.php?action=create">
                <svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-plus-circle" viewBox="0 0 16 16" style="color: rgba(255, 127, 50, 1);">
  <path d="M8 15A7 7 0 1 1 8 1a7 7 0 0 1 0 14zm0 1A8 8 0 1 0 8 0a8 8 0 0 0 0 16z"/>
  <path d="M8 4a.5.5 0 0 1 .5.5v3h3a.5.5 0 0 1 0 1h-3v3a.5.5 0 0 1-1 0v-3h-3a.5.5 0 0 1 0-1h3v-3A.5.5 0 0 1 8 4z"/>
</svg></a></h3>
    
        <div class="col-9">
            <?php require_once(__DIR__ . "/../include/msg.php"); ?>
        </div>
    </div>
    <div class="row" style="margin-top: 10px;">
        <div class="col-12">
            <table id="tabAlunos" class='table table-striped'>
                <thead>
                    <tr class="topicos">
                        <th>Foto</th>
                        <th>Nome</th>
                        <th>Nascimento</th>
                        <th>Sexo </th>
                        <th>Email </th>
                        <th>Situação</th>
                        <th>Alterar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($dados['lista'] as $aln): ?>

                        <tr class="listagem">
                        <td><img src="<?= BASEURL_FOTOS . $aln->getFoto(); ?>" style="width: 100px; height: auto;" /></td>
                            <td><?= $aln->getNomeAluno(); ?></td>
                            <td><?= $aln->getNascimentoAlunoFormatada(); ?></td>
                            <td><?= $aln->getSexoAluno(); ?></td>
                            <td><?= $aln->getEmailAluno(); ?></td>
                            <td><?= $aln->getSituacao(); ?></td>

                        
                            <td><a class="btn btn-primary" 
                                href="<?= BASEURL ?>/controller/AlunoController.php?action=edit&id=<?= $aln->getIdAluno() ?>">
                                Alterar</a> 
                            </td>
                            <td><a class="btn btn-danger" 
                                onclick="return confirm('Confirma a exclusão do aluno?');"
                                href="<?= BASEURL ?>/controller/AlunoController.php?action=delete&id=<?= $aln->getIdAluno() ?>">
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
