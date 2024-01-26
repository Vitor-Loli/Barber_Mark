<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/main.css">
    <title>Sistema OG</title>


    <!-- Box Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

</head>
<body>
    <main class="secundaria">

        <div class="filtro">
            <h1>Dias não trabalhados:</h1>
            <div class="data">
                <form action="application/cadastrar-dia.php" method="POST">
                    <input type="date" name="txtData">
                    <input type="submit" value="Cadastrar">
                </form>
            </div>
        </div>

        <div class="tabela">
            <table >
                <thead>
                <tr>
                    <th>ID</th>
                    <th>DIA</th>
                    <th>Ações</th>
                </tr>
                </thead>
                <tbody>
                <?php
                    require_once  'application/class/dataBase.php';

                    $dataBase = new dataBase;

                    $sql = 'SELECT * FROM feriados';
                    $parametros = [];
                    $dados = $dataBase->selectRegisters($sql, $parametros);

                    
                    

                    foreach($dados as $linha){

                        $dataFormatada = strtotime($linha['dia']);
                        $dataFormatada = date("d/m/Y", $dataFormatada);


                        print "
                            <tr>
                                <td>{$linha['id_feriado']}</td>
                                <td>$dataFormatada</td>
                                <td>
                                    <a href='application/excluir-feriado.php?id={$linha['id_feriado']}'> <i class='bx bx-trash'></i> </a>
                                </td>
                            </tr>
                        ";
                }
            ?>
                    
                
                </tbody>
            </table>
        </div>

    </maini>
</body>
</html>