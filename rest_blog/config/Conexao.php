<?php

class Conexao {
    // Credenciais de conexão ao BD a serem utilizadas no PDO
    private $host = 'localhost';
    private $dbname = 'cu';
    private $user = 'root';
    private $password = '';

    // Variável que vai armazenar a conexão feita
    private $conexao;

    // Método que vai efetuar a conexão e retorná-la
    public function getConexao() {
        $this->conexao = null;
        try {
            $this->conexao = new PDO('mysql:host='.$this->host.';dbname='.$this->dbname, $this->user, $this->password);
        } catch(PDOException $e) {
            echo "Erro de conexão: ".$e->getMessage();
        }

        // Ao final, retorna a conexão efetuada
        return $this->conexao;
    }
}