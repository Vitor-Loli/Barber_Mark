<?php
    $nome = isset($_POST['txtNome'])? $_POST['txtNome']: '';
    $telefone = isset($_POST['txtTelefone'])? $_POST['txtTelefone']: '';
    $nomeget = isset($_GET['nome'])? $_GET['nome']: '';
    $telefoneget = isset($_GET['telefone'])? $_GET['telefone']: '';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/agendar.css">

    <!-- Box Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Agendar horário</title>
</head>

<body>

    <header class="cabecalho">
        <div class="logo">
            <a href="#">
                <img src="assets/images/logo.png">
                <h3>Otávio Gabiatti</h3>
            </a>

        </div>

        <nav class="menu">
            <ul>
                <li><a href="inicio.html">Voltar</a></li>
            </ul>
        </nav>
    </header>

    <main>

        <?php

            $tela = isset($_GET['view'])? $_GET['view']: '';

            switch($tela){
                case 'data':
                    include 'agendar-data.php';
                break;

                case 'hora':
                    include 'agendar-hora.php';
                break;

                case 'desmarcar':
                    include 'desmarcar-horario.php';
                break;

            default:
                header('LOCATION: inicio.html');
            }

?>

    </main>

    </form>

</body>


</html>