<?php

class ConexaoBD {

private $host = "localhost";
private $usuario = "root";
private $senha = "94836";
private $dbname = "estacionamento";

public function conectar() {
    try {
        $dsn = "mysql:host={$this->host};dbname={$this->dbname}";
        $conexao = new PDO($dsn, $this->usuario, $this->senha);
        $conexao->setAttribute(PDO::ATTR_ERRMODE, PDO::ERRMODE_EXCEPTION);
        $conexao->setAttribute(PDO::ATTR_DEFAULT_FETCH_MODE, PDO::FETCH_ASSOC);
        return $conexao;
    } catch(PDOException $e) {
        echo "Erro ao conectar ao banco de dados: " . $e->getMessage();
        exit;
    }
}
}
