<?php
#Nome do arquivo: professor/list.php
#Objetivo: interface para listagem dos professor do sistema

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
echo '<link rel="stylesheet" href="' . BASEURL . '/view/professor/profstyle.css">';

?>
<div class="container">
    <div class="row">
        <h3 class="col-4">
            <?php if ($dados['id_professor'] == 0) echo "Inserir";
            else echo "Alterar"; ?> Professor <a class="btn-inserir" href="<?= BASEURL ?>/controller/AlunoController.php?action=list"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16" style="color: rgba(255, 127, 50, 1);">
                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                </svg></a></h3></div>

                <div class="container">
        <form id="frmProfessor" method="POST" action="<?= BASEURL ?>/controller/ProfessorController.php?action=save" enctype="multipart/form-data">
                <div class="form-row" style="margin-top: 40px;">
                    <div class="form-group col-md-3">
                        <label for="uplImagem"></label>
                        <input type="file" name="foto" id="uplImagem" accept="image/*" />
                        <?php if (isset($dados["professor"]) && $dados["professor"]->getFotoProfessor()) : ?>

                            <img src="<?= BASEURL_FOTOS . $dados["professor"]->getFotoProfessor(); ?>" alt="" width="100px">

                        <?php endif; ?>
                    </div>
                </div>
                    <div class="form-row" style="margin-top: 10px;">
                        <div class="form-group col-md-5">
                            <label for="txtNomeProfessor">Nome:</label>
                            <input class="form-control" type="text" id="txtNomeProfessor" name="nomeProfessor" maxlength="70" value="<?php echo (isset($dados["professor"]) ? $dados["professor"]->getNomeProfessor() : ''); ?>" />
                        </div>

                        <div class="form-group col-md-4">
                            <label for="txtNascimentoProfessor">Data de Nascimento:</label>
                            <input class="form-control" type="date" id="txtNascimentoProfessor" name="nascimentoProfessor" value="<?php echo (isset($dados["professor"]) ? $dados["professor"]->getNascimentoProfessor() : ''); ?>" />
                        </div>


                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-7">
                            <label for="txtTelefoneProfessor">Telefone:</label>
                            <input class="form-control" type="text" id="txtTelefoneProfessor" name="telefoneProfessor" maxlength="20" value="<?php echo (isset($dados["professor"]) ? $dados["professor"]->getTelefoneProfessor() : ''); ?>" />
                        </div>


                        <div class="form-group col">
                            <label for="txtCpfProfessor">CPF:</label>
                            <input class="form-control" type="text" id="txtCpfProfessor" name="cpfProfessor" maxlength="15" value="<?php echo (isset($dados["professor"]) ? $dados["professor"]->getCpfProfessor() : ''); ?>" />
                        </div>


                        <div class="form-group col">
                            <label for="txtRgProfessor">RG:</label>
                            <input class="form-control" type="text" id="txtRgProfessor" name="rgProfessor" maxlength="15" value="<?php echo (isset($dados["professor"]) ? $dados["professor"]->getRgProfessor() : ''); ?>" />
                        </div>
                    </div>

                    <div class="form-group">
                        <label>Sexo:</label>
                        <?php foreach ($dados["sexo"] as $sexo) : ?>
                            <div class="form-radio">
                                <input type="radio" name="sexo" id="<?= 'ckb' . $sexo ?>" value="<?= strtolower($sexo) ?>" <?php
                                                                                                                            if (
                                                                                                                                isset($dados['professor']) &&
                                                                                                                                strtolower($sexo) == $dados['professor']->getSexoProfessor()
                                                                                                                            )
                                                                                                                                echo " checked";
                                                                                                                            ?> />
                                <label for="<?= 'ckb' . $sexo ?>"><?= $sexo ?></label>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="form-group">
                        <label for="txtEmailProfessor">Email:</label>
                        <input class="form-control" type="email" id="txtEmailProfessor" name="emailProfessor" maxlength="100" value="<?php echo (isset($dados["professor"]) ? $dados["professor"]->getEmailProfessor() : ''); ?>" />
                    </div>


                    <div class="form-group">
                        <label>Tipo:</label>
                        <?php foreach ($dados["tipo"] as $tipo) : ?>
                            <div class="form-radio">
                                <input type="radio" name="tipo" id="<?= 'ckb' . $tipo ?>" value="<?= $tipo ?>" <?php
                                                                                                                if (
                                                                                                                    isset($dados['professor']) &&
                                                                                                                    $tipo == $dados['professor']->getTipo()
                                                                                                                )
                                                                                                                    echo " checked";
                                                                                                                ?> />
                                <label for="<?= 'ckb' . $tipo ?>"><?= $tipo ?></label>
                            </div>
                        <?php endforeach; ?>
                    </div>

                    <div class="form-group">
                        <label for="txtLoginProfessor">Login:</label>
                        <input class="form-control" type="text" id="txtLoginProfessor" name="loginProfessor" maxlength="15" value="<?php echo (isset($dados["professor"]) ? $dados["professor"]->getLoginProfessor() : ''); ?>" />
                    </div>

                    <div class="form-row">
                        <div class="form-group col-md-6">
                            <label for="txtSenha">Senha:</label>
                            <input class="form-control" type="password" id="txtPasswordProfessor" name="senhaProfessor" maxlength="15" value="<?php echo (isset($dados["professor"]) ? $dados["professor"]->getSenhaProfessor() : ''); ?>" />
                        </div>

                        <div class="form-group col-md-6">
                            <label for="txtConfSenhaProfessor">Confirmação da senha:</label>
                            <input class="form-control" type="password" id="txtConfSenhaProfessor" name="confSenhaProfessor" maxlength="15" value="<?php echo isset($dados['confSenhaProfessor']) ? $dados['confSenhaProfessor'] : ''; ?>" />
                        </div>
                        <input type="hidden" id="hddId" name="id_professor" value="<?= $dados['id_professor']; ?>" />

                        <div class="form-group col-md-6">
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