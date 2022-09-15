<?php
require '../util/conexao.php';

$id = filter_input(INPUT_POST, 'id');
$quantidade = filter_input(INPUT_POST, 'quantidade');

$sql = "UPDATE material SET qtd_disponivel_venda= $quantidade WHERE id=$id";
if ($conn->query($sql)) {
    header('location: estoque.php');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
?>