<?php

require "../components/head.php";

?>
<title>veiculos</title>

<body class="sb-nav-fixed">

    <?php

    require "../components/nav-horizontal.php";

    require "../components/nav-vertical.php";

    ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Veiculos</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        <a class="btn btn-dark" href="create.php">Adicionar um novo veiculo</a>
                    </li>
                </ol>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>marca</th>
                                    <th>modelo</th>
                                    <th>placa</th>
                                    <th>proprietario</th>
                                    <th>Data de cadastro</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                include "../../controllers/veiculoController.php";

                                $veiculo = new VeiculoController();
                                $veiculos = $veiculo->listarVeiculoProprietario();
                                foreach ($veiculos as $veiculo): ?>
                                    <tr>
                                        <td>
                                            <?= $veiculo['id_veiculo'] ?>
                                        </td>

                                        <td>
                                            <?= $veiculo['marca'] ?>
                                        </td>

                                        <td>
                                            <?= $veiculo['modelo'] ?>
                                        </td>

                                        <td>
                                            <?= $veiculo['placa'] ?>
                                        </td>

                                        <td>
                                            <?= $veiculo['nome'] ?>
                                        </td>

                                        <td>
                                            <?= $veiculo['data_cadastro'] ?>
                                        </td>

                                        <td >
                                        <a href="edit.php?id=<?php echo $veiculo['id_veiculo'] ?>"  class="btn btn-success">Editar</a>
                                        <a href="delete.php?id=<?php echo $veiculo['id_veiculo'] ?>"  class="btn btn-danger">delete</a>
                                    </td>
                                        
                                    </tr>
                                <?php endforeach ?>
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </main>
        <footer class="py-4 bg-light mt-auto">
                    <div class="container-fluid px-4">
                        <div class="d-flex align-items-center justify-content-between small">
                            <div class="text-muted">Copyright &copy; Estacionamento 2023</div>
                            
                        </div>
                    </div>
                </footer>
    </div>
    </div>

    <?php

    require "../components/footer.php";

    ?>