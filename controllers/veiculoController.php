<?php

require_once "../../models/VeiculoModel.php";

class VeiculoController
{
    private $VeiculoModel;

    public function __construct()
    {
        $this->VeiculoModel = new VeiculoModel();
    }

    public function listarVeiculoProprietario() {
        $veiculos = $this->VeiculoModel->listarVeiculoProprietario();
        return $veiculos;
    }
    
    public function criarVeiculo()
    {
        if (isset($_POST['enviarVei'])) {
            // Verifica se os campos foram preenchidos
            if (empty($_POST['marca']) || empty($_POST['modelo']) || empty($_POST['placa']) || empty($_POST['proprietario'])) {
                echo '<script>alert("Por favor, preencha todos os campos."); window.location.href = "create.php";</script>';

            }

            // Sanitiza os inputs
            $marca = filter_var($_POST['marca'], FILTER_SANITIZE_STRING);
            $modelo = filter_var($_POST['modelo'], FILTER_SANITIZE_STRING);
            $placa = filter_var($_POST['placa'], FILTER_SANITIZE_STRING);
            $proprietario =intval(filter_var($_POST['proprietario'], FILTER_SANITIZE_NUMBER_INT));
            

            // Verifica se o e-mail já existe no banco de dados
            $veiculo = $this->VeiculoModel->buscarUsuarioPorPlaca($placa);
            if ($veiculo) {
                echo '<script>alert("Este e-mail já está cadastrado. Por favor, utilize outro e-mail."); window.location.href = "create.php";</script>';
            }

            // Cria o veiculo
            $resultado = $this->VeiculoModel->criarVeiculo($marca, $modelo, $placa, $proprietario);
            if (!$resultado) {
                echo "<script>alert('erro ao criar o veículo' ".var_dump($_POST);"); window.location.href = 'create.php';</script>";
                
            } else {
                echo '<script>alert("veículo cadastrado"); window.location.href = "index.php";</script>';
            }
        }
    }

    public function buscarVeiculoId($id_veiculo)
    {
        $veiculo = $this->VeiculoModel->buscarVeiculoId($id_veiculo);

        return $veiculo;

    }

    public function atualizarVeiculo()
    {
        if (isset($_POST['editar'])) {
            // Verifica se os campos foram preenchidos
            if (empty($_POST['id_veiculo']) || empty($_POST['marca']) || empty($_POST['modelo']) || empty($_POST['placa']) || empty($_POST['proprietario'])) {
                echo '<script>alert("Por favor, preencha todos os campos."); window.location.href = "edit.php?id=' . $_POST['id_veiculo'] . '";</script>';

            }

            // Sanitiza os inputs
            $marca = filter_var($_POST['marca'], FILTER_SANITIZE_STRING);
            $modelo = filter_var($_POST['modelo'], FILTER_SANITIZE_STRING);
            $placa = filter_var($_POST['placa'], FILTER_SANITIZE_STRING);
            $proprietario = filter_var($_POST['proprietario'], FILTER_SANITIZE_NUMBER_INT);
            $id_veiculo = intval(filter_var($_POST['id_veiculo'], FILTER_SANITIZE_NUMBER_INT));
            

             // Verifica se o e-mail já existe no banco de dados
             $veiculo = $this->VeiculoModel->buscarUsuarioPorPlaca($placa);
             if ($veiculo) {
                 echo '<script>alert("Este e-mail já está cadastrado. Por favor, utilize outro e-mail."); window.location.href = "create.php";</script>';
             }

            // atualiza o usuário
            $resultado = $this->VeiculoModel->atualizarVeiculo($id_veiculo, $marca, $modelo, $placa, $proprietario);
            if (!$resultado) {
                echo '<script>alert("erro ao atualizar veiculo"); window.location.href = "edit.php?id=' . $_POST['id_usuario'] . '";</script>';
            } else {
                echo '<script>alert("veículo Atualizado"); window.location.href = "index.php";</script>';
            }
        }
    }

    public function deletarVeiculo()
    {
        if (isset($_POST['delete'])) { // Sanitiza o input
            $id = filter_var($_POST['id_veiculo'], FILTER_SANITIZE_NUMBER_INT);

            // Deleta o usuário
            $resultado = $this->VeiculoModel->deletarVeiculo($id);
            if ($resultado) {
                echo '<script>alert("veiculo deletado"); window.location.href = "index.php";</script>';
            }
        }
    }

}