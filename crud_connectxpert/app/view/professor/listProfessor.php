<?php
#Nome do arquivo: professor/list.php
#Objetivo: interface para listagem dos professores do sistema

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
echo '<link rel="stylesheet" href="' . BASEURL . '/view/professor/profstyle.css">';
?>




<div class="container">
    <div class="row">
    <h3 class="col-4">Professores <a class="btn-inserir" 
                href="<?= BASEURL ?>/controller/ProfessorController.php?action=create">
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
            <table id="tabProfessores" class='table table-striped'>
                <thead>
                    <tr class="topicos">
                        <th>Foto</th>
                        <th>Nome</th>
                        <th>Nascimento</th>
                        <th>Telefone</th>
                        <th>Email</th>
                        <th>Tipo</th>
                        <th>Alterar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($dados['lista'] as $prof): ?>
                        <tr class="listagem">
                            <td><img src="<?= BASEURL_FOTOS . $prof->getFotoProfessor(); ?>" style="width: 100px; height: auto;" /></td>
                            <td><?= $prof->getNomeProfessor(); ?></td>
                            <td><?= $prof->getNascimentoProfessorFormatada(); ?></td>
                            <td style="text-transform: none;"><?= $prof->getEmailProfessor(); ?></td>
                            <td style="text-transform: lowercase;"><?= $prof->getTipo(); ?></td>
                            
                           
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
