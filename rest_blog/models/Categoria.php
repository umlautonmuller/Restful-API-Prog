<?php

// Classe que manipula os dados da categoria

class Categoria {

    // Atributos correspondentes aos da tabela categoria
    public $id;
    public $nome;
    public $descricao;

    //Variável para a conexão
    private $conexao;

    // Sempre que um objeto é instanciado, já recebe a conexão
    public function __construct($con) {
        $this->conexao = $con;
    }

    // Faz uma consulta
    public function read($id = null) {
        if (isset($id)) {
            $query = "SELECT id, nome, descricao FROM categoria WHERE id = :id";
        } else {
            $query = "SELECT id, nome, descricao FROM categoria";
        }
        // Prepara a execução
        $stmt = $this->conexao->prepare($query);
        $stmt->bindParam('id', $id);
        // Executa a consulta
        $stmt->execute();
        // Transforma o resultado em um array
        $resultado = $stmt->fetchAll(PDO::FETCH_ASSOC);
        return $resultado;
    }

    public function create() {
        $query = "INSERT INTO categoria(nome, descricao) VALUES (:id, :nome, :descricao)";
        $stmt = $this->conexao->prepare($query);
        $stmt->execute([
            "nome" => $this->nome,
            "descricao" => $this->descricao
        ]);
    }
    
    public function update() {
        if(isset($id) && isset($nome) && isset($descricao)) {
            $query = "UPDATE categoria SET nome = :nome, descricao = :descricao WHERE id = :id";
            $stmt = $this->conexao->prepare($query);
            $stmt->execute([
                "id" => $this->id,
                "nome" => $this->nome,
                "descricao" => $this->descricao
            ]);
        }

        if(isset($id) && isset($nome) && !isset($descricao)) {
            $query = "UPDATE categoria SET nome = :nome WHERE id = :id";
            $stmt = $this->conexao->prepare($query);
            $stmt->execute([
                "id" => $this->id,
                "nome" => $this->nome
            ]);
        }

        if(isset($id) && !isset($nome) && isset($descricao)) {
            $query = "UPDATE categoria SET descricao = :descricao WHERE id = :id";
            $stmt = $this->conexao->prepare($query);
            $stmt->execute([
                "id" => $this->id,
                "descricao" => $this->descricao
            ]);
        }
    }

    public function delete() {
        if(isset($id)) {
            $query = "DELETE FROM categoria WHERE id = :id";
            $stmt = $this->conexao->prepare($query);
            $stmt->execute([
                "id" => $this->id
            ]);
        }
    }
}