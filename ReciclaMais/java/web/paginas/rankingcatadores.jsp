
<%@page import="entidades.MateriaisEmOperacaoComercial"%>
<%@page import="java.util.List"%>
<%@page import="dao.MateriaisEmOperacaoComercialDao"%>
<%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c" %>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ReciclaMaisRio | Gráfico Compras</title>
        <link rel="stylesheet" href="../css/relatorios.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
        <link rel="icon" type="image/x-icon" href="../assets/favicon.ico">
    </head>

    <body>
        <div id="pagina">

            <%
                List<MateriaisEmOperacaoComercial> lista = MateriaisEmOperacaoComercialDao.catadoresQueMaisVenderam();
                request.setAttribute("lista", lista);
            %>            
            <%@include file="navegacao.html"%>
            <div class="wrapper">
                <h1>Catadores que mais venderam</h1>
                <table class="tabela-controlar">
                    <thead>
                    <th>Nome</th>
                    <th>Quantidade Vendida</th>
                    </thead>
                    <c:forEach items="${lista}" var="matop">
                        <tr class="row">
                            <td>${matop.getOperacaoComercial().getCatador().getNome()}</td>
                            <td>${matop.getQuantidadeEmKg()}KG</td>                
                        </tr>
                    </c:forEach>
                </table>
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
                        <div class="grafico-opcao">
                            <i class="bi bi-basket"></i>

                            <span class="descricao-grafico">Materiais</span>
                        </div>
                    </a>
                    <a href="graficousuario.jsp">
                        <div class="grafico-opcao">
                            <i class="bi bi-people"></i>
                            <span class="descricao-grafico">Usuários</span>
                        </div>
                    </a>
                    <a href="graficovendas.jsp"> 
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
                    <a href="rankingcatadores.jsp">
                        <div class="grafico-opcao" id="selecionado">
                            <i class="bi bi-award"></i>
                            <span class="descricao-grafico">Rakings</span>
                        </div>
                    </a>
                </section>
            </div>

    </body>

</html>