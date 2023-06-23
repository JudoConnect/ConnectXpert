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
                        <th>Nome Aluno</th>
                        <th>Data de Nascimento</th>
                        <th>Telefone</th>
                        <th>Sexo </th>
                        <th>Email </th>
                        <th>Histórico</th>
                        <th>Rua </th>
                        <th>Bairro </th>
                        <th>Alterar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($dados['lista'] as $aln): ?>
                        <tr>
                            <td><?= $aln->getNomeAluno(); ?></td>
                            <td><?= $aln->getNascimentoAlunoFormatada(); ?></td>
                            <td><?= $aln->getTelefone(); ?></td>
                            <td><?= $aln->getSexoAluno(); ?></td>
                            <td><?= $aln->getEmailAluno(); ?></td>
                            <td><?= $aln->getHistorico(); ?></td>
                            <td><?= $aln->getEndRua(); ?></td>
                            <td><?= $aln->getEndBairro(); ?></td>
                        
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
