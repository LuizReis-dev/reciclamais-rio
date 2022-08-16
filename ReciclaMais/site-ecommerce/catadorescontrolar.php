<?php
require 'navegacao.html';
require 'conexao.php';
$id = $_GET["pag"];

$total = 2;

if ($id != 1) {
    $id = $id - 1;
    $id = $id * $total + 1;
}

$id--;
$sql = "SELECT *, TIMESTAMPDIFF(YEAR, data_de_nascimento, CURDATE()) as idade FROM catador ORDER BY id LIMIT $id, $total";

$sqlContagem = "SELECT count(*) as contagem FROM catador";

$result = $conn->query($sql);
$resultContagem = $conn->query($sqlContagem);

$rowContagem = $resultContagem->fetch_assoc();
$contagem = $rowContagem["contagem"];

if ($contagem % $total == 0) {
    $contagem = $contagem / $total;
} else {
    $contagem = $contagem / $total + 1;
}
if ($result->num_rows > 0) {
?>

    <!DOCTYPE html>
    <html lang="pt-br">

    <head>
        <meta charset="UTF-8">
        <meta http-equiv="X-UA-Compatible" content="IE=edge">
        <meta name="viewport" content="width=device-width, initial-scale=1.0">
        <title>Controlar catadores</title>
        <link rel="import" href="navegacao.html">
        <link rel="stylesheet" href="./css/controlar.css">

    </head>

    <body>
        <div class="conteudo-principal">
            <div class="opcoes">
                <a id="selecionado" class="opcao" href="#">Catadores</a>
                <a class="opcao" href="empresascontrolar.php">Empresas</a>
                <a class="opcao" href="materiaiscontrolar.php">Materiais</a>
            </div>
            <table class="tabela-controlar">
                <thead>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Idade</th>
                    <th>CPF</th>
                    <th class="th-actions">Ações</th>
                </thead>
                <!-- <tr>
                <td>5</td>
                <td>Franciso Neves</td>
                <td>50</td>
                <td>000.000.000-00</td>
                <td class="acoes"><a href="#"><i class="bi bi-eye olho"></i></a> <a href='#'><button btn-delete class='buttons-template btn-delete'>Deletar</button> </a></td>
            </tr> -->
            <?php

            while ($row = $result->fetch_assoc()) {
                echo "<tr> <td>" . $row["id"] . "</td> <td>" . $row["nome"] . "</td> <td>" . $row["idade"] . " </td> <td>" . $row["cpf"] . "</td>";
                echo "<td class='acoes'><a href='#'><i class='bi bi-eye olho'></i></a> <a href='#'><button btn-delete class='buttons-template btn-delete'>Deletar</button> </a></td>";
            }
        }
            ?>
            </table>
            <div class="pagination">
                <?php for ($i = 1; $i <= $contagem; $i++) {
                    echo "<a class='pagination' href='catadorescontrolar.php?pag=$i'>$i</a> ";
                }
                ?>
            </div>
        </div>

    </body>

    </html>