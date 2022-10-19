<%@page import="dao.OperacaoComercialDao"%>
<%@page import="entidades.Material"%>
<%@page import="entidades.MateriaisEmOperacaoComercial"%>
<%@page import="java.util.List"%>
<%@page import="dao.MateriaisEmOperacaoComercialDao"%>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="../css/relatorios.css">
        <title>Controle</title>
    </head>

    <body>
        <div id="pagina">

            <%

                List<Integer> valores = OperacaoComercialDao.getTotalVendasPorMes("2022");
                request.setAttribute("valores", valores);

            %>            
            <%@include file="navegacao.html"%>
            <div class="wrapper">
                <h1>Controle por Gráficos</h1>
                <div class="grafico">
                    <h2>Total de vendas no ano de 2022</h2>
                    <canvas id="myChart" height='200'></canvas>
                </div>
            </div>
            <div class="section">
                <section>
                    <h2>Gráficos</h2>
                    <a href="graficofinanceiro.jsp">
                        <div class="grafico-opcao" tabindex="1">
                            <i class="bi bi-coin"></i>
                            <span class="descricao-grafico">Financeiro</span>
                        </div>
                    </a>
                    <a href="graficomaterial.jsp">
                        <div class="grafico-opcao" tabindex="1">
                            <i class="bi bi-basket"></i>

                            <span class="descricao-grafico">Materiais</span>
                        </div>
                    </a>
                    <a href="graficousuario.jsp">
                        <div class="grafico-opcao" tabindex="1">
                            <i class="bi bi-people"></i>
                            <span class="descricao-grafico">Usuários</span>
                        </div>
                    </a>
                    <a href="graficocompras.jsp"> 
                        <div class="grafico-opcao" tabindex="1">
                            <i class="bi bi-cart2"></i>
                            <span class="descricao-grafico">Compras</span>
                        </div>   
                    </a>
                    <div class="grafico-opcao" tabindex="1">
                        <i class="bi bi-cash"></i>
                        <span class="descricao-grafico">Vendas</span>
                    </div>
                    <a href="ranking.jsp">
                        <div class="grafico-opcao" tabindex="1">
                            <i class="bi bi-award"></i>
                            <span class="descricao-grafico">Rakings</span>
                        </div>
                    </a>
                </section>
            </div>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
            <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
            <script type="text/javascript">
                var ctx = document.getElementById("myChart");
                var valores = [];
                <%                        for (int i = 0; i < valores.size(); i++) {

                %>
                valores.push(<%=valores.get(i)%>)

                <%
                    }

                %>;
                console.log(valores);
                var quantidadeDeMeses = Object.keys(valores).length;
                console.log(quantidadeDeMeses);
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
                for (let i = 1; i <= quantidadeDeMeses; i++) {
                meses.push(mesesDoAno[i]);
                }
                var myChart = new Chart(ctx, {
                type: "bar",
                        data: {
                        labels: meses,
                                datasets: [{
                                label: "Venda",
                                        data: Object.values(valores),
                                        backgroundColor: [
                                                "rgba(144,238,144, 0.2)",
                                        ]
                                }]
                        }


                });
            </script>
        </script>  
</body>

</html>