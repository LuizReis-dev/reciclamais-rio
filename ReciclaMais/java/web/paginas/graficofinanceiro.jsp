<%@page import="dao.OperacaoComercialDao"%>
<%@page import="entidades.Material"%>
<%@page import="entidades.MateriaisEmOperacaoComercial"%>
<%@page import="java.util.List"%>
<%@page import="dao.MateriaisEmOperacaoComercialDao"%>
<!DOCTYPE html>
<html lang="en">
    <%

        List<Double> valores = OperacaoComercialDao.getLucroPorMes("2022");
        request.setAttribute("valores", valores);

    %>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Grafico Lucro por Mês</title>
    </head>

    <body>
        <canvas id="myChart" height='200'></canvas>
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
            type: "line",
                    data: {
                    labels: meses,
                            datasets: [{
                            label: "Lucro",
                                    data: Object.values(valores),
                                    backgroundColor: [
                                            "rgba(255, 99, 132, 0.2)",
                                    ]
                            }]
                    }


            });
        </script>
    </script>  
</body>

</html>