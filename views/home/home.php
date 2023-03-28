<?php

include "../components/head.php";


?>
<title>Home</title>

<body class="sb-nav-fixed">

    <?php

    include "../components/nav-horizontal.php";

    include "../components/nav-vertical.php";

    ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Dashboard</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">Dashboard</li>
                </ol>

                <div class="card mb-4">
                    <div class="card-header">
                        <i class="fas fa-table me-1"></i>
                        Proprietarios
                    </div>
                    <div class="card-body">
                        <table id="datatablesSimple">
                            <thead>
                                <tr>
                                    <th>Id</th>
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>Email</th>
                                    <th>Celular</th>
                                    <th>Status</th>
                                    <th>Data de cadastro</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                require_once "../../controllers/proprietarioController.php";

                                $prop = new ProprietarioController();
                                $Proprietarios = $prop->listarProprietario();

                                foreach ($Proprietarios as $props):
                                    ?>


                                    <tr>
                                        <td>
                                            <?php echo $props['id_proprietario']; ?>
                                        </td>
                                        <td>
                                            <?php echo $props['nome']; ?>
                                        </td>
                                        <td>
                                            <?php echo $props['cpf']; ?>
                                        </td>
                                        <td>
                                            <?php echo $props['email']; ?>
                                        </td>
                                        <td>
                                            <?php echo $props['celular']; ?>
                                        </td>
                                        <td>
                                            <?php echo $props['status']; ?>
                                        </td>
                                        <td>
                                            <?php echo date('d/m/Y', strtotime($props['data_cadastro'])); ?>
                                        </td>
                                        <td>
                                            
                                            <a href="edit.php?id=<?php echo $props['id_proprietario'] ?>"
                                                class="btn btn-success">Editar</a>


                                        </td>
                                    </tr>

                                <?php endforeach; ?>
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

    include "../components/footer.php";