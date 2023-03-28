<?php

include "../components/head.php";
require_once "../../controllers/usuarioController.php";

$user = new UsuarioController();
$deleteuser = $user->deletarUsuario();


$id = filter_input(INPUT_GET, 'id', FILTER_VALIDATE_INT);
if (!$id) {
    header("Location: index.php");
    exit;
} else {
    $buscaUser = $user->bucarUsuarioId($id);
}

?>
<title>delete</title>

<body class="bg-danger">
    <div id="layoutAuthentication">
        <div id="layoutAuthentication_content">
            <main>
                <div class="container">
                    <div class="row justify-content-center">
                        <div class="col-lg-5">
                            <div class="card shadow-lg border-0 rounded-lg mt-5">
                                <div class="card-header">
                                    <h3 class="text-center font-weight-light my-4">Excluir Usuario</h3>
                                </div>
                                <div class="card-body">
                                    <div class=" mb-3 text-muted">Voce deseja excluir
                                        <?= $buscaUser['nome'] ?>
                                    </div>


                                </div>
                                <div class="card-footer  py-3">
                                    <form action="" method="post">
                                        <div>
                                            <a href="index.php" class="btn btn-dark">Cancelar</a>
                                            <input type="hidden" name="id_usuario"
                                                value="<?= $buscaUser['id_usuario'] ?>">
                                            <button name="delete" type="submit" class="btn btn-danger">Excluir</button>
                                        </div>
                                    </form>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </main>
        </div>
        <div id="layoutAuthentication_footer">
            <footer class="py-4 bg-light mt-auto">
                <div class="container-fluid px-4">
                    <div class="d-flex align-items-center justify-content-between small">
                        <div class="text-muted">Copyright &copy; Estacionamento 2023</div>

                    </div>
                </div>
            </footer>
        </div>
    </div>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.2.3/dist/js/bootstrap.bundle.min.js"
        crossorigin="anonymous"></script>
    <script src="js/scripts.js"></script>
</body>

<?php

include "../components/footer.php";