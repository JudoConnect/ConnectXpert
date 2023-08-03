<?php
#Nome do arquivo: ie/list.php
#Objetivo: interface para listagem das ies do sistema

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
?>

<h3 class="text-center">Instituição de Ensino</h3>

<div class="container">
    <div class="row">
        <div class="col-3">
            <a class="btn btn-success" 
                href="<?= BASEURL ?>/controller/IeController.php?action=create">
                Inserir</a>
        </div>

        <div class="col-9">
            <?php require_once(__DIR__ . "/../include/msg.php"); ?>
        </div>
    </div>

    <div class="row" style="margin-top: 10px;">
        <div class="col-12">
            <table id="tabIe" class='table table-striped table-bordered'>
                <thead>
                    <tr>
                        <th>Id</th>
                        <th>Nome</th>
                        <th>Serie</th>
                        <th>Alterar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($dados['lista'] as $ie): ?>
                        <tr>
                            <td><?php echo $ie->getIdIe(); ?></td>
                            <td><?= $ie->getNomeIe(); ?></td>
                            <td><?= $ie->getSerieIe(); ?></td>

                            <td><a class="btn btn-primary" 
                                href="<?= BASEURL ?>/controller/IeController.php?action=edit&id=<?= $ie->getIdIe() ?>">
                                Alterar</a> 
                            </td>

                            <td><a class="btn btn-danger" 
                                onclick="return confirm('onfirma a exclusão da ie?');"
                                href="<?= BASEURL ?>/controller/IeController.php?action=delete&id=<?= $ie->getIdIe() ?>">
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
                           
