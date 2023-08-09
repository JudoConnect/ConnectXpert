<?php
#Nome do arquivo: aluno/list.php
#Objetivo: interface para listagem dos usuários do sistema

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
?>

<h3 class="text-center">
    <?php if($dados['id_aluno'] == 0) echo "Inserir"; else echo "Alterar"; ?> 
    Aluno
</h3>

<div class="container">
    
    <div class="row" style="margin-top: 10px;">
        <div class="col-6">
            <form id="frmAluno" method="POST" 
                action="<?= BASEURL ?>/controller/AlunoController.php?action=save"
                enctype="multipart/form-data" >

                <div class="form-group">
                    <label for="txtNomeAluno">Nome do Aluno:</label>
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
                        maxlength="14" placeholder="Informe número de telefone do aluno"
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
                <label>Histórico:</label>
                <input  class="form-control" type="textarea" id="txtHistorico" name="historicoAluno" 
                 minlength="20" maxlength="50" placeholder="Digite o histórico do aluno caso deseje" 
                 value="<?php echo isset($dados["historico"]) ? $dados["historico"] : '';?>"/>
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
                                    if(isset($dados['alun0']) && strtolower ($estados) == $dados['aluno']->getSituacao()) {
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

    <div class="row" style="margin-top: 30px;">
        <div class="col-12">
        <a class="btn btn-secondary" 
                href="<?= BASEURL ?>/controller/AlunoController.php?action=list">Voltar</a>
        </div>
    </div>
</div>

<?php  
require_once(__DIR__ . "/../include/footer.php");
?>