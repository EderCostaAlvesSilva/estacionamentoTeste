<div id="layoutSidenav">
            <div id="layoutSidenav_nav">
                <nav class="sb-sidenav accordion sb-sidenav-dark" id="sidenavAccordion">
                    <div class="sb-sidenav-menu">
                        <div class="nav">
                            <a class="nav-link" href="../home/home.php">
                                <div class="sb-nav-link-icon"><i class="fas fa-tachometer-alt"></i></div>
                                Home
                            </a>

                            <!--usuarios-->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseUsuarios" aria-expanded="false" aria-controls="collapseUsuarios">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Usuarios
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseUsuarios" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../usuarios/create.php">Adicionar</a>
                                    <a class="nav-link" href="../usuarios/index.php">Cadastrados</a>
                                </nav>
                            </div>

                            <!--Proprietarios-->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseProprietarios" aria-expanded="false" aria-controls="collapseProprietarios">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Proprietarios
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseProprietarios" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../Proprietarios/create.php">Adicionar</a>
                                    <a class="nav-link" href="../Proprietarios/index.php">Cadastrados</a>
                                </nav>
                            </div>
                            
                            <!--Veiculos-->
                            <a class="nav-link collapsed" href="#" data-bs-toggle="collapse" data-bs-target="#collapseVeiculos" aria-expanded="false" aria-controls="collapseVeiculos">
                                <div class="sb-nav-link-icon"><i class="fas fa-columns"></i></div>
                                Veiculos
                                <div class="sb-sidenav-collapse-arrow"><i class="fas fa-angle-down"></i></div>
                            </a>
                            <div class="collapse" id="collapseVeiculos" aria-labelledby="headingOne" data-bs-parent="#sidenavAccordion">
                                <nav class="sb-sidenav-menu-nested nav">
                                    <a class="nav-link" href="../Veiculos/create.php">Adicionar</a>
                                    <a class="nav-link" href="../Veiculos/index.php">Cadastrados</a>
                                </nav>
                            </div>
                            
                        </div>
                    </div>
                </nav>
            </div>