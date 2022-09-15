<?php
require  '../util/conexao.php';

$sql = "SELECT id, imagem, nome, qtd_disponivel_venda FROM material";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
?>
    <html lang="en">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Document</title>
        <link rel="stylesheet" href="../css/estoque.css">
    </head>

    <body>
        <div class="material-container">


        <?php while ($row = $result->fetch_assoc()) {
            echo "<div class='material'>";
            echo "<form action='atualizarestoque.php' method='POST'>";
            echo " <input type='hidden' name='id' value='".$row['id']."'>";
            echo "<img class='imagem' src='data:image/jpeg;base64," . base64_encode($row['imagem']) . "/>";
            echo "<p class='descricao'>" . $row["nome"] . " </p> ";
            echo "<p class='quantidade'> Quantidade disponivel: " . $row["qtd_disponivel_venda"] . "kg</p>";
            echo "<input type='number' name='quantidade' placeholder='Digite a nova quantidade' id='' required>";
            echo '<input type="submit" value="atualizar-produto" >';
            echo '</form>';
            echo "</div>";
        }
    } ?>
        </div>
    </body>

    </html>