<?php

    $dia = isset($_POST['txtData'])? $_POST['txtData']: '';

    if($dia == ''){
        print "<script>
            alert('Há dados em branco, Por favor verifique!')
            window.location = '../sistema.php?tela=dias'
        </script>";
    }

    require_once 'class/dataBase.php';

    $dataBase = new dataBase;

    $sql = "INSERT INTO feriados (dia) VALUES (?)"; 
    $parametros = [$dia];
    $dataBase->executeCommand($sql, $parametros);
    
    print "<script>
            alert('Dia cadastrado com sucesso!')
            window.location = '../sistema.php?tela=dias'
        </script>";

?>