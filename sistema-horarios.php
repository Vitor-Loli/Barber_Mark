<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css">
    <title>Sistema</title>


    <!-- Box Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>
</head>
<body>

    <main class="secundaria">
        <div class="filtro">
            <h1>Horários agendados:</h1>
            <div>
                <label for="filtro">Filtrar:</label>
                <input type="date" id="txtData" onchange="mostrarTabela()"> 
            </div>
            <div>
                <form action="application/excluir-dia.php" method="POST">
                    <label for="delete">Excluir:</label>
                    <input type="date" name="txtData">
                    <input type="submit" value="Enviar">
                </form>
                 
            </div>
            
        </div>
        

        <div class="tabela">
            <table >
                <thead>
                <tr>
                    <th>ID</th>
                    <th>NOME</th>
                    <th>TEL.</th>
                    <th>PROC.</th>
                    <th>DIA</th>
                    <th>HORA</th>
                    <th>AÇÕES</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    require_once  'application/class/dataBase.php';

                    $dataBase = new dataBase;

                    $sql = 'SELECT * FROM agendamentos';
                    $parametros = [];
                    $dados = $dataBase->selectRegisters($sql, $parametros);

                    
                    

                    foreach($dados as $linha){

                        $dataFormatada = strtotime($linha['dia']);
                        $dataFormatada = date("d/m/Y", $dataFormatada);
                        $horas = $linha['hora'];

                        $sql = 'SELECT hora FROM horarios WHERE id_horario = ?';
                        $parametros = [$horas];
                        $hora = $dataBase->selectRegister($sql, $parametros);


                        print "
                            <tr>
                                <td>{$linha['id_agendamento']}</td>
                                <td>{$linha['nome']}</td>
                                <td>{$linha['telefone']}</td>
                                <td>{$linha['procedimento']}</td>
                                <td>$dataFormatada</td>
                                <td>{$hora['hora']}</td>
                                <td>
                                    <a href='application/excluir-horario.php?id={$linha['id_agendamento']}'> <i class='bx bx-trash'></i> </a>
                                </td>
                            </tr>
                        ";
                }
            ?>
                    
                
                </tbody>
            </table>
        </div>
    </main>
    
    
</body>

<script>
    function mostrarTabela(){
        var data = document.getElementById("txtData").value

        window.location = "sistema.php?tela=filtro&data=" + data
    }
</script>
</html>