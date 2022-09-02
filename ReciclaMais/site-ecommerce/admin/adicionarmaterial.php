<?php
session_start();
require '../util/conexao.php';
$campoNome = filter_input(INPUT_POST, 'nome');
$campoMeta = filter_input(INPUT_POST, 'meta_bonificacao');
$campoBonificacao = filter_input(INPUT_POST, 'valor_bonificacao');
$campoQtdDisponivel = filter_input(INPUT_POST,  'qtd_disponivel_venda');
$campoPrecoCompra = filter_input(INPUT_POST, 'preco_compra_kg');
$campoPrecoVenda = filter_input(INPUT_POST, 'preco_venda_kg');

$sql = "INSERT INTO material(nome, meta_bonificacao_kg, valor_bonificacao, preco_compra_kg, qtd_disponivel_venda, preco_venda_kg) VALUES ('$campoNome', '$campoMeta', '$campoBonificacao', '$campoPrecoCompra', '$campoQtdDisponivel', '$campoPrecoVenda')";

if ($conn->query($sql) === TRUE) {
    echo "Gravado com sucesso.";
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}