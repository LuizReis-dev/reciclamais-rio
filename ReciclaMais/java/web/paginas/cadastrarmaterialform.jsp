<!DOCTYPE html>
<html lang="pt-br">
    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ReciclaMaisRio | Cadastrar Materiais</title>
        <link rel="stylesheet" href="../css/editarform.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
        <link rel="icon" type="image/x-icon" href="../assets/favicon.ico">
    </head>
    <body>
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
                <form action="cadastrarmaterial.jsp" method="post">
                    <picture class="cristo">
                        <img src="../assets/cristobranco.png" alt="cristo">
                    </picture>
                    <div class="cabecalho">
                        <h2>Material-add</h2>
                    </div>
                    <div class="inputs">
                        <div class="div_input_label">    
                            <input class="input" type="text" name="nome" id="nome">
                            <label class="label" for="nome">Nome</label>
                                <span class="input_span">
                                    <i class="bi bi-person-fill icone"></i>
                            </span>
                        </div>
                        <div class="div_input_label">
                            <input class="input" type="text" name="meta_bonificacao" id="meta_bonificacao">
                            <label class="label" for="meta_bonificacao">Meta</label>
                            <span class="input_span">
                                <i class="bi bi-currency-dollar icone"></i>
                            </span>
                        </div>
                        <div class="div_input_label">
                            <input class="input" type="text" name="valor_bonificacao" id="valor_bonificacao">
                            <label class="label" for="valor_bonificacao">Valor</label>
                            <span class="input_span">
                                <i class="bi bi-cash-coin icone"></i>
                            </span>
                        </div>
                        <div class="div_input_label">
                            <input class="input" type="text" name="preco_compra_kg" id="preco_compra_kg">
                            <label class="label" for="preco_compra_kg">Preço kg</label>
                            <span class="input_span">
                                <i class="bi bi-tag-fill icone"></i>
                            </span>
                        </div>
                        <div class="div_input_label">
                            <input class="input" type="text" name="preco_venda_kg" id="preco_venda_kg">
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