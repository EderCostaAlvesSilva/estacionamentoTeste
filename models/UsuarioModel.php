<?php


require_once "ConexaoBD.php";

class UsuarioModel {

    private $conexao;
    
    public function __construct() {
        $this->conexao = (new ConexaoBD())->conectar();
    }

    public function listarUsuarios(){
        $stmt = $this->conexao->prepare("SELECT * FROM usuario");
        $stmt->execute();
        $usuarios = $stmt->fetchAll(PDO::FETCH_ASSOC);

        return $usuarios;
    }

    public function criarUsuario($nome, $cpf, $email, $senha, $nivel_acesso) {
        try {
            $stmt = $this->conexao->prepare("INSERT INTO usuario (nome, cpf, email, senha, nivel_acesso, data_cadastro, data_alteracao, ultimo_acesso) 
                                             VALUES (:nome, :cpf, :email, :senha, :nivel_acesso, NOW(), NOW(), NOW())");
                                             
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->bindParam(':nivel_acesso', $nivel_acesso);
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            echo "Erro ao criar usuário: " . $e->getMessage();
            return false;
        }
    }

    public function buscarUsuarioId($id_usuario) {
        try {
            $stmt = $this->conexao->prepare("SELECT * FROM usuario WHERE id_usuario = :id_usuario");
            $stmt->bindParam(':id_usuario', $id_usuario);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $usuario;
        } catch(PDOException $e) {
            echo "Erro ao buscar usuário: " . $e->getMessage();
            return false;
        }
    }

    public function buscarUsuarioPorCpf($cpf) {
        try {
            $stmt = $this->conexao->prepare("SELECT * FROM usuario WHERE  cpf = :cpf ");
            $stmt->bindParam(':cpf', $cpf);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $usuario;
        } catch(PDOException $e) {
            echo "Erro ao buscar usuário: " . $e->getMessage();
            return false;
        }
    }

    public function buscarUsuarioPorEmail($email) {
        try {
            $stmt = $this->conexao->prepare("SELECT * FROM usuario WHERE email = :email");
            $stmt->bindParam(':email', $email);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $usuario;
        } catch(PDOException $e) {
            echo "Erro ao buscar usuário: " . $e->getMessage();
            return false;
        }
    }

    public function atualizarUsuario($id_usuario, $nome, $cpf, $email, $senha, $nivel_acesso) {
        try {
            $stmt = $this->conexao->prepare("UPDATE usuario SET nome = :nome, cpf = :cpf, email = :email, senha = :senha, nivel_acesso = :nivel_acesso, data_alteracao = NOW() WHERE id_usuario = :id_usuario");
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':cpf', $cpf);
            $stmt->bindParam(':email', $email);
            $stmt->bindParam(':senha', $senha);
            $stmt->bindParam(':nivel_acesso', $nivel_acesso);
            $stmt->bindParam(':id_usuario', $id_usuario);
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            echo "Erro ao atualizar usuário: " . $e->getMessage();
            return false;
        }
    }

    public function deletarUsuario($id_usuario) {
        try {
            $stmt = $this->conexao->prepare("DELETE FROM usuario WHERE id_usuario = :id_usuario");
            $stmt->bindParam(':id_usuario', $id_usuario);
            $stmt->execute();
            return true;
        } catch(PDOException $e) {
            echo "Erro ao deletar usuário: " . $e->getMessage();
            return false;
        }
    }

    public function login($nome, $senha) {
        try {
            $stmt = $this->conexao->prepare("SELECT * FROM usuario WHERE nome = :nome AND senha = :senha");
            $stmt->bindParam(':nome', $nome);
            $stmt->bindParam(':senha', $senha);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $usuario;
        } catch(PDOException $e) {
            echo "Erro ao buscar usuário: " . $e->getMessage();
            return false;
        }
    }
    
    
    
}
