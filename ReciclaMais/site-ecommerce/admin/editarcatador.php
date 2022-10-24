<?php 
session_start();
require '../util/conexao.php';
$campoId = filter_input(INPUT_POST, 'id');
$campoNome = filter_input(INPUT_POST, 'nome');
$campoCpf = filter_input(INPUT_POST, 'cpf');
$campoEndereco = filter_input(INPUT_POST, 'endereco');
$campoDataDeNascimento = filter_input(INPUT_POST, 'data_de_nascimento');
$campoEmail = filter_input(INPUT_POST, 'email');
$campoTelefone = filter_input(INPUT_POST, 'telefone');

$sql = "UPDATE catador SET nome='$campoNome', cpf='$campoCpf', endereco='$campoEndereco', data_de_nascimento='$campoDataDeNascimento', email='$campoEmail', telefone='$campoTelefone'WHERE id=$campoId";

if ($conn->query($sql) === TRUE) {
    header('location: catadorescontrolar.php?pag=1');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}