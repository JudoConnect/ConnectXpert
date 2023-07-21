<?php
#pagína com formulario para incluir genero
include_once("controller/genero_controller.php");
include_once("view/genero_html.php");
?>

<!DOCTYPE html>
<html lang="en">
<head>
    <?php
     include_once("bootstrap/head.php");
    ?>
</head>
<body>
    <?php
     include_once("bootstrap/menu.php");
    ?>

<h3 class="text-center">INSERIR GENERO</h3>
<div style="max-width: 50%; margin-left: 10px;">
    <form name="frnCadastroGeneros" method="POST" action="generos_inc_exec.php">
        
            <div class="form-group">
                    <label for="txtNome">Nome:</label>
                    <input class="form-control" type="text" id="txtNome" name="nome" size="45" maxlength="70" placeholder="Informe o gênero"/>
            </div>

        <br><button type="submit" class="btn btn-success">Gravar</button>
        <button type="reset" class="btn btn-danger">Limpar</button>
    </form>
    <br><a href="generos_listar.php" class="btn btn-secondary">Voltar</a>
</div>

    <?php
     include_once("bootstrap/footer.php");
    ?>
</body>
</html>