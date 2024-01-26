<?php

    $nome = isset($_GET['nome'])? $_GET['nome']: '';
    $telefone = isset($_GET['telefone'])? $_GET['telefone']: '';

    if($nome == '' || $telefone == ''){
        print "<script>
            alert('Nome e telefone não encontrados!')
            window.location = '../inicio.html'
        </script>";
    }

    require_once "application/class/dataBase.php";

    $dataBase = new dataBase;

    $sql = "SELECT * FROM agendamentos WHERE nome = ? AND telefone = ?";
    $parametros = [$nome, $telefone];
    $dados = $dataBase->selectRegisters($sql, $parametros);


?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Desmarcar Horário</title>
    <link rel="stylesheet" href="assets/css/agendar.css">

    <!-- Box Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <main>
        <div class="agenda">

                <div class="descricao">
                    <h3> <?php print "$nome";?></h3>
                    <p><i class='bx bxs-phone'></i> <?php print "$telefone";?></p>
                    <p>Achamos esses horários com esses dados! Estão corretos?</p>
                </div>

                <div class="form">
                    <table >
                    <thead>
                    <tr>
                        <th>DIA</th>
                        <th>HORA</th>
                        <th>PROC.</th>
                        <th>DESMARCAR</th>
                    </tr>
                    </thead>
                    <tbody>
                    <?php

                        foreach($dados as $linha){

                            $dataFormatada = strtotime($linha['dia']);
                            $dataFormatada = date("d/m/Y", $dataFormatada);

                            $horas = $linha['hora'];

                            $sql = 'SELECT hora FROM horarios WHERE id_horario = ?';
                            $parametros = [$horas];
                            $hora = $dataBase->selectRegister($sql, $parametros);


                            print "
                                <tr>
                                    <td>$dataFormatada</td>
                                    <td>{$hora['hora']}</td>
                                    <td>{$linha['procedimento']}</td>
                                    <td>
                                        <a href='application/excluir-horario.php?id={$linha['id_agendamento']}&desmarcar=1'> <i class='bx bx-trash'></i> </a>
                                    </td>
                                </tr>
                            ";
                    }
                    ?>
                        
                    
                    </tbody>
                </table>

                </div>
        </div>
            
    </main>
    
</body>
</html>