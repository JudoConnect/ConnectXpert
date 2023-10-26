function registrarFalta(idEncontro, idTurmaAluno) {
    //console.log(idEncontro + " - " + idTurmaAluno);

    //Cria um objeto XMLHttpRequest
    const xhttp = new XMLHttpRequest();

    //Método que será executado quando chegar a resposta da requisição
    xhttp.onload = function() {
        const resposta = xhttp.responseText;
        console.log(resposta);
    }

    var dados = new FormData();
    dados.append("id_encontro", idEncontro);
    dados.append("id_turma_aluno", idTurmaAluno);

    //Mandar a requisição
    xhttp.open("POST", "FrequenciaController.php?action=salvarFalta");
    xhttp.send(dados);
}

function registrarPresenca(idFrequencia) {

}