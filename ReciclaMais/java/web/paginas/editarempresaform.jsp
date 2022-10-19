<%@page import="dao.EmpresaDao" %>
<%@page import="entidades.Empresa" %>
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ReciclaMaisRio | Editar Empresas</title>
        <link rel="stylesheet" href="../css/editarform.css">
    </head>
    <%@include file="controledeacesso.jsp" %>
    <body>
        <% 

            String id = request.getParameter("id");
            Empresa empresa = EmpresaDao.getEmpresaById(Integer.parseInt(id));
        %>
        <div id="pagina">
            <div class="home">
                <a href="empresascontrolar.jsp?pag=1">
                    <button class="retornar">
                        <span class="voltar"></span>
                        <span class="descricao">Empresas</span>
                    </button>
                </a>
            </div>
            <div class="conteiner">
                <form action="editarempresa.jsp" method="post">
                    <picture class="cristo">
                        <img src="../assets/cristobranco.png" alt="cristo">
                    </picture>
                    <div class="cabecalho">
                        <h2>Empresas-edit</h2>
                    </div>
                    <div class="inputs">
                        <input type="hidden" name="id" value="<%=empresa.getId()%>">
                        <div class="div_input_label">
                            <input class="input" type="text" name="nome" id="nome" value="<%=empresa.getNome()%>">
                            <label class="label" for="nome">Nome</label>
                            <span class="input_span">
                                <i class="bi bi-person-fill icone"></i>
                            </span>
                        </div>
                        <div class="div_input_label">
                            <input class="input" type="text" name="endereco" id="endereco" value="<%=empresa.getEndereco()%>">
                            <label class="label" for="endereco">Endereco</label>
                            <span class="input_span">
                                <i class="bi bi-house-fill icone"></i>
                            </span>
                        </div>
                        <div class="div_input_label">
                            <input class="input" type="text" name="email" id="email" value="<%=empresa.getEmail()%>">
                            <label class="label" for="email">E-mail</label>
                            <span class="input_span">
                                <i class="bi bi-envelope-fill icone"></i>
                            </span>
                        </div>
                        <div class="div_input_label">
                            <input class="input" type="text" name="telefone" id="telefone" value="<%=empresa.getTelefone()%>">
                            <label class="label" for="telefone">Telefone</label>
                            <span class="input_span">
                                <i class="bi bi-telephone-fill icone"></i>
                            </span>
                        </div>
                        <div class="div_button">
                            <input class="button" type="submit" value="enviar">
                        </div>
                </form>
            </div>
        </div>


    </body>

</html>