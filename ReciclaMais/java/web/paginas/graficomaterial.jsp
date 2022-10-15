<%@page import="entidades.MateriaisEmOperacaoComercial"%>
<%@page import="java.util.List"%>
<%@page import="dao.MateriaisEmOperacaoComercialDao"%>
<!DOCTYPE html>
<html lang="en">
    <%

        List<MateriaisEmOperacaoComercial> valores = MateriaisEmOperacaoComercialDao.materiaisMaisVendidos();
        request.setAttribute("valores", valores);

    %>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Grafico Material</title>
    </head>

    <body>
        <canvas id="myChart" height='200'></canvas>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
        <script src="https://cdnjs.cloudflare.com/ajax/libs/Chart.js/2.8.0/Chart.min.js"></script>
        <script type="text/javascript">
            var ctx = document.getElementById("myChart");
            var valores = [];

            <%               
                for (int i = 0; i < valores.size(); i++) {

            %>
                valores.push(<%=valores.get(i).getQuantidadeEmKg()%>)
                   
            <%     
                }

            %>;
            var tipos = [];
            
             <%               
                for (int i = 0; i < valores.size(); i++) {

            %>
                tipos.push("<%=valores.get(i).getMaterial().getNome()%>")
                   
            <%     
                }

            %>;
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