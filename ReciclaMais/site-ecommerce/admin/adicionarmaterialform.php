<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReciclaMaisRio | Material-Add</title>
    <link rel="stylesheet" href="../css/editar.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" type="image/x-icon" href="../imagens/favicon.ico">
</head>
</head>

<body>
    <div id="pagina">
        <div class="home">
            <a href="materiaiscontrolar.php?pag=1">
                <button class="retornar">
                    <span class="voltar"></span>
                    <span class="descricao">controle</span>
                </button>
            </a>
        </div>
        <div class="conteiner">
            <form action="adicionarmaterial.php" method="post">
                <picture class="cristo">
                    <img src="../imagens/cristo.png" alt="cristo">
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
                        <input class="input" type="text" name="qtd_disponivel_venda" id="qtd_disponivel_venda">
                        <label class="label" for="qtd_disponivel_venda">quantidade</label>
                        <span class="input_span">
                            <i class="bi bi-stack icone"></i>
                        </span>
                    </div>
                    <div class="div_input_label">
                        <input class="input" type="text" name="preco_venda_kg" id="preco_venda_kg">
                        <label class="label" for="preco_venda_kg">Preco venda</label>
                        <span class="input_span">
                            <i class="bi bi-wallet icone"></i>
                        </span>
                    </div>
                </div>
                <div class="div_button">
                    <input class="button" type="submit" value="enviar">
                </div>
            </form>
        </div>
    </div>
</body>

</html>