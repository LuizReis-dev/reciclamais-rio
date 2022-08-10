<?php
require 'navegacao.html';
require 'conexao.php';
$sql = "SELECT id, nome, preco_por_kg FROM material";
$result = $conn->query($sql);
if ($result->num_rows > 0) {
?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Controlar materiais</title>
        <link rel="import" href="navegacao.html">
        <link rel="stylesheet" href="./css/controlar.css">
    </head>

    <body>
        <div class="conteudo-principal">
            <div class="opcoes">
                <a class="opcao" href="catadorescontrolar.php">Catadores</a>
                <a class="opcao" href="empresascontrolar.php">Empresas</a>
                <a id="selecionado" class="opcao" href="#">Materiais</a>
            </div>
            <table class="tabela-controlar">
                <thead>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Preço por kg</th>
                    <th class="th-actions">Ações</th>
                </thead>

            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr> <td>" . $row["id"] . "</td> <td>" . $row["nome"] . "</td> <td> R$" . $row["preco_por_kg"] . " </td>";
                echo "<td class='acoes'><a href='#'><i class='bi bi-eye olho'></i></a> <a href='#'><button btn-delete class='buttons-template btn-delete'>Deletar</button> </a></td>";
            }
        } else {
            return "<h1> Nenhum material enconterado</h1>";
        }

            ?>
            </table>

        </div>

    </body>

    </html>