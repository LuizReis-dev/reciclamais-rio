<?php
session_start();
require '../util/conexao.php';
$campoNome = filter_input(INPUT_POST, 'nome');
$campoCpf = filter_input(INPUT_POST, 'cpf');
$campoEndereco = filter_input(INPUT_POST, 'endereco');
$campoDataDeNascimento = filter_input(INPUT_POST, 'data_de_nascimento');
$campoEmail = filter_input(INPUT_POST, 'email');
$campoTelefone = filter_input(INPUT_POST, 'telefone');

$sql = "INSERT INTO catador(nome, cpf, endereco, data_de_nascimento, email, telefone) VALUES ('$campoNome', '$campoCpf', '$campoEndereco', '$campoDataDeNascimento', '$campoEmail', '$campoTelefone')";

if ($conn->query($sql) === TRUE) {
    header('location: catadorescontrolar.php?pag=1');
} else {
    echo "Error: " . $sql . "<br>" . $conn->error;
}
