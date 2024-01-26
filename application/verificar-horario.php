<?php

    $nome = isset($_GET['nome'])? $_GET['nome']: '';
    $telefone = isset($_GET['telefone'])? $_GET['telefone']: '';

    if($nome == '' || $telefone == ''){
        print "<script>
            alert('Nome e telefone não encontrados!')
            window.location = '../inicio.html'
        </script>";
    }

    require_once "class/dataBase.php";

    $dataBase = new dataBase;

    $sql = "SELECT * FROM agendamentos WHERE nome = ? AND telefone = ?";
    $parametros = [$nome, $telefone];
    $dados = $dataBase->selectRegisters($sql, $parametros);

    if(empty($dados)){
        print "<script>
            alert('Não há horarios agendados com esse nome e telefone, Por Favor Insira outro!')
            window.location = '../inicio.html'
        </script>";
    }else{
        header("LOCATION: ../agendar.php?view=desmarcar&nome=$nome&telefone=$telefone");
    }

?>