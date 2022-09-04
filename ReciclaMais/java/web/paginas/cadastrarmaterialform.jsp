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
    <div id="pagina">
        <div class="conteiner">
            <h2>Adicionar Material</h2>
            <form action="cadastrarmaterial.jsp" method="post">
                <input type="text" name="nome" id="" placeholder="nome">
                <input type="text" name="metaBonificacaoKg" id="" placeholder="meta_bonificacao">
                <input type="text" name="valorBonificacao" id="" placeholder="valor_bonificacao">
                <input type="text" name="precoCompraKg" id="" placeholder="preco_compra_kg">
                <input type="text" name="precoVendaKg" id="" placeholder="preco_venda_kg">
                <input type="submit" value="enviar" style="background-color: green;">
            </form>
        </div>
    </div>
</body>
</html>