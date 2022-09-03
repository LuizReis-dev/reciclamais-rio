<?php
require '../acesso/acessoadm.php';
require '../util/conexao.php';
require '../util/navegacao.html';
$sql1 = "SELECT count(*) as ADM FROM usuario WHERE acesso='admin'";
$sql2 = "SELECT count(*) as Comum FROM usuario WHERE acesso='empresa'";

$result1 = $conn->query($sql1);
$result2 = $conn->query($sql2);

//Prepara as contagens
$row1 = $result1->fetch_assoc();
$row2 = $result2->fetch_assoc();

?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="../css/controlar.css">
    <title>Controle</title>
</head>

<body>
    <div class="wrapper">
        <h1>Controle por Gráficos</h1>

        <div class="grafico" style="margin-top: 100px">
            <h2>Quantidade de Usuários por função</h2>
            <canvas id="myChart" height='300'>
            </canvas>
        </div>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <script type="text/javascript">
        var ctx = document.getElementById("myChart");
        var valores = [<?php echo $row1["ADM"] ?>, <?php echo $row2["Comum"] ?>];
        var tipos = ["ADM", "Comum"];

        var myChart = new Chart(ctx, {
          type: "pie",
          data: {
            labels: tipos,
            datasets: [
              {
                label: "Usuarios",
                data: valores,
                backgroundColor: [
                  "rgba(255, 99, 132, 0.2)",
                  "rgba(54, 162, 235, 0.2)",
                  "rgba(255, 206, 86, 0.2)",
                  "rgba(75, 192, 192, 0.2)",
                  "rgba(153, 102, 255, 0.2)",
                ]
              }
            ]
          }
        }); 
    </script>  
</body>

</html>