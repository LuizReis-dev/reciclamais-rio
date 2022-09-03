<?php
session_start();

$campoemail = filter_input(INPUT_GET, 'id');
$validador = filter_input(INPUT_GET, 'validador');

require 'conexao.php';

$sql = "UPDATE usuario SET Status='ativo' WHERE status='aguardando' and login='" . $campoemail . "' and validador=" . $validador;

if ($conn->query($sql) === TRUE) {
  echo "Registro atualizado.";
  
} else {
  echo "Erro: " . $conn->error;
}
	$conn->close();
	
?>