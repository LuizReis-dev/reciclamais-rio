
<%@page import="dao.EmpresaDao"%>
<%@page import="java.util.List"%>
<%@page import="entidades.Empresa"%>
<%@page import="entidades.Empresa"%>
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
                <a class="opcao" href="catadorescontrolar.jsp">Catadores</a>
                <a id="selecionado" class="opcao" href="#s">Empresas</a>
                <a class="opcao" href="materiaiscontrolar.jsp">Materiais</a>
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
                    List<Empresa> lista = EmpresaDao.getEmpresas(id, total);
                    request.setAttribute("lista", lista);

                    int contagem = EmpresaDao.getContagem();
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
                <th>Ramo</th>
                <th>CNPJ</th>
                <th class="th-actions">Ações</th>
                </thead>
                <c:forEach items="${lista}" var="empresa">
                    <tr>
                        <td>${empresa.getId()}</td>
                        <td>${empresa.getNome()}</td>                
                        <td>${empresa.getRamo()}</td> 
                        <td>${empresa.getCnpj()}</td>
                        <td class='acoes'><a href='editarempresaform.jsp?id=${empresa.getId()}'><i class='bi bi-eye olho'></i></a> <a href='excluirempresa.jsp?id=${empresa.getId()}'><button btn-delete class='buttons-template btn-delete'>Deletar</button> </a></td>
                    </tr>
                </c:forEach>

            </table>
                <div class="pagination">
                    <% for(i=1; i <= contagem; i++) {%>
                            <a href="empresascontrolar.jsp?pag=<%=i%>"><%=i%></a>
                    <% } %>   
                </div>  
        </div>

    </body>

</html>