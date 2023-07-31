<?php
#Nome do arquivo: professor/list.php
#Objetivo: interface para listagem dos professores do sistema

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
echo '<link rel="stylesheet" href="' . BASEURL . '/view/professor/profstyle.css">';
?>
?>

<h3 class="text-center">Professores</h3>

<div class="container">
    <div class="row">
        <div class="col-3">
            <a class="btn btn-success" 
                href="<?= BASEURL ?>/controller/ProfessorController.php?action=create">
                Inserir</a>
        </div>

        <div class="col-9">
            <?php require_once(__DIR__ . "/../include/msg.php"); ?>
        </div>
    </div>
    <div class="row" style="margin-top: 10px;">
        <div class="col-12">
            <table id="tabProfessores" class='table table-striped table-bordered'>
                <thead>
                    <tr>
                        <th>Nome Professor</th>
                        <th>Data de Nascimento</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Tipo</th>
                        <th>Alterar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($dados['lista'] as $prof): ?>
                        <tr>
                            <td><?= $prof->getNomeProfessor(); ?></td>
                            <td><?= $prof->getNascimentoProfessor(); ?></td>
                            <td><?= $prof->getTelefoneProfessor(); ?></td>
                            <td><?= $prof->getEmailProfessor(); ?></td>
                            <td><?= $prof->getTipo(); ?></td>
                            <td><a class="btn btn-primary" 
                                href="<?= BASEURL ?>/controller/ProfessorController.php?action=edit&id=<?= $prof->getIdProfessor() ?>">
                                Alterar</a> 
                            </td>
                            <td><a class="btn btn-danger" 
                                onclick="return confirm('Confirma a exclusão do professor?');"
                                href="<?= BASEURL ?>/controller/ProfessorController.php?action=delete&id=<?= $prof->getIdProfessor() ?>">
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
