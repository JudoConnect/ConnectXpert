<?php
#Nome do arquivo: aluno/list.php
#Objetivo: interface para listagem dos usuários do sistema

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
//require_once(__DIR__ . "/mascara.php");
echo '<link rel="stylesheet" href="' . BASEURL . '/view/aluno/alunostyle.css">';
?>
<script src = "../../bootstrap/js/funcoesMasc.js">
    </script>

<div class="container">
    <div class="row">
        <h3 class="col-12">
            <?php if ($dados['id_aluno'] == 0) echo "Inserir ";
            else echo "Alterar"; ?> Aluno <a class="btn-inserir" href="<?= BASEURL ?>/controller/AlunoController.php?action=list"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16" style="color: rgba(255, 127, 50, 1);">
                    <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z" />
                </svg></a></h3>
                <hr>

        <div class="container">
            
            <div class="form-row" style="margin-top: 40px;">
                <div class="form-group col-md-3">
                    <label for="uplImagem"></label>
                    <input type="file" name="foto" id="uplImagem" accept="image/*" />
                    <?php if (isset($dados["aluno"]) && $dados["aluno"]->getFoto()) : ?>

                        <img src="<?= BASEURL_FOTOS . $dados["aluno"]->getFoto(); ?>" alt="" width="100px">

                    <?php endif; ?>
                </div> 
                <form id="frmAluno" method="POST" action="<?= BASEURL ?>/controller/AlunoController.php?action=save" enctype="multipart/form-data">
                    <div class="form-row" style="margin-top: 10px;">
                        <div class="form-group col-md-5">
                            <label for="txtNomeAluno">Nome:</label>
                            <input class="form-control" type="text" id="txtNomeAluno" name="nomeAluno" maxlength="70"  value="<?php echo (isset($dados["aluno"]) ? $dados["aluno"]->getNomeAluno() : ''); ?>" />
                        </div>
                        <div class="form-group col-md-4">
                            <label for="txtNascimentoAluno">Data de Nascimento:</label>
                            <input class="form-control" type="date" id="txtNascimentoAluno" name="nascimentoAluno" value="<?php echo (isset($dados["aluno"]) ? $dados["aluno"]->getNascimentoAluno() : ''); ?>" />
                        </div>
                    </div>

                    <div class="form-row">

                        <div class="form-group col-md-12">
                            <label for="txtNomeResponsavel">Nome do Responsável:</label>
                            <input class="form-control" type="text" id="txtNomeResponsavel" name="nomeResponsavel" maxlength="70"  value="<?php echo (isset($dados["aluno"]) ? $dados["aluno"]->getNomeResponsavel() : ''); ?>" />
                        </div>
                    </div>
                        <div class="form-row">
                        <div class="form-group col-md-7">
                            <label for="txtTelefoneAluno">Telefone:</label>
                            <input class="form-control" type="text" id="txtTelefoneAluno" name="telefoneAluno" maxlength="14" onfocus="mascTelefone1(this)" onkeypress="mascTelefone2(this)" value="<?php echo (isset($dados["aluno"]) ? $dados["aluno"]->getTelefone() : ''); ?>" />
                        </div>

                                <div class="form-group col-md-3">
                                    <label for="txtCpfALuno">CPF:</label>
                                    <input class="form-control" type="text" id="txtCpfAluno" name="cpfAluno" maxlength="15"  value="<?php echo (isset($dados["aluno"]) ? $dados["aluno"]->getCpfAluno() : ''); ?>" />
                                </div>

                                <div class="form-group col-md-2">
                                    <label for="txtRgALuno">RG:</label>
                                    <input class="form-control" type="text" id="txtRgAluno" name="rgAluno" maxlength="15"  value="<?php echo (isset($dados["aluno"]) ? $dados["aluno"]->getRgAluno() : ''); ?>" />
                                </div>
                        </div>

                         <div class="form-row">
                            <div class="form-group col">
                                <label>Sexo:</label>
                                <?php foreach ($dados["sexo"] as $sexo) : ?>
                                    <div class="form-radio">
                                        <input type="radio" name="sexo" id="<?= 'ckb' . $sexo ?>" value="<?= strtolower($sexo) ?>" <?php
                                                                                                                                    if (
                                                                                                                                        isset($dados['aluno']) &&
                                                                                                                                        strtolower($sexo) == $dados['aluno']->getSexoAluno()
                                                                                                                                    )
                                                                                                                                        echo " checked";
                                                                                                                                    ?> />
                                        <label for="<?= 'ckb' . $sexo ?>"><?= $sexo ?></label>
                                    </div>
                                <?php endforeach; ?>
                            </div>
                         </div> 
                         
                                    <div class="form-group">
                                        <label for="txtEmailALuno">Email:</label>
                                        <input class="form-control" type="email" id="txtEmailAluno" name="emailAluno"  value="<?php echo (isset($dados["aluno"]) ? $dados["aluno"]->getEmailAluno() : ''); ?>" />
                                    </div>
                           </div>
<hr>
<h4 class="col-12" style=" width: 100px; height: 45px; color: rgba(255, 127, 50, 1);  font-style: normal;
 font-size: 24px; font-weight: 800; line-height: 1.2; letter-spacing: 1px; text-decoration: none; text-transform: none;">Endereço</h4>
                         <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="txtEndRua">Rua:</label>
                                            <input class="form-control" type="text" id="txtEndRua" name="endRua" maxlength="100"  value="<?php echo (isset($dados["aluno"]) ? $dados["aluno"]->getEndRua() : ''); ?>" />
                                        </div>

                                        <div class="form-group col">
                                            <label for="txtEndBairro">Bairro:</label>
                                            <input class="form-control" type="text" id="txtEndBairro" name="endBairro" maxlength="100"  value="<?php echo (isset($dados["aluno"]) ? $dados["aluno"]->getEndBairro() : ''); ?>" />
                                        </div>

                            
                                            <div class="form-group col">
                                                <label for="txtEndComplemento">Complemento:</label>
                                                <input class="form-control" type="text" id="txtEndComplemento" name="endComplemento" maxlength="100" value="<?php echo (isset($dados["aluno"]) ? $dados["aluno"]->getEndComplemento() : ''); ?>" />
                                            </div>
                                    </div>
                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="txtEndCidade">Cidade:</label>
                                            <input class="form-control" type="text" id="txtEndCidade" name="endCidade" maxlength="100"  value="<?php echo (isset($dados["aluno"]) ? $dados["aluno"]->getEndCidade() : ''); ?>" />
                                        </div>

                                        <div class="form-group col-md-4">
                                            <label for="txtEndEstado">Estado:</label>
                                            <input class="form-control" type="text" id="txtEndEstado" name="endEstado" maxlength="70" value="<?php echo (isset($dados["aluno"]) ? $dados["aluno"]->getEndEstado() : ''); ?>" />
                                        </div>

                                        <div class="form-group col-md-2">
                                            <label for="txtEndNumero">Número:</label>
                                            <input class="form-control" type="text" id="txtEndNumero" name="endNumero"  value="<?php echo (isset($dados["aluno"]) ? $dados["aluno"]->getEndNumero() : ''); ?>" />
                                        </div>

                                       <hr>
                                        
                                            <div class="form-group col-md-6">
                                                <label for="somIes">Instituição de Ensino:</label>
                                                <select class="form-control" id="somIes" name="idIes">
                                                    <option value="">Selecione</option>
                                                    <?php foreach ($dados['listaIes'] as $ies) : ?>
                                                        <option value="<?= $ies->getIdIe() ?>" <?php if (isset($dados["aluno"]) && $dados["aluno"]->getIdIe() == $ies->getIdIe())
                                                                                                    echo 'selected';
                                                                                                ?>><?= $ies->getNomeIe() ?></option>
                                                    <?php endforeach; ?>
                                                </select>

                                            </div>
                                        </div>
<hr>
<h4 class="col-12" style=" width: 100px; height: 45px; color: rgba(255, 127, 50, 1);  font-style: normal;
 font-size: 24px; font-weight: 800; line-height: 1.2; letter-spacing: 1px; text-decoration: none; text-transform: none;">Login</h4>
                                        <div class="form-group">
                                            <label for="txtLoginALuno">Login:</label>
                                            <input class="form-control" type="text" id="txtLoginAluno" name="loginAluno" maxlength="15"  value="<?php echo (isset($dados["aluno"]) ? $dados["aluno"]->getLoginAluno() : ''); ?>" />
                                        </div>
                                    

                                    <div class="form-row">
                                        <div class="form-group col-md-6">
                                            <label for="txtSenha">Senha:</label>
                                            <input class="form-control" type="password" id="txtPasswordAluno" name="senhaAluno" maxlength="15"  value="<?php echo (isset($dados["aluno"]) ? $dados["aluno"]->getSenhaAluno() : ''); ?>" />
                                        </div>

                                        <div class="form-group col-md-6 ">
                                            <label for="txtConfSenhaAluno">Confirmação da senha:</label>
                                            <input class="form-control" type="password" id="txtConfSenhaAluno" name="confSenhaAluno" maxlength="15"  value="<?php echo isset($dados["confSenhaAluno"]) ? $dados["confSenhaAluno"] : ''; ?>" />
                                        </div>
                                    </div>

                                        

                                        <div class="form-row">
                                            <div class="form-group">
                                                <label>Situação:</label>

                                                <?php foreach ($dados["estadosProduto"] as $estados) : ?>

                                                    <div class="form-radio">
                                                        <input type="radio" name="situacao" id="<?= 'ckb' . $estados ?>" value="<?= strtolower($estados) ?>" <?php

                                                                                                                                                                //condição quando o produto está sendo cadastrado e não existe estado
                                                                                                                                                                if (!isset($dados['idAluno']) && $estados == "DISPONIVEL") {
                                                                                                                                                                    echo " checked";
                                                                                                                                                                }

                                                                                                                                                                //condição quando o produto está sendo editadoi e existe estado
                                                                                                                                                                if (isset($dados['aluno']) && strtolower($estados) == $dados['aluno']->getSituacao()) {
                                                                                                                                                                    echo " checked";
                                                                                                                                                                }

                                                                                                                                                                ?> />
                                                        <label for="<?= 'ckb' . $estados ?>"><?= $estados ?></label>
                                                    </div>
                                                <?php endforeach; ?>
                                            </div>
                                        </div>

                                        <div class="form-group">

                                            <input type="hidden" id="hddId" name="id_aluno" value="<?= $dados['id_aluno']; ?>" />
                                        </div>

                                    
                            <button type="submit" class="btn" style="background-color: #ff7f32; border-radius: 16px;"  ><a style="color:#fdfbeb;"> Cadastrar</a></button>
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