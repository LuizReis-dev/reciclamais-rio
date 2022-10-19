<%@page import="dao.CatadorDao" %>
<%@page import="entidades.Catador" %>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ReciclaMaisRio | Editar Catadores</title>
        <link rel="stylesheet" href="../css/editarform.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
        <link rel="icon" type="image/x-icon" href="../assets/favicon.ico">
    </head>
    <%@include file="controledeacesso.jsp" %>
    <body>
        <%        String id = request.getParameter("id");
            Catador catador = CatadorDao.getCatadorById(Integer.parseInt(id));
        %>
        <div id="pagina">
            <div class="home">
                <a href="catadorescontrolar.jsp?pag=1">
                    <button class="retornar">
                        <span class="voltar"></span>
                        <span class="descricao">Catadores</span>
                    </button>
                </a>
            </div>
            <div class="conteiner">
                <form action="editarcatador.jsp" method="post">
                    <picture class="cristo">
                        <img src="../assets/cristobranco.png" alt="cristo">
                    </picture>
                    <div class="cabecalho">
                        <h2>Catadores-edit</h2>
                    </div>
                    <div class="inputs">
                        <input type="hidden" name="id" value="<%=catador.getId()%>">
                        <div class="div_input_label">
                            <input class="input" type="text" name="nome" id="nome" value="<%=catador.getNome()%>">
                            <label class="label" for="nome">Nome</label>
                            <span class="input_span">
                                <i class="bi bi-person-fill icone"></i>
                            </span>
                        </div>
                        <div class="div_input_label">
                            <input class="input" type="text" name="email" id="email" value="<%=catador.getEmail()%>">
                            <label class="label" for="email">E-mail</label>
                            <span class="input_span">
                                <i class="bi bi-envelope-fill icone"></i>
                            </span>
                        </div>
                        <div class="div_input_label">
                            <input class="input" type="text" name="cpf" id="cpf" value="<%=catador.getCpf()%>">
                            <label class="label" type="cpf">CPF</label>
                            <span class="input_span">
                                <i class="bi bi-credit-card-fill icone"></i>
                            </span>
                        </div>
                        <div class="div_input_label">
                            <input class="input" type="text" name="endereco" id="endereco" value="<%=catador.getEndereco()%>">
                            <label class="label" for="endereco">Endereco</label>
                            <span class="input_span">
                                <i class="bi bi-house-fill icone"></i>
                            </span>
                        </div>
                        <div class="div_input_label">
                            <input class="input" type="text" name="telefone" id="telefone" value="<%=catador.getTelefone()%>">
                            <label class="label" for="telefone">Telefone</label>
                            <span class="input_span">
                                <i class="bi bi-telephone-fill icone"></i>
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