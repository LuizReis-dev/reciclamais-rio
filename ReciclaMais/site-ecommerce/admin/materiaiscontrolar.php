<?php
require '../util/conexao.php';


$id = $_GET["pag"];

$total = 5;

if ($id != 1) {
    $id = $id - 1;
    $id = $id * $total + 1;
}
$id--;
$sql = "SELECT * FROM material ORDER BY id LIMIT $id, $total";

$sqlContagem = "SELECT count(*) as contagem FROM material";

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
        <title>ReciclaMaisRio | Controlar materiais</title>
        <link rel="import" href="navegacao.html">
        <link rel="stylesheet" href="../css/controlar.css">
        <link rel="stylesheet" href="../css/estiloprincipal.css">
        <link rel="icon" type="image/x-icon" href="../imagens/favicon.ico">
    </head>

    <body>
        <div id="pagina">
            <?php
            require '../util/navegacao.html';
            ?>
        <div class="conteudo-principal">
            <div class="opcoes">
                <a class="opcao" href="catadorescontrolar.php?pag=1">Catadores</a>
                <a class="opcao" href="empresascontrolar.php?pag=1">Empresas</a>
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
                echo "<tr> <td>" . $row["id"] . "</td> <td>" . $row["nome"] . "</td> <td> R$" . $row["preco_venda_kg"] . " </td>";
                echo "<td class='acoes'><a href='#'><i class='bi bi-eye olho'></i></a> <a href='deletarmaterial.php?id=".$row["id"]."'><button btn-delete class='buttons-template btn-delete'>Deletar</button> </a></td>";
            }
        } else {
            return "<h1> Nenhum material enconterado</h1>";
        }

            ?>
            </table>
            <div class="escolha">
                <div class="pagination">
                    <?php for ($i = 1; $i <= $contagem; $i++) {
                        echo "<a class='pagination' href='materiaiscontrolar.php?pag=$i'>$i</a> ";
                    }
                    ?>
                </div>
                <a href="adicionarmaterialform.php"> <button class='buttons-template btn-add'>Adicionar</button></a>
            </div>
        </div>
        </div>

    </body>

    </html>