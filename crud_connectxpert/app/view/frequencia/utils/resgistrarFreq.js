
function registrarFalta(idFrequencia) {
    //console.log(idEncontro + " - " + idTurmaAluno);

    botao = document.getElementById("frequencia"+idFrequencia);

    frequencia = botao.innerHTML;
    //Cria um objeto XMLHttpRequest
    const xhttp = new XMLHttpRequest();
    frequencia =  frequencia.trim();
    //Método que será executado quando chegar a resposta da requisição
    xhttp.onload = function() {
        const resposta = xhttp.responseText;
        mudarBotao(botao);
    }

    var dados = new FormData();

    dados.append("idFrequencia", idFrequencia);
    dados.append("frequencia", frequencia);

    //Mandar a requisição
    xhttp.open("POST", "FrequenciaController.php?action=mudarEstado");
    xhttp.send(dados);
}

function mudarBotao(botao) {
    frequencia = botao.innerHTML;
    frequencia = frequencia.trim();

    if(frequencia == "presente") {
        botao.innerHTML = "ausente";
        botao.className = "btn btn-outline-danger";
    }
    else {
        botao.innerHTML = "presente";
        botao.className = "btn btn-outline-success";

    }
}