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
            <div class="home">
                <a href="materiaiscontrolar.jsp?pag=1">
                    <button class="retornar">
                        <span class="voltar"></span>
                        <span class="descricao">Material</span>
                    </button>
                </a>
            </div>
            <div class="conteiner">
                <form action="editarmaterial.jsp" method="post">
                    <picture class="cristo">
                        <img src="../assets/cristobranco.png" alt="cristo">
                    </picture>
                    <div class="cabecalho">
                        <h2>Material-edit</h2>
                    </div>
                    <div class="inputs">
                        <input type="hidden" name="id" value="<%=material.getId()%>">
                        <div class="div_input_label">    
                            <input class="input" type="text" name="nome" id="nome" value="<%=material.getNome()%>">
                            <label class="label" for="nome">Nome</label>
                                <span class="input_span">
                                    <i class="bi bi-person-fill icone"></i>
                            </span>
                        </div>
                        <div class="div_input_label">
                            <input class="input" type="text" name="meta_bonificacao" id="meta_bonificacao" value="<%=material.getMetaBonificacaoKg()%>">
                            <label class="label" for="meta_bonificacao">Meta</label>
                            <span class="input_span">
                                <i class="bi bi-currency-dollar icone"></i>
                            </span>
                        </div>
                        <div class="div_input_label">
                            <input class="input" type="text" name="valor_bonificacao" id="valor_bonificacao" value="<%=material.getValorBonificacao()%>">
                            <label class="label" for="valor_bonificacao">Valor</label>
                            <span class="input_span">
                                <i class="bi bi-cash-coin icone"></i>
                            </span>
                        </div>
                        <div class="div_input_label">
                            <input class="input" type="text" name="preco_compra_kg" id="preco_compra_kg" value="<%=material.getPrecoCompraKg()%>">
                            <label class="label" for="preco_compra_kg">Preço kg</label>
                            <span class="input_span">
                                <i class="bi bi-tag-fill icone"></i>
                            </span>
                        </div>
                        <div class="div_input_label">
                            <input class="input" type="text" name="preco_venda_kg" id="preco_venda_kg" value="<%=material.getPrecoVendaKg()%>">
                            <label class="label" for="preco_venda_kg">Preço venda</label>
                            <span class="input_span">
                                <i class="bi bi-wallet icone"></i>
                            </span>
                        </div>
                        <div class="div_button">
                            <input class="button" type="submit" value="enviar">
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </body>
</html>