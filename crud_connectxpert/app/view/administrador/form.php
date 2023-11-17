<?php
#Nome do arquivo: administrador/list.php
#Objetivo: interface para listagem dos usuários do sistema

require_once(__DIR__ . "/../include/header.php");
require_once(__DIR__ . "/../include/menu.php");
?>

<h3 class="text-center">
    <?php if($dados['id'] == 0) echo "Inserir"; else echo "Alterar"; ?> 
    Usuário
</h3>

<div class="container">
    
    <div class="row" style="margin-top: 10px;">
        
        <div class="col-6">
            <form id="frmadministrador" method="POST" 
                action="<?= BASEURL ?>/controller/administradorController.php?action=save" >
                <div class="form-group">
                    <label for="txtNome">Nome:</label>
                    <input class="form-control" type="text" id="txtNome" name="nome" 
                        maxlength="70" placeholder="Informe o nome"
                        value="<?php echo (isset($dados["administrador"]) ? $dados["administrador"]->getNome() : ''); ?>" />
                </div>

                <div class="form-group">
                    <label for="txtNascimento">Nascimento:</label>
                    <input class="form-control" type="date" id="txtNascimento" name="nascimento" 
                        value="<?php echo (isset($dados["administrador"]) ? $dados["administrador"]->getNascimento() : ''); ?>" />
                </div>

                <div class="form-group">
                    <label for="txtRg">RG:</label>
                    <input class="form-control" type="text" id="txtRg" name="rg" 
                        maxlength="12" placeholder="Informe o RG"
                        value="<?php echo (isset($dados["administrador"]) ? $dados["administrador"]->getRg() : ''); ?>" />
                </div>

                <div class="form-group">
                    <label for="txtCpf">CPF:</label>
                    <input class="form-control" type="text" id="txtCpf" name="cpf" 
                        maxlength="12" placeholder="Informe o CPF"
                        value="<?php echo (isset($dados["administrador"]) ? $dados["administrador"]->getCpf() : ''); ?>" />
                </div>


                <div class="form-group">
                    <label for="txtTelefone">Telefone:</label>
                    <input class="form-control" type="text" id="txtTelefone" name="telefone" 
                        maxlength="14" placeholder="Informe número de telefone"
                        value="<?php echo (isset($dados["administrador"]) ? $dados["administrador"]->getTelefone() : ''); ?>" />
                </div>

                <div class="form-group">
                    <label>Sexo do usuário:</label>
                    <?php foreach($dados["sexo"] as $sexo): ?>
                        <div class="form-radio">
                            <input type="radio" , Sexo::FEMININO
                                name="sexo" id="<?= 'ckb' . $sexo ?>" value="<?= $sexo ?>"
                                
                                <?php
                                    if(isset($dados['administrador']) && 
                                        in_array($sexo, $dados['administrador']->getSexoAsArray()))
                                        echo " checked";
                                ?>        
                            />
                            <label for="<?= 'ckb' . $sexo ?>"><?= $sexo ?></label>
                        </div>
                    <?php endforeach; ?>
                </div>


                <div class="form-group">
                    <label>Papéis do usuário:</label>
                    <?php foreach($dados["papeis"] as $papel): ?>
                        <div class="form-radio">
                            <input type="radio"
                                name="papel" id="<?= 'ckb' . $papel ?>"
                                value="<?= $papel ?>"
                                
                                <?php
                                    if(isset($dados['administrador']) && 
                                        in_array($papel, $dados['administrador']->getPapeisAsArray()))
                                        echo " checked";
                                ?>        
                            />
                            <label for="<?= 'ckb' . $papel ?>"><?= $papel ?></label>
                        </div>
                    <?php endforeach; ?>
                </div> 
                   


                <div class="form-group">
                    <label for="txtLogin">Login:</label>
                    <input class="form-control" type="text" id="txtLogin" name="login" 
                        maxlength="15" placeholder="Informe o login"
                        value="<?php echo (isset($dados["administrador"]) ? $dados["administrador"]->getLogin() : ''); ?>"/>
                </div>

                <div class="form-group">
                    <label for="txtSenha">Senha:</label>
                    <input class="form-control" type="password" id="txtPassword" name="senha" 
                        maxlength="15" placeholder="Informe a senha"
                        value="<?php echo (isset($dados["administrador"]) ? $dados["administrador"]->getSenha() : ''); ?>"/>
                </div>

                <div class="form-group">
                    <label for="txtConfSenha">Confirmação da senha:</label>
                    <input class="form-control" type="password" id="txtConfSenha" name="conf_senha" 
                        maxlength="15" placeholder="Informe a confirmação da senha"
                        value="<?php echo isset($dados['confSenha']) ? $dados['confSenha'] : '';?>"/>
                </div>


                <input type="hidden" id="hddId" name="id" 
                    value="<?= $dados['id']; ?>" />

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
                href="<?= BASEURL ?>/controller/administradorController.php?action=list">Voltar</a>
        </div>
    </div>
</div>

<?php  
require_once(__DIR__ . "/../include/footer.php");
?>