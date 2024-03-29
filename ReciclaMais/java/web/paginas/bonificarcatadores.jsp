<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReciclaMaisRio | Bonificar Catadores</title>
    <link rel="stylesheet" href="../css/controlar.css">
    <link rel="stylesheet" href="../css/bonificarcatadores.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico">
</head>

<body>
    <div id="pagina">
    <%@include file="navegacao.html"%>
    <%@include file="controledeacesso.jsp"%>

    <div class="conteudo-principal">
        <div class="opcoes">
            <a id="selecionado" class="opcao" href="#">Bonificar</a>
            <a class="opcao" href="ultimasbonificacoes.jsp?pag=1">Ultimas Bonificacoes</a>
        </div>

        <table class="tabela-controlar">
            <thead>
                <th>Nome</th>
                <th>Material referente</th>
                <th>Total Vendido</th>
                <th>Valor recomendado</th>
                <th class="th-actions">Acoes</th>
            </thead>
        </table>
        <div class="modal">
            <i class="bi bi-x-lg fechar-modal"></i>
            <h3 id="catador-nome">Bonificar Catador: </h3>
            <input id="qtd-input" type="number" placeholder="Valor Sugerido: R$30">
            <button class='buttons-template btn-confirmar'>Bonificar</button>
        </div>
    </div>
    </div>
    <script src="../scripts/bonificar.js"></script>
</body>

</html>