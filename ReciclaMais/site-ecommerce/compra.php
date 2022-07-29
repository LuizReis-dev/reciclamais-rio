<!DOCTYPE html>
<?php
require 'cabecalho.php';
require  'conexao.php';
if(!isset($_SESSION["id_usuario"])){
    header('location: login.html');
}


$sql = "SELECT id, imagem, nome, preco_venda_kg FROM material";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
?>

    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <link rel="stylesheet" href="./css/estiloprincipal.css">
        <link rel="stylesheet" href="./css/compra.css">

        <title>Comprar</title>
    </head>

    <body>
        <div class="container-materiais">
        <?php
        while ($row = $result->fetch_assoc()) {
            echo "<div class='material'>";
            echo "<img class='imagem' src='data:image/jpeg;base64," . base64_encode($row['imagem']) . "/>";
            echo "<p class='descricao'>" . $row["nome"] . " </p> ";
            echo "<p class='preco'> R$" . $row["preco_venda_kg"] . " o KG</p>";
            echo '<a class="btn-carrinho"href="adicionarcarrinho.php?id_material='.$row["id"] . '"><button class="btn-carrinho">Adicionar ao carrinho</button></a>';
            echo '<button class="btn-comprar">Comprar agora</button>';
            echo "</div>";
        }
    }
        ?>

        </div>

    </body>

    </html>