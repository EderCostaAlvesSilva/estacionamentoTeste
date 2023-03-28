<nav class="sb-topnav navbar navbar-expand navbar-dark bg-dark">
    <!-- Navbar Brand-->
    <a class="navbar-brand ps-3" href="../home/home.php">EstacionAqui!</a>
    <!-- Sidebar Toggle-->
    <button class="btn btn-link btn-sm order-1 order-lg-0 float-left" id="sidebarToggle" href="#!"><i
            class="fas fa-bars"></i></button>

    <?php

    // verifica se o botão "Sair" foi clicado
    if (isset($_POST['logout'])) {
        // Destroi a sessão do usuário
        session_start();
        session_destroy();

        // Redireciona para a página de login
        header('Location: ../home/index.php');
        exit();
    }

    ?>

    <!-- arquivo logout.php -->
    <form class="flot-right ps-3" method="post" action="">
        <button class="btn  btn-info" name="logout" type="submit">Sair</button>
    </form>

    <?php

    ?>


</nav>