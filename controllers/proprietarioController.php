<?php

require_once "../../models/ProprietarioModel.php";

class ProprietarioController
{
    private $ProprietarioModel;

    public function __construct()
    {
        $this->ProprietarioModel = new ProprietarioModel();
    }

    public function criarProprietario()
    {
        if (isset($_POST['enviarProp'])) {
            // Verifica se os campos foram preenchidos
            if (empty($_POST['nome']) || empty($_POST['cpf']) || empty($_POST['email']) || empty($_POST['celular']) || empty($_POST['status'])) {
                echo '<script>alert("Por favor, preencha todos os campos."); window.location.href = "create.php";</script>';

            }

            // Sanitiza os inputs
            $nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
            $cpf = filter_var($_POST['cpf'], FILTER_SANITIZE_STRING);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $celular = filter_var($_POST['celular'], FILTER_SANITIZE_STRING);
            $status = filter_var($_POST['status'], FILTER_SANITIZE_STRING);

            // Verifica se o e-mail é válido
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo '<script>alert("Por favor, digite um e-mail válido."); window.location.href = "create.php";</script>';
            }

            // Verifica se o e-mail já existe no banco de dados
            $propietario = $this->ProprietarioModel->buscarProprietarioPorEmail($email);
            if ($propietario) {
                echo '<script>alert("Este e-mail já está cadastrado. Por favor, utilize outro e-mail."); window.location.href = "create.php";</script>';
            }

            // Verifica se o e-mail já existe no banco de dados
            $propietario = $this->ProprietarioModel->buscarProprietarioPorCpf($cpf);
            if ($propietario) {
                echo '<script>alert("Este CPF já está cadastrado. Por favor, utilize outro CPF."); window.location.href = "create.php";</script>';
            }

            // Verifica se o celular já existe no banco de dados
            $propietario = $this->ProprietarioModel->buscarProprietarioPorcCelular($celular);
            if ($propietario) {
                echo '<script>alert("Este celular já está cadastrado. Por favor, utilize outro celular."); window.location.href = "create.php";</script>';
            }

            // Cria o propietario
            $resultado = $this->ProprietarioModel->criarProprietario($nome, $cpf, $email, $celular, $status);
            if (!$resultado) {
                echo '<script>alert("erro ao criar."); window.location.href = "create.php";</script>';
                
            } else {
                echo '<script>alert("proprietario cadastrado"); window.location.href = "create.php";</script>';
            }
        }
    }

    public function buscarProprietario($id)
    {
        $usuario = $this->ProprietarioModel->buscarProprietario($id);

        return $usuario;

    }

    public function atualizarProprietario()
    {
        if (isset($_POST['editar'])) {
            // Verifica se os campos foram preenchidos
            if (empty($_POST['id_proprietario']) || empty($_POST['nome']) || empty($_POST['cpf']) || empty($_POST['email']) || empty($_POST['celular']) || empty($_POST['status'])) {
                echo '<script>alert("Por favor, preencha todos os campos."); window.location.href = "edit.php?id=' . $_POST['id_proprietario'] . '";</script>';

            }

            // Sanitiza os inputs
            $nome = filter_var($_POST['nome'], FILTER_SANITIZE_STRING);
            $celular = filter_var($_POST['celular'], FILTER_SANITIZE_STRING);
            $status = filter_var($_POST['status'], FILTER_SANITIZE_STRING);
            $cpf = filter_var($_POST['cpf'], FILTER_SANITIZE_STRING);
            $email = filter_var($_POST['email'], FILTER_SANITIZE_EMAIL);
            $id = filter_var($_POST['id_proprietario'], FILTER_SANITIZE_NUMBER_INT);

            // Verifica se o e-mail é válido
            if (!filter_var($email, FILTER_VALIDATE_EMAIL)) {
                echo '<script>alert("Por favor, digite um e-mail válido."); window.location.href = "edit.php?id=' . $_POST['id_proprietario'] . '";</script>';
            }

            // atualiza o usuário
            $resultado = $this->ProprietarioModel->atualizarProprietario($id, $nome, $cpf, $email, $celular, $status);
            if (!$resultado) {
                echo '<script>alert("erro ao atualizar proprietario"); window.location.href = "edit.php?id=' . $_POST['id_proprietario'] . '";</script>';
            } else {
                echo '<script>alert("Usuario Atualizado"); window.location.href = "index.php";</script>';
            }
        }
    }

    public function listarProprietario()
    {
        // Lista todos os usuários
        $proprietario = $this->ProprietarioModel->listarProprietario();
        return $proprietario;
    }

    public function deletarproprietario()
    {
        if (isset($_POST['delete'])) { // Sanitiza o input
            $id = filter_var($_POST['id_proprietario'], FILTER_SANITIZE_NUMBER_INT);
            
            // Deleta o usuário
            $resultado = $this->ProprietarioModel->deletarproprietario($id);
            if ($resultado) {
                echo '<script>alert("proprietario deletado"); window.location.href = "index.php";</script>';
            }
        }
    }
}