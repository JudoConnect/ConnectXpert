<?php
    
require_once(__DIR__ . "/../model/Aluno.php");

class AlunoService {

    /* Método para validar os dados do aluno que vem do formulário */
    public function validarDados(Aluno $aluno, string $confSenhaAluno) {
        $erros = array();

        //Validar campos vazios
        if(! $aluno->getNomeAluno())
            array_push($erros, "O campo Nome do Aluno é obrigatório.");
        
        if(! $aluno->getNascimentoAluno())
            array_push($erros, "O campo Data de Nascimento é obrigatório.");

         if(! $aluno->getTelefone())
            array_push($erros, "O campo Telefone é obrigatório.");

        if(! $aluno->getNomeResponsavel())
            array_push($erros, "O campo Nome do Responsavel é obrigatório.");
        
        if(! $aluno->getSexoAluno()) 
            array_push($erros, "Selecione ao menos um sexo no campo.");
        
        if(! $aluno->getCpfAluno()) 
            array_push($erros, "O campo Cpf do Aluno é obrigatório.");

        if(! $aluno->getRgAluno()) 
            array_push($erros,  "O campo Rg do Aluno é obrigatório.");

        if(! $aluno->getEmailAluno()) 
            array_push($erros, "O campo Email do Aluno é obrigatório.");

        if(! $aluno->getLoginAluno())
            array_push($erros, "O campo Login é obrigatório.");

        if(! $aluno->getSenhaAluno())
            array_push($erros, "O campo Senha é obrigatório.");

        if(! $confSenhaAluno)
            array_push($erros, "O campo Confirmação da senha é obrigatório.");
        
        if(! $aluno->getEndRua()) 
            array_push($erros,  "O campo Rua é obrigatório.");

        if(! $aluno->getEndBairro()) 
            array_push($erros,  "O campo Bairro é obrigatório.");

        if(! $aluno->getEndCidade()) 
            array_push($erros,  "O campo Cidade  é obrigatório.");    
        
        if(! $aluno->getEndEstado()) 
            array_push($erros,  "O campo Estado  é obrigatório.");    

        if(! $aluno->getEndNumero()) 
            array_push($erros,  "O campo Número  é obrigatório.");    

    

        //Validar se a senha é igual a contra senha
        if($aluno->getSenhaAluno() && $confSenhaAluno && $aluno->getSenhaAluno() != $confSenhaAluno)
            array_push($erros, "O campo Senha Aluno deve ser igual ao Confirmação da senha aluno.");

        return $erros;
    }

}
