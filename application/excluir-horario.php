<?php

    $id = isset($_GET['id'])? $_GET['id']: '';
    $desmarcar = isset($_GET['desmarcar'])? $_GET['desmarcar']: '';

    if($id == ''){
        print " <script>
            alert('Há dados em branco, por favor verifique!')
            window.location = '../sistema.php?tela=horarios'
        </script>";
    }

    require_once 'class/dataBase.php';
    $dataBase = new dataBase;

    $sql = 'DELETE FROM agendamentos WHERE id_agendamento = ?';
    $parametros = [$id];
    $dataBase->executeCommand($sql, $parametros);

    if($desmarcar = 1){
        print " <script>
            alert('Horário excluido com sucesso!')
            window.location = '../inicio.html'
        </script>";
    }else{
        print " <script>
            alert('Horário excluido com sucesso!')
            window.location = '../sistema.php?tela=horarios'
        </script>";
    }
    
    
?>