<%@page import="dao.MateriaisDao"%>
<%@page import="entidades.Material"%>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Adicionar Material</title>
        <link rel="stylesheet" href="../css/editarform.css">
    </head>
    <body>
        <%
            String id = request.getParameter("id");
            Material material = MateriaisDao.getMaterialById(Integer.parseInt(id));
        %>
        <div id="pagina">
            <div class="conteiner">
                <h2>Editar Material</h2>
                <form action="editarmaterial.jsp" method="post">
                    <input type="hidden" name="id" value="<%=material.getId()%>">
                    <input type="text" name="nome" id="" placeholder="nome" value="<%=material.getNome()%>">
                    <input type="text" name="metaBonificacaoKg" id="" placeholder="meta_bonificacao" value="<%=material.getMetaBonificacaoKg()%>">
                    <input type="text" name="valorBonificacao" id="" placeholder="valor_bonificacao" value="<%=material.getValorBonificacao()%>">
                    <input type="text" name="precoCompraKg" id="" placeholder="preco_compra_kg" value="<%=material.getPrecoCompraKg()%>">
                    <input type="text" name="precoVendaKg" id="" placeholder="preco_venda_kg" value="<%=material.getPrecoVendaKg()%>">
                    <input type="submit" value="enviar" style="background-color: green;">
                </form>
            </div>
        </div>
    </body>
</html>