<?php

    $nome = isset($_GET['nome'])? $_GET['nome']: '';
    $telefone = isset($_GET['telefone'])? $_GET['telefone']: '';
    $data = isset($_GET['data'])? $_GET['data']: '';
    $procedimento = isset($_GET['procedimento'])? $_GET['procedimento']: '';
    $sabado = isset($_GET['ds'])? $_GET['ds']: '';

    if($nome == '' || $telefone == '' || $data == '' || $procedimento == ''){
        print "<script>
            alert('Informe os dados corretamente!!')
            window.location = 'inicio.html#agenda'
        </script>
        ";
    }

    $dataFormatada = strtotime($data);
    $dataFormatada = date("d/m/Y", $dataFormatada);

    $total = '0,00';

    switch ($procedimento){
        case "Cabelo":
            $total = "20,00";
        break;
        case "Cabelo e Barba":
            $total = "35,00";
        break;
        case "Barba":
            $total = "15,00";
        break;
        case "Sobrancelha":
            $total = "10,00";
        break;
        case "Sobrancelha e Cabelo":
            $total = "30,00";
        break;
        case "Sobrancelha e Barba":
            $total = "25,00";
        break;
        case "Sobrancelha, Cabelo e Barba":
            $total = "45,00";
        break;
        default:
            $total = "0,00";
    }

?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Agendar Horário</title>
    <link rel="stylesheet" href="assets/css/agendar.css">

    <!-- Box Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <main>
        <div class="agenda">

                <div class="descricao">
                    <h3> <?php print "$dataFormatada";?></h3>
                    <p><?php print "$procedimento";?></p>
                    <p>R$<?php print "$total";?></p>
                </div>

            <form action="application/agendar-horario.php" method="POST" class="form">

                <div class="inputs">
                    <input type="text" value="<?php print "$nome";?>" name="txtNome" hidden>
                    <input type="text" value="<?php print "$telefone";?>" name="txtTelefone" hidden>
                    <input type="text" id="txtData" name="txtData" value='<?php print "$data";?>' hidden>
                    <input type="text" value="<?php print "$procedimento";?>" name="txtProcedimento" hidden>

                    <select class="horas" name="txtHora" required >
                        <option value="">Selecione o Horário...</option>

                        <?php

                                require_once 'application/class/dataBase.php';
                                $dataBase = new dataBase;

                                $sql = "SELECT * FROM horarios";
                                $parametros = [];
                                $horas = $dataBase->selectRegisters($sql, $parametros);

                                $sql = "SELECT hora FROM agendamentos WHERE dia = ?";
                                $parametros = [$data];
                                $hrsAgendadas = $dataBase->selectRegisters($sql, $parametros);

                                if($sabado == 1){
                                    $sb = 1;
                                    foreach($horas as $hrs){   
                                        $c = 0;        
                                            foreach($hrsAgendadas as $hrsA){
                                                if($hrs['id_horario'] == $hrsA['hora']){
                                                    print "<option value='{$hrs['id_horario']}' disabled>{$hrs['hora']} - Horário indisponível</option>";
                                                    $c = 1;
                                                }
                                            }

                                        if($c == 0){
                                            print "<option value='{$hrs['id_horario']}'>{$hrs['hora']}</option>";
                                        }
                                        
                                        if($sb == 8){
                                            break;
                                        }

                                        $sb++;
                                    }
                                }else{
                                    foreach($horas as $hrs){   
                                        $c = 0;        
                                            foreach($hrsAgendadas as $hrsA){
                                                if($hrs['id_horario'] == $hrsA['hora']){
                                                    print "<option value='{$hrs['id_horario']}' disabled>{$hrs['hora']} - Horário indisponível</option>";
                                                    $c = 1;
                                                }
                                            }

                                        if($c == 0){
                                            print "<option value='{$hrs['id_horario']}'>{$hrs['hora']}</option>";
                                        }
                                    
                                    }
                                }
                                
                                
                                
                            ?>

                    </select>

                    <input type="submit" class="btn">
                </div>

                    
            </form>
        </div>
            
    </main>
    
</body>
</html>