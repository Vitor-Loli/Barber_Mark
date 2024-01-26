<?php

    require_once 'class/dataBase.php';

    $user = isset($_POST['txtUser'])        ? $_POST['txtUser']     : '';
    $pass = isset($_POST['txtPassword'])    ? $_POST['txtPassword'] : '';

    if($user == '' || $pass == ''){
        print  "<script> 
            alert('Há dados em branco, por favor verifique!')
            window.location = '../inicio.html'
        </script>";
    }

    // Connect and SQL

    $dataBase = new dataBase;
    $sql = "SELECT * FROM usuarios WHERE usuario = ? and senha = ?";
    $parameters = [$user, $pass];
    $dados = $dataBase->selectRegister($sql, $parameters);

    if(empty($dados)){
        print  "<script> 
            alert('Usuário ou senha incorretos, por favor verifique!')
            window.location = '../index.html'
        </script>";
    } else{
        session_start();
        $_SESSION['logged'] = true;
        $_SESSION['idUser'] = $user;
        $_SESSION['userName'] = $dados['nome'];
        $_SESSION['userEmail'] = $dados['email'];
        $_SESSION['userPhone'] = $dados['telefone'];

        header('LOCATION: ../sistema.php');
    }
?>