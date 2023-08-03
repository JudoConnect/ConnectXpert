<?php
    
require_once(__DIR__ . "/../model/Produto.php");

class ProdutoService {

    /* Método para validar os dados de produto que vem do formulário */
    public function validarDados(Produto $produto, $foto) {
        $erros = array();

        //Validar campos vazios
        if(! $produto->getNome())
            array_push($erros, "O campo [Nome] é obrigatório.");

        if(! $produto->getDescricao())
            array_push($erros, "O campo [Descricao] é obrigatório.");

        if((! $produto->getFoto()) && $foto['size'] <= 0)
            array_push($erros, "O campo [Foto] é obrigatório.");

        if(! $produto->getSituacao()) 
        array_push($erros, "Selecione ao menos uma situação no campo.");

      
        return $erros;
    }

}
