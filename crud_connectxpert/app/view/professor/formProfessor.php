<?php
#Nome do arquivo: professor/list.php
#Objetivo: interface para listagem dos professor do sistema

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
?>

<h3 class="text-center">
    <?php if($dados['id_professor'] == 0) echo "Inserir"; else echo "Alterar"; ?> 
    Professor
</h3>

<div class="container">
    
    <div class="row" style="margin-top: 10px;">
        <div class="col-6">
            <form id="frmProfessor" method="POST" 
                action="<?= BASEURL ?>/controller/ProfessorController.php?action=save" >
                <div class="form-group">
                    <label for="txtNomeProfessor">Nome do Professor:</label>
                    <input class="form-control" type="text" id="txtNomeProfessor" name="nomeProfessor" 
                        maxlength="70" placeholder="Informe o nome do professor"
                        value="<?php echo (isset($dados["professor"]) ? $dados["professor"]->getNomeProfessor() : ''); ?>" />
                </div>

                <div class="form-group">
                    <label for="txtNascimentoProfessor">Data de Nascimento:</label>
                    <input class="form-control" type="date" id="txtNascimentoProfessor" name="nascimentoProfessor" 
                        value="<?php echo (isset($dados["professor"]) ? $dados["professor"]->getNascimentoProfessor() : ''); ?>" />
                </div>

                <div class="form-group">
                    <label for="txtTelefoneProfessor">Telefone:</label>
                    <input class="form-control" type="text" id="txtTelefoneProfessor" name="telefoneProfessor" 
                        maxlength="14" placeholder="Informe número de telefone do professor"
                        value="<?php echo (isset($dados["professor"]) ? $dados["professor"]->getTelefoneProfessor() : ''); ?>" />
                </div>

                <div class="form-group">
                    <label>Sexo do Professor:</label>
                    <?php foreach($dados["sexo"] as $sexo): ?>
                        <div class="form-radio">
                            <input type="radio" name="sexo" id="<?= 'ckb' . $sexo ?>" value="<?= strtolower($sexo) ?>"
                                
                                <?php
                                    if(isset($dados['professor']) && 
                                        strtolower($sexo) == $dados['professor']->getSexoProfessor())
                                        echo " checked";
                                ?>        
                            />
                            <label for="<?= 'ckb' . $sexo ?>"><?= $sexo ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="form-group">
                    <label for="txtCpfProfessor">Cpf:</label>
                    <input class="form-control" type="text" id="txtCpfProfessor" name="cpfProfessor" 
                        maxlength="15" placeholder="Informe o cpf"
                        value="<?php echo (isset($dados["profesor"]) ? $dados["professor"]->getCpfProfessor() : ''); ?>"/>
                </div>

                <div class="form-group">
                    <label for="txtRgProfessor">Rg:</label>
                    <input class="form-control" type="text" id="txtRgProfessor" name="rgProfessor" 
                        maxlength="15" placeholder="Informe o rg"
                        value="<?php echo (isset($dados["professor"]) ? $dados["professor"]->getRgProfessor() : ''); ?>"/>
                </div>

                <div class="form-group">
                    <label for="txtEmailProfessor">Email:</label>
                    <input class="form-control" type="email" id="txtEmailProfessor" name="emailProfessor" 
                        maxlength="100" placeholder="Informe o email"
                        value="<?php echo (isset($dados["professor"]) ? $dados["professor"]->getEmailProfessor() : ''); ?>"/>
                </div>

                <div class="form-group">
                    <label>Tipo Professor:</label>
                    <?php foreach($dados["tipo"] as $tipo): ?>
                        <div class="form-radio">
                            <input type="radio" name="tipo" id="<?= 'ckb' . $tipo ?>" value="<?= strtolower($tipo) ?>"
                                
                                <?php
                                    if(isset($dados['professor']) && 
                                        strtolower($tipo) == $dados['professor']->getTipo())
                                        echo " checked";
                                ?>        
                            />
                            <label for="<?= 'ckb' . $tipo ?>"><?= $tipo ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>

                <div class="form-group">
                    <label for="txtLoginProfessor">Login:</label>
                    <input class="form-control" type="text" id="txtLoginProfessor" name="login_professor" 
                        maxlength="15" placeholder="Informe o login"
                        value="<?php echo (isset($dados["professor"]) ? $dados["professor"]->getLoginProfessor() : ''); ?>"/>
                </div>

                <div class="form-group">
                    <label for="txtSenha">Senha:</label>
                    <input class="form-control" type="password" id="txtPasswordProfessor" name="senha_professor" 
                        maxlength="15" placeholder="Informe a senha"
                        value="<?php echo (isset($dados["professor"]) ? $dados["professor"]->getSenhaProfessor() : ''); ?>"/>
                </div>

                <div class="form-group">
                    <label for="txtConfSenhaProfessor">Confirmação da senha:</label>
                    <input class="form-control" type="password" id="txtConfSenhaProfessor" name="conf_senha" 
                        maxlength="15" placeholder="Informe a confirmação da senha"
                        value="<?php echo isset($dados['professor']) ? $dados['professor'] : '';?>"/>
                </div>

                

                <input type="hidden" id="hddId" name="id_professor" 
                    value="<?= $dados['id_professor']; ?>" />

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
                href="<?= BASEURL ?>/controller/ProfessorController.php?action=list">Voltar</a>
        </div>
    </div>
</div>

<?php  
require_once(__DIR__ . "/../include/footer.php");
?>