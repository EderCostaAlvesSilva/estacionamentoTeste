<?php

include "../components/head.php";


include "../../controllers/usuarioController.php";

$user = new UsuarioController();
$login = $user->login();

?>

<title>Login</title>

    <body class="bg-primary">
        <div id="layoutAuthentication">
            <div id="layoutAuthentication_content">
                <main>
                    <div class="container">
                        <div class="row justify-content-center">
                            <div class="col-lg-5">
                                <div class="card shadow-lg border-0 rounded-lg mt-5">
                                    <div class="card-header"><h3 class="text-center font-weight-light my-4">Login</h3></div>
                                    <div class="card-body">
                                        <form action="" method="POST">
                                            <div class="form-floating mb-3">
                                                <input required name="nome" class="form-control" id="inputEmail" type="text" placeholder="name@example.com" />
                                                <label for="inputEmail">Insira seu nome de usuario</label>
                                            </div>
                                            <div class="form-floating mb-3">
                                                <input required name="senha" class="form-control" id="inputPassword" type="password" placeholder="Password" />
                                                <label for="inputPassword">insira sua senha</label>
                                            </div>
                                            
                                            <div class="d-flex align-items-center justify-content-between mt-4 mb-0">
                                               <button type="submit" name="logar" class="btn btn-info">Entrar</button>
                                            </div>
                                        </form>
                                    </div>
                                    <div class="card-footer text-center py-3">
                                        <div class="small"><a href="views/home/index.php">Esqueceu sua senha?</a></div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </main>
            </div>
            
        </div>
        
<?php

include "../components/footer.php";

?>