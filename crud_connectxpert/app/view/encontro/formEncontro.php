<?php
#Nome do arquivo: encontro/formEncontro.php
#Objetivo: interface para listagem dos encontros do sistema

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
echo '<link rel="stylesheet" href="' . BASEURL . '/view/turma/turmastyle.css">';

?>

<div class="container">
    <div class="row">
<h3 class="col-4">
    <?php if($dados['id_encontro'] == 0) echo "Inserir"; else echo "Alterar"; ?> 
    Encontro 
</h3></div></div>

<div class="container">
    
    <div class="row" style="margin-top: 10px;">
        <div class="col-6">
            <form id="frmEncontro" method="POST" 
                action="<?= BASEURL ?>/controller/EncontroController.php?action=save" >
                <div class="form-group">
                    <label for="txtNomeEncontro">Nome do Encontro:</label>
                    <input class="form-control" type="text" id="txtNomeEncontro" name="nomeEncontro" 
                        maxlength="70" placeholder="Informe o nome do Encontro"
                        value="<?php echo (isset($dados["encontro"]) ? $dados["encontro"]->getNomeEncontro() : ''); ?>" />
                </div>

                <div class="form-group">
                    <label for="txtDiaEncontro">Dia do Encontro:</label>
                    <input class="form-control" type="date" id="txtDiaEncontro" name="diaEncontro" 
                        value="<?php echo (isset($dados["encontro"]) ? $dados["encontro"]->getDiaEncontro() : ''); ?>" />
                </div>

                <input type="hidden" id="hddTurma" name="id_turma" 
                    value="<?= $dados["idTurma"]; ?>" />
                
                <input type="hidden" id="hddEncontro" name="id_encontro" 
                    value="<?= $dados['id_encontro']; ?>" />


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
                href="<?= BASEURL ?>/controller/EncontroController.php?action=list&id=<?= $dados["idTurma"] ?>">Voltar</a>
        </div>
    </div>
</div>

<?php  
require_once(__DIR__ . "/../include/footer.php");
?>