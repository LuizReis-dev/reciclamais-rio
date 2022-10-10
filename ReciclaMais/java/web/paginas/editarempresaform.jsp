<%@page import="dao.EmpresaDao" %>
    <%@page import="entidades.Empresa" %>
        <!DOCTYPE html>
        <html lang="pt-br">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Editar Catador</title>
            <link rel="stylesheet" href="../css/editarform.css">
        </head>

        <body>
            <% <%@include file="controledeacesso.jsp" %>

                String id = request.getParameter("id");
                Empresa empresa = EmpresaDao.getEmpresaById(Integer.parseInt(id));
                %>
                <div id="pagina">
                    <div class="conteiner">
                        <h2>editar empresa</h2>
                        <form action="editarempresa.jsp" method="post">
                            <input type="hidden" name="id" value="<%=empresa.getId()%>">
                            <input type="text" name="nome" id="" placeholder="nome" value="<%=empresa.getNome()%>">
                            <input type="text" name="endereco" id="" placeholder="endereco"
                                value="<%=empresa.getEndereco()%>">
                            <input type="text" name="email" id="" placeholder="email" value="<%=empresa.getEmail()%>">
                            <input type="text" name="telefone" id="" placeholder="telefone"
                                value="<%=empresa.getTelefone()%>">
                            <input type="submit" value="enviar" style="background-color: green;">
                        </form>
                    </div>
                </div>


        </body>

        </html>