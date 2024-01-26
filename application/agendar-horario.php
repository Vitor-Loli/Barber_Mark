<?php

    $nome = isset($_POST['txtNome'])? $_POST['txtNome']: '';
    $telefone = isset($_POST['txtTelefone'])? $_POST['txtTelefone']: '';
    $data = isset($_POST['txtData'])? $_POST['txtData']: '';
    $hora = isset($_POST['txtHora'])? $_POST['txtHora']: '';
    $procedimento = isset($_POST['txtProcedimento'])? $_POST['txtProcedimento']: '';

    if($nome == '' || $telefone == '' || $data == '' || $hora == '' || $procedimento == '' ){
        print "<script>
            alert('Há dados em branco, Por Favor verifique!')
            window.location = '../agendar.php'
        </script>";
    }

    require_once 'class/dataBase.php';
    $dataBase = new dataBase;

    $sql = "INSERT INTO agendamentos (nome, telefone, procedimento, dia, hora) VALUES (?, ?, ?, ?, ?)";
    $parametros = [$nome, $telefone, $procedimento, $data, $hora];
    $dataBase->executeCommand($sql, $parametros);


    print "<script>
            alert('Seu Horário foi agendado com sucesso!! Esperamos você.')
            window.location = '../inicio.html'
        </script>";
?>