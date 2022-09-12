<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="../css/navegacao.css">
        <link rel="stylesheet" href="../css/compra.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">
        <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/selectize.js/0.12.6/css/selectize.bootstrap3.min.css" integrity="sha256-ze/OEYGcFbPRmvCnrSeKbRTtjG4vGLHXgOqsyLFTRjg=" crossorigin="anonymous" />

        <title>ReciclaMaisRio | Compra</title>
    </head>

    <body>
        <%@include file="navegacao.html"%>

        <div class="compra">
            <div class="fileira">
                <div class="coletor">
                    <form action="" method="" class="coletor">
                        <input type="text" name="pesquisar-catador" id="search-catador" placeholder="Pesquise aqui..." >
                        <label><p>Selecione o catador:</p></label>
                        <select name="catador" id="catadores" class="produto select"></select>
                    </form>
                </div>
                <div class="informacao">
                    <div class="conteiner-info">
                        <form action="" method="">
                            <div class="material">
                                <input type="text" name="pesquisar-material" id="search-material" placeholder="Pesquise aqui..." >
                                <label><p>Selecione o material:</p></label>
                                <select name="material" id="materiais" class="produto select"></select>
                            </div>
                            <div class="quantidade">
                                <label for="produto">
                                    <i class="bi bi-clipboard-fill material"></i>
                                </label>
                                <input type="text" name="produto" id="produto" placeholder="Digite a quantidade..." class="quantidade">
                            </div>
                            <div class="botoes">
                                <button class="produtos">
                                    <i class="bi bi-cart-plus-fill produto">
                                        <p class="fonte">Adicionar</p>
                                    </i>
                                </button>
                                <button class="produtos">
                                    <i class="bi bi-cart-dash-fill produto">
                                        <p class="fonte">Remover</p>
                                    </i>
                                </button>
                            </div>
                        </form>
                    </div>
                </div>
            </div>
            <div class="produtos">
                <table class="produto produtos">
                    <tr class="titulotabela produtos">
                        <th colspan="3">Tabela de produtos</th>
                    </tr>
                    <tr>
                        <th colspan="3">Coletor:</th>
                    </tr>
                    <tr class="produtos">
                        <th>Cobre</th>
                        <th>50Kg</th>
                        <th>100$</th>
                    </tr>
                    <tr class="produtos">
                        <th>Papel</th>
                        <th>800Kg</th>
                        <th>500$</th>
                    </tr>
                    <tr class="total produtos">
                        <th>Total</th>
                        <th>sem bonifica��o</th>
                        <th>R$ 600</th>
                    </tr>
                </table>
            </div>
        </div>
        <script src="../scripts/compra.js"></script>


    </body>

</html>