<?php
session_start();
require 'acessoadm.php';


$campoid = filter_input(INPUT_GET, 'id');
$campostatus = filter_input(INPUT_GET, 'status');

require 'conexao.php';

if ($campostatus == "ativo") {

    // Bloquear usuário o registro com o id
    $sql = "UPDATE usuario SET Status='inativo' WHERE id=$campoid";
} else {

    $sql = "UPDATE usuario SET Status='ativo' WHERE id=$campoid";
}

//Executa o sql e faz tratamento de erro.
if ($conn->query($sql) === TRUE) {
    echo "Usuário bloqueado";

    include 'log.php';

    header('Location: empresascontrolar.php?pag=1'); //Redireciona para o controle  
} else {
    echo "Erro: " . $conn->error;
}

//Fecha a conexão.
$conn->close();
