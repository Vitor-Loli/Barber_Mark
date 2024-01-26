<?php

    $nome = isset($_POST['txtNome'])? $_POST['txtNome']: '';
    $telefone = isset($_POST['txtTelefone'])? $_POST['txtTelefone']: '';
    $data = isset($_POST['txtData'])? $_POST['txtData']: '';
    $procedimento = isset($_POST['txtProcedimento'])? $_POST['txtProcedimento']: '';

    if($nome == '' || $telefone == '' || $data == '' || $procedimento == '' ){
        print "<script>
            alert('Há dados em branco, Por Favor verifique!')
            window.location = '../agendar.php?view=data&nome=$nome&telefone=$telefone'
        </script>";
    }

    //verificando qual dia da semana é:
        $dataObj = new DateTime($data);
        $diaDaSemana = $dataObj->format('l');
        $sabado = 0;

        if($diaDaSemana == "Sunday"){
            print "<script>
                alert('Não trabalhamos aos domingos, Por Favor escolha outro dia')
                window.location = '../agendar.php?view=data&nome=$nome&telefone=$telefone'
            </script>";
            exit;
        } elseif($diaDaSemana == "Saturday"){
            $sabado = 1;
        }


    require_once 'class/dataBase.php';
    $dataBase = new dataBase;

    $sql = 'SELECT * FROM feriados';
    $parametros = [];
    $dados = $dataBase->selectRegisters($sql, $parametros);

    foreach($dados as $linha){
        if($linha['dia'] == $data){
            print "<script>
                alert('Nesse dia não Haverá atendimento, Por favor escolha outro!')
                window.location = '../agendar.php?view=data&nome=$nome&telefone=$telefone'
            </script>";
            exit;
        }
    }

    header("LOCATION: ../agendar.php?view=hora&nome=$nome&telefone=$telefone&data=$data&procedimento=$procedimento&ds=$sabado");
?>  