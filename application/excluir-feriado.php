<?php

    $id = isset($_GET['id'])? $_GET['id']: '';

    if($id == ''){
        print " <script>
            alert('Há dados em branco, por favor verifique!')
            window.location = '../sistema.php?tela=dias'
        </script>";
    }

    require_once 'class/dataBase.php';
    $dataBase = new dataBase;

    $sql = 'DELETE FROM feriados WHERE id_feriado = ?';
    $parametros = [$id];
    $dataBase->executeCommand($sql, $parametros);

    print " <script>
            alert('Horário excluido com sucesso!')
            window.location = '../sistema.php?tela=dias'
        </script>";
?>