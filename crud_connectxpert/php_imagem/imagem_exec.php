<?php 

//Define o PATH onde os arquivos vão ser salvos
//Pode estar no config da aplicação
$PATH_ARQUIVOS = 'arquivos/'; 

$arquivoImg = $_FILES["imagem"]; //'imagem' é o 'name' do input

//Valida se o arquivo foi enviado
if($arquivoImg['size'] <= 0) {
    echo "O campo arquivo não foi enviado!"; 
    exit;
}

//Captura o nome e a extensão do arquivo
$arquivoNome = explode('.', $arquivoImg['name']);
$arquivoExtensao = $arquivoNome[1];

//A partir da extensão, o ideal é gerar um nome único para o arquivo a fim de encontrá-lo depois
//Exemplo: pode-se concatenar um identificador único do tipo UUID
$uuid = vsprintf( '%s%s-%s-%s-%s-%s%s%s', str_split(bin2hex(random_bytes(16)), 4) );
$nomeArquivoSalvar = "imagem_" . $uuid . "." . $arquivoExtensao;

//Salva o arquivo no diretório defindo em $PATH_ARQUIVOS
if (move_uploaded_file($arquivoImg["tmp_name"], $PATH_ARQUIVOS. "/" . $nomeArquivoSalvar)) { 
    echo "Arquivo enviado com sucesso!"; 
    echo "<br><br>";

    //Exibe um preview do arquivo na página
    echo "<img src='" . $PATH_ARQUIVOS. "/" . $nomeArquivoSalvar . 
        "' style='width: 300px; height: auto;'/>";

} else {
    //Caso não consega salvar, exibe o erro
    echo "Erro, o arquivo n&atilde;o pode ser enviado."; 
}
?>

<br><br>
<a href="imagem_form.php">Voltar</a>