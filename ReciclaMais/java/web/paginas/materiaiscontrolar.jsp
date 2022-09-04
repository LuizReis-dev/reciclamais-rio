
<%@page import="dao.MateriaisDao"%>
<%@page import="java.util.List"%>
<%@page import="entidades.Material"%>
<%@page import="entidades.Material"%>
<%@ taglib uri="http://java.sun.com/jsp/jstl/core" prefix="c" %>

<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Controlar empresas</title>
        <link rel="import" href="navegacao.html">
        <link rel="stylesheet" href="../css/controlar.css">
    </head>

    <body>
        <%@include file="navegacao.html"%>

        <div class="conteudo-principal">
            <div class="opcoes">
                <a class="opcao" href="catadorescontrolar.jsp?pag=1">Catadores</a>
                <a  class="opcao" href="empresascontrolar.jsp?pag=1">Empresas</a>
                <a id="selecionado" class="opcao" href="materiaiscontrolar.jsp?pag=1">Materiais</a>
            </div>
            <table class="tabela-controlar">
                <%
                    String pag = request.getParameter("pag");
                    int id = Integer.parseInt(pag);

                    //Quantidade de Registros da Página
                    int total = 5;

                    if (id != 1) {
                        id = id - 1;
                        id = id * total + 1;
                    }
                    List<Material> lista = MateriaisDao.getMateriais(id, total);
                    request.setAttribute("lista", lista);

                    int contagem = MateriaisDao.getContagem();
                    int i;
                    request.setAttribute("contagem", contagem);
                    if (contagem % total == 0) {
                        contagem = contagem / total;
                    } else {
                        contagem = contagem / total + 1;
                    }
                %>
                <thead>
                <th>Id</th>
                <th>Nome</th>
                <th>Preço Venda por kg</th>
                <th class="th-actions">Ações</th>
                </thead>
                <c:forEach items="${lista}" var="material">
                    <tr>
                        <td>${material.getId()}</td>
                        <td>${material.getNome()}</td>                
                        <td>${material.getPrecoVendaKg()}</td> 
                        <td class='acoes'><a href='editarmaterialform.jsp?id=${material.getId()}'><i class='bi bi-eye olho'></i></a> <a href='excluirmaterial.jsp?id=${material.getId()}'><button btn-delete class='buttons-template btn-delete'>Deletar</button> </a></td>
                    </tr>
                </c:forEach>

            </table>
            <div class="escolha">    
                <div class="pagination">
                    <% for (i = 1; i <= contagem; i++) {%>
                    <a href="materiaiscontrolar.jsp?pag=<%=i%>"><%=i%></a>
                    <% }%>   
                </div>  
                <a href="cadastrarmaterialform.jsp"> <button class='buttons-template btn-add'>Adicionar</button></a>
            </div>
        </div>

    </body>

</html>