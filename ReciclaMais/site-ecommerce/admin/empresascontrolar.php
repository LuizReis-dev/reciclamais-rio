<?php
require '../util/navegacao.html';
require '../util/conexao.php';
require '../acesso/acessoadm.php';


$id = $_GET["pag"];

$total = 5;

if ($id != 1) {
    $id = $id - 1;
    $id = $id * $total + 1;
}

$id--;
$sql = "SELECT empresa.*, usuario.status FROM empresa LEFT JOIN usuario ON empresa.id_usuario = usuario.id order by empresa.id LIMIT $id, $total;
";

$sqlContagem = "SELECT count(*) as contagem FROM empresa";

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
        <title>Controlar empresas</title>
        <link rel="import" href="navegacao.html">
        <link rel="stylesheet" href="../css/controlar.css">
        <link rel="stylesheet" href="../css/estiloprincipal.css">
    </head>

    <body>
        <div class="conteudo-principal">
            <div class="opcoes">
                <a class="opcao" href="catadorescontrolar.php?pag=1">Catadores</a>
                <a id="selecionado" class="opcao" href="#s">Empresas</a>
                <a class="opcao" href="materiaiscontrolar.php?pag=1">Materiais</a>
            </div>
            <table class="tabela-controlar">
                <thead>
                    <th>Id</th>
                    <th>Nome</th>
                    <th>Ramo</th>
                    <th>CNPJ</th>
                    <th class="th-actions">Ações</th>
                </thead>
                
            <?php
            while ($row = $result->fetch_assoc()) {
                echo "<tr> <td>" . $row["id"] . "</td> <td>" . $row["nome"] . "</td> <td> " . $row["ramo"] . " </td> <td> " . $row["cnpj"] . " </td>";
                echo "<td class='acoes'><a href='bloquearusuario.php?id=".$row["id_usuario"]."&status=".$row["status"] . "'><i class='bi bi-x-circle olho'></i></a> <a href='#'><button btn-edit class='buttons-template btn-delete'>Editar</button> </a></td>";
            }
        } else {
            return "<h1> Nenhuma empresa encontrada</h1>";
        }
            ?>
            </table>
            <div class="pagination">
                <?php for ($i = 1; $i <= $contagem; $i++) {
                    echo "<a class='pagination' href='empresascontrolar.php?pag=$i'>$i</a> ";
                }
                ?>
            </div>
        </div>

    </body>

    </html>