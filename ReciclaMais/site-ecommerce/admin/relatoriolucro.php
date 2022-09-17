<?php

require '../util/conexao.php';
$sqlVenda = "SELECT MONTH(data) as mes, SUM(total) as total FROM operacao_comercial WHERE tipo = 'v' GROUP BY YEAR(data), MONTH(data) ORDER BY mes";
$sqlCompra = "SELECT MONTH(data) as mes, SUM(total) as total FROM operacao_comercial WHERE tipo = 'c' GROUP BY YEAR(data), MONTH(data) ORDER BY mes";

$resultVenda = $conn->query($sqlVenda);
$resultCompra = $conn->query($sqlCompra);

$mesdehoje = date('m');

$comprasPorMes = [];
$vendasPorMes = [];
$lucroPorMes = [];

for($i = 1; $i < $mesdehoje; $i++) {
    $comprasPorMes[$i] =0;
    $vendasPorMes[$i] =0;
    $lucroPorMes[$i] =0;
}

while ($rowCompra = $resultCompra->fetch_assoc()) {
    $comprasPorMes[$rowCompra["mes"]] = $rowCompra["total"]; 
}

while($rowVenda = $resultVenda->fetch_assoc()) {
    $vendasPorMes[$rowVenda["mes"]] = $rowVenda["total"];
}

for($i = 1; $i <=$mesdehoje; $i++) {
    $lucroPorMes[$i] = $vendasPorMes[$i] - $comprasPorMes[$i];
}
?>

<!DOCTYPE html>
<html lang="pt-br">

<head>
  <meta charset="UTF-8">
  <meta http-equiv="X-UA-Compatible" content="IE=edge">
  <meta name="viewport" content="width=device-width, initial-scale=1.0">
  <title>ReciclaMaisRio | Controle</title>
  <link rel="stylesheet" href="../css/controlar.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
</head>

<body>
  <div id="pagina">
    <?php
    require '../util/navegacao.html';
    ?>
    <div class="wrapper">
      <h1>Controle por Gráficos</h1>
      <div class="grafico">
        <h2>Lucro por mês do ano.........................</h2>
        <canvas id="myChart" height='200'></canvas>
        <div class="funcoes"></div>
      </div>
    </div>
    <div class="section">
      <section>
        <h2>Gráficos</h2>
        <div class="grafico-opcao" tabindex="1">
          <i class="bi bi-coin"></i>
          <?php
          ?>
          <span class="descricao-grafico">Financeiro</span>
        </div>
        <div class="grafico-opcao" tabindex="1">
          <i class="bi bi-basket"></i>
          <?php
          ?>
          <span class="descricao-grafico">Materiais</span>
        </div>
        <div class="grafico-opcao" tabindex="1">
          <i class="bi bi-people"></i>
          <?php
          ?>
          <span class="descricao-grafico">Usuários</span>
        </div>
        <div class="grafico-opcao" tabindex="1">
          <i></i>
          <?php
          ?>
          <span class="descricao-grafico">teste4</span>
        </div>
        <div class="grafico-opcao" tabindex="1">
          <i></i>
          <?php
          ?>
          <span class="descricao-grafico">teste5</span>
        </div>
        <div class="grafico-opcao" tabindex="1">
          <i></i>
          <?php
          ?>
          <span class="descricao-grafico">teste6</span>
        </div>
      </section>
    </div>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
    <script type="text/javascript">
      var ctx = document.getElementById("myChart");
      var valores = [<?php echo (json_encode($lucroPorMes));?>];
      console.log(valores[0]);
      var quantidadeDeMeses = Object.keys(valores[0]).length;

      const mesesDoAno = { 
        1 : "Janeiro", 
        2 : "Fevereiro",
        3 : "Março",
        4 : "Abril",
        5 : "Maio",
        6 : "Junho",
        7 : "Julho",
        8 : "Agosto",
        9 : "Setembro",
        10 : "Outubro",
        11 : "Novembro",
        12: "Dezembro"
      }
      
      let meses = [];
      for(let i = 1; i<=quantidadeDeMeses; i++) {
        meses.push(mesesDoAno[i]); 
      }
      var myChart = new Chart(ctx, {
        type: "line",
        data: {
          labels: meses,
          datasets: [{
            label: "Lucro",
            data: Object.values(valores[0]),
          }]
        }
      });
    </script>
  </div>
</body>

</html>