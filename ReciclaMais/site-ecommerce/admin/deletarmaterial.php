<?php 
session_start();
require '../acesso/acessoadm.php';
$campoid = filter_input(INPUT_GET, 'id');

require '../util/conexao.php';
$sql = "DELETE FROM material WHERE id = $campoid";

if ($conn->query($sql) === TRUE) {
    echo "material excluído";

    header('Location: materiaiscontrolar.php?pag=1'); 
} else {
    echo "Erro: " . $conn->error;
}
?>