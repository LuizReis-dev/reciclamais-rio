<%@page import="entidades.Bonificacao"%>
<%@page import="dao.BonificacaoDao"%>
<%@page import="dao.BonificacaoDao"%>
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
        <title>ReciclaMaisRio | Controlar catadores</title>
        <link rel="stylesheet" href="../css/controlar.css">
        <link rel="stylesheet" href="../css/bonificarcatadores.css">
        <link rel="icon" type="image/x-icon" href="../assets/favicon.ico">
    </head>

    <body>
        <div id="pagina">
        <%@include file="navegacao.html"%>
        <%@include file="controledeacesso.jsp"%>

        <%            String pag = request.getParameter("pag");
            int id = Integer.parseInt(pag);

            //Quantidade de Registros da P�gina
            int total = 5;

            if (id != 1) {
                id = id - 1;
                id = id * total + 1;
            }
            List<Bonificacao> lista = BonificacaoDao.getBonificacoes(id, total);
            request.setAttribute("lista", lista);

            int contagem = CatadorDao.getContagem();
            int i;
            request.setAttribute("contagem", contagem);
            if (contagem % total == 0) {
                contagem = contagem / total;
            } else {
                contagem = contagem / total + 1;
            }
        %>
        <div class="conteudo-principal">
            <div class="opcoes">
                <a  class="opcao" href="bonificarcatadores.jsp">Bonificar</a>
                <a id="selecionado" class="opcao" href="#">Ultimas Bonificacoes</a>
            </div>

            <table class="tabela-controlar">
                <thead>
                <th>Id</th>
                <th>Valor</th>
                <th>Status</th>
                <th>Catador</th>
                </thead>
                <c:forEach items="${lista}" var="bonificacao">
                    <tr>
                        <td>${bonificacao.getId()}</td>
                        <td>${bonificacao.getValor()}</td>
                        <td>${bonificacao.getStatus()}</td>
                        <td>${bonificacao.getMatEmOp().getOperacaoComercial().getCatador().getNome()}</td>

                    </tr>
                </c:forEach>
            </table>
            <div class="escolha">    
                <div class="pagination">
                    <% for (i = 1; i <= contagem; i++) {%>
                    <a href="ultimasbonificacoes.jsp?pag=<%=i%>"><%=i%></a>
                    <% }%>   
                </div>  
            </div>
        </div>
        </div>
    </body>

</html>
