<?php
#Nome do arquivo: produto/list.php
#Objetivo: interface para listagem dos produtos do sistema

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
?>

<h3 class="text-center">Produtos</h3>

<div class="container">
    <div class="row">
        <div class="col-3">
            <a class="btn btn-success" 
                href="<?= BASEURL ?>/controller/ProdutoController.php?action=create">
                Inserir</a>
        </div>

        <div class="col-9">
            <?php require_once(__DIR__ . "/../include/msg.php"); ?>
        </div>
    </div>

    <div class="row" style="margin-top: 10px;">
        <div class="col-12">
            <table id="tabProdutos" class='table table-striped table-bordered'>
                <thead>
                    <tr>
                        <th>ID</th>
                        <th>Nome</th>
                        <th>Descrição</th>
                        <th>Foto</th>
                        <th>Situação</th>
                        <th>Alterar</th>
                        <th>Excluir</th>
                    </tr>
                </thead>
                <tbody>
                    <?php foreach($dados['lista'] as $prod): ?>
                        <tr>
                            <td><?php echo $prod->getIdProduto(); ?></td>
                            <td><?= $prod->getNome(); ?></td>
                            <td><?= $prod->getDescricao(); ?></td>
                            <td><img src="<?= $prod->getFoto(); ?>" a class="btn btn-warning"></a></td>
                            <td><?= $prod->getSituacao(); ?></td>

                            <td><a class="btn btn-primary" 
                                href="<?= BASEURL ?>/controller/ProdutoController.php?action=edit&id=<?= $prod->getIdProduto() ?>">
                                Alterar</a> 
                            </td>

                            <td><a class="btn btn-danger" 
                                onclick="return confirm('onfirma a exclusão do produto?');"
                                href="<?= BASEURL ?>/controller/ProdutoController.php?action=delete&id=<?= $prod->getIdProduto() ?>">
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
                           
