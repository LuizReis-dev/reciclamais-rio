

<%@page import="dao.UsuarioDao"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
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
        <%

            int[] valores = UsuarioDao.getRelatorioUsuarios();
            request.setAttribute("valores", valores);

        %>
        <%@include file="navegacao.html"%>
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
            var valores = [<%=valores[0]%>, <%=valores[1]%>];
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