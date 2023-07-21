<?php
#Nome do arquivo: index.php
#Objetivo: mostrar os generos cadastrados no sistema

include_once("util/conexao.php");
include_once("controller/genero_controller.php");
include_once("view/genero_html.php");

//Teste de conexão
$connection = conectar_db();
?>

<!DOCTYPE HTML>
<html>
<head>
    <?php
     include_once("bootstrap/head.php");
    ?>
</head>

<body>
    <?php
     include_once("bootstrap/menu.php");
    ?>

   <h3 class="text-center">GÊNEROS</h3>
   
   <br>
<div style="margin: 40px 10px 0px 10px">
    
   
    <p style="font-weight: bold;">RELAÇÃO DOS GÊNEROS CADASTRADOS</p>

        <?php
        $generoCont = new GeneroController();
         $generos = $generoCont->listar();

         GeneroHTML::desenhaTabela($generos, "das");

        ?> 
    <a class="btn btn-outline-success" href="generos_inc.php"> Incluir Novo Gênero</a><br><br><br>
</div>
    <?php
     include_once("bootstrap/footer.php");
    ?>
</body>
</html>