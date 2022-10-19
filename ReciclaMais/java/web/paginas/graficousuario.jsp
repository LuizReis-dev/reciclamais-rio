

<%@page import="dao.UsuarioDao"%>
<%@page contentType="text/html" pageEncoding="UTF-8"%>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ReciclaMaisRio | Gráfico Usuário</title>
        <link rel="stylesheet" href="../css/relatorios.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
        <link rel="icon" type="image/x-icon" href="../assets/favicon.ico">
    </head>

    <body>
        <div id="pagina">

            <%

                int[] valores = UsuarioDao.getRelatorioUsuarios();
                request.setAttribute("valores", valores);

            %>
            <%@include file="navegacao.html"%>
            <div class="wrapper">
                <h1>Controle por Gráficos</h1>
                <div class="grafico">
                    <h2>Quantidade de Usuários por função</h2>
                    <canvas id="myChart" height='200'></canvas>
                </div>
            </div>
            <div class="section">
                <section>
                    <h2>Gráficos</h2>
                    <a href="graficofinanceiro.jsp">
                        <div class="grafico-opcao">
                            <i class="bi bi-coin"></i>

                            <span class="descricao-grafico">Financeiro</span>
                        </div>
                    </a>
                    <a href="graficomaterial.jsp">
                        <div class="grafico-opcao" >
                            <i class="bi bi-basket"></i>
                            <span class="descricao-grafico">Materiais</span>
                        </div>
                    </a>
                    <div class="grafico-opcao" id="selecionado">
                        <i class="bi bi-people"></i>
                        <span class="descricao-grafico">Usuários</span>
                    </div>
                    <a href="graficocompras.jsp">
                        <div class="grafico-opcao">
                            <i class="bi bi-cart2"></i>
                            <span class="descricao-grafico">Compras</span>
                        </div>   
                    </a>
                    <a href="graficovendas.jsp"> 
                        <div class="grafico-opcao">
                            <i class="bi bi-cash"></i>
                            <span class="descricao-grafico">Vendas</span>
                        </div>
                    </a>
                    <a href="ranking.jsp">
                        <div class="grafico-opcao">
                            <i class="bi bi-award"></i>
                            <span class="descricao-grafico">Rakings</span>
                        </div>
                    </a>

                </section>
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
        </div>
    </body>

</html>