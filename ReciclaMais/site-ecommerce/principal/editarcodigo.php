<?php
session_start();
//Dados do formulário
$idusuario = $_GET["id"];
$campoid = filter_input(INPUT_POST, 'id');
$campoendereco = filter_input(INPUT_POST, 'endereco');
$campoemail = filter_input(INPUT_POST, 'email', FILTER_VALIDATE_EMAIL);
$campotelefone = filter_input(INPUT_POST, 'telefone');

//Faz a conexão com o BD.
require '../util/conexao.php';

//Sql que altera um registro da tabela usuários
$sql = "UPDATE empresa SET email='" . $campoemail . "', endereco='" . $campoendereco . "', telefone='" . $campotelefone . "' WHERE id=" . $campoid;

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE) {
  header('location: usuario.php?id=$idusuario');
} else {
  echo "Erro: " . $conn->error;
}

//Fecha a conexão.
	$conn->close();
	

?> 