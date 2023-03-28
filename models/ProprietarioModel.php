<?php


require_once "ConexaoBD.php";

class ProprietarioModel{

    private $conexao;
    
    public function __construct() {
        $this->conexao = (new ConexaoBD())->conectar();
    }

    public function listarProprietario(){
        $stmt = $this->conexao->prepare("SELECT * FROM proprietario");
        $stmt->execute();
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $usuarios;
    }

    public function criarProprietario($nome, $cpf, $email, $celular, $status) {
        try {
            $stmt = $this->conexao->prepare("INSERT INTO proprietario (nome, cpf, email, celular, status, data_cadastro, data_alteracao) 
                                             VALUES (:nome, :cpf, :email, :celular, :status, NOW(), NOW())");
                                             
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':celular', $celular);
            $stmt->bindParam(':status', $status);
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            echo "Erro ao criar usuário: " . $e->getMessage();
            return false;
        }
    }

    public function buscarProprietario($id_proprietario) {
        try {
            $stmt = $this->conexao->prepare("SELECT * FROM proprietario WHERE id_proprietario = :id_proprietario");
            $stmt->bindParam(':id_proprietario', $id_proprietario);
            $stmt->execute();
            $proprietario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $proprietario;
        } catch(PDOException $e) {
            echo "Erro ao buscar usuário: " . $e->getMessage();
            return false;
        }
    }

    public function buscarProprietarioPorCpf($cpf) {
        try {
            $stmt = $this->conexao->prepare("SELECT * FROM proprietario WHERE  cpf = :cpf ");
            $stmt->bindParam(':cpf', $cpf);
            $stmt->execute();
            $proprietario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $proprietario;
        } catch(PDOException $e) {
            echo "Erro ao buscar proprietario: " . $e->getMessage();
            return false;
        }
    }

    public function buscarProprietarioPorcCelular($celular) {
        try {
            $stmt = $this->conexao->prepare("SELECT * FROM proprietario WHERE  celular = :celular ");
            $stmt->bindParam(':celular', $celular);
            $stmt->execute();
            $proprietario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $proprietario;
        } catch(PDOException $e) {
            echo "Erro ao buscar proprietario: " . $e->getMessage();
            return false;
        }
    }

    public function buscarProprietarioPorEmail($email) {
        try {
            $stmt = $this->conexao->prepare("SELECT * FROM proprietario WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $proprietario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $proprietario;
        } catch(PDOException $e) {
            echo "Erro ao buscar proprietario: " . $e->getMessage();
            return false;
        }
    }

    public function atualizarProprietario($id_proprietario, $nome, $cpf, $email, $celular, $status) {
        try {
            $stmt = $this->conexao->prepare("UPDATE proprietario SET nome = :nome, cpf = :cpf, email = :email, celular = :celular, status = :status, data_alteracao = NOW() WHERE id_proprietario = :id_proprietario");
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':celular', $celular);
            $stmt->bindParam(':status', $status);
            $stmt->bindParam(':id_proprietario', $id_proprietario);
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            echo "Erro ao atualizar proprietario: " . $e->getMessage();
            return false;
        }
    }

    public function deletarproprietario($id_proprietario) {
        try {
            $stmt = $this->conexao->prepare("DELETE FROM proprietario WHERE id_proprietario = :id_proprietario");
            $stmt->bindParam(':id_proprietario', $id_proprietario);
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            echo "Erro ao deletar proprietario: " . $e->getMessage();
            return false;
        }
    }
}
