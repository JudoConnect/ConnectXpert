<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Updload de arquivos</title>
</head>
<body>
    <h2>Exemplo de formulário para Upload de arquivos</h2>

    <!-- O formulário deve definir o atributo enctype para suportar o envio de arquivos -->
    <form method="POST" action="imagem_exec.php" enctype="multipart/form-data">

        <label for="uplImagem">Selecione o arquivo:</label>
        <br>
        <input type="file" name="imagem" id="uplImagem" 
            accept="image/*" />  
            
        <!-- Atributo accept para limitar apenas arquivo de imagem -->
        <!-- Mais em: https://www.w3schools.com/tags/att_input_accept.asp -->

        <br><br>

        <input type="submit" value="Fazer upload" />
    </form>
    
</body>
</html>