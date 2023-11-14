function mascTelefone1(e){
    e.value="(";

}
function mascTelefone2(e){
    var qtd=e.value.length;
    if(qtd==3)
       e.value+=")";
    else if(qtd==9)   
       e.value+="-";
}

function mascCpf(e){
    var qtd=e.value.length;
    if(qtd==3)
       e.value+=".";
    else if(qtd==7)   
       e.value+=".";
       if(qtd==11)
       e.value+="-";
}

function mascRg(e){
    var qtd=e.value.length;
    if(qtd==2)
       e.value+=".";
    else if(qtd==6)   
       e.value+=".";
       if(qtd==10)
       e.value+="-";
}

function mascHorario(e){
    var qtd=e.value.length;
    if(qtd==2)
       e.value+=":";
}