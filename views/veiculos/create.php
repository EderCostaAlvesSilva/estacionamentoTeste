<?php
require_once "../../controllers/veiculoController.php";
$veiculo = new VeiculoController();

$veiculos = $veiculo->criarVeiculo();

include "../components/head.php";

?>
<title>create</title>

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
                                <h3 class="text-center font-weight-light my-4">Cadastrar Veiculo </h3>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input name="marca" class="form-control" id="inputFirstName" type="text"
                                                    placeholder="Insira a marca" />
                                                <label for="inputFirstName">Marca</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input name="placa" class="form-control" id="inputLastName" type="text"
                                                    placeholder="Insira o PLaca " />
                                                <label for="inputLastName">placa</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input name="modelo" class="form-control" id="inputFirstName"
                                                    type="text" placeholder="Insira o modelo" />
                                                <label for="inputFirstName">modelo</label>
                                            </div>
                                        </div>

                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <select class="form-control" name="proprietario" id="">
                                                    <option value="">Selecione o Proprietario</option>

                                                    <?php

                                                    require_once "../../controllers/ProprietarioController.php";
                                                    $prop = new ProprietarioController();;
                                                    $propList = $prop->listarProprietario();
                                                    

                                                    foreach ($propList as $props): ?>
                                                        <option value="<?php echo $props['id_proprietario']; ?>"><?php echo $props['nome']; ?></option>
                                                    <?php endforeach; ?>
                                                    ?>
                                                </select>
                                                <label for="inputPassword">Proprietario</label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="mt-4 mb-0">
                                        <div class="d-grid">
                                            <button name="enviarVei" class="btn btn-primary btn-block"
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