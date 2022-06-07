<?php
require 'navegacao.html';
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Relatorios</title>
    <link rel="stylesheet" href="../css/relatorios.css">

</head>

<body>
    <div class="container">
        <h1 class="titulo">Graficos e Relatorios</h1>
        <div class="grafico-container">
            <h2 class="titulo-grafico">Total de vendas por mês</h2>
            <canvas id="grafico-venda" width="400" height="200"></canvas>
        </div>
    </div>

    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <script src="../scripts/relatorios.js"></script>
</body>

</html>