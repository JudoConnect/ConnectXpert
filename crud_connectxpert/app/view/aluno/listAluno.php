<?php
#Nome do arquivo: aluno/list.php
#Objetivo: interface para listagem dos alunos do sistema

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
?>
 
<h3 class="text-center">Alunos</h3>

<div class="container">
    <div class="row">
        <div class="col-3">
            <a class="btn btn-success" 
                href="<?= BASEURL ?>/controller/AlunoController.php?action=create">
                Inserir</a>
        </div>

        <div class="col-9">
            <?php require_once(__DIR__ . "/../include/msg.php"); ?>
        </div>
    </div>
    <div class="row" style="margin-top: 10px;">
        <div class="col-12">
            <table id="tabAlunos" class='table table-striped table-bordered'>
                <thead>
                    <tr>
                        <th>Foto Aluno</th>
                        <th>Nome Aluno</th>
                        <th>Data de Nascimento</th>
                        <th>Cpf</th>
                        <th>Sexo </th>
                        <th>Email </th>
                        <th>Situação</th>
                        <th>Alterar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($dados['lista'] as $aln): ?>
                        <tr>
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
