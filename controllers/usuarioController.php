<?php

require_once "../../models/UsuarioModel.php";

class UsuarioController
{
    private $usuarioModel;

    public function __construct()
    {
        $this->usuarioModel = new UsuarioModel();
    }

    public function criarUsuario()
    {
        if (isset($_POST['enviar'])) {
            // Verifica se os campos foram preenchidos
            if (empty($_POST['nome']) || empty($_POST['cpf']) || empty($_POST['email']) || empty($_POST['senha']) || empty($_POST['nivel_acesso'])) {
                echo '<script>alert("Por favor, preencha todos os campos."); window.location.href = "create.php";</script>';

            }

            // Sanitiza os inputs
            $nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
            $cpf = filter_var($_POST['cpf'], FILTER_SANITIZE_STRING);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);

            // Verifica se o e-mail é válido
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo '<script>alert("Por favor, digite um e-mail válido."); window.location.href = "create.php";</script>';
            }

            // Verifica se o e-mail já existe no banco de dados
            $usuario = $this->usuarioModel->buscarUsuarioPorEmail($email);
            if ($usuario) {
                echo '<script>alert("Este e-mail já está cadastrado. Por favor, utilize outro e-mail."); window.location.href = "create.php";</script>';
            }

            // Verifica se o e-mail já existe no banco de dados
            $usuario = $this->usuarioModel->buscarUsuarioPorCpf($cpf);
            if ($usuario) {
                echo '<script>alert("Este CPF já está cadastrado. Por favor, utilize outro CPF."); window.location.href = "create.php";</script>';
            }

            // Verifica se a senha é forte o suficiente
            if (strlen($_POST['senha']) < 6 || !preg_match("#[0-9]+#", $_POST['senha']) || !preg_match("#[a-zA-Z]+#", $_POST['senha'])) {

                echo '<script>alert("A senha deve conter no mínimo 8 caracteres, incluindo números e letras."); window.location.href = "create.php";</script>';
            }

            // Cria o usuário
            $resultado = $this->usuarioModel->criarUsuario($nome, $cpf, $email, $_POST['senha'], $_POST['nivel_acesso']);
            if (!$resultado) {
                echo '<script>alert("erro ao criar usuario"); window.location.href = "create.php";</script>';
            } else {
                echo '<script>alert("Usuario cadastrado"); window.location.href = "index.php";</script>';
            }
        }
    }

    public function bucarUsuarioId($id)
    {
        $usuario = $this->usuarioModel->buscarUsuarioId($id);

        return $usuario;

    }

    public function atualizarUsuario()
    {
        if (isset($_POST['editar'])) {
            // Verifica se os campos foram preenchidos
            if (empty($_POST['id_usuario']) || empty($_POST['nome']) || empty($_POST['cpf']) || empty($_POST['email']) || empty($_POST['senha']) || empty($_POST['nivel_acesso'])) {
                echo '<script>alert("Por favor, preencha todos os campos."); window.location.href = "edit.php?id=' . $_POST['id_usuario'] . '";</script>';

            }

            // Sanitiza os inputs
            $nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
            $cpf = filter_var($_POST['cpf'], FILTER_SANITIZE_STRING);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $id = filter_var($_POST['id_usuario'], FILTER_SANITIZE_NUMBER_INT);

            // Verifica se o e-mail é válido
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo '<script>alert("Por favor, digite um e-mail válido."); window.location.href = "edit.php?id=' . $_POST['id_usuario'] . '";</script>';
            }

            // Verifica se a senha é forte o suficiente
            if (strlen($_POST['senha']) < 6 || !preg_match("#[0-9]+#", $_POST['senha']) || !preg_match("#[a-zA-Z]+#", $_POST['senha'])) {

                echo '<script>alert("A senha deve conter no mínimo 8 caracteres, incluindo números e letras."); window.location.href = ""edit.php?id=' . $_POST['id_usuario'] . '";</script>';
            }

            // atualiza o usuário
            $resultado = $this->usuarioModel->atualizarUsuario($id, $nome, $cpf, $email, $_POST['senha'], $_POST['nivel_acesso']);
            if (!$resultado) {
                echo '<script>alert("erro ao atualizar usuario"); window.location.href = "edit.php?id=' . $_POST['id_usuario'] . '";</script>';
            } else {
                echo '<script>alert("Usuario Atualizado"); window.location.href = "index.php";</script>';
            }
        }
    }

    public function listarUsuarios()
    {
        // Lista todos os usuários
        $usuarios = $this->usuarioModel->listarUsuarios();
        return $usuarios;
    }

    public function deletarUsuario()
    {
        if (isset($_POST['delete'])) { // Sanitiza o input
            $id = filter_var($_POST['id_usuario'], FILTER_SANITIZE_NUMBER_INT);

            // Deleta o usuário
            $resultado = $this->usuarioModel->deletarUsuario($id);
            if ($resultado) {
                echo '<script>alert("Usuario deletado"); window.location.href = "index.php";</script>';
            }
        }
    }

    public function login()
    {
        if (isset($_POST['logar'])) {
            if (!empty($_POST['nome']) && !empty($_POST['senha'])) {
                $nome = filter_input(INPUT_POST, 'nome', FILTER_SANITIZE_STRING);
                $senha = filter_input(INPUT_POST, 'senha', FILTER_SANITIZE_STRING);

                $usuario = $this->usuarioModel->login($nome, $senha);
                if ($usuario) {
                    //Seta a sessão do usuário
                    $_SESSION['usuario'] = $usuario;
                    echo '<script>alert("Bem vindo"); window.location.href = "home.php";</script>';

                    exit;
                } else {
                    echo '<script>alert("error nos campos inseridos"); window.location.href = "index.php";</script>';

                }

            } else{
                echo '<script>alert("Insira todos os campos"); window.location.href = "index.php";</script>';

            }
        }

    }

        


}