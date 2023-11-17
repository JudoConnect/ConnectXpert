<?php
    
require_once(__DIR__ . "/../model/administrador.php");

class administradorService {

    /* Método para validar os dados do usuário que vem do formulário */
    public function validarDados(administrador $administrador, string $confSenha) {
        $erros = array();

        //Validar campos vazios
        if(! $administrador->getNome())
            array_push($erros, "O campo Nome é obrigatório.");

        if(! $administrador->getLogin())
            array_push($erros, "O campo Login é obrigatório.");

        if(! $administrador->getSenha())
            array_push($erros, "O campo Senha é obrigatório.");

        if(! $confSenha)
            array_push($erros, "O campo Confirmação da senha é obrigatório.");

        if(! $administrador->getPapeis()) 
            array_push($erros, "Selecione ao menos um papel no campo Papéis do usuário.");


        //Validar se a senha é igual a contra senha
        if($administrador->getSenha() && $confSenha && $administrador->getSenha() != $confSenha)
            array_push($erros, "O campo Senha deve ser igual ao Confirmação da senha.");

        return $erros;
    }

}
