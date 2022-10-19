<!DOCTYPE html>
<html lang="pt-br">
    <%
        request.getSession().setAttribute("funcionarioId", null);
    %>
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ReciclaMaisRio</title>
        <link rel="stylesheet" href="./css/index.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
        <link rel="icon" type="image/x-icon" href="./assets/favicon.ico">
    </head>

    <body>
        <div id="pagina">
            <div id="modal" class="modal bloqueado">
                <form action="">
                    <h2>Entrada negada</h2>
                    <div class="inputbox">
                        <input type="text" name="login" id="login" required>
                        <label for="login">Login</label>
                        <span></span>
                    </div>
                    <div class="inputbox">
                        <input type="password" name="senha" id="senha" required>
                        <label for="senha">Senha</label>
                        <span></span>
                    </div>
                    <div class="inputbox">
                        <input type="submit" value="Enviar" id="submit-btn">
                    </div>
                </form>
            </div>
            <div class="conteudo">
                <div class="bem-vindo">
                    <h2 id="bem-vindo" class="bem-vindo">Bem-vindo</h2>
                </div>
                <div class="titulo">
                    <h3 id="titulo" class="titulo">O que deseja fazer?</h3>
                </div>
                <div class="opcoes">
                    <div class="opcao">
                        <div class="logo">
                            <a href="./paginas/graficofinanceiro.jsp">
                                <i class="bi bi-bar-chart-fill"></i>
                            </a>
                        </div>
                        <span class="descricao">Relatórios</span>
                    </div>
                    <div class="opcao">
                        <div class="logo">
                            <a href="./paginas/catadorescontrolar.jsp?pag=1">
                                <i class="bi bi-person-fill"></i>
                            </a>
                        </div>
                        <span class="descricao">Cadastros</span>
                    </div>
                    <div class="opcao">
                        <div class="logo">
                            <a href="./paginas/compra.jsp">
                                <i class="bi bi-cart-fill"></i>
                            </a>
                        </div>
                        <span class="descricao">Comprar</span>
                    </div>
                    <div class="opcao">
                        <div class="logo">
                            <a href="./paginas/bonificarcatadores.jsp">
                                <i class="bi bi-currency-dollar"></i>
                            </a>
                        </div>
                        <span class="descricao">Bonificar</span>
                    </div>
                </div>
            </div>
        </div>
        <script src="./scripts/admin.js" type=""></script>
    </body>

</html>