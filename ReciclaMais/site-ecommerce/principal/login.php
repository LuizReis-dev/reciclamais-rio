<?php
session_start();
if (!isset($_POST['senha'])) {
	header('Location: login.html');
	exit;
}

$campoLogin = filter_input(INPUT_POST, 'login');
$campoSenha = filter_input(INPUT_POST, 'senha');

require 'conexao.php';

$sql = "SELECT * FROM usuario where login='$campoLogin'";

$result = $conn->query($sql);

$row = $result->fetch_assoc();

if ($result->num_rows > 0) {
	if ($row["status"] == "ativo") {
		if ($row["acesso"] == "empresa") {
			$verificado = password_verify($campoSenha, $row["senha"]);
			if ($verificado) {
				$_SESSION['acesso'] = $row["acesso"];
				$_SESSION['id_usuario'] = $row["id"];
				header('location: index.php');
				exit;
			} else {
				header("location:login.html");
				exit;
			}
		} elseif ($row["acesso"] == "admin") {
			if ($campoSenha == $row["senha"]) {
				$_SESSION['acesso'] = $row["acesso"];
				header('location: admin.html');
			} else {
				echo 'senha errada';
			}
		}
	} else {
		header('location: inativo.html');
	}
} else {
	header('location: login.html');
	exit;
}

$conn->close();
