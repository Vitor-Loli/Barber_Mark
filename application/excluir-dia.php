<?php

    $data = isset($_POST['txtData'])? $_POST['txtData']: '';

    if($data == ''){
        print " <script>
            alert('Há dados em branco, por favor verifique!')
            window.location = '../sistema.php?tela=horarios'
        </script>";
    }

    require_once 'class/dataBase.php';
    $dataBase = new dataBase;

    $sql = 'DELETE FROM agendamentos WHERE dia = ?';
    $parametros = [$data];
    $dataBase->executeCommand($sql, $parametros);

    print " <script>
            alert('Horário excluido com sucesso!')
            window.location = '../sistema.php?tela=horarios'
        </script>";
?>