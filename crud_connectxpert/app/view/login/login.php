<?php
#Nome do arquivo: login/login.php
#Objetivo: interface para logar no sistema
require_once(__DIR__ . "/../include/header.php");
echo '<link rel="stylesheet" href="' . BASEURL . '/view/login/loginstyle.css">';
?>
<div class="pseudo-body">
    <div class="row">
        
        <div class="col-md-6 d-none d-md-block">
            <img class="destaque-img" src="<?= BASEURL . "/view/img/alunologin.png" ?>" />
        </div>
 
        <div class="col-md-6 form-column">
            <div class="form-holder p-5">
                <img class="login-img" src="<?= BASEURL . "/view/img/login.png" ?>" />
                <br>
                <!-- Formulário de login -->
                <form id="frmLogin" action="./LoginController.php?action=logon" method="POST">
                    <input type="text" class="form-control" name="login" id="txtLogin" maxlength="15" placeholder="Login" value="<?php echo isset($dados['login']) ? $dados['login'] : '' ?>" />
                    <input type="password" class="form-control" name="senha" id="txtSenha" maxlength="15" placeholder="Senha" value="<?php echo isset($dados['senha']) ? $dados['senha'] : '' ?>" />
                    <div class="form-group">
                        <label>Selecione o tipo de entrada:</label> </br>
                        <?php foreach ($dados["papeis"] as $papel) : ?>
                            <div class="form-radio">
                                <input type="radio" name="papel" id="<?= 'ckb' . $papel ?>" value="<?= $papel ?>" <?php
                                   if (isset($dados['papel']) && $papel == $dados['papel'])
                                   echo " checked";
                                    ?> />
                                <label for="<?= 'ckb' . $papel ?>"><?= $papel ?></label>
                            </div>
                        <?php endforeach; ?>
                    </div>
                    <button type="submit" class="btn">Entrar </button>
                </form>
                <div class="row">
                    <div class="col">
                        <?php include_once(__DIR__ . "/../include/msg.php") ?>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>