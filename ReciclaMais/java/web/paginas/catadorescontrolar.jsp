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

    </head>

    <body>
        <%@include file="navegacao.html"%>
        <%
            String pag = request.getParameter("pag");
            int id = Integer.parseInt(pag);

            //Quantidade de Registros da P�gina
            int total = 2;

            if (id != 1) {
                id = id - 1;
                id = id * total + 1;
            }
            List<Catador> lista = CatadorDao.getCatadores(id, total);
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
                <a id="selecionado" class="opcao" href="#">Catadores</a>
                <a class="opcao" href="empresascontrolar.jsp?pag=1">Empresas</a>
                <a class="opcao" href="materiaiscontrolar.jsp?pag=1">Materiais</a>
            </div>

            <table class="tabela-controlar">
                <thead>
                <th>Id</th>
                <th>Nome</th>
                <th>CPF</th>
                <th class="th-actions">A��es</th>
                </thead>
                <c:forEach items="${lista}" var="catador">
                    <tr>
                        <td>${catador.getId()}</td>
                        <td>${catador.getNome()}</td>                
                        <td>${catador.getCpf()}</td>
                        <td class='acoes'><a href='editarcatadorform.jsp?id=${catador.getId()}'><i class='bi bi-eye olho'></i></a> <a href='excluircatador.jsp?id=${catador.getId()}'><button btn-delete class='buttons-template btn-delete'>Deletar</button> </a></td>
                    </tr>
                </c:forEach>
            </table>
            <div class="escolha">    
                <div class="pagination">
                    <% for (i = 1; i <= contagem; i++) {%>
                    <a href="catadorescontrolar.jsp?pag=<%=i%>"><%=i%></a>
                    <% }%>   
                </div>  
                <a href="cadastrarcatadorform.jsp"> <button class='buttons-template btn-add'>Adicionar</button></a>
            </div>
        </div>

    </body>

</html>
