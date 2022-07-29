<!DOCTYPE html>
<?php
require 'cabecalho.php';
?>
<html lang="pt-br">

<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <link rel="stylesheet" href="./css/estiloprincipal.css">
    <link rel="stylesheet" href="./css/carrinho.css">
    <title>Carrinho</title>
</head>

<body>
    <div class="container">
        <h1 class="titulo">Carrinho</h1>
        <table>
            <thead>
                <tr>
                    <td colspan="2">Produto</td>
                    <td>Preço</td>
                    <td>Quantidade</td>
                    <td>Total</td>
                </tr>
                
            </thead>
            <tbody>
                <tr>
                    <td class="img">
                        <a href="">
                            <img src=">" width="50" height="50" alt="">
                        </a>
                    </td>
                    <td>
                        <a href="">Cobre</a>
                        <br>
                        <a href="" class="remover">remover</a>
                    </td>
                    <td class="preco">R$30</td>
                    <td class="quantidade">
                        <input type="number" name="quantidade" value="" min="1" max="" placeholder="quantidade" required>
                    </td>
                    <td class="preco">R$2000</td>
                </tr>
            </tbody>
        </table>
        <p>Confira a quantidade selecionada antes de realizar a compra</p>
        <div class="subtotal">
            <span class="text">Preço total</span>
            <span class="preco">$20,00</span>
        </div>
        <div class="buttons">
            <input type="submit" value="Atualizar" name="atualizar">
            <input type="submit" value="Comprar" name="comprar">
        </div>
    </div>
    
</body>

</html>