<?php
#Nome do arquivo: usuario/list.php
#Objetivo: interface para listagem dos usuários do sistema

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
?>

<h3 class="text-center">
    <?php if($dados['idProduto'] == 0) echo "Inserir"; else echo "Alterar"; ?> 
    Produto
</h3>

<div class="container">
    
    <div class="row" style="margin-top: 10px;">
        
        <div class="col-6">
            <form id="frmProduto" method="POST" 
                action="<?= BASEURL ?>/controller/ProdutoController.php?action=save"
                enctype="multipart/form-data" >
                <div class="form-group">
                    <label for="txtNome">Nome:</label>
                    <input class="form-control" type="text" id="txtNome" name="nome" 
                        maxlength="70" placeholder="Informe o nome"
                        value="<?php echo (isset($dados["produto"]) ? $dados["produto"]->getNome() : ''); ?>" />
                </div>
                
                <div class="form-group">
                    <label for="txtDescricao">Descrição:</label>
                    <input class="form-control" type="text" id="txtdescricao" name="descricao" 
                        maxlength="3000" placeholder="Informe a descricao"
                        value="<?php echo (isset($dados["produto"]) ? $dados["produto"]->getDescricao() : ''); ?>"/>
                </div>

                <div class="form-group">
                    <label for="uplImagem">Foto:</label>
                    <input type="file" name="foto" id="uplImagem" accept="image/*" />  
                </div>

                <input type="hidden" id="hddId" name="idProduto" 
                    value="<?= $dados['idProduto']; ?>" />

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
                href="<?= BASEURL ?>/controller/ProdutoController.php?action=list">Voltar</a>
        </div>
    </div>
</div>

<?php  
require_once(__DIR__ . "/../include/footer.php");
?>