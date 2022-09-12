<?php
//require '../acesso/acessoadm.php';
require '../util/conexao.php';
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
        <h2>Quantidade de Usuários por função</h2>
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
      var valores = [<?php echo $row1["ADM"] ?>, <?php echo $row2["Comum"] ?>];
      var tipos = ["ADM", "Comum"];
      var myChart = new Chart(ctx, {
        type: "pie",
        data: {
          labels: tipos,
          datasets: [{
            label: "Usuarios",
            data: valores,
            backgroundColor: [
              "rgba(255, 99, 132, 0.2)",
              "rgba(54, 162, 235, 0.2)",
              "rgba(255, 206, 86, 0.2)",
              "rgba(75, 192, 192, 0.2)",
              "rgba(153, 102, 255, 0.2)",
            ]
          }]
        }
      });
    </script>
  </div>
</body>

</html>