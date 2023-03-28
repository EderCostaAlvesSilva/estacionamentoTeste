<?php
require_once "../../controllers/proprietarioController.php";
$prop = new ProprietarioController();
$propCreate = $prop->criarProprietario();

include "../components/head.php";

?>

<body class="sb-nav-fixed">

    <?php

    include "../components/nav-horizontal.php";

    include "../components/nav-vertical.php";

    ?>
<title>Create</title>


    <div class="bg-info" id="layoutSidenav_content">

        <main class=" ">
            <div class="container-fluid">
                <div class="row justify-content-center">
                    <div id="formProp" class="col-lg-10">
                        <div class="card shadow-lg border-0 rounded-lg mt-2">
                            <div class="card-header">
                                <h3 class="text-center font-weight-light my-4">Cadastrar Proprietario</h3>
                            </div>
                            <div class="card-body">
                                <form action="" method="POST">
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input name="nome" class="form-control" id="inputFirstName" type="text"
                                                    placeholder="Insira o nome de Usuario" />
                                                <label for="inputFirstName">Nome</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating">
                                                <input name="cpf" class="form-control" id="inputLastName" type="text"
                                                    placeholder="Insira o CPF do usuario" />
                                                <label for="inputLastName">CPF</label>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="form-floating mb-3">
                                        <input name="email" class="form-control" id="inputEmail" type="email"
                                            placeholder="Insira o email do usuario" />
                                        <label for="inputEmail">Email</label>
                                    </div>
                                    <div class="row mb-3">
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <input name="celular" class="form-control" id="inputPassword" type="tel"
                                                    placeholder="Nº Celular com (DDD)" />
                                                <label for="inputPassword">Nº Celular com (DDD)</label>
                                            </div>
                                        </div>
                                        <div class="col-md-6">
                                            <div class="form-floating mb-3 mb-md-0">
                                                <select class="form-control" name="status" id="">
                                                    <option value="" desabled>Selecione</option>
                                                    <option value="ativo">ativo</option>
                                                    <option value="inativo">desativado</option>
                                                </select>
                                                <label for="inputPassword">Status</label>
                                            </div>
                                        </div>

                                    </div>
                                    <div class="mt-4 mb-0">
                                        <div class="d-grid">
                                            <button name="enviarProp" class="btn btn-primary btn-block"
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