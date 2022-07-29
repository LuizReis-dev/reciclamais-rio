<!DOCTYPE html>
<?php
require 'cabecalho.php';
require 'conexao.php';
$materiais_no_carrinho = isset($_SESSION['carrinho']) ? $_SESSION['carrinho'] : array();
$materiais_para_pesquisar = " ";
foreach ($materiais_no_carrinho as $material) {
    $auxiliar = $materiais_para_pesquisar;
    $materiais_para_pesquisar = $material . ", " . $auxiliar;
}
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
                <?php
                $sql = "SELECT * FROM material WHERE id IN (" . $materiais_para_pesquisar . "0 )";
                $result = $conn->query($sql);
                if ($result->num_rows > 0) {
                    while ($row = $result->fetch_assoc()) {
                        echo '<tr>';
                        echo '<td class="img"><a href=""> <img src=">" width="50" height="50" alt=""></a> </td>';
                        echo ' <td>
                        <a href="">' . $row["nome"]. '</a>
                        <br>
                        <a href="removercarrinho.php?id_material='.$row["id"] . '" class="remover">remover</a>
                        </td>
                        <td class="preco">R$'.$row["preco_venda_kg"].'</td>
                        <td class="quantidade">
                        <input type="number" name="quantidade-'.$row["id"].'" value="" min="1" max="" placeholder="quantidade" required>
                        </td>
                        <td class="preco">R$</td>';
                        echo '</tr>';
                    }
                } else {
                    echo '<td colspan="5" style="text-align:center;"> Você ainda não adicionou nenhum material ao carrinho </td>';
                }
                ?>
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