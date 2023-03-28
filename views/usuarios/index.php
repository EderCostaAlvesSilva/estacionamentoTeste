<?php

require "../components/head.php";

?>
<title>usuarios</title>

<body class="sb-nav-fixed">

    <?php

    require "../components/nav-horizontal.php";

    require "../components/nav-vertical.php";

    ?>

    <div id="layoutSidenav_content">
        <main>
            <div class="container-fluid px-4">
                <h1 class="mt-4">Usuarios</h1>
                <ol class="breadcrumb mb-4">
                    <li class="breadcrumb-item active">
                        <a class="btn btn-dark" href="create.php">Adicionar um novo Usuario</a>
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
                                    <th>Nome</th>
                                    <th>CPF</th>
                                    <th>Email</th>
                                    <th>Nivel de acesso</th>
                                    <th>Data de cadastro</th>
                                    <th>Ações</th>
                                </tr>
                            </thead>
                            <tbody>

                                <?php
                                require_once "../../controllers/usuarioController.php";

                                $user = new UsuarioController();
                                $userList = $user->listarUsuarios();

                                foreach ($userList as $users):
                                    ?>


                                    <tr>
                                        <td>
                                            <?php echo $users['id_usuario']; ?>
                                        </td>
                                        <td>
                                            <?php echo $users['nome']; ?>
                                        </td>
                                        <td>
                                            <?php echo $users['cpf']; ?>
                                        </td>
                                        <td>
                                            <?php echo $users['email']; ?>
                                        </td>
                                        <td>
                                            <?php echo $users['nivel_acesso']; ?>
                                        </td>


                                        <td>
                                            <?php echo date('d/m/Y', strtotime($users['data_cadastro'])); ?>
                                        </td>
                                        <td>
                                            <a href="edit.php?id=<?php echo $users['id_usuario'] ?>"
                                                class="btn btn-success">Editar</a>
                                            <a href="delete.php?id=<?php echo $users['id_usuario'] ?>"
                                                class="btn btn-danger">delete</a>
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

    require "../components/footer.php";

    ?>