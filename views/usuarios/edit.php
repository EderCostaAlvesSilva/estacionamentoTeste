<?php
require_once "../../controllers/usuarioController.php";
$user = new UsuarioController();
$update = $user->atualizarUsuario();

$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    header("Location: index.php");
    exit;
} else {
    $buscaUser = $user->bucarUsuarioId($id);
}



include "../components/head.php";

?>
<title>edit</title>

<body class="sb-nav-fixed">

    <?php

    include "../components/nav-horizontal.php";

    include "../components/nav-vertical.php";

    ?>

    <div class="bg-info" id="layoutSidenav_content">

        <main class=" ">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div class="col-lg-10">
                        <div class="card shadow-lg border-0 rounded-lg mt-3">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Editar Usuario</h3>
                            </div>
                            <div class="card-body">
                                <form  action="" method="POST">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <input type="hidden" name="id_usuario" value="<?= $buscaUser['id_usuario']; ?>">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input name="nome" class="form-control" id="inputFirstName" value="<?=  $buscaUser['nome'] ?>" type="text"
                                                    placeholder="Insira o nome de Usuario" />
                                                <label for="inputFirstName">Nome</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input value="<?=  $buscaUser['cpf'] ?>" name="cpf" class="form-control" id="inputLastName" type="text"
                                                    placeholder="Insira o CPF do usuario" />
                                                <label for="inputLastName">CPF</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input name="email" class="form-control" id="inputEmail" type="email" value="<?=  $buscaUser['email'] ?>"
                                            placeholder="Insira o email do usuario" />
                                        <label for="inputEmail">Email</label>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input name="senha" value="<?=  $buscaUser['senha'] ?>" class="form-control" id="inputPassword"
                                                    type="password" placeholder="Senha com mais de 8 caracteres" />
                                                <label for="inputPassword">Senha com mais de 6 caracteres</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <select class="form-control" name="nivel_acesso" id="">
                                                    <option value="" desabled>Selecione</option>
                                                    <option value="ADMIN">administrador</option>
                                                    <option value="OPERADOR">Operador</option>
                                                </select>
                                                <label for="inputPassword">Nivel de Acesso</label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="mt-4 mb-0">
                                        <div class="d-grid">
                                            <button name="editar" class="btn btn-primary btn-block"
                                                type="submit">Adicionar</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
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