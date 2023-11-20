<?php
#Nome do arquivo: AlunoDAO.php
#Objetivo: classe DAO para o model de Aluno

include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../model/Aluno.php");

class AlunoDAO {

    //Método para listar os alunos a partir da base de dados
    public function list() {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM aluno  AS a ORDER BY nome_aluno";
        $stm = $conn->prepare($sql);    
        $stm->execute();
        $result = $stm->fetchAll();
        
        return $this->mapAlunos($result);
    }

    public function listAtivos() {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM aluno  AS a WHERE a.situacao = 'disponivel' ORDER BY nome_aluno";
        $stm = $conn->prepare($sql);    
        $stm->execute();
        $result = $stm->fetchAll();
        
        return $this->mapAlunos($result);
    }

    //Método para buscar um aluno por seu ID
    public function findById(int $id) {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM aluno a" .
               " WHERE a.id_aluno = ?";
        $stm = $conn->prepare($sql);    
        $stm->execute([$id]);
        $result = $stm->fetchAll();

        $alunos = $this->mapAlunos($result);

        if(count($alunos) == 1)
            return $alunos[0];
        elseif(count($alunos) == 0)
            return null;

        die("AlunoDAO.findById()" . 
            " - Erro: mais de um aluno encontrado.");
    }

      //Método para buscar os alunos da turma;
      public function listByTurma(int $idTurma) {
        $conn = Connection::getConn();

        $sql = "SELECT a.*, ta.id_turma_aluno
                FROM turma_aluno ta
                JOIN aluno a ON (a.id_aluno = ta.id_aluno)
                WHERE ta.id_turma = ?";
        $stm = $conn->prepare($sql);    
        $stm->execute([$idTurma]);
        $result = $stm->fetchAll();           

        $alunos = $this->mapAlunos($result);

        return $alunos;
    }



    //Método para buscar um aluno por seu login e senha
    public function findByLoginSenha(string $login_aluno, string $senha_aluno) {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM aluno a" .
               " WHERE a.login_aluno = ? AND a.senha_aluno = ?";
        $stm = $conn->prepare($sql);    
        $stm->execute([$login_aluno, $senha_aluno]);
        $result = $stm->fetchAll();

        $alunos = $this->mapAlunos($result);

        if(count($alunos) == 1)
            return $alunos[0];
        elseif(count($alunos) == 0)
            return null;

        die("AlunoDAO.findByLoginSenha()" . 
            " - Erro: mais de um aluno encontrado.");
    }

    //Método para inserir um Aluno
    public function insert(Aluno $aluno) {
        $conn = Connection::getConn();

        $sql = "INSERT INTO aluno (nome_aluno,nascimento_aluno,telefone,nome_responsavel,sexo_aluno, cpf_aluno, rg_aluno, email_aluno, login_aluno, senha_aluno, historico, id_ie, end_rua, end_bairro, end_cidade, end_estado, end_numero, end_complemento, situacao, foto) " .
               " VALUES (:nome_aluno, :nascimento_aluno, :telefone, :nome_responsavel, :sexo_aluno, :cpf_aluno, :rg_aluno, :email_aluno, :login_aluno, :senha_aluno, :historico,:id_ie, :end_rua,:end_bairro, :end_cidade,:end_estado, :end_numero,:end_complemento, :situacao, :foto)";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("nome_aluno", $aluno->getNomeAluno());
        $stm->bindValue("nascimento_aluno", $aluno->getNascimentoAluno());
        $stm->bindValue("telefone", $aluno->getTelefone());
        $stm->bindValue("nome_responsavel", $aluno->getNomeResponsavel());
        $stm->bindValue("sexo_aluno", $aluno->getSexoAluno());
        $stm->bindValue("cpf_aluno", $aluno->getCpfAluno());
        $stm->bindValue("rg_aluno", $aluno->getRgAluno());
        $stm->bindValue("email_aluno", $aluno->getEmailAluno());
        $stm->bindValue("login_aluno", $aluno->getLoginAluno());
        $stm->bindValue("senha_aluno", $aluno->getSenhaAluno());
        $stm->bindValue("historico", $aluno->getHistorico());
        $stm->bindValue("id_ie", $aluno->getidIe());
        $stm->bindValue("end_rua", $aluno->getEndRua());
        $stm->bindValue("end_bairro", $aluno->getEndBairro());
        $stm->bindValue("end_cidade", $aluno->getEndCidade());
        $stm->bindValue("end_estado", $aluno->getEndEstado()); 
        $stm->bindValue("end_numero", $aluno->getEndNumero());
        $stm->bindValue("end_complemento", $aluno->getEndComplemento());
        $stm->bindValue("situacao", $aluno->getSituacao());
        $stm->bindValue("foto", $aluno->getFoto());

        $stm->execute();
    }

    //Método para atualizar um Aluno
    public function update(Aluno $aluno) {
        $conn = Connection::getConn();

        $sql = "UPDATE aluno SET nome_aluno = :nome_aluno, nascimento_aluno = :nascimento_aluno," . 
        " telefone = :telefone, nome_responsavel = :nome_responsavel, sexo_aluno = :sexo_aluno, cpf_aluno = :cpf_aluno, rg_aluno = :rg_aluno," . 
        " email_aluno = :email_aluno, login_aluno = :login_aluno, senha_aluno = :senha_aluno, historico = :historico, id_ie = :id_ie," .   
        " end_rua = :end_rua, end_bairro = :end_bairro, end_cidade = :end_cidade, end_estado = :end_estado, end_numero = :end_numero, end_complemento = :end_complemento, situacao = :situacao, foto = :foto" .
        " WHERE id_aluno = :id_aluno";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("nome_aluno", $aluno->getNomeAluno());
        $stm->bindValue("nascimento_aluno", $aluno->getNascimentoAluno());
        $stm->bindValue("telefone", $aluno->getTelefone());
        $stm->bindValue("nome_responsavel", $aluno->getNomeResponsavel());
        $stm->bindValue("sexo_aluno", $aluno->getSexoAluno());
        $stm->bindValue("cpf_aluno", $aluno->getCpfAluno());
        $stm->bindValue("rg_aluno", $aluno->getRgAluno());
        $stm->bindValue("email_aluno", $aluno->getEmailAluno());
        $stm->bindValue("login_aluno", $aluno->getLoginAluno());
        $stm->bindValue("senha_aluno", $aluno->getSenhaAluno());
        $stm->bindValue("historico", $aluno->getHistorico());
        $stm->bindValue("id_ie", $aluno->getIdIe());
        $stm->bindValue("end_rua", $aluno->getEndRua());
        $stm->bindValue("end_bairro", $aluno->getEndBairro());
        $stm->bindValue("end_cidade", $aluno->getEndCidade());
        $stm->bindValue("end_estado", $aluno->getEndEstado());
        $stm->bindValue("end_numero", $aluno->getEndNumero());
        $stm->bindValue("end_complemento", $aluno->getEndComplemento());
        $stm->bindValue("situacao", $aluno->getSituacao());
        $stm->bindValue("foto", $aluno->getFoto());
        $stm->bindValue("id_aluno", $aluno->getIdAluno());
        
        $stm->execute();
    }

    //Método para excluir um Aluno pelo seu ID
    public function deleteById(int $id) {
        $conn = Connection::getConn();

        $sql = "DELETE FROM aluno WHERE id_aluno = :id_aluno";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("id_aluno", $id);
        $stm->execute();
    }

    //Método para converter um registro da base de dados em um objeto Aluno
    private function mapAlunos($result) {
        $alunos = array();
        foreach ($result as $reg) {
            $aluno = new Aluno();
            $aluno->setIdAluno($reg['id_aluno']);
            $aluno->setNomeAluno($reg['nome_aluno']);
            $aluno->setNascimentoAluno($reg['nascimento_aluno']);
            $aluno->setTelefone($reg['telefone']);
            $aluno->setNomeResponsavel($reg['nome_responsavel']);
            $aluno->setSexoAluno($reg['sexo_aluno']);
            $aluno->setCpfAluno($reg['cpf_aluno']);
            $aluno->setRgAluno($reg['rg_aluno']);
            $aluno->setEmailAluno($reg['email_aluno']);
            $aluno->setLoginAluno($reg['login_aluno']);
            $aluno->setSenhaAluno($reg['senha_aluno']);
            $aluno->setHistorico($reg['historico']);
            $aluno->setEndRua($reg['end_rua']);
            $aluno->setEndBairro($reg['end_bairro']);
            $aluno->setEndCidade($reg['end_cidade']);
            $aluno->setEndEstado($reg['end_estado']);
            $aluno->setEndNumero($reg['end_numero']);
            $aluno->setEndComplemento($reg['end_complemento']);
            $aluno->setSituacao($reg['situacao']);
            $aluno->setFoto($reg['foto']);
            $aluno->setIdIe($reg['id_ie']);

            if(isset($reg['id_turma_aluno']))
            $aluno->setIdTurmaAluno($reg['id_turma_aluno']);

            array_push($alunos, $aluno);
        }

        return $alunos;
    }

}