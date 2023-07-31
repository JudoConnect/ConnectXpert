<?php
#Nome do arquivo: login/login.php
#Objetivo: interface para logar no sistema

require_once(__DIR__ . "/../include/header.php");
echo '<link rel="stylesheet" href="' . BASEURL . '/view/login/loginstyle.css">';
?>
<div class="container" style="background-color: #ff7f32;">
    <div class="row">
        <div class="col-6">Connect Xpert
        </div>
        <div class="col-6" style="height: 100vh;">
            <div class="row">
                <div class="col-12">
                    <div class="Regular shadow p-3 mb-2 bg-white text-dark rounded " style="height: 100vh;">
                        <h4>LOGIN</h4>
                        <br>
                        <!-- Formulário de login -->
                        <form id="frmLogin" action="./LoginController.php?action=logon" method="POST">
                            <div class="form-group">
                                <input type="text" class="form-control" name="login" id="txtLogin" maxlength="15"
                                    placeholder="Usuario"
                                    value="<?php echo isset($dados['login']) ? $dados['login'] : '' ?>" />
                            </div>
                            <div class="form-group">
                                <input type="password" class="form-control" name="senha" id="txtSenha" maxlength="15"
                                    placeholder="Senha"
                                    value="<?php echo isset($dados['senha']) ? $dados['senha'] : '' ?>" />
                            </div>
                            <button type="submit" class="btn">Entrar
                            </button>
                        </form>
                    </div>
                </div>
            </div>
            <div class="row">
                <div class="">
                    <?php include_once(__DIR__ . "/../include/msg.php") ?>
                </div>
            </div>
        </div>
    </div>
</div>

<?php  
require_once(__DIR__ . "/../include/footer.php");
?>