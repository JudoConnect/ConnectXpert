<?php
#Nome do arquivo: aluno/list.php
#Objetivo: interface para listagem dos usuários do sistema

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
echo '<link rel="stylesheet" href="' . BASEURL . '/view/aluno/alunostyle.css">';
?>

<div class="container">
    <div class="row">
    <h3 class="col-4">
    <?php if($dados['id_aluno'] == 0) echo "Inserir "; else echo "Alterar"; ?> Aluno <a class="btn-inserir" 
                href="<?= BASEURL ?>/controller/AlunoController.php?action=list"><svg xmlns="http://www.w3.org/2000/svg" width="16" height="16" fill="currentColor" class="bi bi-arrow-left-circle" viewBox="0 0 16 16"  style="color: rgba(255, 127, 50, 1);" >
  <path fill-rule="evenodd" d="M1 8a7 7 0 1 0 14 0A7 7 0 0 0 1 8zm15 0A8 8 0 1 1 0 8a8 8 0 0 1 16 0zm-4.5-.5a.5.5 0 0 1 0 1H5.707l2.147 2.146a.5.5 0 0 1-.708.708l-3-3a.5.5 0 0 1 0-.708l3-3a.5.5 0 1 1 .708.708L5.707 7.5H11.5z"/>
</svg></a></h3>

<div class="container">
    <div class="row">
        <div class="col-6">
            <form id="frmAluno" method="POST" 
                action="<?= BASEURL ?>/controller/AlunoController.php?action=save"
                enctype="multipart/form-data" >

                <div class="form-group">
                    <label for="txtNomeAluno"><br>Nome do Aluno:</label>
                    <input class="form-control" type="text" id="txtNomeAluno" name="nomeAluno" 
                        maxlength="70" placeholder="Informe o nome do aluno"
                        value="<?php echo (isset($dados["aluno"]) ? $dados["aluno"]->getNomeAluno() : ''); ?>" />
                </div>

                <div class="form-group">
                    <label for="txtNascimentoAluno">Data de Nascimento:</label>
                    <input class="form-control" type="date" id="txtNascimentoAluno" name="nascimentoAluno" 
                        value="<?php echo (isset($dados["aluno"]) ? $dados["aluno"]->getNascimentoAluno() : ''); ?>" />
                </div>

                <div class="form-group">
                    <label for="txtTelefoneAluno">Telefone:</label>
                    <input class="form-control" type="text" id="txtTelefoneAluno" name="telefoneAluno" 
                        maxlength="20" placeholder="Informe número de telefone do aluno"
                        value="<?php echo (isset($dados["aluno"]) ? $dados["aluno"]->getTelefone() : ''); ?>" />
                </div>

                <div class="form-group">
                    <label for="txtNomeResponsavel">Nome do Responsável:</label>
                    <input class="form-control" type="text" id="txtNomeResponsavel" name="nomeResponsavel" 
                        maxlength="70" placeholder="Informe o nome do responsável pelo aluno"
                        value="<?php echo (isset($dados["aluno"]) ? $dados["aluno"]->getNomeResponsavel() : ''); ?>" />
                </div>
 
                <div class="form-group">
                    <label>Sexo do Aluno:</label>
                    <?php foreach($dados["sexo"] as $sexo): ?>
                        <div class="form-radio">
                            <input type="radio" name="sexo" id="<?= 'ckb' . $sexo ?>" value="<?= strtolower($sexo) ?>"
                                
                                <?php
                                    if(isset($dados['aluno']) && 
                                        strtolower($sexo) == $dados['aluno']->getSexoAluno())
                                        echo " checked";
                                ?>        
                            />
                            <label for="<?= 'ckb' . $sexo ?>"><?= $sexo ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="form-group">
                    <label for="txtCpfALuno">Cpf:</label>
                    <input class="form-control" type="text" id="txtCpfAluno" name="cpfAluno" 
                        maxlength="15" placeholder="Informe o cpf"
                        value="<?php echo (isset($dados["aluno"]) ? $dados["aluno"]->getCpfAluno() : ''); ?>"/>
                </div>

                <div class="form-group">
                    <label for="txtRgALuno">Rg:</label>
                    <input class="form-control" type="text" id="txtRgAluno" name="rgAluno" 
                        maxlength="15" placeholder="Informe o rg"
                        value="<?php echo (isset($dados["aluno"]) ? $dados["aluno"]->getRgAluno() : ''); ?>"/>
                </div>

                <div class="form-group">
                    <label for="txtEmailALuno">Email:</label>
                    <input class="form-control" type="email" id="txtEmailAluno" name="emailAluno" 
                        maxlength="100" placeholder="Informe o email"
                        value="<?php echo (isset($dados["aluno"]) ? $dados["aluno"]->getEmailAluno() : ''); ?>"/>
                </div>

                <div class="form-group">
                    <label for="uplImagem">Foto:</label>
                    <input type="file" name="foto" id="uplImagem" accept="image/*" />  
                </div>

                <?php if(isset($dados["aluno"]) && $dados["aluno"]->getFoto() ):?>
                    
                    <img src="<?= BASEURL_FOTOS . $dados["aluno"]->getFoto(); ?>" alt="" width="100px">
                
                <?php endif;?>

                <div class="form-group">
                    <label for="txtLoginALuno">Login:</label>
                    <input class="form-control" type="text" id="txtLoginAluno" name="loginAluno" 
                        maxlength="15" placeholder="Informe o login"  
                        value="<?php echo (isset($dados["aluno"]) ? $dados["aluno"]->getLoginAluno() : ''); ?>"/>
                </div>

                <div class="form-group">
                    <label for="txtSenha">Senha:</label>
                    <input class="form-control" type="password" id="txtPasswordAluno" name="senhaAluno" 
                        maxlength="15" placeholder="Informe a senha"
                        value="<?php echo (isset($dados["aluno"]) ? $dados["aluno"]->getSenhaAluno() : ''); ?>"/>
                </div>

                <div class="form-group">
                    <label for="txtConfSenhaAluno">Confirmação da senha:</label>
                    <input class="form-control" type="password" id="txtConfSenhaAluno" name="confSenhaAluno" 
                        maxlength="15" placeholder="Informe a confirmação da senha"
                        value="<?php echo isset($dados["confSenhaAluno"]) ? $dados["confSenhaAluno"] : '';?>"/>
                </div>

                <div class="form-group">
                <label for="txtHistorico">Histórico:</label>
                <br>
                <textarea class="form-control" id="txtHistorico" name="historico" rows="10" cols="30"></textarea>
               <?php echo (isset ($dados["aluno"]) ? $dados["aluno"]->getHistorico() : '');?>
                </div>

                <div class="form-group">
                    <label for="txtEndRua">Rua:</label>
                    <input class="form-control" type="text" id="txtEndRua" name="endRua" 
                        maxlength="100" placeholder="Informe a rua"
                        value="<?php echo (isset($dados["aluno"]) ? $dados["aluno"]->getEndRua() : ''); ?>" />
                </div>
               
                <div class="form-group">
                    <label for="txtEndBairro">Bairro:</label>
                    <input class="form-control" type="text" id="txtEndBairro" name="endBairro" 
                        maxlength="100" placeholder="Informe o bairro"
                        value="<?php echo (isset($dados["aluno"]) ? $dados["aluno"]->getEndBairro() : ''); ?>" />
                </div>
               
                <div class="form-group">
                    <label for="txtEndCidade">Cidade:</label>
                    <input class="form-control" type="text" id="txtEndCidade" name="endCidade" 
                        maxlength="100" placeholder="Informe a Cidade"
                        value="<?php echo (isset($dados["aluno"]) ? $dados["aluno"]->getEndCidade() : ''); ?>" />
                </div>
               
                <div class="form-group">
                    <label for="txtEndEstado">Estado:</label>
                    <input class="form-control" type="text" id="txtEndEstado" name="endEstado" 
                        maxlength="70" placeholder="Informe o Estado"
                        value="<?php echo (isset($dados["aluno"]) ? $dados["aluno"]->getEndEstado() : ''); ?>" />
                </div>

                <div class="form-group">
                    <label for="txtEndNumero">Número:</label>
                    <input class="form-control" type="text" id="txtEndNumero" name="endNumero" 
                        placeholder="Informe o Número"
                        value="<?php echo (isset($dados["aluno"]) ? $dados["aluno"]->getEndNumero() : ''); ?>" />
                </div>
                
                <div class="form-group">
                    <label for="txtEndComplemento">Complemento:</label>
                    <input class="form-control" type="text" id="txtEndComplemento" name="endComplemento" 
                        maxlength="100" placeholder="Complemento Opcional"
                        value="<?php echo (isset($dados["aluno"]) ? $dados["aluno"]->getEndComplemento() : ''); ?>" />
                </div>

                <div class="form-group">
                    <label for="somIes">IES:</label>
                    <select class="form-control" id="somIes" name="idIes">
                        <option value="">----Selecione----</option>
                        <?php foreach($dados['listaIes'] as $ies): ?>
                            <option value="<?= $ies->getIdIe() ?>" 
                            
                                <?php if(isset($dados["aluno"]) && $dados["aluno"]->getIdIe() == $ies->getIdIe())
                                        echo 'selected';
                                ?>    
                            
                            ><?= $ies->getNomeIe() ?></option>
                        <?php endforeach; ?>
                    </select>
                   
                </div>


                <div class="form-group">
                    <label>Situação:</label>
                    
                    <?php foreach($dados["estadosProduto"] as $estados): ?>

                        <div class="form-radio">
                            <input type="radio" name="situacao" id="<?= 'ckb' . $estados ?>" value="<?= strtolower ($estados) ?>"
                                
                                <?php

                                    //condição quando o produto está sendo cadastrado e não existe estado
                                    if(!isset($dados['idAluno']) && $estados == "DISPONIVEL") {
                                        echo " checked";
                                    }

                                    //condição quando o produto está sendo editadoi e existe estado
                                    if(isset($dados['aluno']) && strtolower ($estados) == $dados['aluno']->getSituacao()) {
                                        echo " checked";
                                    }

                                ?>        
                            />
                            <label for="<?= 'ckb' . $estados ?>"><?= $estados ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="form-group">
               
                <input type="hidden" id="hddId" name="id_aluno" 
                    value="<?= $dados['id_aluno']; ?>" />

                <button type="submit" class="btn btn-success">Gravar</button>
                <button type="reset" class="btn btn-danger">Limpar</button>
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