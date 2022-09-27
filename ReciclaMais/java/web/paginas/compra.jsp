<!DOCTYPE html>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    
    <title>ReciclaMaisRio | Compra</title>
    
    <link rel="stylesheet" href="../css/navegacao.css">
    <link rel="stylesheet" href="../css/compra.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.1.2/css/all.min.css">
    <link rel="icon" type="image/x-icon" href="../assets/favicon.ico">
    
</head>

<body>
    <div id="pagina" class="compra">
        <%@include file="navegacao.html" %>
        <div class="coletor">
            <form action="" method="" id="catador-form" class="coletor">
                <h2><i class="fa-solid fa-users"></i>Catadores</h2>
                <div class="procurar">
                    <input type="text" name="pesquisar-catador" id="search-catador" placeholder="Pesquise aqui...">
                    <label for="search-catador">
                        <i class="bi bi-search"></i>
                    </label>
                </div>
                <select name="catador" id="catadores" class="produto select"></select>
                <div class="botoes">
                    <input type="submit" name="enviar" id="add-catador" value="selecionar">
                    <input type="submit" name="enviar" id="remover-catador" value="limpar">
                </div>
            </form>
        </div>
        <div class="informacao">
            <div class="conteiner-info">
                <form id="material-form" action="" method="">
                    <h2><i class="fa-solid fa-scale-balanced"></i>Materiais</h2>
                    <div class="material">
                        <input type="text" name="pesquisar-material" id="search-material" placeholder="Pesquise aqui...">
                        <label for="material">
                            <i class="bi bi-search"></i>
                        </label>
                    </div>
                    <div class="quantidade">
                        <label for="produto">
                            <i class="bi bi-minecart-loaded"></i>
                        </label>
                        <input type="text" name="produto" id="qtd-material" placeholder="Digite a quantidade..." class="quantidade">
                    </div>
                    <div class="dados-produto">
                        <select name="material" id="materiais" class="produto select"></select>
                        <span id="preco-material">R$50</span>
                    </div>
                    <div class="botoes">
                        <button class="produtos" id="add-material">Adicionar</button>
                        <button class="produtos" id="remover-material">Deletar</button>
                    </div>
                </form>
            </div>
        </div>
        <div class="produtos">
            <table class="produto produtos">
                <thead>
                    <tr class="titulotabela produtos">
                        <th colspan="3">Finalizar compra</th>
                    </tr>
                    <tr>
                        <th colspan="3" id="catador-div"></th>
                    </tr>
                </thead>
                <tbody class="produtos-container"></tbody>
                <tfoot>
                    <tr class="total produtos">
                        <th>Total</th>
                        <th>sem bonificação</th>
                        <th id="preco-final"></th>
                    </tr>
                </tfoot>
            </table>
        </div>
        <div class="botao">
            <button id="comprar-btn">
                <span>Finalizar</span>
            </button>
        </div>
    </div>
    <script src="../scripts/compra.js"></script>
</body>

</html>