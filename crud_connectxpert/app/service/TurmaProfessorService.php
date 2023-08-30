<?php
    
require_once(__DIR__ . "/../dao/TurmaProfessorDAO.php");

class TurmaProfessorService {

    private TurmaProfessorDAO $turmaProfDAO;

    public function __construct() {
        $this->turmaProfDAO = new TurmaProfessorDAO;        
    }

    /* Método para validar os dados da turma que vem do formulário */
    public function validarDados(int $idProfessor) {
        $erros = array();

        //Validar campos vazios
        if(! $idProfessor)
            array_push($erros, "O campo Professor é obrigatório.");
        
        return $erros;
    }

    /* Método para validar se o professor existe na turma */
    public function professorExisteTurma(int $idTurma, int $idProfessor) {
        $existe = $this->turmaProfDAO->findProfessorTurma($idTurma, $idProfessor);
        return $existe;
    }

}
