<!DOCTYPE html>
<html lang="pt-br">
<?php
require  '../util/conexao.php';

$sql = "SELECT id, imagem, nome, qtd_disponivel_venda FROM material";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
?>

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>ReciclaMaisRio | Estoque</title>
        <link rel="stylesheet" href="../css/estoque.css">
        <link rel="icon" type="image/x-icon" href="../images/favicon.ico">
    </head>

    <body>
        <div id="pagina">
            <?php
            require('../util/navegacao.html');
            ?>
            <div class="material-container">
            <?php while ($row = $result->fetch_assoc()) {
                echo "<div class='material' data-id='".$row["id"]."'>";
                echo "<form action='atualizarestoque.php' method='POST'>";
                echo "<div class='produto'>";
                echo "<input type='hidden' name='id' value='" . $row['id'] . "'>";
                echo "<p>".$row["nome"]."</p>";
                echo "<img class='imagem' src='". $row["imagem"]."'/>";
                echo "</div>";
                echo "<p class='quantidade'> Quantidade disponivel: " . $row["qtd_disponivel_venda"] . "kg</p>";
                echo "<input type='number' name='quantidade' placeholder='Digite a nova quantidade' class='qtd' required>";
                echo '<input type="submit" value="alterar">';
                echo '</form>';
                echo "<span class='descricao'>" . $row["nome"] . " </span>";
                echo "</div>";
            }
        } ?>
            </div>
        </div>
    <script>
        let materiais = document.querySelectorAll('.material');
        materiais.forEach((material, index) => {
            let quantidadeinput = document.querySelectorAll(`.qtd`);
                quantidadeinput[index].addEventListener('input', () => {
              
                if(quantidadeinput[index].value < 0) {
                    quantidadeinput[index].value = 0
                }
          
            });
        })       
    </script>
    </body>

</html>