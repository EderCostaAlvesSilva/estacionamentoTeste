<?php


require_once "ConexaoBD.php";

class VeiculoModel
{

    private $conexao;

    public function __construct()
    {
        $this->conexao = (new ConexaoBD())->conectar();
    }

    public function listarVeiculoProprietario()
    {
        try {
            $stmt = $this->conexao->prepare("SELECT *
            FROM Proprietario
            INNER JOIN Veiculo ON Proprietario.id_proprietario = Veiculo.id_prop_veic;
            ");
            $stmt->execute();
            $veiculos = $stmt->fetchAll(PDO::FETCH_ASSOC);
            return $veiculos;
        } catch (PDOException $e) {
            echo "Erro ao buscar veiculos: " . $e->getMessage();
            return false;
        }
    }


    public function criarVeiculo($marca, $modelo, $placa, $proprietario)
    {
        try {
            $stmt = $this->conexao->prepare("INSERT INTO veiculo (marca, modelo, placa, id_prop_veic, data_cadastro, data_alteracao) 
                                             VALUES (:marca, :modelo, :placa, :D, NOW(), NOW())");

            $stmt->bindParam(':marca', $marca);
            $stmt->bindParam(':modelo', $modelo);
            $stmt->bindParam(':placa', $placa);
            $stmt->bindParam(':id_prop_veic', $proprietario);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao criar usuário: " . $e->getMessage();
            return false;
        }
    }

    public function buscarVeiculoId($id_veiculo)
    {
        try {
            $stmt = $this->conexao->prepare("SELECT * FROM veiculo WHERE id_veiculo = :id_veiculo");
            $stmt->bindParam(':id_veiculo', $id_veiculo);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $usuario;
        } catch (PDOException $e) {
            echo "Erro ao buscar usuário: " . $e->getMessage();
            return false;
        }
    }

    public function buscarUsuarioPorPlaca($placa)
    {
        try {
            $stmt = $this->conexao->prepare("SELECT * FROM veiculo WHERE placa = :placa");
            $stmt->bindParam(':placa', $placa);
            $stmt->execute();
            $usuario = $stmt->fetch(PDO::FETCH_ASSOC);
            return $usuario;
        } catch (PDOException $e) {
            echo "Erro ao buscar Veiculo: " . $e->getMessage();
            return false;
        }
    }

    public function atualizarVeiculo($marca, $modelo, $placa, $proprietario, $id_veiculo)
    {
        try {
            $stmt = $this->conexao->prepare("UPDATE veiculo SET marca = :marca, modelo = :modelo, placa = :placa, id_prop_veic = :id_prop_veic, data_alteracao = NOW() WHERE id_veiculo = :id_veiculo");
            $stmt->bindParam(':marca', $marca);
            $stmt->bindParam(':modelo', $modelo);
            $stmt->bindParam(':placa', $placa);
            $stmt->bindParam(':id_prop_veic', $proprietario);
            $stmt->bindParam(':id_veiculo', $id_veiculo);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao atualizar Veiculo: " . $e->getMessage();
            return false;
        }
    }

    public function deletarVeiculo($id_veiculo)
    {
        try {
            $stmt = $this->conexao->prepare("DELETE FROM veiculo WHERE id_veiculo = :id_veiculo");
            $stmt->bindParam(':id_veiculo', $id_veiculo);
            $stmt->execute();
            return true;
        } catch (PDOException $e) {
            echo "Erro ao deletar id_veiculo: " . $e->getMessage();
            return false;
        }
    }


}