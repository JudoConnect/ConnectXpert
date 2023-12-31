<?php
#Nome do arquivo: video_aula/formVideoAula.php
#Objetivo: interface para o formulario das videos aulas do sistema

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
echo '<link rel="stylesheet" href="' . BASEURL . '/view/turma/turmastyle.css">';

?>

<div class="container">
    <div class="row">
<h3 class="col-12">
    <?php if($dados['id_video_aula'] == 0) echo "Inserir"; else echo "Alterar"; ?> Vídeo Aula <a class="btn-inserir" 
                href="<?= BASEURL ?>/controller/VideoAulaController.php?action=list"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16"  style="color: rgba(255, 127, 50, 1);" >
  <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
</svg></a>
</h3></div></div>

<div class="container">   
    <div class="row" style="margin-top:10px;">
        <div class="col-6">
            <form id="frmVideoAula" method="POST" 
                action="<?= BASEURL ?>/controller/VideoAulaController.php?action=save" >
                <div class="form-group">
                    <label for="txtNomeVideoAula">Nome da Vídeo Aula:</label>
                    <input class="form-control" type="text" id="txtNomeVideoAula" name="nome_video_aula" 
                        maxlength="70" style="background-color: #ffc39e; border: 1px solid #ffc39e;"
                        value="<?php echo (isset($dados["video_aula"]) ? $dados["video_aula"]->getNomeVideoAula() : ''); ?>" />

                    <label for="txtLinkVideoAula">Link da Vídeo Aula:</label>
                    <input class="form-control" type="url" id="txtLinkVideoAula" name="link_video_aula" 
                        maxlength="70" style="background-color: #ffc39e; border: 1px solid #ffc39e;"
                        value="<?php echo (isset($dados["video_aula"]) ? $dados["video_aula"]->getLinkVideoAula() : ''); ?>" />
                </div>
             

                <input type="hidden" id="hddIdVideoAula" name="id_video_aula" 
                    value="<?= $dados['id_video_aula']; ?>" />

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