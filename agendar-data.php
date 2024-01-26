

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="assets/css/agendar.css">

    <!-- Box Icons -->
    <link href='https://unpkg.com/boxicons@2.1.4/css/boxicons.min.css' rel='stylesheet'>

    <title>Agendar horário</title>
</head>

<body>

    <main>
        <div class="agenda">

            <div class="descricao">
                <h3> <?php print "$nome $nomeget";?></h3>
                <p><i class='bx bxs-phone'></i> <?php print "$telefone $telefoneget";?></p>
                
                <p>Obrigado por confiar no nosso trabalho!
                </p>
            </div>

            <form action="application/verificar-dia.php" method="POST" class="form">
                
                <div class="inputs">
                    <input type="text" value="<?php print "$nome $nomeget";?>" name="txtNome" hidden>
                    <input type="text" value="<?php print "$telefone $telefoneget";?>" name="txtTelefone" hidden>
                    <input type="date" id="txtData" name="txtData" value='<?php echo date("Y-m-d"); ?>' required >  

                    <select onchange="total()" id="procedimento" name="txtProcedimento" required>
                        <option value="">Selecione o procedimento...</option>
                        <option value="Cabelo">Somente Cabelo</option>
                        <option value="Cabelo e Barba">Cabelo e Barba</option>
                        <option value="Barba">Somente Barba</option>
                        <option value="Sobrancelha">Somente Sobrancelha</option>
                        <option value="Sobrancelha e Cabelo">Sobrancelha e Cabelo</option>
                        <option value="Sobrancelha e Barba">Sobrancelha e Barba</option>
                        <option value="Sobrancelha, Cabelo e Barba">Sobrancelha, Cabelo e Barba</option>
                    </select>
                    <input type="submit" class="btn">
                    <p >Precisa desmarcar um horário? <a href="application/verificar-horario.php?nome=<?php print "$nome $nomeget";?>&telefone=<?php print "$telefone $telefoneget";?>"><span class="desmarcar">clique aqui!</span></a></p>
                </div>
                
            </form>

            <div class="total">

                    <h3>Total R$:</h3>
                    <p id="preco">0,00</p>
                    
            </div>  
            
            <div class="infos">
                <h3>Dias que não haverá atendimentos:</h3>

                <?php
                    require_once 'application/class/dataBase.php';
                    $dataBase = new dataBase;

                    $sql = 'SELECT dia FROM feriados';
                    $parametros = [];
                    $dados = $dataBase->selectRegisters($sql, $parametros);

                    foreach($dados as $linha){
                        $dataFormatada = strtotime($linha['dia']);
                        $dataFormatada = date("d/m/Y", $dataFormatada);

                        print "
                            <p>$dataFormatada</p>
                        ";
                    }
                ?>
            </div>

        </div>     

    </main>

    

</body>

<script>
    function total(){
        var total = document.getElementById("preco");
        var procedimento = document.getElementById("procedimento").value;

        switch (procedimento){
            case "Cabelo":
                total.innerHTML = "20,00";
            break;
            case "Cabelo e Barba":
                total.innerHTML = "35,00";
            break;
            case "Barba":
                total.innerHTML = "15,00";
            break;
            case "Sobrancelha":
                total.innerHTML = "10,00";
            break;
            case "Sobrancelha e Cabelo":
                total.innerHTML = "30,00";
            break;
            case "Sobrancelha e Barba":
                total.innerHTML = "25,00";
            break;
            case "Sobrancelha, Cabelo e Barba":
                total.innerHTML = "45,00";
            break;
            default:
                total.innerHTML = "0,00"
        }
    }
</script>

</html>