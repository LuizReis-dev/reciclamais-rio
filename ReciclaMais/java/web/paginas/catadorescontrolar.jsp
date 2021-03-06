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

        <div class="conteudo-principal">
            <div class="opcoes">
                <a id="selecionado" class="opcao" href="#">Catadores</a>
                <a class="opcao" href="empresascontrolar.jsp">Empresas</a>
                <a class="opcao" href="materiaiscontrolar.jsp">Materiais</a>
            </div>
            <%
                List<Catador> lista = CatadorDao.getCatadores();
                request.setAttribute("lista", lista);
            %>
            <table class="tabela-controlar">
                <thead>
                <th>Id</th>
                <th>Nome</th>
                <th>Idade</th>
                <th>CPF</th>
                <th class="th-actions">A??es</th>
                </thead>
                <c:forEach items="${lista}" var="catador">
                    <tr>
                        <td>${catador.getId()}</td>
                        <td>${catador.getNome()}</td>                
                        <td>${catador.calcularIdade()}</td> 
                        <td>${catador.getCpf()}</td>
                        <td class='acoes'><a href='#'><i class='bi bi-eye olho'></i></a> <a href='#'><button btn-delete class='buttons-template btn-delete'>Deletar</button> </a></td>
                    </tr>
                </c:forEach>
            </table>

        </div>

    </body>

</html>
