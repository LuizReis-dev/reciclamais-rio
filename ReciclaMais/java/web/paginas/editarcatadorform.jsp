<%@page import="dao.CatadorDao" %>
    <%@page import="entidades.Catador" %>
        <!DOCTYPE html>
        <html lang="pt-br">

        <head>
            <meta charset="UTF-8">
            <meta http-equiv="X-UA-Compatible" content="IE=edge">
            <meta name="viewport" content="width=device-width, initial-scale=1.0">
            <title>Catador Cadastrar</title>
            <link rel="stylesheet" href="../css/editarform.css">
        </head>

        <body>
            <% <%@include file="controledeacesso.jsp" %>

                String id = request.getParameter("id");
                Catador catador = CatadorDao.getCatadorById(Integer.parseInt(id));
                %>
                <div id="pagina">
                    <div class="conteiner">
                        <h2>Cadastrar catador</h2>
                        <form action="editarcatador.jsp" method="post">
                            <input type="hidden" name="id" value="<%=catador.getId()%>">
                            <input type="text" name="nome" id="" placeholder="nome" value="<%=catador.getNome()%>">
                            <input type="text" name="email" id="" placeholder="email" value="<%=catador.getEmail()%>">
                            <input type="text" name="cpf" id="" placeholder="cpf" value="<%=catador.getCpf()%>">
                            <input type="text" name="endereco" id="" placeholder="endere�o"
                                value="<%=catador.getEndereco()%>">

                            <input type="text" name="telefone" id="" placeholder="telefone"
                                value="<%=catador.getTelefone()%>">
                            <input type="submit" value="enviar" style="background-color: green;">
                        </form>
                    </div>
                </div>


        </body>

        </html>