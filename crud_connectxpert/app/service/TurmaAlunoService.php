<?php
    
require_once(__DIR__ . "/../dao/TurmaAlunoDAO.php");

class TurmaAlunoService {

    private TurmaAlunoDAO $turmaAlunoDAO;

    public function __construct() {
        $this->turmaAlunoDAO = new TurmaAlunoDAO;        
    }

    /* Método para validar os dados da turma que vem do formulário */
    public function validarDados(int $idAluno) {
        $erros = array();

        //Validar campos vazios
        if(! $idAluno)
            array_push($erros, "O campo Aluno é obrigatório.");
        
        return $erros;
    }

    /* Método para validar se o aluno existe na turma */
    public function alunoExisteTurma(int $idTurma, int $idAluno) {
        $existe = $this->turmaAlunoDAO->findAlunoTurma($idTurma, $idAluno);
        return $existe;
    }

}
