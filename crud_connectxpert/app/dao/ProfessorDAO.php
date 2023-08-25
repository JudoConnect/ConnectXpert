<?php
#Nome do arquivo: ProfessorDAO.php
#Objetivo: classe DAO para o model de Professor

include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../model/Professor.php");

class ProfessorDAO {

    //Método para listar os professores a partir da base de dados
    public function list() {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM professor AS p ORDER BY nome_professor";
        $stm = $conn->prepare($sql);    
        $stm->execute();
        $result = $stm->fetchAll();
        
        return $this->mapProfessores($result);
    }

    //Método para buscar um professor por seu ID
    public function findById(int $id) {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM professor p" .
               " WHERE p.id_professor = ?";
        $stm = $conn->prepare($sql);    
        $stm->execute([$id]);
        $result = $stm->fetchAll();

        $professores = $this->mapProfessores($result);

        if(count($professores) == 1)
            return $professores[0];
        elseif(count($professores) == 0)
            return null;

        die("ProfessorDAO.findById()" . 
            " - Erro: mais de um professor encontrado.");
    }

        //Método para buscar um professor por seu ID
        public function findByTurma(int $id) {
            $conn = Connection::getConn();

            /*SELECT * FROM `turma`
            JOIN `turma_professor`
            ON turma.id_turma = turma_professor.id_turma
            JOIN `professor`
            ON professor.id_professor = turma_professor.id_professor

            WHERE turma.id_turma = ?*/
    
            $sql = "SELECT * FROM professor p" .
                   " WHERE p.id_professor = ?";
            $stm = $conn->prepare($sql);    
            $stm->execute([$id]);
            $result = $stm->fetchAll();
    
            $professores = $this->mapProfessores($result);
    
            if(count($professores) == 1)
                return $professores[0];
            elseif(count($professores) == 0)
                return null;
    
            die("ProfessorDAO.findById()" . 
                " - Erro: mais de um professor encontrado.");
        }


    //Método para buscar um professor por seu login e senha
    public function findByLoginSenha(string $login_professor, string $senha_professor) {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM professor p" .
               " WHERE p.login_professor = ? AND p.senha_professor = ?";
        $stm = $conn->prepare($sql);    
        $stm->execute([$login_professor, $senha_professor]);
        $result = $stm->fetchAll();

        $professores = $this->mapProfessores($result);

        if(count($professores) == 1)
            return $professores[0];
        elseif(count($professores) == 0)
            return null;

        die("ProfessorDAO.findByLoginSenha()" . 
            " - Erro: mais de um professor encontrado.");
    }

    //Método para inserir um Professor
    public function insert(Professor $professor) {
        $conn = Connection::getConn();

        $sql = "INSERT INTO professor (nome_professor, nascimento_professor, telefone_professor, sexo_professor, cpf_professor, rg_professor, email_professor, login_professor, senha_professor, tipo, foto)" .
        " VALUES (:nome_professor, :nascimento_professor, :telefone_professor, :sexo_professor, :cpf_professor, :rg_professor, :email_professor, :login_professor, :senha_professor, :tipo, :foto)";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("nome_professor", $professor->getNomeProfessor());
        $stm->bindValue("nascimento_professor", $professor->getNascimentoProfessor());
        $stm->bindValue("telefone_professor", $professor->getTelefoneProfessor());
        $stm->bindValue("sexo_professor", $professor->getSexoProfessor());
        $stm->bindValue("cpf_professor", $professor->getCpfProfessor());
        $stm->bindValue("rg_professor", $professor->getRgProfessor());
        $stm->bindValue("email_professor", $professor->getEmailProfessor());
        $stm->bindValue("login_professor", $professor->getLoginProfessor());
        $stm->bindValue("senha_professor", $professor->getSenhaProfessor());
        $stm->bindValue("tipo", $professor->getTipo());
        $stm->bindValue("foto", $professor->getFotoProfessor());

        $stm->execute();
    }

    //Método para atualizar um Professor
    public function update(Professor $professor) {
        $conn = Connection::getConn();

        $sql = "UPDATE professor SET nome_professor = :nome_professor, nascimento_professor = :nascimento_professor," . 
               " telefone_professor = :telefone_professor, sexo_professor = :sexo_professor, cpf_professor = :cpf_professor," .   
               " rg_professor = :rg_professor, email_professor = :email_professor, login_professor = :login_professor, senha_professor = :senha_professor," .
               " tipo = :tipo, foto = :foto" .
               " WHERE id_professor = :id_professor";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("id_professor", $professor->getIdProfessor());
        $stm->bindValue("nome_professor", $professor->getNomeProfessor());
        $stm->bindValue("nascimento_professor", $professor->getNascimentoProfessor());
        $stm->bindValue("telefone_professor", $professor->getTelefoneProfessor());
        $stm->bindValue("sexo_professor", $professor->getSexoProfessor());
        $stm->bindValue("cpf_professor", $professor->getCpfProfessor());
        $stm->bindValue("rg_professor", $professor->getRgProfessor());
        $stm->bindValue("email_professor", $professor->getEmailProfessor());
        $stm->bindValue("login_professor", $professor->getLoginProfessor());
        $stm->bindValue("senha_professor", $professor->getSenhaProfessor());
        $stm->bindValue("tipo", $professor->getTipo());
        $stm->bindValue("foto", $professor->getFotoProfessor());

        $stm->execute();
    }

    //Método para excluir um Professor pelo seu ID
    public function deleteById(int $id) {
        $conn = Connection::getConn();

        $sql = "DELETE FROM professor WHERE id_professor = :id_professor";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("id_professor", $id);
        $stm->execute();
    }

    //Método para converter um registro da base de dados em um objeto Professor
    private function mapProfessores($result) {
        $professores = array();
        foreach ($result as $reg) {
            $professor = new Professor();
            $professor->setIdProfessor($reg['id_professor']);
            $professor->setNomeProfessor($reg['nome_professor']);
            $professor->setNascimentoProfessor($reg['nascimento_professor']);
            $professor->setTelefoneProfessor($reg['telefone_professor']);
            $professor->setSexoProfessor($reg['sexo_professor']);
            $professor->setCpfProfessor($reg['cpf_professor']);
            $professor->setRgProfessor($reg['rg_professor']);
            $professor->setEmailProfessor($reg['email_professor']);
            $professor->setLoginProfessor($reg['login_professor']);
            $professor->setSenhaProfessor($reg['senha_professor']);
            $professor->setTipo($reg['tipo']);
            $professor->setFotoProfessor($reg['foto']);

            array_push($professores, $professor);
        }

        return $professores;
    }

}