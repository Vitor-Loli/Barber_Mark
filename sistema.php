<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/sistema.css">
    <title>Sistema</title>

    <script src="assets/js/burguer.js" defer></script>

    <!-- Box Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <div class="hamburguer" id="hamburguer">
        <i  class='bx bx-menu'></i>
    </div>

    <div class="menu-mobile" id="menu-mobile">
                <ul>
                    <li>
                        <i class='bx bx-time'></i>
                        <a href="sistema.php?tela=horarios"><p class="text-functions">Horários</p></a>
                    </li>
                    <li>
                        <i class='bx bx-calendar'></i>
                        <a href="sistema.php?tela=dias"><p class="text-functions">Dias</p></a>
                    </li>
                    <li class="optAgenda">
                        <i class='bx bx-log-out'></i>
                        <a href="inicio.html"><p class="text-functions">Sair</p></a>
                    </li>
                </ul>
            </div>

    <div class="side-bar">
        <header class="informations">
            <a href="inicio.html"><img src="assets/images/logo.png" alt="Logo" class="logo"></a>

            <div class="description">
                <h1 class="name">Barber Mark</h1>
                <h3 class="job">Agendamento</h3>
            </div>
            
        </header>

        <div class="functions">

            <div class="function home active">
                <i class='bx bx-time'></i>
                <a href="sistema.php?tela=horarios"><p class="text-functions">Horários</p></a>
            </div>

            <div class="function register">
                <i class='bx bx-calendar'></i>
                <a href="sistema.php?tela=dias"><p class="text-functions">Dias</p></a>
            </div>

            <div class="function logout">
                <i class='bx bx-log-out'></i>
                <a href="inicio.html"><p class="text-functions">Sair</p></a>
            </div>

        </div>
    </div>

    <main class="principal" id="main">
        <?php
            $tela = isset($_GET['tela'])? $_GET['tela']: '';

            switch($tela){
                case 'horarios':
                    include "sistema-horarios.php";
                break;
                case 'filtro':
                    include "mostrar-tabela.php";
                break;
                case 'dias':
                    include "sistema-dias.php";
                break;
            }
        ?>

    </main>
</body>
</html>