
<!DOCTYPE html>
<html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">

        <link rel="stylesheet" href="../css/navegacao.css">
        <link rel="stylesheet" href="../css/venda.css">
        <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.8.2/font/bootstrap-icons.css">

        <title>ReciclaMaisRio | Venda</title>
    </head>

    <body>
        <%@include file="navegacao.html"%>

        <div class="venda">
            <div class="fileira">
                <div class="empresa">
                    <form action="" method="" class="empresa">
                        <label for="empresa">
                            <i class="bi bi-person-fill icone"></i>
                        </label>
                        <input type="text" name="empresa" id="empresa" placeholder="Digite o nome da empresa..." class="dados" required>
                        <input type="submit" value="Enviar" class="dados">
                    </form>
                </div>
                <div class="informacao">
                    <div class="conteiner-info">
                        <form action="" method="">
                            <div class="material">
                                <select name="material" class="produto">
                                    <option selected disabled hidden>Escolha um produto</option>
                                    <option value="1" class="produto">Papel</option>
                                    <option value="2" class="produto">Madeira</option>
                                    <option value="3" class="produto">Vidro</option>
                                    <option value="4" class="produto">Pl�stico</option>
                                    <option value="5" class="produto">Metal</option>
                                    <option value="6" class="produto">Cobre</option>
                                    <option value="7" class="produto">Alum�nio</option>
                                </select>
                                <span class="seta"></span>
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
                        <th colspan="3">Empresa:</th>
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
                        <th></th>
                        <th>R$ 600</th>
                    </tr>
                </table>
            </div>
        </div>
    </body>

</html>