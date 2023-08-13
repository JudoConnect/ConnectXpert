<?php
#Nome do arquivo: ie/list.php
#Objetivo: interface para listagem  ie do sistema

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
echo '<link rel="stylesheet" href="' . BASEURL . '/view/turma/turmastyle.css">';

?>

<div class="container">
    <div class="row">
<h3 class="col-4">
    <?php if($dados['id_ie'] == 0) echo "Inserir"; else echo "Alterar"; ?> 
    Instituição 
</h3></div></div>

<div class="container">
    
    <div class="row" style="margin-top: 10px;">
        <div class="col-6">
            <form id="frmIe" method="POST" 
                action="<?= BASEURL ?>/controller/IeController.php?action=save" >
                <div class="form-group">
                    <label for="txtNomeIe">Nome da Instituição de Ensino:</label>
                    <input class="form-control" type="text" id="txtNomeIe" name="nomeIe" 
                        maxlength="70" placeholder="Informe o nome da Instituição de Ensino"
                        value="<?php echo (isset($dados["ie"]) ? $dados["ie"]->getNomeIe() : ''); ?>" />
                </div>
             

                <input type="hidden" id="hddId" name="id_ie" 
                    value="<?= $dados['id_ie']; ?>" />

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
                href="<?= BASEURL ?>/controller/IeController.php?action=list">Voltar</a>
        </div>
    </div>
</div>

<?php  
require_once(__DIR__ . "/../include/footer.php");
?>