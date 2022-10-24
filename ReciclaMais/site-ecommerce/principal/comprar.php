<?php
session_start();
require  '../util/conexao.php';


$sql = "SELECT * FROM material WHERE qtd_disponivel_venda > 0";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
?>

    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ReciclaMaisRio | Comprar</title>
        <link rel="stylesheet" href="../css/comprar.css">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Nunito:wght@400;800&display=swap">
        <link rel="stylesheet" href="https://fonts.googleapis.com/css2?family=Montserrat&display=swap">
        <link rel="icon" type="image/x-icon" href="../imagens/favicon.ico">
    </head>

    <body>
        <div id="pagina">
            <?php
            require '../util/cabecalho.php';
            ?>
            <div class="container-materiais">
            <?php
            while ($row = $result->fetch_assoc()) {
            echo "<div class='material'>";
            echo "<img class='imagem' src='". $row["imagem"]."'/>";
            echo "<p class='descricao'>" . $row["nome"] . " </p> ";
            echo "<p class='preco'> R$" . $row["preco_venda_kg"] . " o KG</p>";
            echo '<button class="btn-carrinho"><a href="../carrinho/adicionarcarrinho.php?id_material='.$row["id"] . '">Adicionar ao carrinho</a></button>';
            echo '<button class="btn-comprar">Comprar agora</button>';
            echo "</div>";
            }
        }
            ?>
            </div>
        </div>

    </body>

    </html> 