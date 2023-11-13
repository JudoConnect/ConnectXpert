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