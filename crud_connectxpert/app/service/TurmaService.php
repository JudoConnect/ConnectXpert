<?php
    
require_once(__DIR__ . "/../model/Turma.php");

class TurmaService {

    /* Método para validar os dados da turma que vem do formulário */
    public function validarDados(Turma $turma) {
        $erros = array();

        //Validar campos vazios
        if(! $turma->getNomeTurma())
            array_push($erros, "O campo Nome  é obrigatório.");
        
        if(! $turma->getNumAlunos())
            array_push($erros, "O campo Número de Alunos é obrigatório.");

        if(! $turma->getHorario())
            array_push($erros, "O campo Horario é obrigatório.");
        
        if(! $turma->getDiaSemana()) 
        array_push($erros, "O campo Dia da Semana é obrigatório.");

        return $erros;
    }

}
