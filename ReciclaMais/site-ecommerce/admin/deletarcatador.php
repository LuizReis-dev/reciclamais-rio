<?php 
require '../acesso/acessoadm.php';
$campoid = filter_input(INPUT_GET, 'id');

require '../util/conexao.php';
$sql = "DELETE FROM catador WHERE id = $campoid";

if ($conn->query($sql) === TRUE) {
    header('Location: catadorescontrolar.php?pag=1'); 
} else {
    echo "Erro: " . $conn->error;
}
?>