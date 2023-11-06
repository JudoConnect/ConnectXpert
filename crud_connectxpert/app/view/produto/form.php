<?php
#Nome do arquivo: produto/list.php
#Objetivo: interface para listagem dos produtos do sistema

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
echo '<link rel="stylesheet" href="' . BASEURL . '/view/produto/produtostyle.css">';
?>
 <div class="container">
    <div class="row">
<h3 class="col-4">
    <?php if(!isset($dados['idProduto'])) echo "Inserir"; else echo "Alterar"; ?> Produto <a class="btn-inserir" 
                href="<?= BASEURL ?>/controller/ProdutoController.php?action=list"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16"  style="color: rgba(255, 127, 50, 1);" >
  <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
</svg></a>
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
                        maxlength="70"  style="background-color: #ffc39e; border: 1px solid #ffc39e;"
                        value="<?php echo (isset($dados["produto"]) ? $dados["produto"]->getNome() : ''); ?>" />
                </div>
                
                <div class="form-group">
                    <label for="txtDescricao">Descrição:</label>
                    <input class="form-control" type="text" id="txtdescricao" name="descricao" 
                        maxlength="3000" style="background-color: #ffc39e; border: 1px solid #ffc39e;"
                        value="<?php echo (isset($dados["produto"]) ? $dados["produto"]->getDescricao() : ''); ?>"/>
                </div>

                <div class="form-row" style="margin-top: 40px;">
                        <label for="uplImagem"></label>
                        <input type="file" name="foto" id="uplImagem" accept="image/*" />
                    </div> 

                <div img="upload.png"></div>

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

              

                <button type="submit" class="btn" style="background-color: #ff7f32; border-radius: 16px;"><a style="color:#fdfbeb;"> Cadastrar</a></button>
                <button type="reset" class="btn" style="background-color: #fdfbeb; border-radius: 16px; border-color: #ff7f32;"><a style="color: #ff7f32;"> Cancelar </a></button>
            </form>            
        </div>

        <div class="col-6">
            <?php require_once(__DIR__ . "/../include/msg.php"); ?>
        </div>
    </div>
</div>

<?php  
require_once(__DIR__ . "/../include/footer.php");
?>