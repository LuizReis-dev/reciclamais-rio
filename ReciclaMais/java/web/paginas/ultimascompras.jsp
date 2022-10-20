<%@page import="java.time.LocalDate"%>
<%@page import="java.util.Date"%>
<%@page import="java.text.SimpleDateFormat"%>
<%@page import="entidades.OperacaoComercial"%>
<%@page import="dao.OperacaoComercialDao"%>
<%@page import="java.util.List"%>
<%@page import="dao.CatadorDao"%>
<%@page import="entidades.Catador"%>
<%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c" %>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Controlar catadores</title>
        <link rel="import" href="navegacao.html">
        <link rel="stylesheet" href="../css/controlar.css">
        <%@page pageEncoding="UTF-8" %>


    </head>

    <body>
        <%@include file="controledeacesso.jsp"%>
        <%            String dia;

            if (request.getParameter("data") != null) {
                dia = request.getParameter("data");
            } else {
                LocalDate diaDeHoje = LocalDate.now();
                dia = diaDeHoje.toString();
            }

            List<OperacaoComercial> lista = OperacaoComercialDao.getOpComercialPorDia(dia);

            System.out.print(lista);
            request.setAttribute("lista", lista);

            SimpleDateFormat sdf = new SimpleDateFormat("yyyy-MM-dd");
            Date diaf = sdf.parse(dia);
            sdf.applyPattern("dd/MM/yyyy");
            String diaFormat = sdf.format(diaf);
        %>
        <div id ="pagina">
            <%@include file="navegacao.html"%>

            <div class="conteudo-principal">
                <h1>Compras do dia: <%= diaFormat%></h1>
                <div class="opcoes">
                    <form action="ultimascompras.jsp">
                        <label for="data">Escolha um dia: </label>
                        <input type="date" name="data" id="data" required>
                        <input type="submit" value="selecionar">
                    </form>
                </div>

                <table class="tabela-controlar">
                    <thead>
                    <th>Id</th>
                    <th>Valor Sugerido</th>
                    <th>Valor Final</th>
                    <th>Catador</th>
                    <th>Funcionario</th>
                    </thead>
                    <c:forEach items="${lista}" var="op">
                        <tr>
                            <td>${op.getId()}</td>
                            <td>${op.getTotal_sugerido()}</td>
                            <td>${op.getTotal_final()}</td>
                            <td>${op.getCatador().getNome()}</td>
                            <td>${op.getFuncionario().getNome()}</td>
                        </tr>
                    </c:forEach>
                </table>

            </div>
        </div>
    </body>

</html>
