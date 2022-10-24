<?php
$id = $_GET["id"];
require '../util/conexao.php';
$sqlOpComercial = "SELECT operacao_comercial.*, empresa.nome as empresa FROM operacao_comercial INNER JOIN empresa on empresa.id = operacao_comercial.id_empresa WHERE operacao_comercial.id = $id";
$resultOp = $conn->query($sqlOpComercial);

$sqlMatOp = "SELECT materias_em_op.*, material.nome as material FROM materias_em_op INNER JOIN material on material.id = materias_em_op.id_material WHERE id_operacao_comercial  = $id";
$resultMatOp = $conn->query($sqlMatOp);
if ($resultOp->num_rows > 0) {
?>

<!DOCTYPE html>
<html lang="pt-br">
<head>
    <meta charset="UTF-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>ReciclaMaisRio | Detalhes Venda</title>
    <link rel="stylesheet" href="../css/verdetalhesvenda.css">
  <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.9.1/font/bootstrap-icons.css">
  <link rel="icon" type="image/x-icon" href="../imagens/favicon.ico">
</head>
<body>
    <div id="pagina">
        <div class="home">
        </div>
        <div class="conteiner">
            <picture class="cristo">
                <img src="../imagens/cristo.png" alt="cristo">
            </picture>
    <?php
    while ($rowOp = $resultOp->fetch_assoc()) {
        echo "Valor: R$" .$rowOp["total_final"] . "<br/> ";
        echo "Empresa:" .$rowOp["empresa"] . "<br/>";               
        echo "Status: " .$rowOp["status"] . "<br/>";               
    }
    if ($resultMatOp->num_rows > 0) {
        echo "Materiais comprados" . "<br/> ";;
        while ($rowMatOp = $resultMatOp->fetch_assoc()) {
            echo "Material:" .$rowMatOp["material"] . " Quantidade : " .$rowMatOp["total_em_kg"] . "kg<br/> ";;               

        }
        
    }
}
    ?>
        </div>
    </div>
</body>
</html>