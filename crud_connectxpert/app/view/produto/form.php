<?php
#Nome do arquivo: produto/list.php
#Objetivo: interface para listagem dos produtos do sistema

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
echo '<link rel="stylesheet" href="' . BASEURL . '/view/professor/profstyle.css">';
?>
 <div class="container">
    <div class="row">
<h3 class="col-4">
    <?php if(!isset($dados['idProduto'])) echo "Inserir"; else echo "Alterar"; ?>  <span>Produto</span>
</h3></div></div>

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

                <?php if(isset($dados["produto"]) && $dados["produto"]->getFoto() ):?>
                    
                    <img src="<?= BASEURL_FOTOS . $dados["produto"]->getFoto(); ?>" alt="" width="100px">
                
                <?php endif;?>

                <div class="form-group">
                    <label>Situação:</label>
                    
                    <?php foreach($dados["estadosProduto"] as $estados): ?>

                        <div class="form-radio">
                            <input type="radio" name="situacao" id="<?= 'ckb' . $estados ?>" value="<?= strtolower ($estados) ?>"
                                
                                <?php

                                    //condição quando o produto está sendo cadastrado e não existe estado
                                    if(!isset($dados['idProduto']) && $estados == "DISPONIVEL") {
                                        echo " checked";
                                    }

                                    //condição quando o produto está sendo editadoi e existe estado
                                    if(isset($dados['produto']) && strtolower ($estados) == $dados['produto']->getSituacao()) {
                                        echo " checked";
                                    }

                                ?>        
                            />
                            <label for="<?= 'ckb' . $estados ?>"><?= $estados ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>

                <input type="hidden" id="hddId" name="idProduto" value="<?= isset($dados['idProduto']) ? $dados['idProduto'] : 0 ; ?>" />
                <input type="hidden" id="hddFoto" name="arquivoFoto" value="<?= isset($dados['produto']) ? $dados['produto']->getFoto() : "" ; ?>" />

              

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