<?php
require '../util/conexao.php';

$id = $_GET["pag"];

$total = 5;

if ($id != 1) {
    $id = $id - 1;
    $id = $id * $total + 1;
}


$id--;
$sql = "SELECT operacao_comercial.*, empresa.nome as empresa FROM operacao_comercial INNER JOIN empresa on operacao_comercial.id_empresa = empresa.id WHERE tipo = 'v' AND status='entregue' ORDER BY id LIMIT $id, $total";

$sqlContagem = "SELECT count(*) as contagem FROM operacao_comercial WHERE tipo = 'v' AND status='entregue'";

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
        <title>ReciclaMaisRio | Controlar catadores</title>
        <link rel="import" href="navegacao.html">
        <link rel="stylesheet" href="../css/controlar.css">
    </head>

    <body>
        <div id="pagina">
            <?php
            require '../util/navegacao.html';
            ?>
        <div class="conteudo-principal">
            <div class="opcoes">
                <a class="opcao" href="vendas.php?pag=1">Pendentes</a>
                <a  id="selecionado"class="opcao" href="#">Resolvidas</a>
            </div>
            <table class="tabela-controlar">
                <thead>
                    <th>Id</th>
                    <th>Empresa</th>
                    <th>Valor</th>
                    <th>Data</th>
                    <th class="th-actions">Ações</th>
                </thead>
            <?php

            while ($row = $result->fetch_assoc()) {
                echo "<tr> <td>" . $row["id"] . "</td> <td>" . $row["empresa"] . "</td> <td> R$" . $row["total_final"] . " </td> <td>" . $row["data"] . "</td>";
                echo "<td class='acoes'><a href='verdetalhesvenda.php?id=".$row["id"] ."'><i class='bi bi-eye olho'></i></a></td>";
            }
        }else {
            echo "Error: " . $sql . "<br>" . $conn->error;
        }
        ?>
            </table>
            <div class="escolha">
                <div class="pagination">
                    <?php for ($i = 1; $i <= $contagem; $i++) {
                        echo "<a class='pagination' href='vendas.php?pag=$i'>$i</a> ";
                    }
                    ?>
                </div>
                <a href="adicionarcatadorform.php"> <button class='buttons-template btn-add'>Adicionar</button></a>
            </div>
        </div>
        </div>

    </body>

    </html>