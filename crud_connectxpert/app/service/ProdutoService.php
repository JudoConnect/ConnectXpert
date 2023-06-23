<?php
    
require_once(__DIR__ . "/../model/Produto.php");

class ProdutoService {

    /* Método para validar os dados de produto que vem do formulário */
    public function validarDados(Produto $produto,) {
        $erros = array();

        //Validar campos vazios
        if(! $produto->getNome())
            array_push($erros, "O campo [Nome] é obrigatório.");

        if(! $produto->getDescricao())
            array_push($erros, "O campo [Descricao] é obrigatório.");

        //if(! $produto->getFoto())
        //    array_push($erros, "O campo [Foto] é obrigatório.");



      
        return $erros;
    }

}
