<?php
    
require_once(__DIR__ . "/../model/Professor.php");

class ProfessorService {

    /* Método para validar os dados do professor que vem do formulário */
    public function validarDados(Professor $professor, string $confSenhaProfessor) {
        $erros = array();

        //Validar campos vazios
        if(! $professor->getNomeProfessor())
            array_push($erros, "O campo Nome do Professor é obrigatório.");
        
        if(! $professor->getNascimentoProfessor())
            array_push($erros, "O campo Data de Nascimento é obrigatório.");

         if(! $professor->getTelefoneProfessor())
            array_push($erros, "O campo Telefone é obrigatório.");
        
        if(! $professor->getSexoProfessor()) 
            array_push($erros, "Selecione ao menos um sexo no campo.");   

            if(! $professor->getCpfProfessor())
            array_push($erros, "O campo Cpf  é obrigatório.");

        if(! $professor->getRgProfessor())
            array_push($erros, "O campo Rg é obrigatório.");

        if(! $professor->getEmailProfessor())
            array_push($erros, "O campo Email  é obrigatório.");
            
        if(! $professor->getLoginProfessor())
            array_push($erros, "O campo Login é obrigatório.");

        if(! $professor->getSenhaProfessor())
            array_push($erros, "O campo Senha é obrigatório.");

        if(! $professor->getTipo())
            array_push($erros, "O campo Tipo é obrigatório.");

        if(! $confSenhaProfessor)
            array_push($erros, "O campo Confirmação da senha é obrigatório.");


        //Validar se a senha é igual a contra senha
        if($professor->getSenhaProfessor() && $confSenhaProfessor && $professor->getSenhaProfessor() != $confSenhaProfessor)
            array_push($erros, "O campo Senha deve ser igual ao Confirmação da senha Professor.");

        return $erros;
    }

}
