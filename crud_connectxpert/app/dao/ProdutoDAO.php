<?php
#Nome do arquivo: ProdutoDAO.php
#Objetivo: classe DAO para o model de Produto

include_once(__DIR__ . "/../connection/Connection.php");
include_once(__DIR__ . "/../model/Produto.php");

class ProdutoDAO {

    //Método para listar os produtos a partir da base de dados
    public function list() {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM produto p ORDER BY p.nome";
        $stm = $conn->prepare($sql);    
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->mapProduto($result);
    }

    public function listVitrine() {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM produto p ORDER BY p.situacao, p.nome";
        $stm = $conn->prepare($sql);    
        $stm->execute();
        $result = $stm->fetchAll();

        return $this->mapProduto($result);
    }

    //Método para buscar um produto por seu ID
    public function findProdutoById(int $idProduto) {
        $conn = Connection::getConn();

        $sql = "SELECT * FROM produto p" .
               " WHERE p.id_produto = ?";
        $stm = $conn->prepare($sql);    
        $stm->execute([$idProduto]);
        $result = $stm->fetchAll();

        $produto = $this->mapProduto($result);

        if(count($produto) == 1)
            return $produto[0];
        elseif(count($produto) == 0)
            return null;

        die("ProdutoDAO.findProdutoById()" . 
            " - Erro: mais de um produto encontrado.");
    }

    //Método para inserir um Produto
    public function insert(Produto $produto) {
        $conn = Connection::getConn();

        $sql = "INSERT INTO produto (nome, descricao, foto, situacao)" .
               " VALUES (:nome, :descricao, :foto, :situacao)";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("nome", $produto->getNome());
        $stm->bindValue("descricao", $produto->getDescricao());
        $stm->bindValue("foto", $produto->getFoto());
        $stm->bindValue("situacao", $produto->getSituacao());
        $stm->execute();
    }

    //Método para atualizar um Produto
    public function update(Produto $produto) {
        $conn = Connection::getConn();

        $sql = "UPDATE produto SET nome = :nome, descricao = :descricao," . 
               " foto = :foto, situacao = :situacao" .   
               " WHERE id_produto = :id";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("id", $produto->getIdProduto());
        $stm->bindValue("nome", $produto->getNome());
        $stm->bindValue("descricao", $produto->getDescricao());
        $stm->bindValue("foto", $produto->getFoto());
        $stm->bindValue("situacao", $produto->getSituacao());
        $stm->execute();
    }
    
    //Método para deletar um Produto pelo seu ID
    public function deleteById(int $idProduto) {
        $conn = Connection::getConn();

        $sql = "DELETE FROM produto WHERE id_produto = :id";
        
        $stm = $conn->prepare($sql);
        $stm->bindValue("id", $idProduto);
        $stm->execute();
    }
   
    //Método para converter um registro da base de dados em um objeto Produto
    private function mapProduto($result) {
        $produtos = array();
        foreach ($result as $reg) {
            $produto = new Produto();
            $produto->setIdProduto($reg['id_produto']);
            $produto->setNome($reg['nome']);
            $produto->setDescricao($reg['descricao']);
            $produto->setFoto($reg['foto']);
            $produto->setSituacao($reg['situacao']);
            
            array_push($produtos, $produto);
        }

        return $produtos;
    }

}